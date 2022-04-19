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
@php use App\Models\Members\MembersDataModel; @endphp
@extends('layouts.mrmsMainLayout')
@section('myPageTitle', 'የአባላት ዝርዝር | Members\' Cataloge')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Members') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-9">
                    <h4 class="page-title">{{ __('የአባላት ዝርዝር | Members\' Cataloge') }}</h4>
                </div>
                <div class="col-3 text-right">
                    <a href="{{ route ('members.create') }}" class="btn btn-danger float-right btn-rounded"><i class="fa fa-user-plus">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('Add New Member') }}</strong></a>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-7">
                    <form action="" method="" id="" name="">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group form-focus">
                                    <label class="focus-label">{{ __('የአባላት መፈለጊያ | Search Members') }}</label>
                                    <input type="text" name="txtSearchMember" id="iSearchMember" class="form-control floating" placeholder="የአባሉ ስም | Member's Name">
                                </div>
                            </div>
                            <div class="col-md-4 filter-row">
                                <a href="#" class="btn btn-success btn-block"> <strong>{{ __('ፈልግ | Search') }}</strong> </a><br />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 filter-row">
                    <div class="col-md-12">
                        {{-- Export-Spreadsheet-CSV --}}
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Comma Delimited Text (*.csv) file" href="{{ route ('members.tocsv') }}" class="btn btn-secondary float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to CSV (Comma Delimited Spreedsheet) format?');"><i class="fa fa-file-text-o">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('csv') }}</strong></a>
                    </div>
                    <div class="col-md-12">
                        {{-- Export-Spreadsheet-XLXS --}}
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Spreadsheet Format (*.xlxs | *.ods) file" href="{{ route ('members.toexcel') }}" class="btn btn-warning float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to EXCEL (MS-Excel Spreedsheet) format?');"><i class="fa fa-file-excel-o">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('Excel') }}</strong></a>
                    </div>
                    <div class="col-md-12">
                        {{-- Export-PortableFile-PDF --}} 
                        {{-- {{ route ('members.topdf') }} --}}
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Portable Document Format (*.pdf) file" href="#" class="btn btn-primary float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to PDF (Portable Document File) format?');"><i class="fa fa-file-pdf-o">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('pdf') }}</strong></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-users" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                @php $memberCount = DB::table('sfgbc_Members')->count(); @endphp {{ $memberCount }}
                            </h3>
                            <span class="widget-title1">Members <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg2"><i class="fa fa-male"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                @php $maleMemberCount = MembersDataModel::where('gender', 'Male')->count(); @endphp {{ $maleMemberCount }}
                            </h3>
                            <span class="widget-title2">Male <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg4"><i class="fa fa-female" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                @php $femaleMemberCount = MembersDataModel::where('gender', 'Female')->count(); @endphp {{ $femaleMemberCount }}
                            </h3>
                            <span class="widget-title4">Female <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3> 
                                @php $inactiveMemberCount = MembersDataModel::where('status', 'Inactive')->count(); @endphp {{ $inactiveMemberCount }}
                            </h3>
                            <span class="widget-title3">Inactive <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
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
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                {{-- Data Table Headers --}}
                                <tr>
                                    <th class="text-center" style="min-width: 10px;">{{ __('#') }}</th>
                                    <th style="min-width: 150px;">{{ __('Member ID') }}</th>
                                    <th class="wrap" style="min-width: 400px;">{{ __('Photo || Full Name') }}</th>
                                    <th style="min-width: 25px;">{{ __('Gender') }}</th>
                                    <th style="min-width: 100px;">{{ __('Status') }}</th>
                                    <th style="min-width: 150px;">{{ __('Civil Status') }}</th>
                                    <th style="min-width: 150px;">{{ __('Primary Phone No.') }}</th>
                                    <th style="min-width: 200px;">{{ __('Email Address') }}</th>
                                    <th style="min-width: 100px;">{{ __('Birth Date') }}</th>
                                    <th style="min-width: 150px;">{{ __('How Became Member') }}</th>
                                    <th style="min-width: 120px;">{{ __('Believed Date') }}</th>
                                    <th style="min-width: 120px;">{{ __('Baptaized Date') }}</th>
                                    <th style="min-width: 120px;">{{ __('Membership Date') }}</th>
                                    <th style="min-width: 200px;">{{ __('Location Naming') }}</th>
                                    <th style="min-width: 100px;">{{ __('Nationality') }}</th>
                                    <th class="text-center" style="min-width: 155px;">{{ __('Action ( # )') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($members as $data => $member)
                                    <tr>
                                        {{-- Action Buttons --}}
                                        <td class="text-right">
                                            <div data-toggle="tooltip" data-placement="right" title="Action Key" class="dropdown dropdown-action">
                                                <a href="#" class="btn-sm btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route ('members.show', $member->idMember) }}"><i class="btn-sm btn btn-success fa fa-desktop"></i> {{ __('Show') }}</a>
                                                    @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                                        <a class="dropdown-item" href="{{ route ('members.edit', $member->idMember) }}" onClick="return confirm ('Are you SURE to EDIT this member\'s data?');"><i class="btn-sm btn btn-warning fa fa-edit"></i> {{ __('Edit') }}</a>
                                                    @endif
                                                    @if (Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active')
                                                        <a class="dropdown-item" href="{{ route ('members.remove', $member->idMember) }}" onClick="return confirm ('Are you SURE to DELETE this member\'s data?');"><i class="btn-sm btn btn-danger fa fa-trash"></i> {{ __('Delete') }}</a>
                                                    @endif
                                                    @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                                        <a class="dropdown-item" href="{{ route ('members.deactivate', $member->idMember) }}" onClick="return confirm ('Are you SURE to DEACTIVATE this member\'s data?');"><i class="btn-sm btn btn-dark fa fa-times"></i> {{ __('Deactivate') }}</a>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Resultset Data Tables  --}}
                                        <td>
                                            @php $idPrefix = $member->prefix; @endphp
                                                @if ($member->idMember < 10) @php $zeroFillID = '0000000'.$member->idMember; @endphp
                                                @elseif ($member->idMember < 100) @php $zeroFillID = '000000'.$member->idMember; @endphp
                                                @elseif ($member->idMember < 1000) @php $zeroFillID = '00000'.$member->idMember; @endphp
                                                @elseif ($member->idMember < 10000) @php $zeroFillID = '0000'.$member->idMember; @endphp
                                                @elseif ($member->idMember < 10000) @php $zeroFillID = '000'.$member->idMember; @endphp
                                                @elseif ($member->idMember < 100000) @php $zeroFillID = '00'.$member->idMember; @endphp
                                                @elseif ($member->idMember < 1000000) @php $zeroFillID = '0'.$member->idMember; @endphp
                                                @else @php $zeroFillID = $member->idMember; @endphp @endif
                                            @php $idSuffix = $member->suffix; @endphp
                                            
                                            {{ $idPrefix.$zeroFillID.$idSuffix }}
                                        </td>
                                        <td>
                                            <img width="30" height="30" src="{{ URL::to($member->photograph) }}" class="rounded-circle" alt="|_No.Member.Photo_|">
                                            <h2>{{ $member->appellation.' '.$member->firstName.' '.$member->middleName.' '.$member->lastName }} </h2>
                                        </td>
                                        <td>{{ $member->gender }}</td>
                                        <td>
                                            @if ($member->status === 'Active') <span class="custom-badge status-green">{{ $member->status }}</span>
                                            @else <span class="custom-badge status-red">{{ $member->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $member->civilStatus }}</td>
                                        <td>{{ $member->primaryPhone }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->birthDate }}</td>
                                        <td>{{ $member->howBecameMember }}</td>
                                        <td>{{ $member->believedDate }}</td>
                                        <td>{{ $member->baptizedDate }}</td>
                                        <td>{{ $member->membershipDate }}</td>
                                        <td>{{ Str::of($member->locationNaming)->substr(0, 39)->append('...') }}</td>
                                        <td>{{ $member->nationality }}</td>

                                        {{-- Action Buttons --}}
                                        <td class="text-right">
                                            <a data-toggle="tooltip" data-placement="top" title="Show" class="btn-sm btn btn-success fa fa-desktop" href="{{ URL::to ('members/show', $member->idMember) }}"></a>
                                            @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn-sm btn btn-warning fa fa-edit" href="{{ URL::to ('members/edit', $member->idMember) }}" onClick="return confirm ('Are you SURE to EDIT this member\'s data?');"></a>
                                            @endif
                                            @if (Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active')
                                                <a data-toggle="tooltip" data-placement="top" title="Delete" class="btn-sm btn btn-danger fa fa-trash" href="{{ URL::to ('members/remove', $member->idMember) }}" data-toggle="modal" onClick="return confirm ('Are you SURE to DELETE this member\'s data?');"></a>
                                            @endif
                                            @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                                <a data-toggle="tooltip" data-placement="top" title="Deactivate" class="btn-sm btn btn-dark fa fa-times" href="{{ URL::to ('members/deactivate', $member->idMember) }}" data-toggle="modal" onClick="return confirm ('Are you SURE to DEACTIVATE this member\'s data?');"></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr />
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        //
    </script>
@endsection
