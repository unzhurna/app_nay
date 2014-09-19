<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Admindo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- ===================== TOUCH ICONS ===================== -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144-precomposed.png.css">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114-precomposed.png.css">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72-precomposed.png.css">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-57-precomposed.png.css">

    <!-- ===================== MASTER CSS ===================== -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jasny-bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

    <!-- ===================== ICONS CSS ===================== -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/icon/fugue.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/icon/elusive.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/icon/font-awesome.min.css">

    <!-- ===================== SITE CSS ===================== -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/default.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/default.responsive.min.css">

    <!-- ===================== PLUGINS CSS ===================== -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/plugins/jquery.slidernav.css">

    <!-- ===================== JQUERY UI CSS ===================== -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jui/jquery.ui.min.css">

    <script src="<?php echo base_url(); ?>assets/js/vendors/modernizr-2.6.2.min.js"></script>
</head>
<body>
    <div id="wrapper" class="default">
        <div id="wrapper-inner" class="pattern4">

            <!-- Start Main Header -->
            <div id="main-header">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="title">
                                <h1>Admindo <small>v1.5</small></h1>
                            </div>
                            <!-- Start Header Panel -->
                            <div class="header-panel">
                              
                                <div id="dropdown-search" class="dropdown">
                                    <a href="#" class="menu dropdown-toggle" data-toggle="dropdown"><i class="icon iconfa-search"></i></a>
                                    <div class="dropdown-menu pull-right" role="menu">
                                        <form>
                                            <input name="search" type="text" class="span12" placeholder="Enter keyword...">
                                        </form>
                                    </div>
                                </div>
                                <a href="#" class="menu" id="menu-phone" data-menu="mobile"><i class="icon iconfa-tasks"></i></a>
                            </div>
                            <!-- End Header Panel -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Header -->

            <!-- Start Sidebar -->
            <div id="sidebar" class="simple">

                <!-- Start Profile Panel -->
                <div class="profile" data-detach="profile">
                    <div class="profile-pic">
                        <div class="btn-group">
                            <img src="<?php echo base_url(); ?>assets/img/avatar/40x40/avatar5.png" class="dropdown-toggle" data-toggle="dropdown">
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="cion iconfa-pencil"></i> Edit Profile</a></li>
                                <li><a href="#"><i class="cion iconfa-cog"></i>  Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="cion iconfa-off"></i> Logout</a></li>
                            </ul>
                        </div>
                        <span class="caret"></span>
                    </div>
                    <div class="profile-info">
                        <span class="name">John Doe</span>
                        <span class="job">Web Designer</span>
                    </div>
                    
                </div><!-- End Profile Panel -->

                <!-- Start Main Menu -->
                <ul class="nav-mainmenu" id="nav-mainmenu">
					<li><?php echo anchor('dosen', '<span class="icon iconfa-user"></span><span class="text">Dosen</span>'); ?></li>
                    <!-- Start GENERALS Menu -->
                    <li class="accordion-group">
                        <a data-toggle="collapse" data-parent="#nav-mainmenu" href="#generals"><span class="icon iconfa-home"></span><span class="text">Generals</span><span class="badge pull-right">4</span></a>
                        <!-- Start GENERALS Sub Menu -->
                        <ul class="nav-submenu collapse" id="generals">
                            <li><?php echo anchor('dosen', '<span class="icon iconfugue16-dashboard"></span> Dashboard'); ?></li>
                            <li><?php echo anchor('', '<span class="icon iconfugue16-user"></span> Dosen'); ?></li>
                            <li><a href="typography.html" tppabs="http://pampersdry.info/theme/admindo/html/typography.html"><span class="icon iconfugue16-edit"></span> Typography</a></li>
                            <li class="accordion-group">
                                <a data-toggle="collapse" data-parent="#generals" href="#icons"><span class="icon iconfugue16-bamboos"></span> Icons<span class="caret pull-right"></span></a>
                                <ul class="nav-subitem collapse" id="icons">
                                    <li><?php echo anchor('', '<span class="icon iconfugue16-edit-code"></span> Glyph icons'); ?></li>
                                    <li><?php echo anchor('', '<span class="icon iconfugue16-edit-code"></span> Fugue Icon 16x16'); ?></li>
                                    <li><?php echo anchor('', '<span class="icon iconfugue16-edit-code"></span> Elusive Icon'); ?></li>
                                    <li><?php echo anchor('', '<span class="icon iconfugue16-edit-code"></span> Font Awesome Icon'); ?></li>
								</ul>
                            </li>
                            <li><?php echo anchor('', '<span class="icon iconfugue16-edit-alignment-justify-distribute"></span> Grids'); ?></li>
                         </ul>
                        <!-- End GENERALS Sub Menu -->
                    </li>
                    <!-- End GENERALS Menu -->

                    <!-- Start COMPONENTS Menu -->
                    <li class="accordion-group">
                        <a data-toggle="collapse" data-parent="#nav-mainmenu" href="#components"><span class="icon iconfa-beaker"></span><span class="text">Components</span><span class="badge pull-right">5</span></a>
                        <ul class="nav-submenu collapse" id="components">
                            <li><a href="bootstrap.html" tppabs="http://pampersdry.info/theme/admindo/html/bootstrap.html"><span class="icon iconfugue16-application-ab"></span> Bootstrap</a></li>
                            <li><a href="jquery-ui.html" tppabs="http://pampersdry.info/theme/admindo/html/jquery-ui.html"><span class="icon iconfugue16-abacus"></span> Jquery UI</a></li>
                            <li><a href="widget.html" tppabs="http://pampersdry.info/theme/admindo/html/widget.html"><span class="icon iconfugue16-application-resize-full"></span> Widgets</a></li>
                            <li><a href="calendar.html" tppabs="http://pampersdry.info/theme/admindo/html/calendar.html"><span class="icon iconfugue16-calendar"></span> Calendar</a></li>
                            <li><a href="gallery.html" tppabs="http://pampersdry.info/theme/admindo/html/gallery.html"><span class="icon iconfugue16-picture"></span> Images Gallery</a></li>
                        </ul>
                    </li>
                    <!-- End COMPONENTS Menu -->

                  

                    

                   

                   

                </ul><!-- End Main Menu -->

            </div><!-- End Sidebar -->

            <!-- Start Main Content -->
            <div id="main-content" class="simple">
                <p>&nbsp;</p>

                <!-- Start Breadcrumb -->
                <ul class="breadcrumb">
                    <li><a href="#">Admindo</a></li>
                    <li><a href="#">Bonus</a></li>
                    <li><a href="#">Contact List</a></li>
                </ul><!-- End Breadcrumb -->

               
                <!-- Start -->
                <div class="row-fluid">
                    <div class="span12">

                        
	<?php echo $content;?>
                       
                        <p>&nbsp;</p>
                    </div>
                </div><!-- End -->

            </div><!-- End Main Content -->

        </div>
    </div>

    <!-- Vendors -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>

    <!-- Plugins -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/jquery.slidernav.min.js"></script>
    <?php if(isset($script)) echo $script; ?>
			
	<!-- Site -->
    <script src="<?php echo base_url(); ?>assets/js/jasny-bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/jquery.placeholder.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/application.js"></script>
    
    
</body>
</html>
