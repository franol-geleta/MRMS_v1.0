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
                        <li class="breadcrumb-item"><a href="{{ route ('setting') }}">{{ __('Settings') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Roles & Permissions') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Roles & Permissions Setting</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-3">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" id="mine-tab4" data-toggle="tab" href="#mine" role="tab" aria-controls="mine" aria-selected="true">Super Administrator</a></li>
                                        <li class="nav-item"><a class="nav-link" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">Administrator</a></li>
                                        <li class="nav-item"><a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">Manager</a></li>
                                        <li class="nav-item"><a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false">Moderator</a></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-9">
                                <div class="tab-content no-padding" id="myTab2Content">
                                    <div class="tab-pane fade show active" id="mine" role="tabpanel" aria-labelledby="mine-tab4">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="card-title m-b-20">Access Module</h6>
                                            <div class="m-b-30">
                                                <ul class="list-group">

                                                    <li class="list-group-item">
                                                        Employee
                                                        <div class=" float-right">
                                                            <input id="staff_module" type="checkbox" checked="" disabled>
                                                            <label for="staff_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Holidays
                                                        <div class="float-right">
                                                            <input id="holidays_module" type="checkbox" name="holi" disabled>
                                                            <label for="holidays_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Leave Request
                                                        <div class="float-right">
                                                            <input id="leave_module" type="checkbox" name="lea" disabled>
                                                            <label for="leave_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Events
                                                        <div class="float-right">
                                                            <input id="events_module" type="checkbox" disabled>
                                                            <label for="events_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Chat
                                                        <div class="float-right">
                                                            <input id="chat_module" type="checkbox" disabled>
                                                            <label for="chat_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-striped custom-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Module Permission</th>
                                                            <th class="text-center">Read</th>
                                                            <th class="text-center">Write</th>
                                                            <th class="text-center">Create</th>
                                                            <th class="text-center">Delete</th>
                                                            <th class="text-center">Import</th>
                                                            <th class="text-center">Export</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Employee</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                        </tr>
                                                            <tr>
                                                            <td>Holidays</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled >
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Leave Request</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Events</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="" disabled>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="card-title m-b-20">Access Module</h6>
                                            <div class="m-b-30">
                                                <ul class="list-group">

                                                    <li class="list-group-item">
                                                        Employee
                                                        <div class=" float-right">
                                                            <input id="staff_module" type="checkbox" checked="">
                                                            <label for="staff_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Holidays
                                                        <div class="float-right">
                                                            <input id="holidays_module" type="checkbox" name="holi">
                                                            <label for="holidays_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Leave Request
                                                        <div class="float-right">
                                                            <input id="leave_module" type="checkbox" name="lea">
                                                            <label for="leave_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Events
                                                        <div class="float-right">
                                                            <input id="events_module" type="checkbox">
                                                            <label for="events_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Chat
                                                        <div class="float-right">
                                                            <input id="chat_module" type="checkbox">
                                                            <label for="chat_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-striped custom-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Module Permission</th>
                                                            <th class="text-center">Read</th>
                                                            <th class="text-center">Write</th>
                                                            <th class="text-center">Create</th>
                                                            <th class="text-center">Delete</th>
                                                            <th class="text-center">Import</th>
                                                            <th class="text-center">Export</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Employee</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                        </tr>
                                                            <tr>
                                                            <td>Holidays</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Leave Request</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Events</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="card-title m-b-20">Access Module</h6>
                                            <div class="m-b-30">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        Employee
                                                        <div class="float-right">
                                                            <input id="staff_module" type="checkbox">
                                                            <label for="staff_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Holidays
                                                        <div class="float-right">
                                                            <input id="holidays_module" type="checkbox">
                                                            <label for="holidays_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Leave Request
                                                        <div class="float-right">
                                                            <input id="leave_module" type="checkbox">
                                                            <label for="leave_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Events
                                                        <div class="float-right">
                                                            <input id="events_module" type="checkbox">
                                                            <label for="events_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Chat
                                                        <div class="float-right">
                                                            <input id="chat_module" type="checkbox">
                                                            <label for="chat_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-striped custom-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Module Permission</th>
                                                            <th class="text-center">Read</th>
                                                            <th class="text-center">Write</th>
                                                            <th class="text-center">Create</th>
                                                            <th class="text-center">Delete</th>
                                                            <th class="text-center">Import</th>
                                                            <th class="text-center">Export</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Employee</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                        </tr>
                                                            <tr>
                                                            <td>Holidays</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Leave Request</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Events</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="card-title m-b-20">Access Module</h6>
                                            <div class="m-b-30">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        Employee
                                                        <div class="float-right">
                                                            <input id="staff_module" type="checkbox">
                                                            <label for="staff_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Holidays
                                                        <div class="float-right">
                                                            <input id="holidays_module" type="checkbox">
                                                            <label for="holidays_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Leave Request
                                                        <div class="float-right">
                                                            <input id="leave_module" type="checkbox">
                                                            <label for="leave_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Events
                                                        <div class="float-right">
                                                            <input id="events_module" type="checkbox">
                                                            <label for="events_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        Chat
                                                        <div class="float-right">
                                                            <input id="chat_module" type="checkbox">
                                                            <label for="chat_module" class="badge-success"></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-striped custom-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Module Permission</th>
                                                            <th class="text-center">Read</th>
                                                            <th class="text-center">Write</th>
                                                            <th class="text-center">Create</th>
                                                            <th class="text-center">Delete</th>
                                                            <th class="text-center">Import</th>
                                                            <th class="text-center">Export</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Employee</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                        </tr>
                                                            <tr>
                                                            <td>Holidays</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Leave Request</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Events</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="checkbox" checked="">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
