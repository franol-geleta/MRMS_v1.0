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
                        <li class="breadcrumb-item"><a href="{{ route ('setting') }}">{{ __('Setting') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Users') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title">User Setting</h4>
                </div>
                <div class="col-sm-4 text-right">
                    <a href="{{ route ('setting.user.create') }}" class="btn btn-danger float-right btn-rounded"><i class="fa fa-user-plus">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('Add User') }}</strong></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-users" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>9145</h3>
                            <span class="widget-title1">{{ __('Users') }} <i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg2"><i class="fa fa-check-square"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>1072</h3>
                            <span class="widget-title2">{{ __('Active') }} <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg4"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>618</h3>
                            <span class="widget-title4">{{ __('Suspended') }} <i class="fa fa-bolt" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-close" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>72</h3>
                            <span class="widget-title3">{{ __('Blocked') }} <i class="fa fa-close" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-block">
							<div class="table-responsive">
								<table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>User Full Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Gender</th>
                                            <th>Role</th>
                                            <th>Is Member?</th>
                                            <th class="text-center" style="min-width: 100px;">{{ __('Action ( # )') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-danger">
                                            <td>11</td>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td class="text-center">
                                                <span class="custom-badge status-red">Inactive</span>
                                            </td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td class="text-center">
                                                <span class="custom-badge status-blue">yes</span>
                                            </td>
                                            {{-- Action Buttons --}}
                                            <td class="text-right">
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn-sm btn btn-warning fa fa-edit" href="{{ route ('setting.user.edit') }}"></a>
                                                <a data-toggle="tooltip" data-placement="top" title="Delete" class="btn-sm btn btn-danger fa fa-trash" href="#"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>22</td>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td class="text-center">
                                                <span class="custom-badge status-green">Active</span>
                                            </td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td class="text-center">
                                                <span class="custom-badge status-grey">No</span>
                                            </td>
                                            {{-- Action Buttons --}}
                                            <td class="text-right">
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn-sm btn btn-warning fa fa-edit" href="#"></a>
                                                <a data-toggle="tooltip" data-placement="top" title="Delete" class="btn-sm btn btn-danger fa fa-trash" href="#"></a>
                                            </td>
                                          </tr>
                                        <tr class="table-success">
                                            <td>33</td>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td class="text-center">
                                                <span class="custom-badge status-red">Inactive</span>
                                            </td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td class="text-center">
                                                <span class="custom-badge status-blue">Yes</span>
                                            </td>
                                            {{-- Action Buttons --}}
                                            <td class="text-right">
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn-sm btn btn-warning fa fa-edit" href="#"></a>
                                                <a data-toggle="tooltip" data-placement="top" title="Delete" class="btn-sm btn btn-danger fa fa-trash" href="#"></a>
                                            </td>
                                        </tr>
                                        <tr class="table-warning">
                                            <td>44</td>
                                            <td>Donna Snider</td>
                                            <td>Customer Support</td>
                                            <td>New York</td>
                                            <td class="text-center">
                                                <span class="custom-badge status-red">Inactive</span>
                                            </td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td class="text-center">
                                                <span class="custom-badge status-grey">No</span>
                                            </td>
                                            {{-- Action Buttons --}}
                                            <td class="text-right">
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn-sm btn btn-warning fa fa-edit" href="#"></a>
                                                <a data-toggle="tooltip" data-placement="top" title="Delete" class="btn-sm btn btn-danger fa fa-trash" href="#"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection
