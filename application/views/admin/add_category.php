<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>shelinat Admin panel v1.0</title>

        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <link rel="icon" type="image/ico" href="favicon.ico">

        
    <!-- common stylesheets-->
        <!-- bootstrap framework css -->
            <link rel="stylesheet" href="<?php echo base_url();?>admin/css/bootstrap.min.css" >
        <!-- flag icons -->
            <link rel="stylesheet" href="<?php echo base_url();?>admin/css/flags.css" >
        <!-- elusive webicons -->
            <link rel="stylesheet" href="<?php echo base_url();?>admin/css/elusive-webfont.css" >

    <!-- aditional stylesheets -->
        <!-- fullcalenar -->
            <link rel="stylesheet" href="<?php echo base_url();?>admin/css/fullcalendar.css" >
        <!-- main stylesheet -->
            <link rel="stylesheet" href="<?php echo base_url();?>admin/css/style.css" >

        <!-- theme -->
            <link rel="stylesheet" href="<?php echo base_url();?>admin/css/blue.css"  id="theme">

        <!--[if lt IE 9]><link rel="stylesheet" href="ie8.css" tppabs="http://tzd-themes.com/hagal_admin/css/ie8.css"><![endif]-->

        <!--[if lt IE 9]>
            <script src="html5shiv.js" tppabs="http://tzd-themes.com/hagal_admin/js/ie/html5shiv.js"></script>
            <script src="respond.min.js" tppabs="http://tzd-themes.com/hagal_admin/js/ie/respond.min.js"></script>
            <script src="excanvas.min.js" tppabs="http://tzd-themes.com/hagal_admin/js/ie/excanvas.min.js"></script>
        <![endif]-->

        <!-- custom fonts -->
            <link href="<?php echo base_url();?>admin/css/css-family=Roboto+Condensed-400,300&subset=latin,latin-ext.css"  rel='stylesheet'>
   <style>
            
            select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input {-webkit-border-radius:0;-moz-border-radius:0;border-radius:0}
            textarea:focus, input[type="text"]:focus, input[type="password"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="color"]:focus, .uneditable-input:focus { border-color: #5ca9e4; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2) inset, 0 0 0 2px rgba(70, 161, 231, 0.3); }
            form {margin:0}
            
            .login_box {width:325px;border:1px solid #ddd;background:#fff;position:relative;top:10%}
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
    </head>
    <body>
        <!-- main wrapper (without footer) -->
        <div id="main-wrapper">

           <?php include('template/top_bar.php') ;?>
            
            <!-- header -->
          <?php include('template/header.php');?>
            
           <?php include('template/message_task.php');?>

            <section id="main_section">
                <div class="container-fluid">
                    <div id="contentwrapper">
                        <div id="content">

                            <!-- breadcrumbs -->
                            <section id="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li class="crumb_sep"><i class="elusive-icon-play"></i></li>
                                    <li><a href="#">Dashboard</a></li>                                    
                                </ul>
                            </section>

                            <!-- main content -->
                            <div class="row-fluid">
                                <div class="stat_boxes">
                                    <div class="row-fluid">
                                      <?php if(isset($insert) && $insert ==1){?>
            <div class="alert alert-success">
            <a data-dismiss="alert" class="close">×</a>
            <strong>Success! </strong> category has been saved
            </div>

		   <?php }elseif(isset($insert) && $insert ==0){?>
           <div class="alert alert-error">
            <a data-dismiss="alert" class="close">×</a>
            <strong>Error! </strong>not saved try again please
            </div>

           <?php }?>
           <?php if(isset($sub_insert) && $sub_insert ==1){?>
            <div class="alert alert-success">
            <a data-dismiss="alert" class="close">×</a>
            <strong>Success! </strong>Sub category has been saved
            </div>

		   <?php }elseif(isset($sub_insert) && $sub_insert ==0){?>
           <div class="alert alert-error">
            <a data-dismiss="alert" class="close">×</a>
            <strong>Error! </strong>not saved try again please
            </div>

           <?php }?>  
                                        <div class="login_box" style="width:20%;float:left;margin-right:10px;">
        <!-- sign in --> 
       
          <?php echo validation_errors(); ?>
           <?php echo form_open('civou/home/insert_category'); ?>
                            <h2 style="text-align:center">Enter category</h2>
                <div class="box_content">
                    <div class="row-fluid">
                        <div class="text-center">

                            <input class="span12" type="text" id="l_username" name="cat_name" placeholder="Category name" value="" style="margin-bottom:48px;" required>
                           
                        </div>
                       
                        <button class="btn btn-block btn-primary btn-large" type="submit">Save</button>
                       
                    </div>
                </div>
                <div class="box_footer text-center clearfix minor_text">
                    
                </div>  
            </form>
       </div>
       
       
                                      <div class="login_box" style="width:20%;float:left;margin-right:10px;">
        <!-- sign in -->    
          <?php echo validation_errors(); ?>
           <?php echo form_open('civou/home/insert_sub_category'); ?>
            <h3 style="text-align:center">Enter Sub category</h2>
                
                <div class="box_content">
                    <div class="row-fluid">
                        <div class="text-center">
                           
                           
                                                    <select name="categoryid" id="s2_val" class="span12" required>
                                                        <option value=""></option>
                                                        
                                                            <option value="" selected>select one </option>
                                                            <?php if(isset($categores)){foreach($categores as $category){?>
															 <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>	
																<?php }}?>
                                                           
                                                        </optgroup>
                                                        </select>
                           
                           
                        <input class="span12" type="text" id="l_username" name="sub_cat_name" placeholder="Sub Category name" value="" required>
                        </div>
                       
                        <button class="btn btn-block btn-primary btn-large" type="submit">Save</button>
                       
                    </div>
                </div>
                <div class="box_footer text-center clearfix minor_text">
                    
                </div>  
            </form>
       </div>
       
        <div class="login_box" style="width:20%;float:left">
        <!-- sign in -->    
          <?php echo validation_errors(); ?>
           <?php echo form_open('civou/home/insert_sub_category'); ?>
           
                <h2 style="text-align:center">Delete category</h2>
                <div class="box_content">
                    <div class="row-fluid">
                   
                        <div class="text-center">
                           
                           
                                                    <select name="categoryid" id="s2_val" class="span12" style="margin-bottom:48px;" required>
                                                        <option value=""></option>
                                                        
                                                            <option value="" selected>select one </option>
                                                            <?php if(isset($categores)){foreach($categores as $category){?>
															 <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>	
																<?php }}?>
                                                           
                                                        </optgroup>
                                                        </select>
                           
                           
                      
                        </div>
                       
                        <button class="btn btn-block btn-primary btn-large" type="submit">Delete</button>
                       
                    </div>
                </div>
                <div class="box_footer text-center clearfix minor_text">
                    
                </div>  
            </form>
       </div>
       
        
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <!-- #content end -->
                    </div>
                    <!-- #contentwrapper end -->
                    <!-- side menu -->
                   <?php include('template/left_menu.php');?>
                    <!-- jPanel sidebar -->
                   
                    <!-- sticky footer space -->
                    <div id="footer_space"></div>
                </div>
            </section>
        </div>
        <!-- #main-wrapper end -->

        <!-- footer -->
        <?php include('template/footer.php'); ?>
        
    <!-- common scripts -->
        <!-- jQuery library -->
            <script src="<?php echo base_url();?>admin/js/jquery.min.js"></script>
            <!-- jQuery migrate -->
            <script src="<?php echo base_url();?>admin/js/jquery-migrate-1.2.1.min.js"></script>
        <!-- bootstrap framework plugins -->
            <script src="<?php echo base_url();?>admin/js/bootstrap.min.js" ></script>
        <!-- actual width/height of hidden DOM elements -->
            <script src="<?php echo base_url();?>admin/js/jquery.actual.min.js" ></script>
        <!-- jquery cookie plugin -->
            <script src="<?php echo base_url();?>admin/js/jquery_cookie.js" ></script>
        <!-- jquery tooltips -->
            <script src="<?php echo base_url();?>admin/js/jquery.powertip.min.js" ></script>
        <!-- off-canvas sidebar -->
            <script src="<?php echo base_url();?>admin/js/jquery.jpanelmenu.js" ></script>
        <!-- mobile navigation -->
            <script src="<?php echo base_url();?>admin/js/tinynav.js" ></script>

        <!-- common functions -->
            <script src="<?php echo base_url();?>admin/js/hagal_common.js" ></script>

    <!-- dashboard scripts -->
        <!-- jQuery UI -->
            <script src="<?php echo base_url();?>admin/js/jquery-ui-1.10.2.custom.min.js" ></script>
            <script src="<?php echo base_url();?>admin/js/jquery.ui.touch-punch.min.js" ></script>
        <!-- FullCalendar -->
            <script src="<?php echo base_url();?>admin/js/fullcalendar.js" ></script>
        <!-- flot (charts) -->
            <script src="<?php echo base_url();?>admin/js/jquery.flot.min.js" ></script>
            <script src="<?php echo base_url();?>admin/js/jquery.flot.resize.min.js" ></script>
            <script src="<?php echo base_url();?>admin/js/jquery.flot.orderBars.js"></script>
            <script src="<?php echo base_url();?>admin/js/jquery.flot.tooltip.min.js"></script>
            <script src="<?php echo base_url();?>admin/js/jquery.flot.time.min.js" ></script>
        <!-- peity (small charts) -->
            <script src="<?php echo base_url();?>admin/js/jquery.peity.min.js"></script>

            <script src="<?php echo base_url();?>admin/js/hagal_dashboard.js" ></script>
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