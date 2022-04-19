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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Setting') }}</li>
                    </ol>
                </nav>
            </div>
            <!-- Start app main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <h2 class="section-title" style="font-weight: bolder;">{{ __('Overview Setting') }}</h2>
                        <br />
                        <p class="section-lead" style="font-weight: bolder;">{{ __('Organize and adjust all configurational settings about this site.') }}</p>
                        <hr /><br />
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card card-large-icon">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="bg-danger text-white text-center">
                                                <h1><i class="fa fa-bank"></i></h1>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="card-body">
                                                <h3 style="font-weight: bolder;">{{ __('Church Profile Setup') }}</h3>
                                                <p>{{ __('This section is used to manage and modify general settings of the system owner; such as church name, site title, site description, address and so on.') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <a href="{{ route ('setting.church.getbrandname') }}" class="text-center " style="font-weight: bolder;">{{ __('Change Setting') }} <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card card-large-icon">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="bg-success text-white text-center">
                                                <h1><i class="fa fa-cubes"></i></h1>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="card-body">
                                                <h3 style="font-weight: bolder;">{{ __('System Variables Setup') }}</h3>
                                                <p>{{ __('This used to setup some system lookup data and variables that are very essential for the system.') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <a href="{{ route ('setting.systemvariable.getlookupdata') }}" class="text-center" style="font-weight: bolder;">{{ __('Change Setting') }} <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card card-large-icon">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="bg-dark text-white text-center">
                                                <h1><i class="fa fa-users"></i></h1>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="card-body">
                                                <h3 style="font-weight: bolder;">{{ __('User Account Manager') }}</h3>
                                                <p>{{ __('This is used to define and manage all user\'s account management; creating, modifing and assigning and revoking roles and previlages management.') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <a href="#{{-- route ('') --}}" class="text-center" style="font-weight: bolder;">{{ __('Change Setting') }}<i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card card-large-icon">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="bg-primary text-white text-center">
                                                <h1><i class="fa fa-recycle"></i></h1>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="card-body">
                                                <h3 style="font-weight: bolder;">{{ __('System Automation Setup') }}</h3>
                                                <p>{{ __('Settings about automation such as backup automation, restore operation and so on.') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <a href="#{{-- route ('') --}}" class="text-center" style="font-weight: bolder;">{{ __('Change Setting') }}<i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
