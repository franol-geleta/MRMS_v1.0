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
@section('myPageTitle', 'አዲስ የየቤተሰብ አባል መመዝገቢያ | New Family Member Data')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('members.index') }}">{{ __('Members') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ __('Family Member') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Add Member\'s Family Member Data') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-10 col-6">
                    <h4 class="page-title">{{ __('አዲስ የአባሉ የቤተሰብ አባል መመዝገቢያ | Add Member\'s Familiy Member Data') }}</h4>
                </div>
                <div class="col-2 text-right">
                    <a href="{{ route ('members.show', $memberFamilyMember->idMember) }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('ተመለስ | Back') }}</strong></a>
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
                                <h3 class="user-name m-t-0 mb-0" style="font-weight:700;">{{ $memberFamilyMember->appellation.' '.$memberFamilyMember->firstName.' '.$memberFamilyMember->middleName.' '.$memberFamilyMember->lastName }}</h3><hr />
                            </div>
                        </div>
                        <div class="profile-view offset-1">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="{{ URL::to($memberFamilyMember->photograph) }}" alt="No Image"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-1">
                                        <br />&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-5 profile-info-left">
                                        <br />
                                        @if($memberFamilyMember->status === 'Active')
                                            <span class="col-12 custom-badge status-green">{{ $memberFamilyMember->status }}</span>
                                        @else
                                            <span class="col-12 custom-badge status-red">{{ $memberFamilyMember->status }}</span>
                                        @endif
                                        @php $idPrefix = $memberFamilyMember->prefix; @endphp
                                            @if ($memberFamilyMember->idMember < 10) @php $zeroFillID = '0000000'.$memberFamilyMember->idMember; @endphp
                                            @elseif ($memberFamilyMember->idMember < 100) @php $zeroFillID = '000000'.$memberFamilyMember->idMember; @endphp
                                            @elseif ($memberFamilyMember->idMember < 1000) @php $zeroFillID = '00000'.$memberFamilyMember->idMember; @endphp
                                            @elseif ($memberFamilyMember->idMember < 10000) @php $zeroFillID = '0000'.$memberFamilyMember->idMember; @endphp
                                            @elseif ($memberFamilyMember->idMember < 10000) @php $zeroFillID = '000'.$memberFamilyMember->idMember; @endphp
                                            @elseif ($memberFamilyMember->idMember < 100000) @php $zeroFillID = '00'.$memberFamilyMember->idMember; @endphp
                                            @elseif ($memberFamilyMember->idMember < 1000000) @php $zeroFillID = '0'.$memberFamilyMember->idMember; @endphp
                                            @else @php $zeroFillID = $memberFamilyMember->idMember; @endphp @endif
                                        @php $idSuffix = $memberFamilyMember->suffix; @endphp
                                        <div class="staff-id" style="font-weight: bold; color: green;">{{ __('Member\'s UID :') }}
                                            {{ $idPrefix.$zeroFillID.$idSuffix }}
                                        </div>
                                        <br />
                                        <div class="col-md-12">
                                            <ul class="personal-info">
                                                <br />
                                                <li>
                                                    <span class="title">{{ __('Gender:') }}</span>
                                                    <span class="text"><a href="#">@if ($memberFamilyMember->gender == NULL) {{ __('N/A') }} @else {{ $memberFamilyMember->gender }} @endif</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">{{ __('Civil Status:') }}</span>
                                                    <span class="text"><a href="#">@if ($memberFamilyMember->civilStatus == NULL) {{ __('N/A') }} @else {{ $memberFamilyMember->civilStatus }} @endif</a></span>
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
                                                        <span class="text"><a href="#">@if ($memberFamilyMember->primaryPhone == NULL) {{ __('N/A') }} @else {{ $memberFamilyMember->primaryPhone }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Email:') }}</span>
                                                        <span class="text"><a href="#">@if ($memberFamilyMember->email == NULL) {{ __('N/A') }} @else {{ $memberFamilyMember->email }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Birthday:') }}</span>
                                                        <span class="text"><a href="#">@if ($memberFamilyMember->birthDate == NULL) {{ __('N/A') }} @else {{ $memberFamilyMember->birthDate }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Nationality:') }}</span>
                                                        <span class="text"><a href="#">@if ($memberFamilyMember->nationality == NULL) {{ __('N/A') }} @else {{ $memberFamilyMember->nationality }} @endif</a></span>
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
                        <h4 class="card-title">{{ __('የአባሉ የቤተሰብ አባል | Member\'s Family Member') }}</h4>
                        <form action="{{ route ('members.familymember.store', $memberFamilyMember->idMember) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field ('POST') }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label">{{ __('ማዕረግ') }} <span class="text-danger"> {{ __(' *') }}</span> {{ __(' | Appillation') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                                    <select class="select form-control floating" name="cmbFamilyAppillation" required>
                                                        <option value="">{{ __('Select Appillation') }}</option>
                                                        @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 12)->pluck('list_LookupDataName') as $value)
                                                            <option value="{{ $value }}">{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="famFullName">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('ሥም | First Name') }}</label>
                                                    <input type="text" class="form-control floating" name="txtFamilyFirstName" placeholder="Family member's Full Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="famFullName">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('ሙሉ ሥም | Middle Name') }}</label>
                                                    <input type="text" class="form-control floating" name="txtFamilyMiddleName" placeholder="Family member's Full Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="famFullName">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('ሙሉ ሥም | Last Name') }}</label>
                                                    <input type="text" class="form-control floating" name="txtFamilyLastName" placeholder="Family member's Full Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="famGender">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label">{{ __('ፆታ | Gender') }}</label>
                                                    <select class="select form-control floating" name="cmbFamilyGender" required>
                                                        <option value="">{{ __('Select Gender') }}</option>
                                                        @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 1)->pluck('list_LookupDataName') as $value)
                                                            <option value="{{ $value }}">{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="famRelationship">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label">{{ __('ዝምድና | Relationship') }}</label>
                                                    <select class="select form-control floating" name="cmbRelationship" required>
                                                        <option value="">{{ __('Select Relationship Type') }}</option>
                                                        @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 14)->pluck('list_LookupDataName') as $value)
                                                            <option value="{{ $value }}">{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="famBirthDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('የትውልድ ቀን | Date of Birth') }}</label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="datFamilyBirthDate" id="FamilyBirthDatePicker" placeholder="Family Member's Date of Birth" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="famWorshipingDenomination">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('የሚያመልክበት ቤተ-እምነት | Worshiping Denomination') }}</label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="txtWorshipingDenomination" placeholder="Worshiping Denomination" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="famFamilyMemberStatus">
                                                <div class="form-group">
                                                    <label class="display-block">{{ __('የቤተሰብ አባል ሁኔታ | Family Member Status') }}</label>
                                                    @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 28)->pluck('list_LookupDataName') as $value)
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="rdoFamilyMemberStatus" id="rdoFamilyMemberStatus_{{ $value }}" required>
                                                            <label class="form-check-label" for="rdoFamilyMemberStatus_{{ $value }}">{{ $value }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <input type="hidden" name="hdnMemberID" value="{{ $memberFamilyMember->idMember }}"> --}}
                            <div class="text-center m-t-20">
                                <input class="btn btn-danger submit-btn" type="submit" value="SAVE DATA">
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