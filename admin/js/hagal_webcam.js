/* [ ---- Hagal Admin - webcam ---- ] */

    $(function() {
        //* webcam
        hagal_webcam.init();
    });

    //* webcam
    hagal_webcam = {
        init: function() {
            var messages = $('#webcam_message');
            
            webcam.set_shutter_url( 'http://tzd-themes.com/hagal_admin/js/pages/js/lib/webcam/shutter.mp3' );
            webcam.set_swf_url( 'webcam.swf'/*tpa=http://tzd-themes.com/hagal_admin/js/pages/js/lib/webcam/webcam.swf*/ );
            webcam.set_api_url( 'http://tzd-themes.com/hagal_admin/js/pages/js/lib/webcam/upload.php' );
            webcam.set_quality( 90 ); // JPEG quality (1 - 100)
            webcam.set_shutter_sound( true ); // play shutter click sound
                
            $('#webcam').css({
                'width': '320px',
                'height': '240px'
            }).html(webcam.get_html(320, 240));
            
            webcam.set_hook( 'onComplete', my_completion_handler );
            
            webcam.set_hook( 'onAllow', on_allow_flash );
            
            // take snapshot and upload to server
            function take_snapshot() {
                //hide all messages
                messages.children('.alert').hide();
                messages.children('.alert-info').show();
                webcam.snap();
            }
            
            function my_completion_handler(msg) {
                //hide all messages
                messages.children('.alert').hide();
                
                // extract URL out of PHP output
                if (msg.match(/(http\:\/\/\S+)/)) {
                    var image_url = RegExp.$1;
                    // show JPEG image in page
                    messages.children('.alert-success').show().children('span').html(image_url);
                    // reset camera for another shot
                    webcam.reset();
                } else {
                    messages.children('.alert-error').show().children('span').html(msg);
                }
            }
            
            // show button on flash allow
            function on_allow_flash() {
                $('.allow_flash').show()
            }
            
            // camera configuration
            $('#webcam_configure').click(function(e) {
                e.preventDefault();
                webcam.configure()
            })
            
            // take snapshot on button click
            $('#webcam_snapshot').click(function(e) {
                e.preventDefault();
                take_snapshot()
            })
            
        }
    };