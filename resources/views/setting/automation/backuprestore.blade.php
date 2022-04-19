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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Setting') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title">System Database Backup & Restore</h4>
                </div>
                {{-- <div class="col-md-4 text-right">
                    <a href="{{ route ('members.create') }}" class="btn btn-danger float-right btn-rounded"><i class="fa fa-user-plus">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('Add New User') }}</strong></a>
                </div> --}}
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="card-title">Select your prefered backup or restore type...</h4>
                        <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                            <li class="nav-item"><a class="nav-link active show" href="#solid-rounded-justified-tab1" data-toggle="tab">Local Drive Backup [ Dump on this Computer ]</a></li>
                            <li class="nav-item"><a class="nav-link" href="#solid-rounded-justified-tab2" data-toggle="tab">Cloud Drive Backup [ Dump on Email ]</a></li>
                            <li class="nav-item"><a class="nav-link" href="#solid-rounded-justified-tab3" data-toggle="tab">Local Drive Backup [ Dump on this Computer ]</a></li>
                            <li class="nav-item"><a class="nav-link" href="#solid-rounded-justified-tab4" data-toggle="tab">Cloud Drive Backup [ Dump on Email ]</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active show" id="solid-rounded-justified-tab1">
                                Offline - Local Drive Backup
                            </div>
                            <div class="tab-pane show" id="solid-rounded-justified-tab2">
                                Online - Cloud Drive Backup (Email)
                            </div>
                            <div class="tab-pane show" id="solid-rounded-justified-tab3">
                                Online - Cloud Drive Backup (Email)
                            </div>
                            <div class="tab-pane show" id="solid-rounded-justified-tab4">
                                Online - Cloud Drive Backup (Email)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
