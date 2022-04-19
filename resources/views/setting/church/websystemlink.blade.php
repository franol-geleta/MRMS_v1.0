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
@extends('layouts.mrmsSettingLayout')
@section('myPageTitle', 'ማስተካከያ | Setting')
@section('SettingContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('setting.index') }}">{{ __('Setting') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Church Information - Websystem & Social Media URL Link') }}</li>
                    </ol>
                </nav>
            </div>
            <!--	NOTIFICATION MESSAGE	    -->
            @if (Session::get('JoshKiyakoo_Success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! html_entity_decode (Session::get('JoshKiyakoo_Success')) !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(Session::get('JoshKiyakoo_Error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {!! html_entity_decode (Session::get('JoshKiyakoo_Error')) !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <form id="editChurchWebSystemLinkForm" action="{{ route ('setting.church.setwebsystemlink', $zWebSystemLink->idWebsystemLink) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field ('PUT') }}
                        <h3 class="page-title">{{ __('Church Information Setup [ Websystem URL Link ]') }}</h3>
                        <br>
                        <div class="row">
                            <div class="col-sm-4">
                                <label>{{ __('Website [ Main Domain Name ] 1') }} <span class="text-danger">{{ __('*') }}</span></label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-globe"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtMainDomainURL1" value="{{ $zWebSystemLink->fgbMainDomainURL1 }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>{{ __('Website [ Main Domain Name ] 2') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-globe"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtMainDomainURL2" value="{{ $zWebSystemLink->fgbMainDomainURL2 }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>{{ __('Website [ Main Domain Name ] 3') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-globe"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtMainDomainURL3" value="{{ $zWebSystemLink->fgbMainDomainURL3 }}">
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-4">
                                <label>{{ __('Sub-Domain System 1') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-cubes"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtSubDomainURL1" value="{{ $zWebSystemLink->fgbSubDomainURL1 }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>{{ __('Sub-Domain System Name 1 (Phonetic)') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-certificate"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtSubDomainName1_amh" value="{{ $zWebSystemLink->fgbSubDomainName1_amh }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>{{ __('Sub-Domain System 1 Name') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-certificate"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtSubDomainName1_eng" value="{{ $zWebSystemLink->fgbSubDomainName1_eng }}">
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-4">
                                <label>{{ __('Sub-Domain  System 2') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-cubes"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtSubDomainURL2" value="{{ $zWebSystemLink->fgbSubDomainURL2 }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>{{ __('Sub-Domain System 2 Name (Phonetic)') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-certificate"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtSubDomainName2_amh" value="{{ $zWebSystemLink->fgbSubDomainName2_amh }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>{{ __('Sub-Domain System 2 Name') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-certificate"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtSubDomainName2_eng" value="{{ $zWebSystemLink->fgbSubDomainName2_eng }}">
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-4">
                                <label>{{ __('Sub-Domain System 3') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-cubes"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtSubDomainURL3" value="{{ $zWebSystemLink->fgbSubDomainURL3 }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>{{ __('Sub-Domain System 3 Name (Phonetic)') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-certificate"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtSubDomainName3_amh" value="{{ $zWebSystemLink->fgbSubDomainName3_amh }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>{{ __('Sub-Domain System 3 Name') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-certificate"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtSubDomainName3_eng" value="{{ $zWebSystemLink->fgbSubDomainName3_eng }}">
                                </div>
                            </div>
                        </div>
                       
                        <hr><br>
                        
                        <h3 class="page-title">{{ __('Church Information Setup [ Social Media Link ]') }}</h3>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                            <label>{{ __('Facebook') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-facebook"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtFacebookURL" value="{{ $zWebSystemLink->fgbFacebookURL }}">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><a href="
                                            @if ($zWebSystemLink->fgbFacebookURL === NULL)
                                                {{ __('#') }}"
                                            @else
                                                {{ $zWebSystemLink->fgbFacebookURL }}" target="_blank"
                                            @endif
                                        >{{ __('GO!') }}</a></span>
									</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>{{ __('Telegram') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-telegram"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtTelegramURL" value="{{ $zWebSystemLink->fgbTelegramURL }}">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><a href="
                                            @if ($zWebSystemLink->fgbTelegramURL === NULL)
                                                {{ __('#') }}"
                                            @else
                                                {{ $zWebSystemLink->fgbTelegramURL }}" target="_blank"
                                            @endif
                                        >{{ __('GO!') }}</a></span>
									</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>{{ __('Youtube') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-youtube"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtYoutubeURL" value="{{ $zWebSystemLink->fgbYoutubeURL }}">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><a href="
                                            @if ($zWebSystemLink->fgbYoutubeURL === NULL)
                                                {{ __('#') }}"
                                            @else
                                                {{ $zWebSystemLink->fgbYoutubeURL }}" target="_blank"
                                            @endif
                                        >{{ __('GO!') }}</a></span>
									</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>{{ __('Twitter') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-twitter"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtTwitterURL" value="{{ $zWebSystemLink->fgbTwitterURL }}">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><a href="
                                            @if ($zWebSystemLink->fgbTwitterURL === NULL)
                                                {{ __('#') }}"
                                            @else
                                                {{ $zWebSystemLink->fgbTwitterURL }}" target="_blank"
                                            @endif
                                        >{{ __('GO!') }}</a></span>
									</div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label>{{ __('LinkedIn') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-linkedin"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtLinkedinURL" value="{{ $zWebSystemLink->fgbLinkedinURL }}">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><a href="
                                            @if ($zWebSystemLink->fgbLinkedinURL === NULL)
                                                {{ __('#') }}"
                                            @else
                                                {{ $zWebSystemLink->fgbLinkedinURL }}" target="_blank"
                                            @endif
                                        >{{ __('GO!') }}</a></span>
									</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>{{ __('Instagram') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-instagram"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtInstagramURL" value="{{ $zWebSystemLink->fgbInstagramURL }}">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><a href="
                                            @if ($zWebSystemLink->fgbInstagramURL === NULL)
                                                {{ __('#') }}"
                                            @else
                                                {{ $zWebSystemLink->fgbInstagramURL }}" target="_blank"
                                            @endif
                                        >{{ __('GO!') }}</a></span>
									</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>{{ __('Whatsapp') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-whatsapp"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtWhatsappURL" value="{{ $zWebSystemLink->fgbWhatsappURL }}">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><a href="
                                            @if ($zWebSystemLink->fgbWhatsappURL === NULL)
                                                {{ __('#') }}"
                                            @else
                                                {{ $zWebSystemLink->fgbWhatsappURL }}" target="_blank"
                                            @endif
                                        >{{ __('GO!') }}</a></span>
									</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>{{ __('Skype') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-skype"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtSkypeURL" value="{{ $zWebSystemLink->fgbSkypeURL }}">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><a href="
                                            @if ($zWebSystemLink->fgbSkypeURL === NULL)
                                                {{ __('#') }}"
                                            @else
                                                {{ $zWebSystemLink->fgbSkypeURL }}" target="_blank"
                                            @endif
                                        >{{ __('GO!') }}</a></span>
									</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12 text-center m-t-20">
                                <button class="btn btn-danger submit-btn">{{ __('Save Data') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
