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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('System Variables - Lookup Data [ List of Values (LOV)') }}</li>
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
                <div class="col-sm-9">
                    <h4 class="page-title">{{ __('System Variables Setting - Lookup Data [ List of Values (LOV) ] Datatable') }}</h4>
                </div>
                <div class="col-md-3 text-right">
                    <a href="{{ route ('setting.systemvariable.alookupdata') }}" class="btn btn-success float-right btn-rounded"><i class="fa fa-plus">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('Add Lookup Data Value') }}</strong></a>
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
                                            <th style="min-width: 70px;">{{ __('Data ID') }}</th>
                                            <th style="min-width: 150px;">{{ __('Data Type') }}</th>
                                            <th style="min-width: 200px;">{{ __('Data Name') }}</th>
                                            <th style="min-width: 450px;">{{ __('Data Description') }}</th>
                                            <th style="min-width: 80px;">{{ __('Data Parent ID') }}</th>
                                            <th class="text-center" style="min-width: 100px;">{{ __('Action ( # )') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($zLookupData as $data => $lov)
                                            <tr>
                                                <td>{{ $lov->idLookupData }}</td>
                                                <td>{{ $lov->list_LookupDataType }}</td>
                                                <td>{{ $lov->list_LookupDataName }}</td>
                                                <td>{{ $lov->list_LookupDataDescription }}</td>
                                                <td>{{ $lov->list_LookupDataParent }}</td>
                                                {{-- Action Buttons --}}
                                                <td class="text-right">
                                                    <a title="Edit Lookup" href="{{ route ('setting.systemvariable.elookupdata', $lov->idLookupData) }}" data-toggle="tooltip" data-placement="top" class="btn-sm btn btn-warning fa fa-edit" onClick="return confirmEdit('Are you SURE to EDIT this member\'s data?');"></a>
                                                    {{-- <a title="Delete Lookup" href="{{ route ('') }}" data-toggle="tooltip" data-placement="top" class="btn-sm btn btn-danger fa fa-trash" data-toggle="modal" onClick="return confirmDelete('Are you SURE to DELETE this member\'s data?');"></a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
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
