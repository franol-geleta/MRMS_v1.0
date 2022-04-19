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
@section('myPageTitle', 'የስራ ልምድ መረጃ ማሳያ | Show Work Experience Data')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('members.index') }}">{{ __('Members') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ __('Work Experience') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Show Member\'s Work Experience') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8 col-6">
                    <h4 class="page-title">{{ __('የአባሉ ስራ ልምድ መረጃ ማሳያ | Show Member\'s Work Experience Data') }}</h4>
                </div>
                <div class="col-2 text-right">
                    @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                        <a href="{{ route ('members.workexperience.edit', $memberWorkExperience->idWorkExperienceData) }}" class="btn btn-warning float-right btn-rounded"><i class="fa fa-edit">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('አስተካክል | Edit') }}</strong></a>
                    @endif
                </div>
                <div class="col-2 text-right">
                    <a href="{{ route ('members.show', $memberWorkExperience->idMember) }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('ተመለስ | Back') }}</strong></a>
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
                                <h3 class="user-name m-t-0 mb-0" style="font-weight:700;">{{ $memberWorkExperience->appellation.' '.$memberWorkExperience->firstName.' '.$memberWorkExperience->middleName.' '.$memberWorkExperience->lastName }}</h3><hr />
                            </div>
                        </div>
                        <div class="profile-view offset-1">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="{{ URL::to($memberWorkExperience->photograph) }}" alt="No Image"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-1">
                                        <br />&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-5 profile-info-left">
                                        <br />
                                        @if($memberWorkExperience->status === 'Active')
                                            <span class="col-12 custom-badge status-green">{{ $memberWorkExperience->status }}</span>
                                        @else
                                            <span class="col-12 custom-badge status-red">{{ $memberWorkExperience->status }}</span>
                                        @endif
                                        @php $idPrefix = $memberWorkExperience->prefix; @endphp
                                            @if ($memberWorkExperience->idMember < 10) @php $zeroFillID = '0000000'.$memberWorkExperience->idMember; @endphp
                                            @elseif ($memberWorkExperience->idMember < 100) @php $zeroFillID = '000000'.$memberWorkExperience->idMember; @endphp
                                            @elseif ($memberWorkExperience->idMember < 1000) @php $zeroFillID = '00000'.$memberWorkExperience->idMember; @endphp
                                            @elseif ($memberWorkExperience->idMember < 10000) @php $zeroFillID = '0000'.$memberWorkExperience->idMember; @endphp
                                            @elseif ($memberWorkExperience->idMember < 10000) @php $zeroFillID = '000'.$memberWorkExperience->idMember; @endphp
                                            @elseif ($memberWorkExperience->idMember < 100000) @php $zeroFillID = '00'.$memberWorkExperience->idMember; @endphp
                                            @elseif ($memberWorkExperience->idMember < 1000000) @php $zeroFillID = '0'.$memberWorkExperience->idMember; @endphp
                                            @else @php $zeroFillID = $memberWorkExperience->idMember; @endphp @endif
                                        @php $idSuffix = $memberWorkExperience->suffix; @endphp
                                        <div class="staff-id" style="font-weight: bold; color: green;">{{ __('Member\'s UID :') }}
                                            {{ $idPrefix.$zeroFillID.$idSuffix }}
                                        </div>
                                        <br />
                                        <div class="col-md-12">
                                            <ul class="personal-info">
                                                <br />
                                                <li>
                                                    <span class="title">{{ __('Gender:') }}</span>
                                                    <span class="text"><a href="#">@if ($memberWorkExperience->gender == NULL) {{ __('N/A') }} @else {{ $memberWorkExperience->gender }} @endif</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">{{ __('Civil Status:') }}</span>
                                                    <span class="text"><a href="#">@if ($memberWorkExperience->civilStatus == NULL) {{ __('N/A') }} @else {{ $memberWorkExperience->civilStatus }} @endif</a></span>
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
                                                        <span class="text"><a href="#">@if ($memberWorkExperience->primaryPhone == NULL) {{ __('N/A') }} @else {{ $memberWorkExperience->primaryPhone }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Email:') }}</span>
                                                        <span class="text"><a href="#">@if ($memberWorkExperience->email == NULL) {{ __('N/A') }} @else {{ $memberWorkExperience->email }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Birthday:') }}</span>
                                                        <span class="text"><a href="#">@if ($memberWorkExperience->birthDate == NULL) {{ __('N/A') }} @else {{ $memberWorkExperience->birthDate }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Nationality:') }}</span>
                                                        <span class="text"><a href="#">@if ($memberWorkExperience->nationality == NULL) {{ __('N/A') }} @else {{ $memberWorkExperience->nationality }} @endif</a></span>
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
                        <h4 class="card-title">{{ __('የአባሉ የስራ ልምድ መረጃ | Member\'s Work Experience Data') }}</h4>
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control floating" name="hdnMemberIDNum" value="{{ $memberWorkExperience->idMember }}">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="display-block">{{ __('የስራ መረጃ አለ?') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Has Work Experience?') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                        @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 26)->pluck('list_LookupDataName') as $value)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rdoHasWorkExperience" id="rdoWorkExperienceInfo_{{ $value }}" value="{{ $value }}" onClick="itemWorkExperienceDataVisibility()" @if($memberWorkExperience->hasWorkExperience === $value) checked @endif>
                                                <label class="form-check-label" for="rdoWorkExperienceInfo_{{ $value }}">{{ $value }}</label>
                                            </div>  
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-9" id="expLivelihoodIncome">
                                    <div class="form-group">
                                        <label class="focus-label">{{ __('መተዳደሪያ | Livelihood Income') }}</label>
                                        <textarea cols="30" rows="3" class="form-control" name="txaLivelihoodIncome" placeholder="Please leave your comment regarding work here...">{{ $memberWorkExperience->livelihoodIncome }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-3" id="expOrganizationType">
                                    <div class="form-group form-focus select-focus">
                                        <label class="focus-label">{{ __('የድርጅቱ ዓይነት | Organization Type') }}</label>
                                        <select class="select form-control floating" name="cmbOrganizationType">
                                            <option value="">{{ __('Select Organization Type') }}</option>
                                            @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 9)->pluck('list_LookupDataName') as $value)
                                                <option value="@if($memberWorkExperience->organizationType === $value) {{ $value }}" selected @else {{ $value }} @endif">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" id="expCompanyName">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">{{ __('የድርጅቱ ሥም | Company Name') }}</label>
                                        <input type="text" class="form-control floating" name="txtCompanyName" value="{{ $memberWorkExperience->organizationName }}">
                                    </div>
                                </div>
                                <div class="col-md-6" id="expWorkLocation">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">{{ __('የስራ ቦታ መጠሪያ | Work Location') }}</label>
                                        <input type="text" class="form-control floating" name="txtWorkLocation" value="{{ $memberWorkExperience->workLocation }}">
                                    </div>
                                </div>
                                <div class="col-md-6" id="expJobPosition">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">{{ __('የስራ መደብ | Job Position') }}</label>
                                        <input type="text" class="form-control floating" name="txtJobPosition" value="{{ $memberWorkExperience->jobPosition }}">
                                    </div>
                                </div>
                                <div class="col-md-4" id="expStartingDate">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">{{ __('የጀመረበት ቀን | Starting Date [Period From]') }}</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control floating" name="datWorkStartingDate" id="WorkStartingDatePicker" value="{{ $memberWorkExperience->startingDate }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" id="expStillWorkingHere">
                                    <div class="form-group">
                                        <label class="display-block">{{ __('አሁን እዚህ ይሰራሉ? | Still working here?') }}</label>
                                        @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 26)->pluck('list_LookupDataName') as $value)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rdoStillWorkingHere" id="rdoStillWorkingHere_{{ $value }}" value="{{ $value }}" onClick="itemWorkExperienceDataVisibility()" @if($memberWorkExperience->stillWorkingHere === $value) checked @endif>
                                                <label class="form-check-label" for="rdoStillWorkingHere_{{ $value }}">{{ $value }}</label>
                                            </div>  
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-4" id="expResignedDate">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">{{ __('የለቀቀበት ቀን | Resigned Date [Period To]') }}</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control floating" name="datResignedDate" id="WorkResignedDatePicker" value="{{ $memberWorkExperience->resignedDate }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="expWorkExperienceRemarks">
                                    <div class="form-group">
                                        <label class="focus-label">{{ __('የስራ መረጃ ማስታወሻ | Work Remarks') }}</label>
                                        <textarea cols="30" rows="7" class="form-control" name="txaWorkExperiencelRemarks" placeholder="Please leave your comment regarding work here...">{{ $memberWorkExperience->workExperienceRemark }}</textarea>
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
            $('#WorkStartingDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#WorkResignedDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });
    
        // Radio Button Enabler | Disabler
        function itemWorkExperienceDataVisibility (params) {            
            // Member's Work Experience Information
            var isWorkExperienceYes = document.getElementById ("rdoWorkExperienceInfo_Yes");
            var isStillWorkingHereYes = document.getElementById ("rdoStillWorkingHere_Yes");
            expLivelihoodIncome.style.display = isWorkExperienceYes.checked ? "none" : "block";
            expOrganizationType.style.display = isWorkExperienceYes.checked ? "block" : "none";
            expCompanyName.style.display = isWorkExperienceYes.checked ? "block" : "none";
            expWorkLocation.style.display = isWorkExperienceYes.checked ? "block" : "none";
            expJobPosition.style.display = isWorkExperienceYes.checked ? "block" : "none";
            expStartingDate.style.display = isWorkExperienceYes.checked ? "block" : "none";
            expStillWorkingHere.style.display = isWorkExperienceYes.checked ? "block" : "none";
            expResignedDate.style.display = isWorkExperienceYes.checked && !isStillWorkingHereYes.checked ? "block" : "none";
            expWorkExperienceRemarks.style.display = isWorkExperienceYes.checked ? "block" : "none";
        }
    </script>
@endsection
