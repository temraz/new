/* [ ---- Hagal Admin - form elements ---- ] */

    $(function() {
        //* ui sliders
        hagal_sliders.init();
        //* ui progressbars
        hagal_progressbars.init();
        //* 2col multiselect
        hagal_multiselect.init();
        //* enchanced select box
        hagal_enchancedSelect.init();
        //* masked inputs
        hagal_maskedInputs.init();
        //* password strength meter
        hagal_password_meter.init();
        //* password show
        hagal_password_show.init();
        //* datepicker
        hagal_datepicker.init();
        //* timepicker
        hagal_timepicker.init();
        //* colorpicker
        hagal_colorpicker.init();
        //* iCheck
        hagal_icheck.init();
        //* switch buttons
        hagal_switchButtons.init();
        //* autosize textarea
        hagal_autosize_textarea.init();
        //* textarea counter
        hagal_textarea_counter.init();
        // UI spinners
        hagal_uiSpinners.init();
        //* multiupload
        hagal_multiupload.init();
        //* WYSIWG Editor
        hagal_wysiwg.init();
    });

    //* sliders
    hagal_sliders = {
        init: function() {
            if($('.ui_slider1').length) {
                //* default slider
                $( ".ui_slider1" ).slider({
                    value:100,
                    min: 0,
                    max: 500,
                    step: 50,
                    slide: function( event, ui ) {
                        $( ".ui_slider1_val" ).text( "$" + ui.value );
                        $( "#ui_slider_default_val" ).val( "$" + ui.value );
                    }
                });
                $( ".ui_slider1_val" ).text( "$" + $( ".ui_slider1" ).slider( "value" ) );
                $( "#ui_slider_default_val" ).val( "$" + $( ".ui_slider1" ).slider( "value" ) );
            }
            if($('.ui_slider2').length) {
                //* range slider
                $( ".ui_slider2" ).slider({
                    range: true,
                    min: 0,
                    max: 500,
                    values: [ 75, 300 ],
                    slide: function( event, ui ) {
                        $( ".ui_slider2_val" ).text( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                        $( "#ui_slider_min_val" ).val( "$" + ui.values[ 0 ] );
                        $( "#ui_slider_max_val" ).val( "$" + ui.values[ 1 ] );
                    }
                });
                $( ".ui_slider2_val" ).text( "$" + $( ".ui_slider2" ).slider( "values", 0 ) + " - $" + $( ".ui_slider2" ).slider( "values", 1 ) );
                $( "#ui_slider_min_val" ).val( "$" + $( ".ui_slider2" ).slider( "values", 0 ) );
                $( "#ui_slider_max_val" ).val( "$" + $( ".ui_slider2" ).slider( "values", 1 ) );
            }
            if($('#ui_slider3_sel').length) {
                //* slider with select
                var select = $( "#ui_slider3_sel" );
                var slider = $( "<div id='ui_slider3'></div>" ).insertAfter( select ).slider({
                    min: 1,
                    max: 6,
                    range: "min",
                    value: select[ 0 ].selectedIndex + 1,
                    slide: function( event, ui ) {
                        select[ 0 ].selectedIndex = ui.value - 1;
                    }
                });
                $( "#ui_slider3_sel" ).change(function() {
                    slider.slider( "value", this.selectedIndex + 1 );
                });
            }
        }
    };

    //* progressbars
    hagal_progressbars = {
        init: function(){
            $('.anim_start').click(function(e){
                e.preventDefault();
                hagal_progressbars.start();
                $(this).remove();
            })
        },
        start: function() {
            if($('#progress1').length) {
                var iEnd1 = new Date().setTime(new Date().getTime() + 25 * 1000); // now plus 25 secs
                $('#progress1').anim_progressbar({
                    finish: iEnd1,
                    callback: function() {
                        // callback after finish
                    }
                })
            }
            if($('#progress2').length) {
                var iNow = new Date().setTime(new Date().getTime() + 2 * 1000); // now plus 2 secs
                var iEnd2 = new Date().setTime(new Date().getTime() + 10 * 1000); // now plus 10 secs
                $('#progress2').anim_progressbar({
                    start: iNow,
                    finish: iEnd2,
                    interval: 100,
                    callback: function() {
                        // callback after finish
                    }
                })
            }
            if($('#progress3').length) {
                var iEnd3 = new Date().setTime(new Date().getTime() + 15 * 1000); // now plus 15 secs
                $('#progress3').anim_progressbar({
                    interval: 1000,
                    finish: iEnd3,
                    callback: function() {
                        // callback after finish
                    }
                })
            }
        }
    };

    //* multiselect
    hagal_multiselect = {
        init: function(){
            if($('#public-methods').length) {
                //* public methods
                $('#public-methods').multiSelect();
                $('#select-all').click(function(){
                    $('#public-methods').multiSelect('select_all');
                    return false;
                });
                $('#deselect-all').click(function(){
                    $('#public-methods').multiSelect('deselect_all');
                    return false;
                });
                $('#select-fr').click(function(){
                    $('#public-methods').multiSelect('select', 'fr');
                    return false;
                });
                $('#deselect-fr').click(function(){
                    $('#public-methods').multiSelect('deselect', 'fr');
                    return false;
                });
            }
            if($('#optgroup').length) {
                //* optgroup
                $('#optgroup').multiSelect()
            }
            if($('#custom-headers').length) {
                //* custom headers
                $('#custom-headers').multiSelect({
                    selectableHeader: "<div class='custom-header'>Selectable item</div>",
                    selectionHeader: "<div class='custom-header'>Selected items</div>"
                });
            }
            if($('#searchable').length) {
                //* searchable
                $('#searchable').multiSelect({
                    selectableHeader: '<div class="search-header"><input type="text" class="span12" id="ms-search" autocomplete="off" placeholder="country name"></div>',
                    selectionHeader: "<div class='search-selected'></div>"
                });
            }
            if($('#ms-search').length) {  
                $('#ms-search').quicksearch($('.ms-elem-selectable', '#ms-searchable' )).on('keydown', function(e){
                    if (e.keyCode == 40){
                        $(this).trigger('focusout');
                        $('#ms-searchable').focus();
                        return false;
                    }
                })
            }
        }
    };

    //* masked inputs
    hagal_maskedInputs = {
        init: function() {
            $("#mask_date").inputmask("d/m/y",{ "placeholder": "dd/mm/yyyy" });
            $("#mask_phone").inputmask("mask", {"mask": "(999) 999-9999"});
            $("#mask_product").inputmask({"mask": "AA-999999a"});
            $("#mask_numeric").inputmask('€ 999.999,99', { numericInput: false });
            $("#mask_mac").inputmask({"mask": "**:**:**:**:**:**"});
            $("#mask_callback").inputmask("d/m/y",{ "placeholder": "dd/mm/yyyy", "oncomplete": function(){ alert('Date entered: '+$(this).val()); } });
            $('[data-inputmask]').inputmask();
        }
    };

    //* password strength meter
    hagal_password_meter = {
        init: function() {
            if($('#password_meter').length) {
                $("#password_meter").complexify({}, function (valid, complexity) {
                    $('#pass_progress').css({'width':complexity + '%'});
                    if (complexity < 40) {
                        $('#pass_progressbar').removeClass('progress-warning').addClass('progress-danger');
                    } else if(complexity < 70 ) {
                        $('#pass_progressbar').removeClass('progress-danger progress-success').addClass('progress-warning');
                    } else {
                        $('#pass_progressbar').removeClass('progress-warning').addClass('progress-success');
                    }
                    $('#complexity').html(Math.round(complexity) + '%');
                });
            }
        }
    };
    
    //* password show
    hagal_password_show = {
        init: function() {
            if($('.showpassword').length) {
                $(".showpassword").each(function(index,input) {
                    var $input = $(input);
                    $input.wrap('<div class="showpassword_wrap">');
                    $('.showpassword_wrap').append(
                        $('<i class="elusive-icon-eye-close">').click(function() {
                            $(this).toggleClass('elusive-icon-eye-open elusive-icon-eye-close');
                            $input.attr("type", $(this).hasClass("elusive-icon-eye-open") ? "text" : "password");
                        })
                    );
                });
            }
        }
    };

    //* enchanced select box
    hagal_enchancedSelect = {
        init: function() {
            if($('#s2_single').length) {
                $("#s2_single").select2({
                    placeholder: "Select a State",
                    allowClear: true
                });
            }
            if($('#s2_multiple').length) {
                $("#s2_multiple").select2({
                    placeholder: "Add tags"
                });
            }
            if($('#s2_single_data').length) {
                $('#s2_single_data').select2({
                    minimumInputLength: 1,
                    query: function (query) {
                        var data = {results: []}, i, j, s;
                        for (i = 1; i < 5; i++) {
                            s = "";
                            for (j = 0; j < i; j++) {s = s + query.term;}
                            data.results.push({id: query.term + i, text: s});
                        }
                        query.callback(data);
                    }
                });
            }
            if($('#s2_tag_handler').length) {
                $('#s2_tag_handler').select2({
                    tags:["red", "green", "blue", "black", "white"],
                    tokenSeparators: [",", " "]
                });
            }
        }
    };

    //* datepicker
    hagal_datepicker = {
        init: function() {
            if($('.bs_datepicker').length) {
                $('.bs_datepicker').datepicker()
            }
            if( ($('#dpStart').length) && ($('#dpEnd').length) ) {
                $('#dpStart').datepicker().on('changeDate', function(e){
                    $('#dpEnd').datepicker('setStartDate', e.date);
                });
                $('#dpEnd').datepicker().on('changeDate', function(e){
                    $('#dpStart').datepicker('setEndDate', e.date)
                });
            }
        }
    };

    //* timepicker
    hagal_timepicker = {
        init: function() {
            if($('#tp-default').length) {
                $('#tp-default').timepicker()
            }
            if($('#tp-24h').length) {
                $('#tp-24h').timepicker({
                    minuteStep: 1,
                    template: 'modal',
                    showSeconds: true,
                    showMeridian: false
                })
            }
            if($('#tp-noTemplate').length) {
                $('#tp-noTemplate').timepicker({
                    template: false,
                    showInputs: false,
                    minuteStep: 5
                })
            }
            if($('#tp-modal').length) {
                $('#tp-modal').timepicker({
                    minuteStep: 1,
                    secondStep: 5,
                    showInputs: false,
                    modalBackdrop: true,
                    showSeconds: true,
                    showMeridian: false
                })
            }
        }
    };

    //* colorpicker
    hagal_colorpicker = {
        init: function() {
            if($('#cp1').length) {
                $('#cp1').colorpicker({
                    format: 'hex'
                })
            }
            if($('#cp2').length) {
                $('#cp2').colorpicker()
            }
            if($('#cp3').length) {
                $('#cp3').colorpicker()
            }
        }
    };

    //* icheck checkboxes & radio buttons
    hagal_icheck = {
        init: function() {
            if($('.icheck').length) {
                $('.icheck').iCheck({
                    checkboxClass: 'icheckbox_square',
                    radioClass: 'iradio_square'
                });
            }
            //* icheck color change
            $('#icheck_colors li').click(function(){
                if(!$(this).hasClass('active_color')) {
                    $('#icheck_colors li').removeClass('active_color');
                    var act_color = $(this).addClass('active_color').data('icolor');
                    if(act_color != '')
                        act_color = "-"+act_color;
                    $('.icheck').iCheck('destroy').iCheck({
                        checkboxClass: 'icheckbox_square'+act_color,
                        radioClass: 'iradio_square'+act_color
                    });
                }
            })
        }
    };

    //* switch buttons
    hagal_switchButtons = {
        init: function() {
            if($('.switch').length) {
                $('.switch')['bootstrapSwitch']();
            }
            if($('.switch_radio').length) {
                $(".switch_radio").on('switch-change', function (e, data) {
                    if(data.value) {
                        $(".switch_radio").not($(this)).bootstrapSwitch('setState', false)
                    }
                });
            }
        }
    };

    //* autosize textarea
    hagal_autosize_textarea = {
        init: function() {
            if($('.autosize_textarea').length) {
                $('.autosize_textarea').each(function() {
                    $(this).autosize();
                })
            }
        }
    };

    //* textarea counter
    hagal_textarea_counter = {
        init: function() {
            if($('#count-textarea1').length) {
                $('#count-textarea1').textareaCount({
                    maxCharacterSize: -2,
                    originalStyle: 'originalTextareaInfo',
                    warningStyle : 'warningTextareaInfo',
                    warningNumber: 40
                })
            }
            if($('#count-textarea2').length) {
                $('#count-textarea2').textareaCount({
                    maxCharacterSize: 200,
                    originalStyle: 'originalTextareaInfo',
                    warningStyle : 'warningTextareaInfo',
                    warningNumber: 40,
                    displayFormat : '#input/#max | #words words'
                })
            }
        }
    };

    //* UI spinners
    hagal_uiSpinners = {
        init: function() {
            if($('#def_spinner').length) {
                $('#def_spinner').spinner();
            }
            if($('#decimal_spinner').length) {
                $("#decimal_spinner").numeric({
                    step: 0.01,
                    format: "n", // c - currency, d -  decimal digits, n - number, p - percentage
                    buttons: {
                        position: "insideStacked"
                    }
                    
                });
            }
            if($('#numeric_min_max').length) {
                var numericSpinner = $("#numeric_min_max").numeric({
                    format: "c", // c - currency, d -  decimal digits, n - number, p - percentage
                    min: -20,
                    max: 100
                });
            }
            if($('#time_spinner').length) {
                $.widget( "jqAmpUI.timespinner", $.jqAmpUI.spinner, {
                    options: {
                        // seconds
                        step: 60 * 1000,
                        // hours
                        page: 60
                    },
                    _parse: function( value ) {
                        if ( typeof value === "string" ) {
                            // already a timestamp
                            if ( Number( value ) == value ) {
                                return Number( value );
                            }
                            return +Globalize.parseDate( value );
                        }
                        return value;
                    },
                    _format: function( value ) {
                        return Globalize.format( new Date(value), "t" );
                    }
                });
             
                var timeSpinner = $( "#time_spinner" ).timespinner();
            }
            if($('#spinners_culture').length) {
                // culture change
                $( "#spinners_culture" ).change(function() {
                    var currentTime = timeSpinner.timespinner('value'); 
                    var currentNumeric = numericSpinner.numeric('value'); 
                   
                    Globalize.culture( $(this).val() );
                    
                    timeSpinner.timespinner( 'value', currentTime );
                    numericSpinner.numeric( 'value', currentNumeric );
                });
            }
            // remove default button styles
            $('.ui-spinner-button').each(function(){
                $(this).removeClass('ui-state-default ui-button');
            })
        }
    };

    //* drag&drop multi-upload
    hagal_multiupload = {
        init: function() {
            if($('#multi_upload').length) {
                $("#multi_upload").pluploadQueue({
                    // General settings
                    runtimes : 'html5,flash,silverlight',
                    url : 'http://tzd-themes.com/hagal_admin/js/pages/js/lib/plupload/examples/dump.php',
                    max_file_size : '10mb',
                    chunk_size : '1mb',
                    unique_names : true,
                    browse_button : 'pickfiles',
            
                    // Specify what files to browse for
                    filters : [
                        {title : "Image files", extensions : "jpg,gif,png"},
                        {title : "Zip files", extensions : "zip"}
                    ],
            
                    // Flash settings
                    flash_swf_url : 'plupload.flash.swf'/*tpa=http://tzd-themes.com/hagal_admin/js/pages/js/lib/plupload/js/plupload.flash.swf*/,
            
                    // Silverlight settings
                    silverlight_xap_url : 'http://tzd-themes.com/hagal_admin/js/pages/js/lib/plupload/js/plupload.silverlight.xap'
                });
                $('.plupload_header').remove();
            }
        }
    };

    //* WYSIWG Editor
    hagal_wysiwg = {
        init: function() {
            if($('#wysiwg_editor').length) { 
                CKEDITOR.replace( 'wysiwg_editor' );
            }    
        }
    };