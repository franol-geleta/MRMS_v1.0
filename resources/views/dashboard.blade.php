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
@php
    use App\Models\Members\MembersDataModel;
    use App\Models\ServiceSectors\ServiceSectorsDataModel;
    use App\Models\Fellowships\FellowshipsDataModel;
    use App\Models\Members\FellowshipDataModel;
@endphp
@extends('layouts.mrmsMainLayout')
@section('myPageTitle', 'መነሻ ገጽ | Dashboard - Home')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                    </ol>
                </nav>
            </div>
            {{-- Members' Summary --}}
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
            
            @php $newMembers = MembersDataModel::orderBy('idMember', 'DESC')->limit(7)->get(); @endphp 
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">{{ __('New Members') }}</h4> <a href="{{ route ('members.index') }}" class="btn btn-primary float-right">{{ __('View all Members') }}</a>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table mb-0 new-patient-table">
                                    <tbody>
                                        <tr>
                                            <th>{{ __('Member\'s Full Name') }}</th>
                                            <th>{{ __('Gender') }}</th>
                                            <th>{{ __('Civil Status') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                        @foreach ($newMembers as $newMember)
                                            <tr>
                                                <td>
                                                    <img width="28" height="28" class="rounded-circle" src="{{ $newMember->photograph }}" alt="">
                                                    <h2>{{ $newMember->appellation.' '.$newMember->firstName.' '.$newMember->middleName.' '.$newMember->lastName }}</h2>
                                                </td>
                                                <td>{{ $newMember->gender }}</td>
                                                <td>{{ $newMember->civilStatus }}</td>
                                                <td>
                                                    <a href="{{ route ('members.show', $newMember->idMember) }}"><button class="btn btn-danger btn-primary-one float-right">{{ __('Pick') }}</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="card member-panel">
                        <div class="card-header bg-white">
                            <h4 class="card-title mb-0">{{ __('Fellowship Leaders') }}</h4>
                        </div>
                        @php
                            $fellowshipStaffs = DB::table('sfgbc_Members')
                                ->join ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                                ->join ('sfgbc_member_FellowshipData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_FellowshipData.idMember')
                                ->select (
                                    'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.photograph',
                                    'sfgbc_member_ResidentialAddressData.primaryPhone',
                                    'sfgbc_member_FellowshipData.idMember', 'sfgbc_member_FellowshipData.roleOnFellowship', 'sfgbc_member_FellowshipData.fellowshipType', 'sfgbc_member_FellowshipData.fellowshipName'
                                )
                            ->where('sfgbc_member_FellowshipData.hasFellowship', '=', 'Yes', 'AND', 'sfgbc_member_FellowshipData.roleOnFellowship','!=', 'Member')
                            ->orderby('sfgbc_Members.firstName', 'ASC')
                            ->get();
                        @endphp
                        @foreach ($fellowshipStaffs as $fellowshipStaff)
                            <div class="card-body">
                                <ul class="contact-list">
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a style="font-weight: bolder;" href="{{ route ('members.show', $fellowshipStaff->idMember) }}" title="{{ $fellowshipStaff->appellation.' '.$fellowshipStaff->firstName.' '.$fellowshipStaff->middleName.' '.$fellowshipStaff->lastName }}"><img src="{{ $fellowshipStaff->photograph }}" alt="{{ $fellowshipStaff->appellation.' '.$fellowshipStaff->firstName.' '.$fellowshipStaff->middleName.' '.$fellowshipStaff->lastName }}" class="w-40 rounded-circle"></a>
                                            </div>
                                            {{-- , firstName, middleName, lastName, photograpph --}}
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis"><a href="{{ route ('members.show', $fellowshipStaff->idMember) }}" title="{{ $fellowshipStaff->appellation.' '.$fellowshipStaff->firstName.' '.$fellowshipStaff->middleName.' '.$fellowshipStaff->lastName }}"><strong>{{ $fellowshipStaff->appellation.' '.$fellowshipStaff->firstName.' '.$fellowshipStaff->middleName.' '.$fellowshipStaff->lastName }}</strong></a></span>
                                                <span class="contact-date">{{ $fellowshipStaff->roleOnFellowship.' @ '.$fellowshipStaff->fellowshipType.' on '.$fellowshipStaff->fellowshipName }}</span>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-date">{{ $fellowshipStaff->primaryPhone }}</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                        <div class="card-header">
                            <a href="{{ route ('fellowships.index') }}" class="btn btn-dark float-right">{{ __('View all Fellowships') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Fellowships' Summary --}}
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                @php $fellowshipCount = DB::table('sfgbc_Fellowships')->count(); @endphp {{ $fellowshipCount }}
                            </h3>
                            <span class="widget-title1">Fellowships<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg2"><i class="fa fa-map-signs" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                @php $typeFellowshipCount = FellowshipsDataModel::distinct('fellowshipType')->count('fellowshipType'); @endphp {{ $typeFellowshipCount }}
                            </h3>
                            <span class="widget-title2">Type<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg4"><i class="fa fa-arrows"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                @php $zoneFellowshipCount = FellowshipsDataModel::distinct('fellowshipZone')->count('fellowshipZone'); @endphp {{ $zoneFellowshipCount }}
                            </h3>
                            <span class="widget-title4">Zone<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3> 
                                @php $inactiveFellowshipCount = FellowshipsDataModel::where('fellowshipStatus', 'Inactive')->count(); @endphp {{ $inactiveFellowshipCount }}
                            </h3>
                            <span class="widget-title3">Inactive<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">{{ __('Upcoming Appointments') }}</h4> <a href="#" class="btn btn-primary float-right">{{ __('View all Appointments') }}</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <th>{{ __('Member\'s Full Name') }}</th>
                                            <th>{{ __('Gender') }}</th>
                                            <th>{{ __('Civil Status') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                        @foreach ($newMembers as $newMember)
                                            <tr>
                                               <td>
                                                    <img width="28" height="28" class="rounded-circle" src="{{ $newMember->photograph }}" alt="">
                                                    <h2>{{ $newMember->appellation.' '.$newMember->firstName.' '.$newMember->middleName.' '.$newMember->lastName }}</h2>
                                                </td>
                                                <td>{{ $newMember->gender }}</td>
                                                <td>{{ $newMember->civilStatus }}</td>
                                                  <td>
                                                    <a href="{{ route ('members.show', $newMember->idMember) }}"><button class="btn btn-danger btn-primary-one float-right">{{ __('Take') }}</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="card member-panel">
                        <div class="card-header bg-white">
                            <h4 class="card-title mb-0"><strong>{{ _('Service Sector Leaders') }}</strong></h4>
                        </div>
                        @php
                            $serviceSectorStaffs = DB::table('sfgbc_Members')
                                ->join ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                                ->join ('sfgbc_member_ServiceSectorData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ServiceSectorData.idMember')
                                ->select (
                                    'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.photograph',
                                    'sfgbc_member_ResidentialAddressData.primaryPhone',
                                    'sfgbc_member_ServiceSectorData.serviceSectorName', 'sfgbc_member_ServiceSectorData.roleOnSector'
                                )
                            ->where('sfgbc_member_ServiceSectorData.hasServiceSector', '=', 'Yes', 'AND', 'sfgbc_member_ServiceSectorData.roleOnSector','!=', 'Member')
                            ->orderby('sfgbc_Members.firstName', 'ASC')
                            ->get();
                        @endphp
                        @foreach ($serviceSectorStaffs as $serviceSectorStaff)
                            <div class="card-body">
                                <ul class="contact-list">
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a style="font-weight: bolder;" href="{{ route ('members.show', $serviceSectorStaff->idMember) }}" title="{{ $serviceSectorStaff->appellation.' '.$serviceSectorStaff->firstName.' '.$serviceSectorStaff->middleName.' '.$serviceSectorStaff->lastName }}"><img src="{{ $serviceSectorStaff->photograph }}" alt="{{ $serviceSectorStaff->appellation.' '.$serviceSectorStaff->firstName.' '.$serviceSectorStaff->middleName.' '.$serviceSectorStaff->lastName }}" class="w-40 rounded-circle"></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis"><a href="{{ route ('members.show', $serviceSectorStaff->idMember) }}" title="{{ $serviceSectorStaff->appellation.' '.$serviceSectorStaff->firstName.' '.$serviceSectorStaff->middleName.' '.$serviceSectorStaff->lastName }}"><strong>{{ $serviceSectorStaff->appellation.' '.$serviceSectorStaff->firstName.' '.$serviceSectorStaff->middleName.' '.$serviceSectorStaff->lastName }}</strong></a></span>
                                                <span class="contact-date">{{ $serviceSectorStaff->roleOnSector.' @ '.$serviceSectorStaff->serviceSectorName }}</span>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-date">{{ $serviceSectorStaff->primaryPhone }}</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>    
                        @endforeach
                        
                        <div class="card-header">
                            <a href="{{ route ('servicesectors.index') }}" class="btn btn-danger float-right">{{ __('View all Service Sectors') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Service Sectors' Summary --}}
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-cubes" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                @php $serviceSectorCount = DB::table('sfgbc_ServiceSectors')->count(); @endphp {{ $serviceSectorCount }}
                            </h3>
                            <span class="widget-title1">{{ __('Total Service Sector') }}<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg4"><i class="fa fa-puzzle-piece" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                @php $typeServiceSectorCount = ServiceSectorsDataModel::distinct('serviceSectorType')->count('serviceSectorType'); @endphp {{ $typeServiceSectorCount }}
                            </h3>
                            <span class="widget-title4">{{ __('Service Sector Type') }}<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3> 
                                @php $inactiveServiceSectorCount = ServiceSectorsDataModel::where('sectorStatus', 'Inactive')->count(); @endphp {{ $inactiveServiceSectorCount }}
                            </h3>
                            <span class="widget-title3">{{ __('Inactive Service Sector') }}<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
