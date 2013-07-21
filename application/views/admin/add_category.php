<!DOCTYPE HTML>
<html lang="en-US"><head>
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
        
        
       <script src="<?php echo base_url();?>admin/js/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('#loader').hide();
        $('#show_heading').hide();
             
        $('#search_category_id').change(function(){
            $('#show_sub_categories').fadeOut();
            $('#loader').show();
            $('#show_heading').show();
                    
            $.post("<?php echo site_url('admin/js/get_chid_categories.php') ?>", {
                parent_id: $('#search_category_id').val()
            }, function(response){			
                setTimeout("finishAjax('show_sub_categories', '"+escape(response)+"')", 400);
            });
            return false;
        });
    });

    function finishAjax(id, response){
        $('#loader').hide();
        $('#show_heading').show();
        $('#'+id).html(unescape(response));
        $('#'+id).fadeIn();
    } 

    function alert_id()
    {
        if($('#sub_category_id').val() == '')
            alert('Please select a sub category.');
        else
            alert($('#sub_category_id').val());
        return false;
    }

</script>



<style>
    .both h4{ font-family:Arial, Helvetica, sans-serif; margin:0px; font-size:14px;}
    #search_category_id{ padding:3px; width:200px;}
    #sub_category_id{ padding:3px; width:200px;}
    .both{ float:left; margin:0 15px 0 0; padding:0px;}
</style>        
<!--end of drop down compobox    -- ---------------------------------------------------------  -->
<style type="text/css">
    .error{color:#F00;font-size:18px}

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
                                    <li><a href="#">Service category</a></li>                                    
                                </ul>
                            </section>

                            <!-- main content -->
                            <div class="row-fluid">
                                <div class="stat_boxes">
                                    <div class="row-fluid">
                                    <?php if(validation_errors()){?>
                                    
                                      <div class="alert alert-error">
            <a data-dismiss="alert" class="close">×</a>
            <?php echo validation_errors(); ?>
            </div>
                                    <?php }?>
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
           
           <?php if(isset($delete) && $delete ==1){?>
            <div class="alert alert-success">
            <a data-dismiss="alert" class="close">×</a>
            <strong>Success! </strong>category has been deleted
            </div>

		   <?php }elseif(isset($delete) && $delete ==0){?>
           <div class="alert alert-error">
            <a data-dismiss="alert" class="close">×</a>
            <strong>Error! </strong>can't delete it now try again please
            </div>

           <?php }?>  
                      
                         <?php if(isset($sub_delete) && $sub_delete ==1){?>
            <div class="alert alert-success">
            <a data-dismiss="alert" class="close">×</a>
            <strong>Success! </strong>Sub category has been deleted
            </div>

		   <?php }elseif(isset($sub_delete) && $sub_delete ==0){?>
           <div class="alert alert-error">
            <a data-dismiss="alert" class="close">×</a>
            <strong>Error! </strong>can't delete it now try again please
            </div>

           <?php }?>  
                      
                                        <div class="login_box" style="width:20%;float:left;margin-right:10px;">
        <!-- sign in --> 
       
          
           <?php echo form_open('civou/home/insert_category'); ?>
                           <h3 style="text-align:center">Enter category</h3>
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
          
           <?php echo form_open('civou/home/insert_sub_category'); ?>
            <h3 style="text-align:center"> Enter Sub category</h3>
                
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
       
        <div class="login_box" style="width:20%;float:left;">
        <!-- sign in -->    
         
           <?php echo form_open('civou/home/delete_category'); ?>
           
               <h3 style="text-align:center">Delete category</h3>
                <div class="box_content">
                    <div class="row-fluid">
                   
                        <div class="text-center">
                           
                           
                                                    <select name="categoryid"  id="search_category_id" class="span12" style="margin-bottom:48px;width:95%" required>
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
              <?php echo form_close(); ?>
       </div>
       <!----------------------------------------------->
       
       
         <div style="float:left;margin-left:10px;width:20%">
<div id="show_sub_categories" align="right" style="width:20%;">
<img src="<?php echo base_url(); ?>images/loader.gif"  id="loader" alt="" />


</div>
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