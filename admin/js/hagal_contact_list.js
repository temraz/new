/* [ ---- Hagal Admin - contact list ---- ] */

    $(function() {
        //* searchable contact list
        hagal_contact_list.init();
    });

    //* searchable contact list
    hagal_contact_list = {
        init: function() {
            if($('#contact-list').length) {
                //* fuzzy search options    
                var fuzzyOptions = {
                    searchClass: "fuzzy-search",
                    location: 0,
                    distance: 100,
                    threshold: 0.4,
                    multiSearch: true
                };
    
                //* list_js options
                var options = {
                    valueNames: [ 'l_username','l_company','l_email','l_phone','l_address' ], //* sort-by
                    plugins: [
                        [ 'fuzzySearch', fuzzyOptions ],
                        [ 'paging', {
                            pagingClass: "bottomPaging",
                            innerWindow: 1,
                            outerWindow: 1
                        } ]
                    ],
                    page: 10 //* elements on page
                };
            
                //* init list_js
                var contactList = new List('contact-list', options);
            
                //* count elements
                $('#count_list span').text( contactList.matchingItems.length )
            
                //* fuzzy search
                $('.search-fuzzy').keyup(function() {
                    contactList.fuzzySearch($(this).val());
                    //* count elements
                    setTimeout(function(){
                        $('#count_list span').text( contactList.matchingItems.length )
                    },100);
                });
            }
        }
    };