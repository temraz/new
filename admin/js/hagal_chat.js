/* [ ---- Hagal Admin - chat ---- ] */

    $(function() {
        //* close tab
        hagal_chat.close_tab();
    });

    //* chat
    hagal_chat = {
        close_tab: function() {
            $(".closeTab").click(function () {
                var tabContentId = $(this).prev('a').attr("href");
                $(this).closest('li').remove();
                $('.chat_tabs .nav-tabs a:last').tab('show');
                $(tabContentId).remove();
            })
        }
    };
