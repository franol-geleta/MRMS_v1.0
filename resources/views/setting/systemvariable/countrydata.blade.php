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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('System Variables - [ Country - Nationality Lists ]') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">{{ __('System Variables Setting') }}</h4>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-7">
                    <h4 class="page-title">{{ __('Country - Nationality Data Datatable') }}</h4>
                </div>
                <div class="col-md-5 text-right">
                    <a href="{{ route ('setting.systemvariable.getlookupdata') }}" class="btn btn-success float-right btn-rounded"><i class="fa fa-plus">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('Add Country-Nationality Data') }}</strong></a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-block">
                            <p class="content-group">
                                This is the most basic example of the datatables with zero configuration. Use the <code>.datatable</code> class to initialize datatables.
                            </p>
							<div class="table-responsive">
								<table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th style="min-width: 100px;">{{ __('Country ID') }}</th>
                                            <th style="min-width: 150px;">{{ __('Country Name') }}</th>
                                            <th style="min-width: 450px;">{{ __('Nationality') }}</th>
                                            <th class="text-center" style="min-width: 155px;">{{ __('Action ( # )') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach($countrydata as $data => $country) --}}
                                            <tr>
                                                <td>22</td>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                {{-- Action Buttons --}}
                                                <td class="text-right">
                                                    <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn-sm btn btn-warning fa fa-edit" href="#" onClick="return confirmEdit('Are you SURE to EDIT this member\'s data?');"></a>
                                                    <a data-toggle="tooltip" data-placement="top" title="Delete" class="btn-sm btn btn-danger fa fa-trash" href="#" data-toggle="modal" onClick="return confirmDelete('Are you SURE to DELETE this member\'s data?');"></a>
                                                </td>
                                            </tr>
                                        {{-- @endforeach --}}
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
