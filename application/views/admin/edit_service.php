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
            <link rel="stylesheet" href="<?php echo base_url();?>admin/css/select2.css" tppabs="http://tzd-themes.com/hagal_admin/js/lib/select2/select2.css">
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
                                      <?php if(isset($update) && $update ==1){?>
            <div class="alert alert-success">
            <a data-dismiss="alert" class="close">×</a>
            <strong>Success! </strong> Service has been updated
            </div>

		   <?php }elseif(isset($update) && $update ==0){?>
           <div class="alert alert-error">
            <a data-dismiss="alert" class="close">×</a>
            <strong>Error! </strong>Can't update the service try again please
            </div>

           <?php }?>
           
           
           
           
           
           
                                     <div class="span9">
                                    <div class="box_a">
                                        <div class="box_a_heading">
                                            <h3>Edit the Services</h3>
                                        </div>
                                        <div class="box_a_content" id="validate_field_types">
                                            <?php echo form_open('civou/home/select_edit_service'); ?>
                                            
                                              <div class="formSep clearfix" >
                                                    <label class="req">Select the service</label>
                                                    <select name="service_id" id="s2_val" class="span12" required>
                                                        <option value=""></option>
                                                        <optgroup label="Select one service">
                                                        <?php if(isset($services)){foreach($services as $service){ ?>
                                                            <option value="<?php echo $service->id?>"><?php echo $service->name?></option>
                                                            <?php }} ?>
                                                        </optgroup>
                                                       
                                                    </select>
                                                    
                                                      <div style="float:left">
                                                    <button type="submit" class="btn">Select</button>
                                                    
                                                </div>
                                                
                                                </div>
                                            </form>
                                            
                                             <?php echo form_open('civou/home/update_service'); ?>
                                             <?php if(isset($select_service)){?>
                                             <input type="hidden" value="<?php echo $select_service->row(0)->id ;?>" name="service_id" />
                                                <div class="formSep">
                                                    <label class="req">Enter service name </label>
                                                    <input value="<?php echo $select_service->row(0)->name ;?>" class="span10" type="text" name="servicename" id="val1_url" required/>
                                                </div>
                                                <div class="formSep">
                                                    <label class="req">Enter service Price( points ) </label>
                                                    <input value="<?php echo $select_service->row(0)->price_point ;?>" class="span10" type="text" name="serviceprice" id="val1_url" required/>
                                                </div>
                                               
                                                 <div class="formSep">
                                                    <label class="req">Enter The Delivery time  </label>
                                                    <input value="<?php echo $select_service->row(0)->duration ;?>" class="span10" type="text" name="duration" id="val1_url" required/>
                                                </div>
                                                
                                                <div class="formSep">
                                                    <label class="req">Department</label>
                                                    <select name="search_category" id="search_category_id" class="span10" required>
                                                        <option></option>
                                                       <?php if(isset($categores)){foreach($categores as $category){?>
	            <option  value="<?php echo $category->id;?>"  <?php if( $select_service->row(0)->c_id == $category->id ){ echo'selected';}?>><?php echo $category->name;?></option>	
																<?php }}?>
                                                    </select>
                                                </div>
                                                
                                                 <div class="formSep">
                                                    <label class="req">Sub Department</label>
                                                    <select name="sub_search_category" id="search_category_id" class="span10" required>
                                                        <option></option>
                                                       <?php if(isset($sub_categores)){foreach($sub_categores as $sub_category){?>
	            <option  value="<?php echo $sub_category->id;?>"  <?php if( $select_service->row(0)->sc_id == $sub_category->id ){ echo'selected';}?>><?php echo $sub_category->name;?></option>	
																<?php }}?>
                                                    </select>
                                                </div>	
                   
                                               	
                                                	 <div class="formSep">
                                                    <label class="req">Service description  </label>
                                                    <textarea class="span10" rows="2" cols="20" name="discription" id="val1_text" required><?php echo $select_service->row(0)->detail ;?></textarea>
                                                </div>
                                                	
                                                     <div class="formSep">
                                                    <label class="req">Service Instruction  </label>
                                                    <textarea class="span10" rows="2" cols="20" name="instruction" id="val1_text" required><?php echo $select_service->row(0)->instruction ;?></textarea>
                                                </div>
                                                	
                                                <div class="formSep">
                                                    <button type="submit" class="btn">Edit</button>
                                                    
                                                </div>
                                                <?php }?>
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
            
    <!-- common scripts -->
        <!-- jQuery library -->
            
            <!-- jQuery migrate -->
            <script src="<?php echo base_url();?>admin/js/jquery-migrate-1.2.1.min.js" tppabs="http://tzd-themes.com/hagal_admin/js/jquery-migrate-1.2.1.min.js"></script>
        <!-- bootstrap framework plugins -->
            <script src="<?php echo base_url();?>admin/js/bootstrap.min.js" tppabs="http://tzd-themes.com/hagal_admin/bootstrap/js/bootstrap.min.js"></script>
        <!-- actual width/height of hidden DOM elements -->
            <script src="<?php echo base_url();?>admin/js/jquery.actual.min.js" tppabs="http://tzd-themes.com/hagal_admin/js/jquery.actual.min.js"></script>
        <!-- jquery cookie plugin -->
            <script src="<?php echo base_url();?>admin/js/jquery_cookie.js" tppabs="http://tzd-themes.com/hagal_admin/js/jquery_cookie.js"></script>
        <!-- jquery tooltips -->
            <script src="<?php echo base_url();?>admin/js/jquery.powertip.min.js" tppabs="http://tzd-themes.com/hagal_admin/js/lib/powertip/jquery.powertip.min.js"></script>
        <!-- off-canvas sidebar -->
            <script src="<?php echo base_url();?>admin/js/jquery.jpanelmenu.js" tppabs="http://tzd-themes.com/hagal_admin/js/jquery.jpanelmenu.js"></script>
        <!-- mobile navigation -->
            <script src="<?php echo base_url();?>admin/js/tinynav.js" tppabs="http://tzd-themes.com/hagal_admin/js/tinynav.js"></script>

        <!-- common functions -->
            <script src="<?php echo base_url();?>admin/js/hagal_common.js" tppabs="http://tzd-themes.com/hagal_admin/js/hagal_common.js"></script>

    <!-- form validation scripts -->
        <!-- jQuery Validate -->
            <script src="<?php echo base_url();?>admin/js/jquery.validate.js" tppabs="http://tzd-themes.com/hagal_admin/js/lib/jquery-validation/jquery.validate.js"></script>
        <!-- enchanced select box, tag handler -->
            <script src="<?php echo base_url();?>admin/js/select2.min.js" tppabs="http://tzd-themes.com/hagal_admin/js/lib/select2/select2.min.js"></script>
        <!-- datepicker -->
            <script src="<?php echo base_url();?>admin/js/bootstrap-datepicker.js" tppabs="http://tzd-themes.com/hagal_admin/js/lib/datepicker/js/bootstrap-datepicker.js"></script>
        <!-- iCheck -->
            <script src="<?php echo base_url();?>admin/js/jquery.icheck.min.js" tppabs="http://tzd-themes.com/hagal_admin/js/lib/iCheck/jquery.icheck.min.js"></script>
        <!-- WYSIWG Editor -->
            <script src="<?php echo base_url();?>admin/js/ckeditor.js" tppabs="http://tzd-themes.com/hagal_admin/js/lib/ckeditor/ckeditor.js"></script>
        <!-- textarea counter -->
            <script src="<?php echo base_url();?>admin/js/jquery.textareaCounter.plugin.min.js"></script>

            <script src="<?php echo base_url();?>admin/js/hagal_form_validation.js" ></script>
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