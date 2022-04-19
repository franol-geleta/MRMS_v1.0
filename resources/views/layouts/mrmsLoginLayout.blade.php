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
	<title>@yield('myPageTitle') {{ __(' - ♫ ሰሜን ሙሉ ወንጌል አጥቢያ ቤተክርስቲያን || Semien Full Gospel Local Church') }}</title>
    <meta name="description" content="የሰሜን ሙሉ ወንጌል አጥቢያ ቤተክርስቲያን የአባላት መመዝገቢያ እና መቆጣተሪያ ሥርዓት ይፋዊ ንዑስ ድህረ ገጽ፤ ይህ ድህረ ገጽ የሚጠቅመው የሰሜን ሙሉ ወንጌልን ቤተክርስቲያን የምዕመናን ምዝገባና ቁጥጥር ከማገዝ ባሻገር፣ እያንዳንዱን ወደ ሥርዓቱ የገቡትን መረጃዎች ማለትም የአባላት፣ የቤት ህብረት፣ የአገልግሎት ዘርፎች፣ የሙሉ ጊዜዎች መረጃ እና የምዕመናንን መገኛ አድራሻና የመሳሰሉትን ይመዘግባል ያስተዳድራል። - Semien Full Gospel Local Church Members Registration and Management System Official Website. This Sub-Domain website is used for registration and management purpose of SemienFGB church. The website manages and controles each and every data entered Members, Fellowships, Service Sectors, Full-Timers, Members Residential Addresses, every Members, Fellowship Attendants and Full-Timers activity.">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token () }}">
	<!-- Mobile Specific Metas
   	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS
    ================================================== -->
	<link rel="stylesheet" type="text/css" href="{{ asset ('public/login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/login/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('public/login/animate/animate.css') }}">
    <!-- Favicons
	================================================== -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset ('public/icon/FGBC_Fav_Icon.png') }}">
</head>
<body>
    <!--===============================================================================================-->
        @yield('LoginContent')
    <!--===============================================================================================-->
    <script src="{{ asset ('public/login/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset ('public/login/tilt/tilt.jquery.min.js') }}"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.5
            })
        </script>
	<script src="{{ asset ('public/login/js/main.js') }}"></script>
</body>
</html>
