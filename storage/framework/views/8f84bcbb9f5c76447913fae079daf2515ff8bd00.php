
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
   	<!--- Basic Page Needs
	================================================== -->
    <meta name="description" content="Faith, Hope, Love">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
	<meta name="author" content="JoshKiyakoo_SemienFGBC_#Members_Registration_&_Management_System_[.MRMS.]">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no user-scalable=0">
	<title><?php echo $__env->yieldContent('myPageTitle'); ?> <?php echo e(__(' ♫ ሰሜን ሙሉ ወንጌል አጥቢያ ቤተክርስቲያን || Semien Full Gospel Local Church')); ?></title>
    <meta name="description" content="የሰሜን ሙሉ ወንጌል አጥቢያ ቤተክርስቲያን የአባላት መመዝገቢያ እና መቆጣጠሪያ ሥርዓት ይፋዊ ድህረ ገጽ ነው። ይህ ንዑስ ድህረ ገጽ የሚጠቅመው የሰሜን ሙሉ ወንጌልን ቤተክርስቲያን የምዕመናን ምዝገባና ቁጥጥር ከማገዝ ባሻገር፣ እያንዳንዱን ወደ ሥርዓቱ የገቡትን መረጃዎች ማለትም የአባላት፣ የቤት ህብረት፣ የአገልግሎት ዘርፎች፣ የሙሉ ጊዜዎች መረጃ እና የምዕመናንን መገኛ አድራሻና የመሳሰሉትን ይመዘግባል ያስተዳድራል። - Semien Full Gospel Local Church Members Registration and Management System Official Website. This Sub-Domain website is used for registration and management purpose of SemienFGB church. The website manages and controles each and every data entered Members, Fellowships, Service Sectors, Full-Timers, Members Residential Addresses, every Members, Fellowship Attendants and Full-Timers activity.">
    
    <!-- Favicons
	================================================== -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset ('public/icon/FGBC_Fav_Icon.png')); ?>">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token ()); ?>">
	
    <!-- Mobile Specific Metas
   	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('public/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('public/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('public/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('public/css/select2.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('public/css/style.css')); ?>">

    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('public/css/jquery.calendars.picker.css')); ?>">

    
    <link rel="stylesheet" href="<?php echo e(asset ('public/richtext/richtext.min.css')); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo e(asset ('public/richtext/jquery.richtext.js')); ?>"></script>

    <!-- Script
   	================================================== -->
    <!--[if lt IE 9]>
		<script src="<?php echo e(asset ('public/js/html5shiv.min.js')); ?>"></script>
		<script src="<?php echo e(asset ('public/js/respond.min.js')); ?>"></script>
	<![endif]-->
</head>


<body class="mini-sidebar">
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="<?php echo e(route ('dashboard')); ?>" class="logo">
                    <img src="<?php echo e(asset ('public/icon/FGBC_Fav_Icon.png')); ?>" width="35" height="35" alt="Side Logo" />
                    <span><strong><?php echo e(__('MRMS')); ?></strong></span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="<?php echo e(asset ('public/icon/No_Images.jpg')); ?>" width="40" alt="Admin">
						<span class="status online" ></span></span><strong><span>&nbsp;&nbsp;&nbsp;<?php echo e(Auth::user()->name); ?></span></strong>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#"><?php echo e(__('My Profile')); ?></a>
						<?php if(Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active'): ?>
                            <a class="dropdown-item" href="<?php echo e(route ('setting.index')); ?>"><?php echo e(__('Settings')); ?></a>
                        <?php endif; ?>
                        <a class="dropdown-item" href="javascript:void(0);"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?>

                        </a>
                        <form id="logout-form" action="<?php echo e(route ('setting.users.logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
					</div>
                </li>
            </ul>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="nav-item dropdown has-arrow" style="background-color: #c92f2f;">
                            <a href="#" style="color: #fff;"><span class="user-img">
                                <img class="rounded-circle" src="<?php echo e(asset ('public/icon/No_Images.jpg')); ?>" width="40" alt="User_Photo">
                                <span class="status online"></span></span><strong><span><?php echo e(Auth::user()->name); ?><h6 class="text-center"><?php echo e(Auth::user()->role); ?></h6></span></strong>
                            </a>
                        </li>
                        <li><br /></li>
                        <?php $Level1Segment = Request::segment(1); ?>
                        <?php $Level2Segment = Request::segment(2); ?>
                        <?php $Level3Segment = Request::segment(3); ?>
                        <?php $Level4Segment = Request::segment(4); ?>
                        <li class="<?php if($Level1Segment == 'dashboard'): ?> active <?php endif; ?>">
                            <a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-dashboard"></i> <span><?php echo e(__('Dashboard')); ?></span></a>
                        </li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-group"></i><span><?php echo e(__('Members\' Cab')); ?></span><span class="menu-arrow"></span></a>
							<ul style="display:<?php if($Level1Segment == 'members'): ?> none <?php endif; ?> ;">
                                <li class="<?php if($Level2Segment == '' && $Level1Segment == 'members' || $Level2Segment == 'show' || $Level2Segment == 'deactivate' || $Level2Segment == 'edit'): ?> active <?php else: ?> block <?php endif; ?>">
                                    <a href="<?php echo e(route ('members.index')); ?>"><i class="fa fa-angle-right"></i><?php echo e(__('Members\' Data')); ?></a>
                                </li>
                                <li class="<?php if($Level2Segment == 'avatar'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route ('members.avatar')); ?>"><i class="fa fa-angle-right"></i><?php echo e(__('Profile Picture')); ?></a>
                                </li>
                                <li class="<?php if($Level2Segment == 'staffmember'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route ('members.staffmember')); ?>"><i class="fa fa-angle-right"></i><?php echo e(__('Staff Members')); ?></a>
                                </li>
                                <li class="<?php if($Level2Segment == 'create'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route ('members.create')); ?>"><i class="fa fa-angle-right"></i><?php echo e(__('Add Member Data')); ?></a>
                                </li>
                                
                                <li>
                                    <li class="submenu">
                                        <a href="#"><i class="fa fa-circle"></i><span><?php echo e(__('Inactive Members Data')); ?></span><span class="menu-arrow"></span></a>
                                        <ul style="display: none;">
                                            <li><a href="<?php echo e(route ('members.transfered')); ?>"><i class="fa fa-angle-right"></i><?php echo e(__('Transfered Members Only')); ?></a></li>
                                            <li><a href="<?php echo e(route ('members.deceased')); ?>"><i class="fa fa-angle-right"> </i><?php echo e(__('Deceased Members Only')); ?></a></li>
                                            <li><a href="<?php echo e(route ('members.inactive')); ?>"><i class="fa fa-angle-right"></i><?php echo e(__('All Inactive Members')); ?></a></li>
                                        </ul>
                                    </li>
                                </li>
							</ul>
                        </li>
                        <hr style="background-color: white;" />
                        
                        <li class="submenu">
							<a href="#"><i class="fa fa-bank"></i><span><?php echo e(__('Fellowships Cab')); ?></span> <span class="menu-arrow"></span></a>
							<ul style="display:<?php if($Level1Segment == 'fellowships'): ?> none <?php endif; ?> ;">
                                <li>
                                    <li class="submenu">
                                            <li class="<?php if($Level2Segment == '' || $Level2Segment == 'edit' || $Level2Segment == 'show'): ?> active <?php endif; ?>">
                                                <a href="<?php echo e(route ('fellowships.index')); ?>"><i class="fa fa-angle-right"></i><?php echo e(__('Fellowships Data')); ?></a>
                                            </li>
                                            <li class="<?php if($Level2Segment == 'create'): ?> active <?php endif; ?>">
                                                <a href="<?php echo e(route ('fellowships.create')); ?>"><i class="fa fa-angle-right"></i><?php echo e(__('Add Fellowship')); ?></a>
                                            </li>
                                    </li>
                                </li>
							</ul>
                        </li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-cubes"></i><span><?php echo e(__('Service Sectors Cab')); ?></span><span class="menu-arrow"></span></a>
                            <ul style="display: <?php if($Level1Segment == 'sector'): ?> block <?php else: ?> none <?php endif; ?> ;">
                                <li>
                                    <li class="submenu">
                                            <li class="<?php if($Level2Segment == '' || $Level2Segment == 'edit' || $Level2Segment == 'show'): ?> active <?php endif; ?>">
                                                <a href="<?php echo e(route ('servicesectors.index')); ?>"><i class="fa fa-angle-right"></i><?php echo e(__('Service Sectors Data')); ?></a>
                                            </li>
                                            <li class="<?php if($Level2Segment == 'create'): ?> active <?php endif; ?>">
                                                <a href="<?php echo e(route ('servicesectors.create')); ?>"><i class="fa fa-angle-right"></i><?php echo e(__('Add Service Sectors')); ?></a>
                                            </li>
                                    </li>
                                </li>
							</ul>
						</li>
                        
                        <?php if(Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active'): ?>
                            <hr style="background-color: white;" />
                            <li>
                                <a href="<?php echo e(route ('setting.index')); ?>"><i class="fa fa-gears"></i><span><?php echo e(__('Setting')); ?></span></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    <!--- START
    Main Contents of the Page Goes Here.....
    ===================================================================================================-->
        <?php echo $__env->yieldContent('MainContent'); ?>
    <!-- END
    ================================================================================================== -->
        <footer class="main-footer text-center" id="footer">
            <div><hr /></div>
            <div style="font-weight: bolder; font-size: 12px;">
                <?php echo html_entity_decode
                    ('Copyright &copy; 2020 - '.date ('Y'). ' — All Rights Reserved — Semien Full Gospel Local Church. <sup>&reg;</sup> Ethiopian Full Gospel Believers\' Church.'); ?>

            </div>
            <div style="color:#c92f2f; font-style:italic; font-weight: bolder; font-size: 12px;">
                <?php echo html_entity_decode
                    ('Designed by: Eyasu Girma ♫ JoshKiyakoo
                    &nbsp;|&nbsp; sendtokiya@gmail.com
                    &nbsp;|&nbsp; +251-913-078-029'); ?>

            </div>
            <div><br /></div>
        </footer>
    </div>
    <!--===============================================================================================-->
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="<?php echo e(asset ('public/js/jquery-3.2.1.min.js')); ?>"></script>
	<script src="<?php echo e(asset ('public/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/js/jquery.slimscroll.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/js/app.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/js/jquery-ui.min.html')); ?>"></script>

    <!-- Ethiopian Calendar
    ================================================== -->
    <script type="text/javascript" src="<?php echo e(asset ('public/js/jquery.calendars.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset ('public/js/jquery.calendars.plus.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset ('public/js/jquery.calendars.picker.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset ('public/js/jquery.calendars.ethiopian.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset ('public/js/jquery.calendars.picker-am.js')); ?>"></script>
</body>
</html>
<?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/layouts/mrmsMainLayout.blade.php ENDPATH**/ ?>