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
@section('myPageTitle', 'የህብረቱ መረጃ ማሳያ | Show Fellowship Data')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('fellowships.index') }}">{{ __('Fellowships') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Show Fellowship Data') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="page-title">{{ __('የህብረቱ መረጃ ማሳያ | Show Fellowship Data') }}</h4>
                </div>
                <div class="col-3 text-right">
                    @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                        <a href="{{ route ('fellowships.edit', $fellowship->idFellowship) }}" class="btn btn-warning float-right btn-rounded"><i class="fa fa-edit">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('አስተካክል | Edit') }}</strong></a>
                    @endif
                </div>
                <div class="col-3 text-right">
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field ('POST') }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('የህብረቱ መለያ | Fellowship ID') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $fellowship->idFellowship }}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('የህብረቱ ዓይነት | Fellowship Type') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $fellowship->fellowshipType }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-5 col-form-label">{{ __('የህብረቱ ስያሜ | Fellowship Label') }}</label>
                                    <input type="text" class="form-control" name="txtFellowshipLabel" value="{{ $fellowship->fellowshipLabel }}" placeholder="የህብረቱ ስያሜ | Fellowship Label">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('የሚካሄድበት ቀን | Fellowship Day Held On') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $fellowship->dayHeldOn }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('የሚጀምርበት ሰዓት | Starting Time') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="time" value="{{ $fellowship->startTime }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('የሚያበቃበት ሰዓት | Ending Time') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="time" value="{{ $fellowship->endTime }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('ህብረቱ የሚገኝበት ዞን | Fellowship Zone') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $fellowship->fellowshipZone }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('የሚካሄድበት ቤት ባለቤት ስም | Location Owner Name') }}<span class="text-danger">&nbsp;*</span></label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control" value="{{ $fellowship->locationOwner }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group gender-select">
                                    <label class="col-md-10 col-form-label">{{ __('የሚካሄድበት ቦታ ስም | Location Naming') }}<span class="text-danger">&nbsp;*</span></label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control" value="{{ $fellowship->locationNaming }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('የተመሰረተበት ቀን | Founded Date') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $fellowship->estabilishedDate }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('በድጋሚ ተዋቅሯል | Is Restructured') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $fellowship->isRestructured }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('የተዋቀረበት ዓይነት | Restructure Type') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $fellowship->restructureType }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('የተዋቀረበት ቀን | Restructure Date') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $fellowship->restructuredDate }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-form-label">{{ __('የተዋቀረበት ምክንያት | Reason for Restructure') }}<span class="text-danger">&nbsp;*</span></label>
                            <textarea class="form-control" rows="7" cols="30">{{ $fellowship->restructureReason }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('ወደ ምን ተዋቀረ | Restructured to') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $fellowship->restructuredToFellowship }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('የህብረቱ ሁኔታ | Fellowship Status') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $fellowship->fellowshipStatus }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-form-label">{{ __('የህብረቱ ማስታወሻ | Fellowship Remark') }}<span class="text-danger">&nbsp;*</span></label>
                            <textarea class="form-control" rows="12" cols="30">{{ $fellowship->fellowshipRemark }}</textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection