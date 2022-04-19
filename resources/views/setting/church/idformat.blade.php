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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Church Information - Church ID Prefix Format') }}</li>
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
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">{{ __('Church Information Setup [ Church ID Prefix Format ]') }}</h4>
                    <p class="content-group">
                        {{ __('The Church ID format contains by default the abrrivation of the the Church name followed by front slash(/), and then the database generated sequence numbers, then follows front slash(/) again and then finally the last two digits of current year.') }}
                        <br><b>{{ __('Exg:') }}</b> <i>{{ ('KIYA/1234567890/21') }}</i> <br>
                        <br><strong>{{ __('Attention !!!:') }} </strong> <br>{{ __('Resetting whereas saving data may affect all database values of interrelated Church ID value lists.') }}
                    </p>
                    <form id="editChurchWebSystemLinkForm" action="{{ route ('setting.church.setidformat') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field ('PUT') }}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">{{ __('Church ID Prefix') }}</label>
                            <div class="col-lg-7">
                                <input class="form-control" type="text" name="txtIDprefix" value="{{ $zIDFormat->prefix }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">{{ __('Church ID Sufix') }}</label>
                            <div class="col-lg-7">
                                <input class="form-control" type="text" name="" value="{{ date('/Y') }}" disabled>
                            </div>
                        </div>
                        <br><hr>
                        <div class="form-group row">
                                <label class="col-form-label col-lg-3">{{ __('Combined Fix') }}</label>
                                <div class="col-md-9">
                                    <div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">{{ $zIDFormat->prefix }}</span>
										</div>
                                        <div class="input-group-prepend">
											<span class="input-group-text">{{ __('1234567890') }}</span>
										</div>
                                        <div class="input-group-append">
											<span class="input-group-text">{{ date('/y') }}</span>
										</div>
                                    </div>
                                </div>
                            </div>

                        <br>
                        <div class="col-sm-12 m-t-20 text-center">
                            <button class="btn btn-dark submit-btn" type="reset">{{ __('Reset Data') }}</button>
                        </div>
                        <div class="col-sm-12 m-t-20 text-center">
                            <button class="btn btn-danger submit-btn">{{ __('Save Data') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
