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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Add Lookup Data Value') }}</li>
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
                <div class="col-sm-6 offset-lg-1">
                    <h4 class="page-title">{{ __('Add Country - Nationality Data') }}</h4>
                </div>
                <div class="col-md-2 offset-lg-2">
                    <a href="{{ route ('setting.systemvariable.getlookupdata') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-chevron-left">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('ተመለስ | Back') }}</strong></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form id="newLookupDataForm" action="{{ route ('setting.systemvariable.slookupdata', 1) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field ('POST') }}
                        <div class="row">
                            <div class="col-sm-12" id="usrFirstName">
                                <div class="form-group">
                                    <label>{{ __('Data Type') }} <span class="text-danger">*</span></label>
                                    <input class="form-control datetimepicker" id="defaultPopup" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12" id="usrLastName">
                                <div class="form-group">
                                    <label>{{ __('Data Name') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>{{ __('Data Description') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="focus-label">{{ __('ማዕረግ') }} <span class="text-danger"> {{ __(' *') }}</span> {{ __(' | Appillation') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                    <select class="select form-control" name="cmbAppillation" required>
                                        <option value="">{{ __('Select Appillation') }}</option>
                                        @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 0)->pluck('list_LookupDataName') as $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-success submit-btn">{{ __('Add Lookup Data') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        
    </script>
@endsection
