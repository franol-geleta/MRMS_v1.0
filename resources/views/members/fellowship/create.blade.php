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
    use App\Models\Fellowships\FellowshipsDataModel;
    use Illuminate\Support\Facades\DB;
@endphp
@extends('layouts.mrmsMainLayout')
@section('myPageTitle', 'የህብረት መረጃ መመዝገቢያ | Add Fellowship Data')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('members.index') }}">{{ __('Members') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ __('Fellowship') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Add Member\'s Fellowship Data') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-10 col-6">
                    <h4 class="page-title">{{ __('የአባሉ የህብረት መረጃ መመዝገቢያ | Add Member\'s Fellowship Data') }}</h4>
                </div>
                <div class="col-2 text-right">
                    <a href="{{ route ('members.show', $memberFellowship->idMember) }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('ተመለስ | Back') }}</strong></a>
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
                                <h3 class="user-name m-t-0 mb-0" style="font-weight:700;">{{ $memberFellowship->appellation.' '.$memberFellowship->firstName.' '.$memberFellowship->middleName.' '.$memberFellowship->lastName }}</h3><hr />
                            </div>
                        </div>
                        <div class="profile-view offset-1">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="{{ URL::to($memberFellowship->photograph) }}" alt="No Image"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-1">
                                        <br />&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-5 profile-info-left">
                                        <br />
                                        @if($memberFellowship->status === 'Active')
                                            <span class="col-12 custom-badge status-green">{{ $memberFellowship->status }}</span>
                                        @else
                                            <span class="col-12 custom-badge status-red">{{ $memberFellowship->status }}</span>
                                        @endif
                                        @php $idPrefix = $memberFellowship->prefix; @endphp
                                            @if ($memberFellowship->idMember < 10) @php $zeroFillID = '0000000'.$memberFellowship->idMember; @endphp
                                            @elseif ($memberFellowship->idMember < 100) @php $zeroFillID = '000000'.$memberFellowship->idMember; @endphp
                                            @elseif ($memberFellowship->idMember < 1000) @php $zeroFillID = '00000'.$memberFellowship->idMember; @endphp
                                            @elseif ($memberFellowship->idMember < 10000) @php $zeroFillID = '0000'.$memberFellowship->idMember; @endphp
                                            @elseif ($memberFellowship->idMember < 10000) @php $zeroFillID = '000'.$memberFellowship->idMember; @endphp
                                            @elseif ($memberFellowship->idMember < 100000) @php $zeroFillID = '00'.$memberFellowship->idMember; @endphp
                                            @elseif ($memberFellowship->idMember < 1000000) @php $zeroFillID = '0'.$memberFellowship->idMember; @endphp
                                            @else @php $zeroFillID = $memberFellowship->idMember; @endphp @endif
                                        @php $idSuffix = $memberFellowship->suffix; @endphp
                                        <div class="staff-id" style="font-weight: bold; color: green;">{{ __('Member\'s UID :') }}
                                            {{ $idPrefix.$zeroFillID.$idSuffix }}
                                        </div>
                                        <br />
                                        <div class="col-md-12">
                                            <ul class="personal-info">
                                                <br />
                                                <li>
                                                    <span class="title">{{ __('Gender:') }}</span>
                                                    <span class="text"><a href="#">@if ($memberFellowship->gender == NULL) {{ __('N/A') }} @else {{ $memberFellowship->gender }} @endif</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">{{ __('Civil Status:') }}</span>
                                                    <span class="text"><a href="#">@if ($memberFellowship->civilStatus == NULL) {{ __('N/A') }} @else {{ $memberFellowship->civilStatus }} @endif</a></span>
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
                                                        <span class="text"><a href="#">@if ($memberFellowship->primaryPhone == NULL) {{ __('N/A') }} @else {{ $memberFellowship->primaryPhone }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Email:') }}</span>
                                                        <span class="text"><a href="#">@if ($memberFellowship->email == NULL) {{ __('N/A') }} @else {{ $memberFellowship->email }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Birthday:') }}</span>
                                                        <span class="text"><a href="#">@if ($memberFellowship->birthDate == NULL) {{ __('N/A') }} @else {{ $memberFellowship->birthDate }} @endif</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Nationality:') }}</span>
                                                        <span class="text"><a href="#">@if ($memberFellowship->nationality == NULL) {{ __('N/A') }} @else {{ $memberFellowship->nationality }} @endif</a></span>
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
                        <h4 class="card-title">{{ __('የአባሉ የህብረት መረጃ መመዝገቢያ | Add Member\'s Fellowship Data') }}</h4>
                        <form action="{{ route ('members.fellowship.store', $memberFellowship->idMember) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field ('POST') }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-md-4" id="felFellowshipType">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label">{{ __('የህብረት ዓይነት | Fellowship Type') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                                    <select class="select form-control floating" name="cmbFellowshipType" required>
                                                        <option value="">{{ __('Select Fellowship Type') }}</option>
                                                        @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 13)->pluck('list_LookupDataName') as $value)
                                                            <option value="{{ $value }}">{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-8" id="felFellowshipName">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label">{{ __('የህብረት ሥም | Fellowship Name') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                                    <select class="select form-control floating" name="cmbFellowshipName" required>
                                                        <option value="">{{ __('Select Fellowship Name') }}</option>
                                                        @php $valueFellowships = DB::table('sfgbc_Fellowships')->get(); @endphp
                                                        @foreach($valueFellowships as $valueFellow)
                                                            <option value="{{ $valueFellow->fellowshipType.' | '.$valueFellow->dayHeldOn.' | '.$valueFellow->startTime.' - '.$valueFellow->endTime }} @if ($valueFellow->fellowshipLabel === NULL) {{ '' }} @else {{ ' | '.$valueFellow->fellowshipLabel }} @endif">
                                                                {{ $valueFellow->fellowshipType.' | '.$valueFellow->dayHeldOn.' | '.$valueFellow->startTime.' - '.$valueFellow->endTime }} @if ($valueFellow->fellowshipLabel === NULL) {{ '' }} @else {{ ' | '.$valueFellow->fellowshipLabel }} @endif</option>
                                                        @endforeach
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="felRoleOnFellowship">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label">{{ __('በህብረት ያለው ድርሻ | Role on Fellowship') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                                    <select class="select form-control floating" name="cmbRoleOnFellowship" required>
                                                        <option value="">{{ __('Select Role Type') }}</option>
                                                        @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 11)->pluck('list_LookupDataName') as $value)
                                                            <option value="{{ $value }}">{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="felJoinedDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('የተቀላቀለበት ቀን | Joined Date') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="datFellowshipJoinedDate" id="FellowshipJoinedDatePicker" placeholder="Fellowship Joined Date" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="felJoinedDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('የሚካሄድበት አዳራሽ | Hall Name') }}</label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="txtFellowshipHallName" placeholder="Hall Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="felStillParticipatingHere">
                                                <div class="form-group">
                                                    <label class="display-block">{{ __('አሁን እዚህ ይሳተፋሉ? | Still Participating here?') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                                    @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 26)->pluck('list_LookupDataName') as $value)
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="rdoStillParticipatingHere" id="rdoStillParticipatingHere_{{ $value }}" value="{{ $value }}" onClick="itemFellowshipDataVisibility()" required>
                                                            <label class="form-check-label" for="rdoStillParticipatingHere_{{ $value }}">{{ $value }}</label>
                                                        </div>  
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="felLeftDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('የለቀቀበት ቀን | Lefted Date') }}</label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="datFellowshipLeftDate" id="FellowshipLeftDatePicker" placeholder="Fellowship Left Date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="felLeftReason">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('የለቀቀበት ምክንያት | Reason to Left') }}</label>
                                                    <input type="text" class="form-control floating" name="txtFellowshipLeftReason" placeholder="Reason to left the fellowship">
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="felFellowshipRemarks">
                                                <div class="form-group">
                                                    <label class="focus-label">{{ __('የህብረት ማስታወሻ | Fellowship Remarks') }}</label>
                                                    <textarea cols="30" rows="3" class="form-control" name="txaFellowshipRemarks" placeholder="Please leave your comment regarding the fellowship here..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="hdnMemberID" value="{{ $memberFellowship->idMember }}">
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
            $('#FellowshipJoinedDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#FellowshipLeftDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });
        // Radio Button Enabler | Disabler
        function itemFellowshipDataVisibility (params) {
            // Member's Fellowship Information
            var isStillParticipatingHereYes = document.getElementById ("rdoStillParticipatingHere_Yes");
            
            felLeftDate.style.display = !isStillParticipatingHereYes.checked ? "block" : "none";
            felLeftReason.style.display = !isStillParticipatingHereYes.checked ? "block" : "none";
        }
    </script>
@endsection