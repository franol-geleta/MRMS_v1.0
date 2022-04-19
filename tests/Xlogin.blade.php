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
@section('myPageTitle', 'ይግቡ | Sign In')
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
				<form class="login100-form validate-form" action="#" method="POST" enctype="multipart/form-data">
					@csrf
					<span class="login100-form-title">
						{{ __('Sign In Here') }}
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: user@domain.abc">
						<input type="text" name="lgnUsername" class="input100 form-control @error('lgnUsername') is-invalid @enderror"  value="{{ old('lgnUsername') }}" required autocomplete="lgnUsername" autofocus>
						<span class="focus-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input type="password" name="lgnPassword" class="input100 form-control @error('lgnPassword') is-invalid @enderror" required autocomplete="current-password">
						<span class="focus-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">{{ __('Sign In') }}</button>
					</div>
                    <br />
					<div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                <a style="font-weight: bold;">
                                    <strong>
										<label class="form-check-label" style="font-weight: bolder;" for="remember">{{ __('Remember Me') }}</label>
									</strong>
                                </a>
                            </div>
                        </div>
                    </div>
					<hr /><br />
					<div class="text-center">
						<strong>
                            <span class="txt1">{{ __('Click the provided link here if you Forgot your ') }}</span>
								<a class="txt2" href="#">
									<label style="font-weight: bolder;">{{ __('PASSWORD')}}</label>
								</a>
                        </strong>
						@if (Route::has('password.request'))
                            <a class="btn btn-link" href="#">
                            	{{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
				</form>
			</div>
		</div>
	</div>
@endsection
