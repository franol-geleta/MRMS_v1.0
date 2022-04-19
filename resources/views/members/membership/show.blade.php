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
@section('myPageTitle', 'የአባልነት መረጃ ማሳያ | Show Membership Data')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('members.index') }}">{{ __('Members') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ __('Membership') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Show Member\'s Membership Data') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8 col-6">
                    <h4 class="page-title">{{ __('የአባሉ የአባልነት መረጃ ማሳያ | Show Member\'s Membership Data') }}</h4>
                </div>
                <div class="col-2 text-right">
                    @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                        <a href="{{ route ('members.membership.edit', $member->idMembershipData) }}" class="btn btn-warning float-right btn-rounded"><i class="fa fa-edit">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('አስተካክል | Edit') }}</strong></a>
                    @endif
                </div>
                <div class="col-2 text-right">
                    <a href="{{ route ('members.show', $member->idMember) }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('ተመለስ | Back') }}</strong></a>
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
                                <h3 class="user-name m-t-0 mb-0" style="font-weight:700;">{{ $member->appellation.' '.$member->firstName.' '.$member->middleName.' '.$member->lastName }}</h3><hr />
                            </div>
                        </div>
                        <div class="profile-view offset-1">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="{{ URL::to($member->photograph) }}" alt="No Image"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-1">
                                        <br />&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-5 profile-info-left">
                                        <br />
                                        @if($member->status === 'Active')
                                            <span class="col-12 custom-badge status-green">{{ $member->status }}</span>
                                        @else
                                            <span class="col-12 custom-badge status-red">{{ $member->status }}</span>
                                        @endif
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
                                        <div class="staff-id" style="font-weight: bold; color: green;">{{ __('Member\'s UID :') }}
                                            {{ $idPrefix.$zeroFillID.$idSuffix }}
                                        </div>
                                        <br />
                                        <div class="col-md-12">
                                            <ul class="personal-info">
                                                <br />
                                                <li>
                                                    <span class="title">{{ __('Gender:') }}</span>
                                                    <span class="text"><a href="#">@if ($member->gender == NULL) {{ __('N/A') }} @else {{ $member->gender }} @endif</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">{{ __('Civil Status:') }}</span>
                                                    <span class="text"><a href="#">@if ($member->civilStatus == NULL) {{ __('N/A') }} @else {{ $member->civilStatus }} @endif</a></span>
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
                                                        <span class="text"><a href="#">@if ($member->primaryPhone == NULL) {{ __('N/A') }} @else {{ $member->primaryPhone }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Email:') }}</span>
                                                        <span class="text"><a href="#">@if ($member->email == NULL) {{ __('N/A') }} @else {{ $member->email }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Birthday:') }}</span>
                                                        <span class="text"><a href="#">@if ($member->birthDate == NULL) {{ __('N/A') }} @else {{ $member->birthDate }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Nationality:') }}</span>
                                                        <span class="text"><a href="#">@if ($member->nationality == NULL) {{ __('N/A') }} @else {{ $member->nationality }} @endif</a></span>
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
                        <h3 class="card-title">{{ __('የአባልነት መረጃ | Membership Information') }}</h3>
                        <form action="{{ route ('members.membership.update', $member->idMembershipData) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field ('PUT') }}
                            <input type="hidden" class="form-control floating" name="hdnMemberIDNum" value="{{ $member->idMember }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label class="display-block">{{ __('አባል የሆነበት መንገድ') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | How Become Member') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="rdoHowBecameMember" id="rdoHowBecameNewBeliever" value="New Beliver" onclick="itemMembershipDataVisibility()" @if ($member->howBecameMember === 'New Beliver') checked @endif required>
                                                        <label class="form-check-label" for="product_active">{{ __('አዲስ አማኝ | New Believer') }}</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="rdoHowBecameMember" id="rdoHowBecameTransfer" value="Transfer" onclick="itemMembershipDataVisibility()" @if ($member->howBecameMember === 'Transfer') checked @endif>
                                                        <label class="form-check-label" for="product_inactive">{{ __('በዝውውር | Transfer') }}</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="rdoHowBecameMember" id="rdoHowBecameOtherCase" value="Other Case" onclick="itemMembershipDataVisibility()" @if ($member->howBecameMember === 'Other Case') checked @endif>
                                                        <label class="form-check-label" for="product_inactive">{{ __('ሌላ ምክንያት | Other Case') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5" id="memBelievedDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('ያመነበት ቀን') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Believed Date') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="datBelievedDate" id="BelievedDatePicker" value="{{ $member->believedDate }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="memBaptizedDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('የተጠመቀበት ቀን') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Baptized Date') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="datBaptizedDate" id="BaptizedDatePicker" value="{{ $member->baptizedDate }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8" id="memPreviousReligion">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label">{{ __('የቀድሞ ቤተ-እምነት') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Preveious Denomination') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                                    <input type="text" class="form-control floating" name="txtPrevDenomination" value="{{ $member->previousDenomination }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-8" id="memWhoThought">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('የድነት ትምህርት ያስተማረው') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Who Thought Doctrine') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                                    <input type="text" class="form-control floating" name="txtWhoThought" value="{{ $member->whoThoughtDoctrine }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="memMembershipDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('አባል የሆነበት ቀን') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Membership Date') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                                    <input type="text" class="form-control floating" name="datMembershipDate" id="MembershipDatePicker" value="{{ $member->membershipDate }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="memServingKind">
                                                <div class="form-group">
                                                    <label class="focus-label">{{ __('ያገለግል የነበረበት ዘርፍ | In What Kind Was Serving') }}</label>
                                                    <div class="cal-icon">
                                                        <textarea cols="30" rows="3" class="form-control floating" name="txaServingKind" placeholder="Please leave your comment regarding the how member serving here...">{{ $member->servingKind }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="memMembershipRemarks">
                                                <div class="form-group">
                                                    <label class="focus-label">{{ __('አባልነትን የተመለከተ ማስታወሻ | Membership Remarks') }}</label>
                                                    <textarea cols="30" rows="3" class="form-control" name="txaMembershipRemarks" placeholder="Please leave your comment regarding the membership here...">{{ $member->membershipRemark }}</textarea>
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
            $('#MemberBirthDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#BelievedDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#BaptizedDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#MembershipDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });
    
        // Radio Button Enabler | Disabler
        function itemMembershipDataVisibility (params) {
            // Member's Membership Information
            var isMembershipNewBeliever = document.getElementById ("rdoHowBecameNewBeliever");
            var isMembershipTransfer = document.getElementById ("rdoHowBecameTransfer");
            var isMembershipOtherCase = document.getElementById ("rdoHowBecameOtherCase");

            if (isMembershipNewBeliever.checked) {
                memServingKind.style.display = "none";
            }
            else if (isMembershipTransfer.checked || isMembershipOtherCase.checked) {
                memServingKind.style.display = "block";
            }
        }
    </script>
@endsection
