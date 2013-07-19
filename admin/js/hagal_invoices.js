/* [ ---- Hagal Admin - invoices ---- ] */

    $(function() {
        hagal_invoice.init();
        
        hagal_invoice.add_remove_items();
        hagal_invoice.calculations();
        
        //* responsive table
        if($('#all_invoices').length) {
            $('#all_invoices').footable({
                breakpoints: {
                    small: 280
                }
            });
        }
    });

    hagal_invoice = {
        init: function() {
            // reset form
            hagal_invoice.reset_all();
            
            // datepicker
            $('#invoice_date,#invoice_due_date').datepicker({
                autoclose: true
            });
            
            // masked inputs
            $(".jQinv_item_unit_cost,.jQinv_item_qty").inputmask('non-negative-decimal', { rightAlignNumerics: false });
            
            // update invoice on keyup & change
            $('#inv_all_items').on('keyup','.jQinv_item_unit_cost,.jQinv_item_qty', function(e) {
                hagal_invoice.calculations();
            }).on('change','.jQinv_item_tax', function(e) {
                hagal_invoice.calculations();
            });
            
            $("#reset_form").click(function(e) {
                e.preventDefault();
                bootbox.confirm("Are you sure?", function(confirmed) {
                    if(confirmed) {
                        hagal_invoice.reset_all();
                        hagal_invoice.calculations();
                        $('#inv_all_items .inv_item').not(':first').remove()
                    }
                });
            });
        },
        add_remove_items: function() {
            
            var template = $('.inv_item').clone(),
                item_count = 1;
            
            function addItem() {
                item_count++;
                var cloned_template = template.clone();
                cloned_template.find(':input').each(function(){
                    var newId = this.id.substring(0, this.id.length-1) + item_count;
                    $(this).prev('label').attr('for', newId);
                    this.name = this.id = newId; // update id and name (assume the same)
                })
                .end().find('.inv_item_add').toggleClass('inv_item_add inv_item_remove elusive-icon-plus elusive-icon-minus')
                .end().find('.jQinv_item_unit_cost').inputmask('non-negative-decimal', { rightAlignNumerics: false })
                .end().find('.jQinv_item_qty').inputmask('non-negative-decimal', { rightAlignNumerics: false });
                
                cloned_template.attr('id', 'inv_item_' + item_count).appendTo('#inv_all_items');
            }
            
            $('.inv_item_add').on('click', function() {
                addItem();
            })
            
            $('#inv_all_items').on('click', '.inv_item_remove', function() {
                var this_el = $(this).closest('.inv_item');
                this_el.remove();
                hagal_invoice.calculations();
            })
        },
        calculations: function() {
            var balance = subTotal = taxTotal = 0;
            
            // calculate invoice
            $(".inv_item").each(function () {
                var $unit_price = $('.jQinv_item_unit_cost', this).val(), // unit price
                    $qty = $('.jQinv_item_qty', this).val(), // quantity
                    $tax = $('.jQinv_item_tax', this).val(), // tax
                    
                    $total = $unit_price * $qty, // unit price x quantity
                    $tax_sub = $total * ($tax/parseFloat("100")), // sub tax
                    $tax_amount = $total - ($total * ($tax/parseFloat("100"))), // tax amount
                    
                    parsedTotal = parseFloat( ('0' + $tax_amount).replace(/[^0-9-\.]/g, ''), 10 ),
                    parsedSubTax = parseFloat( ('0' + $tax_sub).replace(/[^0-9-\.]/g, ''), 10 ),
                    parsedSubTotal = parseFloat( ('0' + $total).replace(/[^0-9-\.]/g, ''), 10 );
                
                $('.jQinv_item_total',this).val(parsedTotal.toFixed(2));
                
                subTotal += parsedSubTotal;
                taxTotal += parsedSubTax;
                balance += parsedTotal; 
            });
            
            $(".inv_subtotal").text(subTotal.toFixed(2));
            $(".inv_tax_amount").text(taxTotal.toFixed(2));
            $(".inv_balance").text(balance.toFixed(2));
        },
        reset_all: function() {
            // reset all inputs
            $('input, textarea','#inv_form').not('.jQinv_item_total').val('');
            $('.jQinv_item_total').val('http://tzd-themes.com/hagal_admin/js/pages/0.00');
            hagal_invoice.calculations();
        }
    };