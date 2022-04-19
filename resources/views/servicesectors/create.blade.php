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
@section('myPageTitle', 'አዲስ የአገልግሎት ዘርፍ መመዝገቢያ | New Service Sector Registration')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('servicesectors.index') }}">{{ __('Service Sectors') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Add Service Sector Data') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title">{{ __('አዲስ የአገልግሎት ዘርፍ መመዝገቢያ | New Service Sector Registration') }}</h4>
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
            <form id="newMemberForm" action="{{ route ('servicesectors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field ('POST') }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">{{ __('የአገልግሎት ዘርፉ ዓይነት | Service Sector\'s Type') }}<span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <select class="select" name="cmbServiceSectorType" required> 
                                                <option value="">{{ __('Select Service Sector Type') }}</option>
                                                @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 16)->pluck('list_LookupDataName') as $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">{{ __('የተቋቋመበት ቀን | Founded Date') }}<span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="dateEstabilishedDate" id="SectorEstabilishedDatePicker" placeholder="Service Sector Estabilished Date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">{{ __('የአገልግሎት ዘርፉ ማብራሪያ | Service Sector\'s Description') }}<span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-12">
                                            <textarea rows="50" cols="5" class="richTextContent form-control" name="txaServiceSectorDescription" placeholder="Enter descriptions regarding the Service Sector in detail..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">{{ __('የአገልግሎት ዘርፉ ሁኔታ | Service Sector\'s Status') }}<span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 27)->pluck('list_LookupDataName') as $value)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="rdoSectorStatus" id="rdoSectorStatus_{{ $value }}" value="{{ $value }}">
                                                    <label class="form-check-label" for="rdoSectorStatus_{{ $value }}">{{ $value }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">{{ __('የአገልግሎት ዘርፉ ማስታወሻ | Service Sector\'s Remarks') }}</label>
                                        <div class="col-md-12">
                                            <textarea rows="10" cols="5" class="form-control" name="txaServiceSectorRemark" placeholder="Enter remarks regarding the fellowship..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center m-t-20">
                    <input class="btn btn-danger submit-btn" type="submit" value="CREATE SERVICE SECTOR">
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        // Ethiopian Calender
        $(function() {
            $('#SectorEstabilishedDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
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
