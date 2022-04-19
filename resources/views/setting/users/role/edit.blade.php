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
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-dashboard">&nbsp;&nbsp;</i>{{ __('Home - Dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('setting') }}">{{ __('Setting') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Role') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title">{{ __('Edit Role') }}</h4>
                </div>
                <div class="col-md-4 text-right">
                    <a href="#" class="btn btn-primary float-right btn-rounded"><i class="fa fa-chevron-left">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('Back') }}</strong></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <form id="editRoleForm" action="" method="POST">
                        @csrf
                        {{ method_field ('PUT') }}
                        <div class="row">
                            <div class="col-sm-12">
                                <label>{{ __('Role Name') }} <span class="text-danger">*</span></label>
                                <div class="form-group ">
                                    <input class="form-control" type="text" value="ሰሜን ሙሉ ወንጌል አጥቢያ ቤተክርስቲያን">
                                </div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label>{{ __('Role Description') }} </label>
                                <textarea rows="10" cols="30" class="form-control" placeholder="Enter message"></textarea>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="display-block">Role Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rdoRoleStatus" id="role_active" value="Active">
                                    <label class="form-check-label" for="role_active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rdoRoleStatus" id="role_inactive" value="Inactive">
                                    <label class="form-check-label" for="role_inactive">Inactive</label>
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
@endsection
