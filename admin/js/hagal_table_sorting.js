/* [ ---- Hagal Admin - table sorting ---- ] */

    $(function() {
        //* table sorting
        hagal_table_sorting.basic();
    });

    //* table sorting
    hagal_table_sorting = {
        basic: function() {
            if($('#sorting_basic').length) {
                var table = document.getElementById('sorting_basic');
                var sort = new Tablesort(table);
            }
        }
    };