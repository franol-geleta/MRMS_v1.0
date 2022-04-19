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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('User Role') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title">{{ __('User Role Setting') }}</h4>
                </div>
                <!-- Modal Form-->
                <div class="col-sm-4 text-right">
                    <div class="block">
                        <div class="block-body text-right">
                            <button data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-rounded"><i class="fa fa-plus">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('Add Role') }}</strong> </button>
                            <!-- Modal-->
                            <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                <div role="document" class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">{{ __('Add New Role') }}</strong>
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="newRoleForm" action="" method="POST">
                                                @csrf
                                                {{ method_field ('POST') }}
                                                <div class="form-group">
                                                    <label>{{ __('Role Name') }}</label>
                                                    <input type="text" placeholder="Role Name" class="form-control" name="txtRoleName">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Role Description') }}</label>
                                                    <textarea class="form-control" name="txaRoleDescription" id="txaRoleDescription" rows="7" placeholder="Role Description"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="display-block">{{ __('Role Status') }}</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="rdoRoleStatus" id="role_active" value="Active" checked>
                                                        <label class="form-check-label" for="role_active">{{ __('Active') }}</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="rdoRoleStatus" id="role_inactive" value="Inactive">
                                                        <label class="form-check-label" for="role_inactive">{{ __('Inactive') }}</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer text-center">
                                                    <button data-dismiss="modal" class="btn btn-dark">{{ __('Close') }}</button>
                                                    <button class="btn btn-danger">{{ __('Create Role') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <th>Role ID</th>
                                            <th class="text-center" style="min-width: 100px;">Role Name</th>
                                            <th class="text-center" style="min-width: 200px;">Role Description</th>
                                            <th class="text-center" style="min-width: 70px;">Role Status</th>
                                            <th class="text-center" style="min-width: 30px;">{{ __('Action ( # )') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>11</td>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td class="text-center">
                                                {{-- @if ($member->status === 'Active') --}}
                                                    <span class="custom-badge status-green">Active</span>
                                                {{-- @else
                                                    <span class="custom-badge status-red">{{ $member->status }}</span>
                                                @endif --}}
                                            </td>
                                            {{-- Action Buttons --}}
                                            <td class="text-right">
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn-sm btn btn-warning fa fa-edit" href="#"></a>
                                                <a data-toggle="tooltip" data-placement="top" title="Delete" class="btn-sm btn btn-danger fa fa-trash" href="#"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>22</td>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td class="text-center">
                                                {{-- @if ($member->status === 'Active') --}}
                                                    {{-- <span class="custom-badge status-green">Active</span> --}}
                                                {{-- @else --}}
                                                    <span class="custom-badge status-red">Inactive</span>
                                                {{-- @endif --}}
                                            </td>
                                            {{-- Action Buttons --}}
                                            <td class="text-right">
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn-sm btn btn-warning fa fa-edit" href="#"></a>
                                                <a data-toggle="tooltip" data-placement="top" title="Delete" class="btn-sm btn btn-danger fa fa-trash" href="#"></a>
                                            </td>
                                          </tr>
                                        <tr>
                                            <td>33</td>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td class="text-center">
                                                {{-- @if ($member->status === 'Active') --}}
                                                    <span class="custom-badge status-green">Active</span>
                                                {{-- @else
                                                    <span class="custom-badge status-red">{{ $member->status }}</span>
                                                @endif --}}
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
        </div>

    </div>
@endsection
