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
@section('myPageTitle', 'የህብረት መረጃ ማስተካከያ | Edit Fellowship\'s Data')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('fellowships.index') }}">{{ __('Fellowships') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Fellowship Data') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title">{{ __('የህብረት መረጃ ማስተካከያ | Edit Fellowship Data') }}</h4>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route ('fellowships.index') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('ተመለስ | Back') }}</strong></a>
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
                <div class="col-lg-10 offset-lg-1">
                    <form id="editFellowshipForm" action="{{ route ('fellowships.update', $fellowship->idFellowship) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field ('PUT') }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-form-label">{{ __('የህብረቱ መለያ | Fellowship ID') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" name="" type="text" value="{{ $fellowship->idFellowship }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12 col-form-label">{{ __('የህብረቱ ዓይነት | Fellowship Type') }}<span class="text-danger">&nbsp;*</span></label>
                                <select class="select" name="cmbFellowshipType">
                                    <option value="">{{ __('Select Fellowship Type') }}</option>
                                    @foreach(DB::table('')->where('list_LookupDataParent', '=', 13)->pluck('list_LookupDataName') as $value)
                                        <option value="@if ($fellowship->fellowshipType === $value) {{ $value }}" selected @else {{ $value }}" @endif>{{ $value }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-5 col-form-label">{{ __('የህብረቱ ስያሜ | Fellowship Label') }}</label>
                                    <input type="text" class="form-control" name="txtFellowshipLabel" value="{{ $fellowship->fellowshipLabel }}" placeholder="የህብረቱ ስያሜ | Fellowship Label">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-form-label">{{ __('የሚካሄድበት ቀን | Fellowship Day Held On') }}<span class="text-danger">&nbsp;*</span></label>
                                    <select class="select" name="cmbFellowshipHeldOn">
                                        <option value="">{{ __('Select Fellowship Type') }}</option>
                                        @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 21)->pluck('list_LookupDataName') as $value)
                                            <option value="@if ($fellowship->dayHeldOn === $value) {{ $value }}" selected @else {{ $value }}" @endif>{{ $value }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-form-label">{{ __('የሚጀምርበት ሰዓት | Starting Time') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" name="timeStartingTime" type="time" value="{{ $fellowship->startTime }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-form-label">{{ __('የሚያበቃበት ሰዓት | Ending Time') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" name="timeEndingTime" type="time" value="{{ $fellowship->endTime }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12 col-form-label">{{ __('ህብረቱ የሚገኝበት ዞን | Fellowship Zone') }}<span class="text-danger">&nbsp;*</span></label>
                                <select class="select" name="cmbFellowshipZone">
                                    <option value="">{{ __('Select Fellowship Local Zone') }}</option>
                                    @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 25)->pluck('list_LookupDataName') as $value)
                                        <option value="@if ($fellowship->fellowshipZone === $value) {{ $value }}" selected @else {{ $value }}" @endif>{{ $value }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-form-label">{{ __('የሚካሄድበት ቤት ባለቤት ስም | Location Owner Name') }}<span class="text-danger">&nbsp;*</span></label>
                                    <div class="cal-icon">
                                        <input type="text" name="txtLocationOwner" class="form-control" value="{{ $fellowship->locationOwner }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-form-label">{{ __('የሚካሄድበት ቦታ ስም | Location Naming') }}<span class="text-danger">&nbsp;*</span></label>
                                    <div class="cal-icon">
                                        <input type="text" name="txtFellowshipLocation" class="form-control" value="{{ $fellowship->locationNaming }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-form-label">{{ __('የተመሰረተበት ቀን | Founded Date') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" name="dateFoundedDate" type="text" value="{{ $fellowship->estabilishedDate }}" id="FellowshipFoundedDatePicker" placeholder="Fellowship Founded Date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12 col-form-label">{{ __('በድጋሚ ተዋቅሯል | Is Restructured') }}<span class="text-danger">&nbsp;*</span></label>
                                @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 26)->pluck('list_LookupDataName') as $value)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rdoIsRestructured" id="rdoIsRestructured_{{ $value }}" value="{{ $value }}" @if($fellowship->isRestructured === $value) checked @endif>
                                        <label class="form-check-label" for="rdoIsRestructured_{{ $value }}">{{ $value }}</label>
                                    </div>  
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12 col-form-label">{{ __('የተዋቀረበት ዓይነት | Restructure Type') }}<span class="text-danger">&nbsp;*</span></label>
                                <select class="select" name="cmbRestructureType">
                                    <option value="">{{ __('Select Fellowship Type') }}</option>
                                    @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 23)->pluck('list_LookupDataName') as $value)
                                        <option value="@if ($fellowship->restructureType === $value) {{ $value }}" selected @else {{ $value }}" @endif>{{ $value }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-form-label">{{ __('የተዋቀረበት ቀን | Restructure Date') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" name="dateRestructuredDate" type="text" value="{{ $fellowship->restructuredDate }}" id="FellowshipRestructuredDatePicker" placeholder="Fellowship Restructured Date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-form-label">{{ __('የተዋቀረበት ምክንያት | Reason for Restructure') }}<span class="text-danger">&nbsp;*</span></label>
                            <textarea class="form-control" name="txtRestructureReason" rows="7" cols="30">{{ $fellowship->restructureReason }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-form-label">{{ __('ወደ ምን ተዋቀረ | Restructured to') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" name="txtRestructuredTo" type="text" value="{{ $fellowship->restructuredToFellowship }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12 col-form-label">{{ __('የህብረቱ ሁኔታ | Fellowship Status') }}<span class="text-danger">&nbsp;*</span></label>
                                @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 27)->pluck('list_LookupDataName') as $value)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rdoFellowshipStatus" id="rdoFellowshipStatus_{{ $value }}" value="{{ $value }}" @if($fellowship->fellowshipStatus === $value) checked @endif>
                                        <label class="form-check-label" for="rdoFellowshipStatus_{{ $value }}">{{ $value }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-form-label">{{ __('የህብረቱ ማስታወሻ | Fellowship Remark') }}<span class="text-danger">&nbsp;*</span></label>
                            <textarea class="form-control" name="txaFellowshipRemark" rows="12" cols="30">{{ $fellowship->fellowshipRemark }}</textarea>
                        </div>
                        <div class="m-t-20 text-center">
                            @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                <button class="btn btn-danger submit-btn">{{ __('SAVE CHANGES') }}</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // Ethiopian Calender
        $(function() {
            $('#FellowshipRestructuredDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });

        // Radio Button Enabler | Disabler
        function itemEducationLevelDataVisibility (params) {
            // Member's Education Level Information
            var isStillLearningHere_Yes = document.getElementById ("rdoStillLearningHere_Yes");
            eduCompletionDate.style.display =  !isStillLearningHere_Yes.checked ? "block" : "none";
        }
    </script>
@endsection