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
@extends('layouts.mrmsLoginLayout')
@section('myPageTitle', 'እንኳን ደህና መጡ | Welcome')
@section('LoginContent')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                <span class="login100-form-title">
                    <label style="font-weight: bolder; color: #066fc2;">{{ __('የሰሜን ሙሉ ወንጌል አጥቢያ ቤተክርስቲያን') }}</label><br />
                    <label style="font-weight: bolder; color: #c92f2f;">{{ __('የአባላት ምዝገባ እና መቆጣጠሪያ ሥርዓት') }}</label><br /><br />
                    <label style="color: #066fc2;">{{ __('Semien Full Gospel Local Church') }}</label><br />
                    <label style="color: #c92f2f;">{{ __('Members\' Registration & Management System') }}</label><hr />
                </span>
				<div class="login100-pic js-tilt" data-tilt>
					<a href="https://semienfgbc.org">
						<img src="{{ asset ('public/icon/FGBC_Fav_Icon.png') }}" alt="SFGLC_LOGO">
					</a>
				</div>
				{{-- {{ route ('members.store') }} --}}
				<form class="login100-form validate-form" action="{{ route ('dashboard') }}" method="GET" enctype="multipart/form-data">
					@csrf
					{{-- {{ method_field ('POST') }} --}}
					<span class="login100-form-title">
						<strong>{{ __('ወደ ሰሜን ሙሉ ወንጌል አጥቢያ ቤተክርስቲያን የአባላት ምዝገባ እና መቆጣጠሪያ ሥርዓት እንኳን ደህና መጡ...') }}</strong>
					</span>
					{{-- <br /><br /><br /> --}}
					<span class="login100-form-title">
						{{ __('Welcome to Semien Full Gospel Local Church Members\'s Registration and Management System...') }}
					</span>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">{{ __('ይቀጥሉ || PROCEED') }}</button>
					</div>
					<br /><br />
				</form>
			</div>
		</div>
	</div>
@endsection
