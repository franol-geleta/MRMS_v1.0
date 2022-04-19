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
@section('myPageTitle', 'የአገልግሎት ዘርፍ መረጃ ማሳያ | Show Service Sector\'s Data')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('servicesectors.index') }}">{{ __('Service Sectors') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Show Service Sector Data') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="page-title">{{ __('የአገልግሎት ዘርፉ መረጃ ማሳያ | Show Service Sectors\'s Data') }}</h4>
                </div>
                <div class="col-3 text-right">
                    @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                        <a href="{{ route ('servicesectors.edit', $servicesector->idServiceSector) }}" class="btn btn-warning float-right btn-rounded"><i class="fa fa-edit">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('አስተካክል | Edit') }}</strong></a>
                    @endif
                </div>
                <div class="col-3 text-right">
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
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('የአገልግሎት ዘርፉ መለያ | Service Sector ID') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $servicesector->idServiceSector }}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('የተመሰረተበት ቀን | Founded Date') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $servicesector->estabilishedDate }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('የአገልግሎት ዘርፉ ዓይነት | Service Sector Type') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $servicesector->serviceSectorType }}">
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="col-md-12 col-form-label">{{ __('የአገልግሎት ዘርፉ ማብራሪያ | Service Sector Description') }}<span class="text-danger">&nbsp;*</span></label>
                            <textarea class="richTextContent form-control" rows="12" cols="30" disabled>{{ $servicesector->description }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('በድጋሚ ተዋቅሯል | Is Restructured') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $servicesector->isRestructured }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('የተዋቀረበት ዓይነት | Restructure Type') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $servicesector->restructureType }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('የተዋቀረበት ቀን | Restructure Date') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $servicesector->restructureDate }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-10 col-form-label">{{ __('ወደ ምን ተዋቀረ | Restructured to') }}<span class="text-danger">&nbsp;*</span></label>
                            <input class="form-control" type="text" value="{{ $servicesector->restructuredToServiceSector }}">
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-form-label">{{ __('የተዋቀረበት ምክንያት | Reason for Restructure') }}<span class="text-danger">&nbsp;*</span></label>
                            <textarea class="form-control" rows="7" cols="30">{{ $servicesector->restructureReason }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label">{{ __('የአገልግሎት ዘርፉ ሁኔታ | Fellowship Status') }}<span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="{{ $servicesector->sectorStatus }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-form-label">{{ __('የአገልግሎት ዘርፉ ማስታወሻ | Fellowship Remark') }}<span class="text-danger">&nbsp;*</span></label>
                            <textarea class="form-control" rows="12" cols="30">{{ $servicesector->serviceSectorRemark }}</textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // Simple Rich Text Editor
        $('.richTextContent').richText();
    </script>
@endsection