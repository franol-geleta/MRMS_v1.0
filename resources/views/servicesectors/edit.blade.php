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
@section('myPageTitle', 'የአገልግሎት ዘርፍ መረጃ ማስተካከያ | Edit Service Sector\'s Data')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('servicesectors.index') }}">{{ __('Service Sectors') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Service Sector Data') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title">{{ __('የአገልግሎት ዘርፍ መረጃ ማስተካከያ | Edit Service Sector Data') }}</h4>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route ('servicesectors.index') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('ተመለስ | Back') }}</strong></a>
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
                    <form id="editFellowshipForm" action="{{ route ('servicesectors.update', $servicesector->idServiceSector) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field ('PUT') }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-form-label">{{ __('የአገልግሎት ዘርፉ መለያ | Service Sector ID') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" name="" type="text" value="{{ $servicesector->idServiceSector }}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-form-label">{{ __('የተመሰረተበት ቀን | Founded Date') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" name="dateEstabilishedDate" type="text" value="{{ $servicesector->estabilishedDate }}" id="SectorEstabilishedDatePicker" placeholder="Service Sector Estabilished Date">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="col-md-12 col-form-label">{{ __('የአገልግሎት ዘርፉ ዓይነት | Service Sector Type') }}<span class="text-danger">&nbsp;*</span></label>
                                <select class="select" name="cmbServiceSectorType">
                                    <option value="">{{ __('Select ServiceSector Type') }}</option>
                                    @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 16)->pluck('list_LookupDataName') as $value)
                                        <option value="@if ($servicesector->serviceSectorType === $value) {{ $value }}" selected @else {{ $value }}" @endif>{{ $value }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-form-label">{{ __('የአገልግሎት ዘርፉ ማብራሪያ | Description Description') }}<span class="text-danger">&nbsp;*</span></label>
                            <textarea class="richTextContent form-control" name="txaServiceSectorDescription" rows="12" cols="30">{{ $servicesector->description }}</textarea>
                            </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-md-12 col-form-label">{{ __('በድጋሚ ተዋቅሯል | Is Restructured') }}<span class="text-danger">&nbsp;*</span></label>
                                @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 26)->pluck('list_LookupDataName') as $value)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rdoIsRestructured" id="rdoIsRestructured_{{ $value }}" value="{{ $value }}" @if($servicesector->isRestructured === $value) checked @endif>
                                        <label class="form-check-label" for="rdoIsRestructured_{{ $value }}">{{ $value }}</label>
                                    </div>  
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12 col-form-label">{{ __('የተዋቀረበት ዓይነት | Restructure Type') }}<span class="text-danger">&nbsp;*</span></label>
                                <select class="select" name="cmbRestructureType">
                                    <option value="">{{ __('Select Restructure Type') }}</option>
                                    @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 23)->pluck('list_LookupDataName') as $value)
                                        <option value="@if ($servicesector->restructureType === $value) {{ $value }}" selected @else {{ $value }}" @endif>{{ $value }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-form-label">{{ __('የተዋቀረበት ቀን | Restructure Date') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" name="dateRestructureDate" type="date" value="{{ $servicesector->restructureDate }}" id="SectorRestructureDatePicker" placeholder="Service Sector Restructure Date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-form-label">{{ __('የተዋቀረበት ምክንያት | Reason for Restructure') }}<span class="text-danger">&nbsp;*</span></label>
                            <textarea class="form-control" name="txtRestructureReason" rows="7" cols="30">{{ $servicesector->restructureReason }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="col-md-12 col-form-label">{{ __('ወደ ምን ተዋቀረ | Restructured to') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" name="txtRestructuredTo" type="text" value="{{ $servicesector->restructuredToServiceSector }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-md-12 col-form-label">{{ __('የአገልግሎት ዘርፉ ሁኔታ | Service Sector Status') }}<span class="text-danger">&nbsp;*</span></label>
                                @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 27)->pluck('list_LookupDataName') as $value)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rdoServiceSectorStatus" id="rdoServiceSectorStatus_{{ $value }}" value="{{ $value }}" @if($servicesector->sectorStatus === $value) checked @endif>
                                        <label class="form-check-label" for="rdoServiceSectorStatus_{{ $value }}">{{ $value }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-form-label">{{ __('የአገልግሎት ዘርፉ ማስታወሻ | Service Sector Remark') }}<span class="text-danger">&nbsp;*</span></label>
                            <textarea class="form-control" name="txaServiceSectorRemark" rows="12" cols="30">{{ $servicesector->serviceSectorRemark }}</textarea>
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
            $('#SectorEstabilishedDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#SectorRestructureDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });

        // Simple Rich Text Editor
        $('.richTextContent').richText();

        // Radio Button Enabler | Disabler
        function itemEducationLevelDataVisibility (params) {
            // Member's Education Level Information
            var isStillLearningHere_Yes = document.getElementById ("rdoStillLearningHere_Yes");
            eduCompletionDate.style.display =  !isStillLearningHere_Yes.checked ? "block" : "none";
        }
    </script>
@endsection