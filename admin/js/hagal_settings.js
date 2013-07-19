/* [ ---- Hagal Admin - form elements ---- ] */

    $(function() {
        // switch buttons
        if($('.switch').length) {
            $('.switch')['bootstrapSwitch']();
        }
        
        // enhanced select
        if($('#s_lang_visitors').length) {
            $('#s_lang_visitors').select2({
                tags:["English", "Chinese", "Dutch", "French", "German", "Hungarian", "Italian", "Lithuanian", "Russian", "Spanish", "Swedish", "Ukrainian"],
                tokenSeparators: [",", " "]
            });
        }
        if($('#s_lang_redirect').length) {
            $('#s_lang_redirect').select2({
                tags:["English", "Chinese", "Dutch", "French", "German", "Hungarian", "Italian", "Lithuanian", "Russian", "Spanish", "Swedish", "Ukrainian"],
                tokenSeparators: [",", " "]
            });
        }
    });