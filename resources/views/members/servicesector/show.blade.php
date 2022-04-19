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
@extends('layouts.mrmsMainLayout')
@section('myPageTitle', 'የአባሉ የአገልግሎት ዘርፍ ማሳያ | Show Service Sector Data')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('members.index') }}">{{ __('Members') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ __('Service Sector') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Show Member\'s Service Sector Data') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8 col-6">
                    <h4 class="page-title">{{ __('የአባሉ የአገልግሎት ዘርፍ ማሳያ | Show Member\'s Service Sector Data') }}</h4>
                </div>
                <div class="col-2 text-right">
                    @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                        <a href="{{ route ('members.servicesector.edit', $memberServiceSector->idServiceSectorData) }}" class="btn btn-warning float-right btn-rounded"><i class="fa fa-edit">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('አስተካክል | Edit') }}</strong></a>
                    @endif
                </div>
                <div class="col-2 text-right">
                    <a href="{{ route ('members.show', $memberServiceSector->idMember) }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('ተመለስ | Back') }}</strong></a>
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
            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-10 personal-info offset-1">
                                <h3 class="user-name m-t-0 mb-0" style="font-weight:700;">{{ $memberServiceSector->appellation.' '.$memberServiceSector->firstName.' '.$memberServiceSector->middleName.' '.$memberServiceSector->lastName }}</h3><hr />
                            </div>
                        </div>
                        <div class="profile-view offset-1">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="{{ URL::to($memberServiceSector->photograph) }}" alt="No Image"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-1">
                                        <br />&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-5 profile-info-left">
                                        <br />
                                        @if($memberServiceSector->status === 'Active')
                                            <span class="col-12 custom-badge status-green">{{ $memberServiceSector->status }}</span>
                                        @else
                                            <span class="col-12 custom-badge status-red">{{ $memberServiceSector->status }}</span>
                                        @endif
                                        @php $idPrefix = $memberServiceSector->prefix; @endphp
                                            @if ($memberServiceSector->idMember < 10) @php $zeroFillID = '0000000'.$memberServiceSector->idMember; @endphp
                                            @elseif ($memberServiceSector->idMember < 100) @php $zeroFillID = '000000'.$memberServiceSector->idMember; @endphp
                                            @elseif ($memberServiceSector->idMember < 1000) @php $zeroFillID = '00000'.$memberServiceSector->idMember; @endphp
                                            @elseif ($memberServiceSector->idMember < 10000) @php $zeroFillID = '0000'.$memberServiceSector->idMember; @endphp
                                            @elseif ($memberServiceSector->idMember < 10000) @php $zeroFillID = '000'.$memberServiceSector->idMember; @endphp
                                            @elseif ($memberServiceSector->idMember < 100000) @php $zeroFillID = '00'.$memberServiceSector->idMember; @endphp
                                            @elseif ($memberServiceSector->idMember < 1000000) @php $zeroFillID = '0'.$memberServiceSector->idMember; @endphp
                                            @else @php $zeroFillID = $memberServiceSector->idMember; @endphp @endif
                                        @php $idSuffix = $memberServiceSector->suffix; @endphp
                                        <div class="staff-id" style="font-weight: bold; color: green;">{{ __('Member\'s UID :') }}
                                            {{ $idPrefix.$zeroFillID.$idSuffix }}
                                        </div>
                                        <br />
                                        <div class="col-md-12">
                                            <ul class="personal-info">
                                                <br />
                                                <li>
                                                    <span class="title">{{ __('Gender:') }}</span>
                                                    <span class="text"><a href="#">@if ($memberServiceSector->gender == NULL) {{ __('N/A') }} @else {{ $memberServiceSector->gender }} @endif</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">{{ __('Civil Status:') }}</span>
                                                    <span class="text"><a href="#">@if ($memberServiceSector->civilStatus == NULL) {{ __('N/A') }} @else {{ $memberServiceSector->civilStatus }} @endif</a></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <br />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-info">
                                            <div class="col-md-12">
                                                <br />
                                                <ul class="personal-info">
                                                    <br />
                                                    <li>
                                                        <span class="title">{{ __('Mobile:') }}</span>
                                                        <span class="text"><a href="#">@if ($memberServiceSector->primaryPhone == NULL) {{ __('N/A') }} @else {{ $memberServiceSector->primaryPhone }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Email:') }}</span>
                                                        <span class="text"><a href="#">@if ($memberServiceSector->email == NULL) {{ __('N/A') }} @else {{ $memberServiceSector->email }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Birthday:') }}</span>
                                                        <span class="text"><a href="#">@if ($memberServiceSector->birthDate == NULL) {{ __('N/A') }} @else {{ $memberServiceSector->birthDate }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Nationality:') }}</span>
                                                        <span class="text"><a href="#">@if ($memberServiceSector->nationality == NULL) {{ __('N/A') }} @else {{ $memberServiceSector->nationality }} @endif</a></span>
                                                    </li>
                                                </ul>
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
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="card-title">{{ __('የአባሉ የአገልግሎት ዘርፍ መረጃ ማሳያ | Show Member\'s Service Sector Data') }}</h4>
                        <form action="{{ route ('members.servicesector.store', $memberServiceSector->idMember) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field ('POST') }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-md-8" id="srvServiceSector">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label">{{ __('የአገልግሎት ዘርፍ | Service Sector') }}</label>
                                                    <select class="select form-control floating" name="cmbServiceSector" required>
                                                        <option value="">{{ __('Select Service Sector') }}</option>
                                                        @php $valueServiceSectors = DB::table('sfgbc_ServiceSectors')->get(); @endphp
                                                            @foreach($valueServiceSectors as $valueServiceSector)
                                                                <option value="@if ($memberServiceSector->serviceSectorName == $valueServiceSector->serviceSectorType.' | '.$valueServiceSector->sectorStatus)
                                                                    {{ $valueServiceSector->serviceSectorType.' | '.$valueServiceSector->sectorStatus }}" selected 
                                                                @else
                                                                    {{ $valueServiceSector->serviceSectorType.' | '.$valueServiceSector->sectorStatus }}"
                                                                @endif>
                                                                    {{ $valueServiceSector->serviceSectorType.' | '.$valueServiceSector->sectorStatus }} </option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="srvRoleOnServiceSector">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label">{{ __('በዘርፉ ያለው ድርሻ | Role on Sector') }}</label>
                                                    <select class="select form-control floating" name="cmbRoleOnServiceSector" required>
                                                        <option value="">{{ __('Select Role Type') }}</option>
                                                        @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 11)->pluck('list_LookupDataName') as $value)
                                                            <option value="@if ($value === $memberServiceSector->roleOnSector) {{ $value }}" selected @else {{ $value }}" @endif>{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="srvJoinedDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('የተቀላቀለበት ቀን | Joined Date') }}</label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="datSectorJoinedDate" value="{{ $memberServiceSector->joinedDate }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="srvStillServingHere">
                                                <div class="form-group">
                                                    <label class="display-block">{{ __('አሁን እዚህ ያገለግላሉ? | Still Serving here?') }}</label>
                                                    @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 26)->pluck('list_LookupDataName') as $value)
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="rdoStillServingHere" id="rdoStillServingHere_{{ $value }}" value="@if ($value === $memberServiceSector->stillServingHere) {{ $value }}" checked @else {{ $value }}" @endif>
                                                            <label class="form-check-label" for="rdoStillServingHere_{{ $value }}">{{ $value }}</label>
                                                        </div>  
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="srvLeftDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('የለቀቀበት ቀን | Lefted Date') }}</label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="datSectorLeftDate" value="{{ $memberServiceSector->leftServingDate }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="srvLeftReason">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('የለቀቀበት ምክንያት | Lefted Reason') }}</label>
                                                    <input type="text" class="form-control floating" name="txtSectorLeftReason" value="{{ $memberServiceSector->leftServingReason }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="srvBurden">
                                                <div class="form-group">
                                                    <label class="focus-label">{{ __('አባሉ ያለው የአገልግሎት ሸክም | Burden Member has') }}</label>
                                                    <textarea cols="30" rows="3" class="form-control" name="txaBurden" placeholder="Please leave your comment regarding member's burden and service sector participation here...">{{ $memberServiceSector->burdenDetail }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="srvServiceSectorRemarks">
                                                <div class="form-group">
                                                    <label class="focus-label">{{ __('በአገልግሎት ዘርፉ ላይ ማስታወሻ | Service Sector Remarks') }}</label>
                                                    <textarea cols="30" rows="5" class="form-control" name="txaServiceSectorRemarks" placeholder="Please leave your comment regarding member's burden and service sector participation here...">{{ $memberServiceSector->memberServiceSectorRemark }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // Ethiopian Calender
        $(function() {
            $('#FamilyBirthDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });
    </script>
@endsection