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
                                        <div class="span3 stat_box">
                                            <div class="peity_canvas peity_bar_up">2,5,3,6,8,5</div>
                                            <h2 class="stat_title">$10 233,23</h2>
                                            <p class="stat_expl">Sale (last week)</p>
                                        </div>
                                        <div class="span3 stat_box">
                                            <div class="peity_canvas peity_bar_down">9,6,7,4,6,3</div>
                                            <h2 class="stat_title">$80 173,81</h2>
                                            <p class="stat_expl">Sale (last month)</p>
                                        </div>
                                        <div class="span3 stat_box">    
                                            <div class="peity_canvas peity_line_up">3,5,9,7,12,8,16</div>
                                            <h2 class="stat_title">13 801</h2>
                                            <p class="stat_expl">Users (last 24h)</p>
                                        </div>
                                        <div class="span3 stat_box">    
                                            <div class="peity_canvas peity_line_down">16,8,12,7,6,5,3</div>
                                            <h2 class="stat_title">346 216</h2>
                                            <p class="stat_expl">Users (last month)</p>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span3 stat_box">
                                            <div class="stat_ico"><i class="elusive-icon-tag"></i></div>
                                            <h2 class="stat_title"><a href="#">16</a></h2>
                                            <p class="stat_expl">New Products</p>
                                        </div>
                                        <div class="span3 stat_box"> 
                                            <div class="stat_ico"><i class="elusive-icon-user"></i></div>
                                            <h2 class="stat_title"><a href="#">132</a></h2>
                                            <p class="stat_expl">New Users</p>
                                        </div>
                                        <div class="span3 stat_box"> 
                                            <div class="stat_ico"><i class="elusive-icon-shopping-cart"></i></div>
                                            <h2 class="stat_title"><a href="#">234</a></h2>
                                            <p class="stat_expl">New Sales</p>
                                        </div>
                                        <div class="span3 stat_box"> 
                                            <div class="stat_ico"><i class="elusive-icon-comment"></i></div>
                                            <h2 class="stat_title"><a href="#">21</a></h2>
                                            <p class="stat_expl">New Comments</p>
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