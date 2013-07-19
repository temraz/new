/* [ ---- Hagal Admin - gallery ---- ] */

    $(function() {
        //* MixItUp
        hagal_gallery.listing();
        //* lightbox gallery
        hagal_gallery.lightBox();
    });

    //* MixItUp
    hagal_gallery = {
        listing: function() {
            var list_container = $('#gallery ul'),list,grid = true;
            
            list_container.mixitup({
                onMixStart: function(config){
                    list_container.find('.mix').removeClass('full_width');
                },
                onMixEnd: function(config){
                    if(config.layoutMode == 'list') {
                        setTimeout(function(){
                            list = true;
                            list_container.addClass('layout_full');
                        },100);
                    } else {
                        grid = true;
                        list_container.removeClass('layout_full');
                    }
                    //* lightbox gallery
                    hagal_gallery.lightBox();
                }
            });
            
            $('.gallery_list').on('click', function(e){
                if(grid){
                    $('.gallery_layout li').removeClass('active_layout');
                    $(this).addClass('active_layout');
                    list_container.mixitup('toList');
                }
            });
            
            $('.gallery_grid').on('click', function(e){
                if(list){
                    $('.gallery_layout li').removeClass('active_layout');
                    $(this).addClass('active_layout');
                    list_container.removeClass('layout_full');
                    list_container.mixitup('toGrid');
                }
            });
        },
        lightBox: function() { 
            $('#gallery li:visible .holder').magnificPopup({ 
                type: 'image',
                gallery: {
                    enabled: true,
                    arrowMarkup: '<i title="%title%" class="elusive-icon-chevron-%dir% mfp-nav"></i>'
                },
                image: {
                    cursor: null
                }
            });
        }
    };