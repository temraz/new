/* [ ---- Hagal Admin - widgets ---- ] */

    $(function() {
        //* google pretty print
        if(typeof prettyPrint == 'function') {
            prettyPrint();
        }
        
        //* tabs
        if($('#w_tabs').length) {
            $('#w_tabs a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');
            })
        };
        
        //* dynamic pagination
        hagal_dyn_pagination.init();
        
        //* custom scrollbars
        hagal_scrollbars.init();
    });

    // dynamic pagination
    hagal_dyn_pagination = {
        init: function() {
            if($('#dynamic_pag').length) {
                var startPage = 3; // page to show on start
                $('#dynamic_pag').bootpag({
                    total: 10,
                    page: startPage,
                    maxVisible: 5 
                }).on('page', function(event, num){
                    $('#dynamic_pag ul li').removeClass('active');
                    $('#dynamic_pag ul li[data-lp="'+num+'"]').addClass('active');
                    // some lorem ipsum words (jquery.lorem.js)
                    $("#dynamic_pag_content").lorem({ type: 'words',amount:'100',ptags:false}); // or some ajax content loading...
                    $("#dynamic_pag_nb").html('Page: '+num);
                });
                $("#dynamic_pag_nb").html('Page: '+startPage);
                $('#dynamic_pag ul li[data-lp="'+startPage+'"]').addClass('active');
            }
        }
    };
    
    // custom scrollbars
    hagal_scrollbars = {
        init: function() {
            if($('#scrollBar_a').length) {
                $("#scrollBar_a").mCustomScrollbar({
                    theme: "dark"
                });
            }
            if($('#scrollBar_b').length) {
                $("#scrollBar_b").mCustomScrollbar({
					scrollButtons:{
						enable:true
					},
                    theme: "dark"
				});
            }
            if($('#scrollBar_c').length) {
                $("#scrollBar_c").mCustomScrollbar({
					autoHideScrollbar: true,
                    theme: "dark"
				});
            }
        }
    };