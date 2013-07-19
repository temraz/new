/* [ ---- Hagal Admin - notifications ---- ] */

    $(function() {
        //* noty
        hagal_noty.init();
        // bootbox
        hagal_bootbox.init();
    });

    //* noty
    hagal_noty = {
        init: function() {
            // default
            $('#noty_default').click(function(e) {
                e.preventDefault();
                noty({text: 'Lorem ipsum dolor sit amet...',layout: 'center',theme: 'hagal' });
            });
            // error
            $('#noty_error').click(function(e) {
                e.preventDefault();
                noty({text: 'Error: lorem ipsum dolor sit...',layout: 'center',theme: 'hagal',type: 'error' });
            });
            // success
            $('#noty_success').click(function(e) {
                e.preventDefault();
                noty({text: 'Success: lorem ipsum dolor sit...',layout: 'center',theme: 'hagal',type: 'success' });
            });
            // info
            $('#noty_info').click(function(e) {
                e.preventDefault();
                noty({text: 'Info: lorem ipsum dolor sit...',layout: 'center',theme: 'hagal',type: 'information' });
            });
            // warning
            $('#noty_warning').click(function(e) {
                e.preventDefault();
                noty({text: 'Warning: lorem ipsum dolor sit...',layout: 'center',theme: 'hagal',type: 'warning' });
            });
            // with icon
            $('#noty_icon').click(function(e) {
                e.preventDefault();
                noty({text: '<i class="elusive-icon-question-sign"></i>Lorem ipsum dolor sit amet...',layout: 'center',theme: 'hagal' });
            });
            
            // positions 
            $('#noty_nw').click(function(e) {
                e.preventDefault();
                noty({text: 'noty position: top left',layout: 'topLeft',theme: 'hagal',type: 'information' });
            });
            $('#noty_n').click(function(e) {
                e.preventDefault();
                noty({text: 'noty position: top center',layout: 'topCenter',theme: 'hagal',type: 'information' });
            });
            $('#noty_ne').click(function(e) {
                e.preventDefault();
                noty({text: 'noty position: top right',layout: 'topRight',theme: 'hagal',type: 'information' });
            });
            $('#noty_sw').click(function(e) {
                e.preventDefault();
                noty({text: 'noty position: bottom center',layout: 'bottomLeft',theme: 'hagal',type: 'information' });
            });
            $('#noty_s').click(function(e) {
                e.preventDefault();
                noty({text: 'noty position: bottom center',layout: 'bottomCenter',theme: 'hagal',type: 'information' });
            });
            $('#noty_se').click(function(e) {
                e.preventDefault();
                noty({text: 'noty position: bottom right',layout: 'bottomRight',theme: 'hagal',type: 'information' });
            });
            
            // custom container
            $('#noty_custom_default').click(function(e) {
                e.preventDefault();
                $('#noty_container').noty({text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat illum ullam temporibus nostrum earum ex velit dolorem. Ullam quam id voluptas sint vero molestiae magni ea neque illum eius quis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem minus corrupti at quo aspernatur id qui labore repudiandae autem odio maiores quibusdam delectus aliquam. Voluptatum atque fugiat amet facilis sequi.',layout: 'inline',theme: 'hagal' });
            });
            $('#noty_custom_error').click(function(e) {
                e.preventDefault();
                $('#noty_container').noty({text: 'Error: lorem ipsum dolor sit...',layout: 'inline',theme: 'hagal',type: 'error' });
            });
            $('#noty_custom_success').click(function(e) {
                e.preventDefault();
                $('#noty_container').noty({text: 'Success: lorem ipsum dolor sit...',layout: 'inline',theme: 'hagal',type: 'success' });
            });
            $('#noty_custom_info').click(function(e) {
                e.preventDefault();
                $('#noty_container').noty({text: 'Info: lorem ipsum dolor sit...',layout: 'inline',theme: 'hagal',type: 'information' });
            });
        }
    };
    
    // bootbox
    hagal_bootbox = {
        init: function() {
            $("#bb-alert").click(function(e) {
                e.preventDefault();
                bootbox.alert("Hello world!", function() {
                    console.log("Alert Callback");
                });
            });
            $("#bb-confirm").click(function(e) {
                e.preventDefault();
                bootbox.confirm("Are you sure?", function(confirmed) {
                    console.log("Confirmed: "+confirmed);
                });
            });
            $("#bb-prompt").click(function(e) {
                e.preventDefault();
                bootbox.prompt("What is your name?", function(result) {
                    console.log("Result: "+result);
                });
            });
            $("#bb-prompt-default").click(function(e) {
                e.preventDefault();
                bootbox.prompt("What is your favourite JS library?", "Cancel", "OK", function(result) {
                    console.log("Result: "+result);
                }, "jQuery");
            });
            $("#bb-dialog").click(function(e) {
                e.preventDefault();
                bootbox.dialog("I am a custom dialog", [{
                    "label" : "Success!",
                    "class" : "btn-success",
                    "callback": function() {
                        console.log("great success");
                    }
                }, {
                    "label" : "Danger!",
                    "class" : "btn-danger",
                    "callback": function() {
                        console.log("uh oh, look out!");
                    }
                }, {
                    "label" : "Click ME!",
                    "class" : "btn-primary",
                    "callback": function() {
                        console.log("Primary button");
                    }
                }, {
                    "label" : "Just a button..."
                }]);
            });
            $("#bb-dynamic").click(function(e) {
                e.preventDefault();
                var str = $("<p>This content is actually a jQuery object, which will change in 3 seconds...</p>");
                bootbox.dialog(str, {
                    "label" : "OK"
                });
                setTimeout(function() {
                    str.html("See?");
                }, 3000);
            });
            $("#bb-no-backdrop").click(function(e) {
                e.preventDefault();
                bootbox.dialog("This dialog does not have a backdrop element",
                {
                    "OK": function() {}
                }, {
                    "backdrop": false
                });
            });
        }
    };