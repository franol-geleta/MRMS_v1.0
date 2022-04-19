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
@section('myPageTitle', 'የትምህርት ደረጃ ማሳያ | Show Education Level Data')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('members.index') }}">{{ __('Members') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ __('Education Level') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Show Member\'s Education Level') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8 col-6">
                    <h4 class="page-title">{{ __('የአባሉ የትምህርት ደረጃ መረጃ ማሳያ | Show Member\'s Education Level Data') }}</h4>
                </div>
                <div class="col-2 text-right">
                    @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                        <a href="{{ route ('members.educationlevel.edit', $memberEducationLevel->idEducationLevelData) }}" class="btn btn-warning float-right btn-rounded"><i class="fa fa-edit">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('አስተካክል | Edit') }}</strong></a>
                    @endif
                </div>
                <div class="col-2 text-right">
                    <a href="{{ route ('members.show', $memberEducationLevel->idMember) }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('ተመለስ | Back') }}</strong></a>
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
                                <h3 class="user-name m-t-0 mb-0" style="font-weight:700;">{{ $memberEducationLevel->appellation.' '.$memberEducationLevel->firstName.' '.$memberEducationLevel->middleName.' '.$memberEducationLevel->lastName }}</h3><hr />
                            </div>
                        </div>
                        <div class="profile-view offset-1">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="{{ URL::to($memberEducationLevel->photograph) }}" alt="No Image"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-1">
                                        <br />&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-5 profile-info-left">
                                        <br />
                                        @if($memberEducationLevel->status === 'Active')
                                            <span class="col-12 custom-badge status-green">{{ $memberEducationLevel->status }}</span>
                                        @else
                                            <span class="col-12 custom-badge status-red">{{ $memberEducationLevel->status }}</span>
                                        @endif
                                        @php $idPrefix = $memberEducationLevel->prefix; @endphp
                                            @if ($memberEducationLevel->idMember < 10) @php $zeroFillID = '0000000'.$memberEducationLevel->idMember; @endphp
                                            @elseif ($memberEducationLevel->idMember < 100) @php $zeroFillID = '000000'.$memberEducationLevel->idMember; @endphp
                                            @elseif ($memberEducationLevel->idMember < 1000) @php $zeroFillID = '00000'.$memberEducationLevel->idMember; @endphp
                                            @elseif ($memberEducationLevel->idMember < 10000) @php $zeroFillID = '0000'.$memberEducationLevel->idMember; @endphp
                                            @elseif ($memberEducationLevel->idMember < 10000) @php $zeroFillID = '000'.$memberEducationLevel->idMember; @endphp
                                            @elseif ($memberEducationLevel->idMember < 100000) @php $zeroFillID = '00'.$memberEducationLevel->idMember; @endphp
                                            @elseif ($memberEducationLevel->idMember < 1000000) @php $zeroFillID = '0'.$memberEducationLevel->idMember; @endphp
                                            @else @php $zeroFillID = $memberEducationLevel->idMember; @endphp @endif
                                        @php $idSuffix = $memberEducationLevel->suffix; @endphp
                                        <div class="staff-id" style="font-weight: bold; color: green;">{{ __('Member\'s UID :') }}
                                            {{ $idPrefix.$zeroFillID.$idSuffix }}
                                        </div>
                                        <br />
                                        <div class="col-md-12">
                                            <ul class="personal-info">
                                                <br />
                                                <li>
                                                    <span class="title">{{ __('Gender:') }}</span>
                                                    <span class="text"><a href="#">@if ($memberEducationLevel->gender == NULL) {{ __('N/A') }} @else {{ $memberEducationLevel->gender }} @endif</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">{{ __('Civil Status:') }}</span>
                                                    <span class="text"><a href="#">@if ($memberEducationLevel->civilStatus == NULL) {{ __('N/A') }} @else {{ $memberEducationLevel->civilStatus }} @endif</a></span>
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
                                                        <span class="text"><a href="#">@if ($memberEducationLevel->primaryPhone == NULL) {{ __('N/A') }} @else {{ $memberEducationLevel->primaryPhone }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Email:') }}</span>
                                                        <span class="text"><a href="#">@if ($memberEducationLevel->email == NULL) {{ __('N/A') }} @else {{ $memberEducationLevel->email }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Birthday:') }}</span>
                                                        <span class="text"><a href="#">@if ($memberEducationLevel->birthDate == NULL) {{ __('N/A') }} @else {{ $memberEducationLevel->birthDate }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Nationality:') }}</span>
                                                        <span class="text"><a href="#">@if ($memberEducationLevel->nationality == NULL) {{ __('N/A') }} @else {{ $memberEducationLevel->nationality }} @endif</a></span>
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
                        <h4 class="card-title">{{ __('የአባሉ የትምህርት ደረጃ መረጃ | Member\'s Education Level Data') }}</h4>
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control floating" name="hdnMemberIDNum" value="{{ $memberEducationLevel->idMember }}">
                            <div class="row">
                                <div class="col-md-4" id="eduEducationalLevel">
                                    <div class="form-group form-focus select-focus">
                                        <label class="focus-label">{{ __('የትምህርት ደረጃ | Education Level') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                        <select class="select form-control floating" name="cmbEducationalLevel">
                                            <option value="">{{ __('Select Education Level') }}</option>
                                            @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 7)->pluck('list_LookupDataName') as $value)
                                                <option value="@if ($memberEducationLevel->educationLevel === $value) {{ $value }}" selected @else {{ $value }}" @endif>{{ $value }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4" id="eduProfession">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">{{ __('የትምህርት ዘርፍ | Field of Study (Profession)') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                        <input type="text" class="form-control floating" name="txtProfession" placeholder="Qualification" value="{{ $memberEducationLevel->qualification }}">
                                    </div>
                                </div>
                                <div class="col-md-4" id="eduCertificationLevel">
                                    <div class="form-group form-focus select-focus">
                                        <label class="focus-label">{{ __('Level of Certification') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                        <select class="select form-control floating" name="cmbCertificationLevel">
                                            <option value="">{{ __('Select Certification') }}</option>
                                            @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 8)->pluck('list_LookupDataName') as $value)
                                                <option value="@if ($memberEducationLevel->certification === $value) {{ $value }}" selected @else {{ $value }}" @endif>{{ $value }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8" id="eduInistituteName">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">{{ __('የተቋሙ ሥም | Institute Name') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                        <input type="text" class="form-control floating" name="txtInistituteName" placeholder="Name of Univeristy | College | Inistitute | School | Center" value="{{ $memberEducationLevel->institution }}">
                                    </div>
                                </div>
                                <div class="col-md-4" id="eduStartingDate">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">{{ __('የጀመረበት ቀን | Starting Date') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control floating" name="datEducationStartingDate" id="StartingDatePicker" value="{{ $memberEducationLevel->startingDate }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" id="eduStillLearningHere">
                                    <div class="form-group">
                                        <label class="focus-label">{{ __('አሁንም በመማር ላይ? | Still Learning?') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                        @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 26)->pluck('list_LookupDataName') as $value)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rdoStillLearningHere" id="rdoStillLearningHere_{{ $value }}" value="{{ $value }}" @if($memberEducationLevel->stillLearningHere === $value) checked @endif onClick="itemEducationLevelDataVisibility()" required>
                                                <label class="form-check-label" for="rdoStillLearningHere_{{ $value }}">{{ $value }}</label>
                                            </div>  
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-8" id="eduCompletionDate">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">{{ __('የጨረሰበት ቀን | Completion Date') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control floating" name="datCompletionDate" id="CompletionDatePicker" value="{{ $memberEducationLevel->completingDate }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="eduEducationalRemarks">
                                    <div class="form-group">
                                        <label class="focus-label">{{ __('የትምህርት መረጃ ማስታወሻ | Educational Remarks') }}</label>
                                        <textarea cols="30" rows="7" class="form-control" name="txaEducationalRemarks" placeholder="Please leave your comment regarding education here...">{{ $memberEducationLevel->educationLevelRemark }}</textarea>
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
            $('#StartingDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#CompletionDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });
    
        // Radio Button Enabler | Disabler
        function itemEducationLevelDataVisibility (params) {
            // Member's Education Level Information
            var isEducationLevel_Yes = document.getElementById ("rdoEducationLevelInfo_Yes");
            var isStillLearningHere_Yes = document.getElementById ("rdoStillLearningHere_Yes");
            eduEducationalLevel.style.display = isEducationLevel_Yes.checked ? "block" : "none";
            eduInistituteName.style.display = isEducationLevel_Yes.checked ? "block" : "none";
            eduProfession.style.display = isEducationLevel_Yes.checked ? "block" : "none";
            eduCertificationLevel.style.display = isEducationLevel_Yes.checked ? "block" : "none";
            eduStartingDate.style.display = isEducationLevel_Yes.checked ? "block" : "none";
            eduStillLearningHere.style.display = isEducationLevel_Yes.checked ? "block" : "none";
            eduCompletionDate.style.display = isEducationLevel_Yes.checked && !isStillLearningHere_Yes.checked ? "block" : "none";
            eduEducationalRemarks.style.display = isEducationLevel_Yes.checked ? "block" : "none";
        }
    </script>
@endsection
