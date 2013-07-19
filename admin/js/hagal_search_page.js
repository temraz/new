/* [ ---- Hagal Admin - search page ---- ] */

    $(function() {
        //* search page
        hagal_search.init();
    });

    //* search page
    hagal_search = {
        init: function() {
            $('.search_filters input[type=checkbox]').on('change', function() {
                if($(this).prop('checked')) {
                    $(this).closest('.checkbox').addClass('checked');
                } else {
                    $(this).closest('.checkbox').removeClass('checked');
                };
            })
        }
    };