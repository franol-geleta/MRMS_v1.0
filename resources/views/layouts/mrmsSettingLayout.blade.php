{{--
======================================================================
             Designed by:    Eyasu Girma [Kiya]
                 Mobile:     +251-913-078-029
                 Email:      sendtokiya@gmail.com
                 Facebook:   https://facebook.com/JoshKiyakoo
                 LinkedIn:   https://linkedin.com/in/JoshKiyakoo
                 Twitter:    https://twitter.com/JoshKiyakoo
                 GitHub:     https://github.com/JoshKiyakoo
                 Telegram:   https://t.me/JoshKiyakoo
======================================================================
--}}
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
	<title>@yield('myPageTitle') {{ __(' ♫ ሰሜን ሙሉ ወንጌል አጥቢያ ቤተክርስቲያን || Semien Full Gospel Local Church') }}</title>
    <meta name="description" content="የሰሜን ሙሉ ወንጌል አጥቢያ ቤተክርስቲያን የአባላት መመዝገቢያ እና መቆጣተሪያ ሥርዓት ይፋዊ ንዑስ ድህረ ገጽ፤ ይህ ድህረ ገጽ የሚጠቅመው የሰሜን ሙሉ ወንጌልን ቤተክርስቲያን የምዕመናን ምዝገባና ቁጥጥር ከማገዝ ባሻገር፣ እያንዳንዱን ወደ ሥርዓቱ የገቡትን መረጃዎች ማለትም የአባላት፣ የቤት ህብረት፣ የአገልግሎት ዘርፎች፣ የሙሉ ጊዜዎች መረጃ እና የምዕመናንን መገኛ አድራሻና የመሳሰሉትን ይመዘግባል ያስተዳድራል። - Semien Full Gospel Local Church Members Registration and Management System Official Website. This Sub-Domain website is used for registration and management purpose of SemienFGB church. The website manages and controles each and every data entered Members, Fellowships, Service Sectors, Full-Timers, Members Residential Addresses, every Members, Fellowship Attendants and Full-Timers activity.">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token () }}">
	<!-- Mobile Specific Meta
   	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/css/dataTables.bootstrap4.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset ('public/css/bootstrap-datetimepicker.min.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/css/style.css') }}">
    <!-- Sweetalert2
	================================================== -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.6/dist/sweetalert2.all.min.js"></script>
    <!-- Favicons
	================================================== -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset ('public/icon/FGBC_Fav_Icon.png') }}">
    <!-- Colorpicker
	================================================== -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/js/bootstrap-colorpicker.min.js"></script>

    <!-- Script
   	================================================== -->
    <!--[if lt IE 9]>
		<script src="{{ asset ('public/js/html5shiv.min.js') }}"></script>
		<script src="{{ asset ('public/js/respond.min.js') }}"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="{{ route ('dashboard') }}" class="logo">
                    <img src="{{ asset ('public/icon/FGBC_Fav_Icon.png') }}" width="35" height="35" alt="Side Logo" />
                    <span><strong> {{ __('MRMS') }}</strong></span>
				</a>
			</div>
			{{-- <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a> --}}
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="{{ asset ('public/icon/No_Images.jpg') }}" width="40" alt="Admin">
						<span class="status online"></span></span>
                        <strong><span>{{ __('Administrator User') }}</span></strong>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ route ('members.index') }}">{{ __('My Profile') }}</a>
						<a class="dropdown-item" href="{{ route ('members.index') }}">{{ __('Edit Profile') }}</a>
						<a class="dropdown-item" href="{{ route ('setting.index') }}">{{ __('setting') }}</a>
                        <a class="dropdown-item" href="#"
                        {{-- {{ route('logout') }} --}}
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="#" method="POST" class="d-none">
                            {{-- {{ route ('logout') }} --}}
                            @csrf
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
                            <a href="{{ route ('members.index') }}" style="color: #fff;"><span class="user-img">
                                <img class="rounded-circle" src="{{ asset ('public/icon/No_Images.jpg') }}" width="40" alt="User_Photo">
                                <span class="status online"></span></span><strong><span>{{ __('Administrator User') }}</span><h6 class="text-center">{{ __('Administrator') }}</h6></strong>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route ('dashboard') }}"><i class="fa fa-home back-icon"></i> <span>{{ __('Back to Home') }}</span></a>
                        </li>
                        <hr style="background-color: white;" />
                        @php $Level1Segment = Request::segment(1); @endphp
                        @php $Level2Segment = Request::segment(2); @endphp
                        @php $Level3Segment = Request::segment(3); @endphp
                        @php $Level4Segment = Request::segment(4); @endphp
                        @php $Level4Segment = Request::segment(5); @endphp
                        <li class="@if ($Level1Segment == 'setting' && $Level2Segment == '' && $Level3Segment == '' && $Level4Segment == '') active @endif">
                            <a href="{{ route ('setting.index') }}"><i class="fa fa-object-ungroup"></i> <span>{{ __('Overview') }}</span></a>
                        </li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-bank"></i> <span>{{ __('Church Profile Setup') }}</span> <span class="menu-arrow"></span></a>
							<ul style="display:@if ($Level2Segment == 'church' && $Level3Segment == 'brandname' || $Level3Segment == 'contactaddress' || $Level3Segment == 'websystemlink' || $Level3Segment == 'idformat') block @else none @endif ;">
								<li class="@if ($Level3Segment == 'brandname') active @else block @endif">
                                    <a href="{{ route ('setting.church.getbrandname') }}"><i class="fa fa-angle-right"> </i>{{ __('Name and Brand') }}</a>
                                </li>
                                <li class="@if ($Level3Segment == 'contactaddress') active @else block @endif">
                                    <a href="{{ route ('setting.church.getcontactaddress') }}"><i class="fa fa-angle-right"> </i>{{ __('Contact and Address') }}</a>
                                </li>
                                <li class="@if ($Level3Segment == 'websystemlink') active @else block @endif">
                                    <a href="{{ route ('setting.church.getwebsystemlink') }}"><i class="fa fa-angle-right"> </i>{{ __('WebSystem URL Links') }}</a>
                                </li>
                                <li class="@if ($Level3Segment == 'idformat') active @else block @endif">
                                    <a href="{{ route ('setting.church.getidformat') }}"><i class="fa fa-angle-right"> </i>{{ __('Church ID Prefix') }}</a>
                                </li>
							</ul>
                        </li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-group"></i> <span>{{ __('User Account Manager') }}</span> <span class="menu-arrow"></span></a>
							<ul style="display:@if ($Level2Segment == 'user') block @else none @endif ;">
								<li class="@if ($Level3Segment == 'account'  || $Level3Segment == 'create' || $Level3Segment == 'edit') active @else block @endif">
                                    {{-- <a href="{{ route ('setting.user.account') }}"><i class="fa fa-angle-right"> </i>{{ __('User') }}</a> --}}
                                </li>
                                <li class="@if ($Level3Segment == 'role') active @else block @endif">
                                    {{-- <a href="{{ route ('setting.user.role') }}"><i class="fa fa-angle-right"> </i>{{ __('Role') }}</a> --}}
                                </li>
                                <li class="@if ($Level3Segment == 'accesspermission') active @else block @endif">
                                    {{-- <a href="{{ route ('setting.user.accesspermission') }}"><i class="fa fa-angle-right"> </i>{{ __('Access Permission') }}</a> --}}
                                </li>
							</ul>
                        </li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-th"></i><span>{{ __('System Variable Setup') }}</span> <span class="menu-arrow"></span></a>
							<ul style="display:@if ($Level2Segment == 'systemvariable' && $Level3Segment == 'getlookupdata' || $Level3Segment == 'alookupdata' || $Level3Segment == 'slookupdata' || $Level3Segment == 'elookupdata') block @else none @endif ;">
                                <li>
                                    <li class="submenu">
                                        <a href="#"><i class="fa fa-circle"></i><span>{{ __('Lookup Data') }}</span><span class="menu-arrow"></span></a>
                                        <ul style="display: none;">
                                            <li class="@if ($Level3Segment == 'lookupdata' || $Level3Segment == 'elookupdata' || $Level3Segment == 'slookupdata') active @else block @endif">
                                                <a href="{{ route ('setting.systemvariable.getlookupdata') }}"><i class="fa fa-angle-right"></i>{{ __('Lookup Lists') }}</a>
                                            </li>
                                            <li class="@if ($Level3Segment == 'alookupdata') active @else block @endif">
                                                <a href="{{ route ('setting.systemvariable.alookupdata') }}"><i class="fa fa-angle-right"></i>{{ __('Add New Lookup') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </li>
                                <li>
                                    <li class="submenu">
                                        <a href="#"><i class="fa fa-circle"></i><span>{{ __('Country Data') }}</span><span class="menu-arrow"></span></a>
                                        <ul style="display: none;">
                                            <li><a href="{{ route ('setting.systemvariable.alookupdata') }}"><i class="fa fa-angle-right"></i>{{ __('Country List') }}</a></li>
                                            <li><a href="{{ route ('setting.systemvariable.alookupdata') }}"><i class="fa fa-angle-right"> </i>{{ __('Add New Country') }}</a></li>
                                        </ul>
                                    </li>
                                </li>
							</ul>
                        </li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-recycle"></i> <span>{{ __('System Automation') }}</span> <span class="menu-arrow"></span></a>
							<ul style="display:@if ($Level2Segment == 'backuprestore') block @else none @endif ;">
								<li class="@if ($Level2Segment == 'backuprestore') active @else block @endif">
                                    {{-- <a href="{{ route ('setting.backuprestore') }}"><i class="fa fa-angle-right"> </i>{{ __('Backup & Restore') }}</a> --}}
                                </li>
							</ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <!--- START
    Main Contents of the Page Goes Here.....
    ===================================================================================================-->
        @yield('SettingContent')
    <!-- END
    ================================================================================================== -->
        <footer class="main-footer text-center" id="footer">
            <div><hr /></div>
            <div style="font-weight: bolder; font-size: 12px;">
                {!! html_entity_decode
                    ('Copyright &copy; 2020 - '.date ('Y'). ' — All Rights Reserved — Semien Full Gospel Local Church. <sup>&reg;</sup> Ethiopian Full Gospel Believers\' Church.')
                !!}
            </div>
            <div style="color:#c92f2f; font-style:italic; font-weight: bolder; font-size: 12px;">
                {!! html_entity_decode
                    ('Designed & Developed by: Eyasu Girma ♫ JoshKiyakoo
                    &nbsp;|&nbsp; sendtokiya@gmail.com
                    &nbsp;|&nbsp; +251-913-078-029')
                !!}
            </div>
            <div><br /></div>
        </footer>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{ asset ('public/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset ('public/js/popper.min.js') }}"></script>
    <script src="{{ asset ('public/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('public/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset ('public/js/select2.min.js') }}"></script>
    <script src="{{ asset ('public/js/moment.min.js') }}"></script>
    <script src="{{ asset ('public/js/app.js') }}"></script>
    <script src="{{ asset ('public/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset ('public/js/dataTables.bootstrap4.min.js') }}"></script>
</body>
<!-- tables-datatables23:59-->
</html>
