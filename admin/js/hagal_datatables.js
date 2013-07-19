/* [ ---- Hagal Admin - datatables ---- ] */

    $(function() {
        //* datatables
        hagal_datatables.basic();
        hagal_datatables.scroll();
        hagal_datatables.colReorder_visibility();
        hagal_datatables.table_tools();
        
        //* add placeholder to search input
        $('.dataTables_filter input').each(function() {
            $(this).attr("placeholder", "Enter search terms here");
        })
    });

    //* datatables
    hagal_datatables = {
        //* basic example
        basic: function() {
            if($('#dt_basic').length) {
                $('#dt_basic').dataTable({
                    "sPaginationType": "bootstrap_full"
                });
            }
        },
        //* horizontal scroll
        scroll: function() {
            if($('#dt_scroll').length) {
                $('#dt_scroll').dataTable({
                "sScrollX": "100%",
                "sScrollXInner": '150%',
                "sPaginationType": "bootstrap",
                "bScrollCollapse": true 
            });
            }
        },
        //* column reorder & toggle visibility
        colReorder_visibility: function() {
            if($('#dt_colVis_Reorder').length) {
                $('#dt_colVis_Reorder').dataTable({
                    "sPaginationType": "bootstrap",
                    "sDom": "R<'dt-top-row'Clf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row-fluid'ip>",
                    "fnInitComplete": function(oSettings, json) {
                        $('.ColVis_Button').addClass('btn btn-small').html('Columns');
                    }
                });
            }
        },
        //* column reorder & toggle visibility
        table_tools: function() {
            if($('#dt_table_tools').length) {
                $('#dt_table_tools').dataTable({
                    "sDom": "<'dt-top-row'Tlf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row-fluid'ip>",
                    "oTableTools": {
                        "aButtons": [
                            "copy",
                            "print",
                            {
                                "sExtends":    "collection",
                                "sButtonText": 'Save <span class="caret" />',
                                "aButtons":    [ "csv", "xls", "pdf" ]
                            }
                        ],
                        "sSwfPath": "copy_csv_xls_pdf.swf"/*tpa=http://tzd-themes.com/hagal_admin/js/pages/js/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf*/
                    },
                    "fnInitComplete": function(oSettings, json) {
                        $(this).closest('#dt_table_tools_wrapper').find('.DTTT.btn-group').addClass('table_tools_group').children('http://tzd-themes.com/hagal_admin/js/pages/a.btn').each(function(){
                            $(this).addClass('btn-small');
                        });
                    }
                });
            }
        }
    };