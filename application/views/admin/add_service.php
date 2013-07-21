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
  <script src="<?php echo base_url();?>admin/js/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('#loader').hide();
        $('#show_heading').hide();
             
        $('#search_category_id').change(function(){
            $('#show_sub_categories').fadeOut();
            $('#loader').show();
            $('#show_heading').show();
                    
            $.post("<?php echo site_url('admin/js/get_chid_categories_insert.php') ?>", {
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
                                     <?php if(validation_errors()){?>
                                    
                                      <div class="alert alert-error">
            <a data-dismiss="alert" class="close">×</a>
            <?php echo validation_errors(); ?>
            </div>
                                    <?php }?>
                                      <?php if(isset($insert) && $insert ==1){?>
            <div class="alert alert-success">
            <a data-dismiss="alert" class="close">×</a>
            <strong>Success! </strong> Service has been saved
            </div>

		   <?php }elseif(isset($insert) && $insert ==0){?>
           <div class="alert alert-error">
            <a data-dismiss="alert" class="close">×</a>
            <strong>Error! </strong>Can't save the service try again please
            </div>

           <?php }?>
           
                                     <div class="span9">
                                    <div class="box_a">
                                        <div class="box_a_heading">
                                            <h3>Enter the Services</h3>
                                        </div>
                                        <div class="box_a_content" id="validate_field_types">
                                            <?php echo form_open('civou/home/insert_service'); ?>
                                                <div class="formSep">
                                                    <label class="req">Enter service name </label>
                                                    <input value="" class="span10" type="text" name="servicename" id="val1_url" required/>
                                                </div>
                                                <div class="formSep">
                                                    <label class="req">Enter service Price( points ) </label>
                                                    <input value="" class="span10" type="text" name="serviceprice" id="val1_url" required/>
                                                </div>
                                               
                                                 <div class="formSep">
                                                    <label class="req">Enter The Delivery time  </label>
                                                    <input value="" class="span10" type="text" name="duration" id="val1_url" required/>
                                                </div>
                                                
                                                <div class="formSep">
                                                    <label class="req">Department</label>
                                                    <select name="search_category" id="search_category_id" class="span10" required>
                                                        <option></option>
                                                       <?php if(isset($categores)){foreach($categores as $category){?>
															 <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>	
																<?php }}?>
                                                    </select>
                                                </div>	
                                                
                     <div class="formSep">                           
<div id="show_sub_categories"  >
<img align="center" src="<?php echo base_url(); ?>admin/images/loader.gif"  id="loader" alt="" />


</div>
</div>	
                                               	
                                                	 <div class="formSep">
                                                    <label class="req">Service description  </label>
                                                    <textarea class="span10" rows="2" cols="20" name="discription" id="val1_text" required></textarea>
                                                </div>
                                                	
                                                     <div class="formSep">
                                                    <label class="req">Service Instruction  </label>
                                                    <textarea class="span10" rows="2" cols="20" name="instruction" id="val1_text" required></textarea>
                                                </div>
                                                	
                                                <div class="formSep">	
                                                    <label class="req">Service pic</label>
                                                   
                                                     <?php echo form_upload(array('name'=>'userfile','required'=>'required')); ?>
                                                </div>
                                                <div class="formSep">
                                                    <button type="submit" class="btn">Save</button>
                                                    
                                                </div>
                                               <?php echo form_close(); ?>
                                        </div>
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