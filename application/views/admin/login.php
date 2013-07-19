<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Hagal Admin Panel - Login Page</title>

        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <link rel="icon" type="image/ico" href="favicon.ico">
            
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo base_url();?>admin/css/bootstrap.min.css" />
        <!-- main styles -->
        <style>
            html,body {height:100%}
            body {background:#f8f8f8;padding:0}
            select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input {-webkit-border-radius:0;-moz-border-radius:0;border-radius:0}
            textarea:focus, input[type="text"]:focus, input[type="password"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="color"]:focus, .uneditable-input:focus { border-color: #5ca9e4; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2) inset, 0 0 0 2px rgba(70, 161, 231, 0.3); }
            form {margin:0}
            
            .login_box {width:325px;margin:0 auto;border:1px solid #ddd;background:#fff;position:relative;top:10%}
            .box_top,.box_footer {background:#f3f2f1;padding:10px}
            .box_top {text-align:center;padding:10px 10px 8px}
            .box_top img {width:64px;height:30px}
            .box_content {border-width:1px 0;border-style:solid;border-color:#ddd;padding:20px 40px}
            .box_content p {margin:0;line-height:1.3}
            .box_content label {font-size:11px;margin:0;padding:0}
            .box_content .btn-block {margin:20px 0 10px}
            .minor_text {font-size:11px}
            
            .modal {-webkit-border-radius: 0;-moz-border-radius: 0;border-radius: 0;}
            .modal-header {border-bottom:none;background:#333;color:#fff}    
            .modal-header .close {color:#fff;opacity:0.8}    
            .modal-header .close:hover {color:#fff;opacity:1}    
            .modal-header h3 {font-size:16px;font-weight:normal}    
            .modal-body {padding:20px}
            .modal-body p {margin-bottom:10px}
            .modal-body p:last-child {margin:0}
            .modal-backdrop, .modal-backdrop.fade.in {opacity:0.5;filter: alpha(opacity=50)}
            .modal-footer {padding:6px 10px}
            
            label.error {position:relative;top:-8px;color:#dc0000;font-weight:700}
        </style>

        <!--[if lt IE 9]>
            <style>
                select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input {display:inline;min-height:20px !important}
            </style>
            <script src="html5shiv.min.js" tppabs="http://tzd-themes.com/hagal_admin/js/ie/html5shiv.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="login_box">
        <!-- sign in -->    
          <?php echo validation_errors(); ?>
           <?php echo form_open('civou/home/valid_loign'); ?>
           <?php if(isset($login_error)){?>
            <div class="alert alert-error">
            <a data-dismiss="alert" class="close">×</a>
            <strong>Error! </strong>username or password is incorrect
            </div>

		   <?php }?>
                <div class="box_top"><img src="<?php echo base_url();?>admin/images/hagal_logo.png" alt=""></div>    
                <div class="box_content">
                    <div class="row-fluid">
                        <div class="text-center">
                            <label for="l_username">Username</label>
                            <input class="span12" type="text" id="l_username" name="username" placeholder="Username" value="" required>
                        </div>
                        <div class="text-center">
                            <label for="l_password">Password</label>
                            <input class="span12" type="password" id="l_password" name="password" placeholder="Password" value="" required>
                        </div>
                        <button class="btn btn-block btn-primary btn-large" type="submit">Sign In</button>
                       
                    </div>
                </div>
                <div class="box_footer text-center clearfix minor_text">
                    
                </div>  
            </form>
       </div> 
        <script src="<?php echo base_url();?>admin/js/jquery.min.js" ></script>
        <script src="<?php echo base_url();?>admin/js/jquery.actual.min.js" ></script>
        <script src="<?php echo base_url();?>admin/js/bootstrap.min.js" ></script>
        <script src="<?php echo base_url();?>admin/js/jquery.validate.js" ></script>
        <script>
            $(function() {
                
                //* boxes animation
                var form_wrapper = $('.login_box');
                form_wrapper.css({
                    marginTop : ( - ( form_wrapper.height() / 2) ),
                    top: '50%'
                });
                
                $('.form_toggle').on('click',function(e){
                    var target  = $(this).attr('href'),
                        target_height = $(target).actual('height');
                    $(form_wrapper).css({
                        'height'        : form_wrapper.height()
                    }); 
                    $(form_wrapper.find('form:visible')).fadeOut(400,function(){
                        form_wrapper.stop().animate({
                            height   : target_height,
                            marginTop: ( - (target_height/2) )
                        },500,function(){
                            $(target).fadeIn(400);
                            $(form_wrapper).css({
                                'height'        : ''
                            }); 
                        });
                    });
                    e.preventDefault();
                });
                
                //* validation
                $('#login_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    rules: {
                        l_username: { required: true, minlength: 3 },
                        l_password: { required: true, minlength: 3 }
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    }
                })
            });
        </script>
        
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-41842459-1']);
            _gaq.push(['_trackPageview']);
          
            (function() {
              var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
              ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www/') + '.google-analytics.com/ga.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
          
          </script>
    </body>
</html>