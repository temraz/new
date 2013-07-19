/* [ ---- Hagal Admin - responsive table ---- ] */

    $(function() {
        //* responsive table
        hagal_responsive_table.example();
    });

    //* responsive table
    hagal_responsive_table = {
        example: function() {
            if($('#foo_example').length) {
                $('#foo_example').footable();
            }
        }
    };