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
@section('myPageTitle', 'የአባላት የማህደር ምስል ክምችት | Members\' Profile Picture Store')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('members.index') }}">{{ __('Members') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Members\' Profile Picture') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-10">
                    <h4 class="page-title">{{ __('የአባላት የማህደር ምስል ክምችት | Members\' Profile Picture Store') }}</h4>
                </div>

                <div class="col-2 text-right">
                    <a href="{{ route ('members.index') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('ተመለስ | Back') }}</strong></a>
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
            
            {{ $members->links() }} <hr />
            <div class="row">
                @foreach ($members as $data => $member)
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 m-b-20">
                        <a href="{{ route ('members.show', $member->idMember) }}">
                            @php $zeroFillID = ""; $idPrefix = ""; $idSuffix = ""; $idPrefix = $member->prefix; @endphp
                                @if ($member->idMember < 10) @php $zeroFillID = '0000000'.$member->idMember; @endphp
                                @elseif ($member->idMember < 100) @php $zeroFillID = '000000'.$member->idMember; @endphp
                                @elseif ($member->idMember < 1000) @php $zeroFillID = '00000'.$member->idMember; @endphp
                                @elseif ($member->idMember < 10000) @php $zeroFillID = '0000'.$member->idMember; @endphp
                                @elseif ($member->idMember < 10000) @php $zeroFillID = '000'.$member->idMember; @endphp
                                @elseif ($member->idMember < 100000) @php $zeroFillID = '00'.$member->idMember; @endphp
                                @elseif ($member->idMember < 1000000) @php $zeroFillID = '0'.$member->idMember; @endphp
                                @else @php $zeroFillID = $member->idMember; @endphp @endif
                            @php $idSuffix = $member->suffix; @endphp
                                                
                            <h5 style="text-align: center;">{{ $idPrefix.$zeroFillID.$idSuffix }}</h5>
                            {{-- <h5 style="text-align: center;">{{ $member->appellation.' '.$member->firstName.' '.$member->middleName.' '.$member->lastName }}</h5> --}}
                            <img data-toggle="tooltip" data-placement="bottom" title="{{ $member->appellation.' '.$member->firstName.' '.$member->middleName.' '.$member->lastName.' || '.$member->gender.' || '.$member->status }}" class="img-thumbnail" src="{{ URL::to($member->photograph) }}" alt="{{ $idPrefix.$zeroFillID.$idSuffix.' | '.$member->appellation.' '.$member->firstName.' '.$member->middleName.' '.$member->lastName.' || '.$member->gender.' || '.$member->status }}">
                        </a>
                    </div>
                @endforeach
            </div>
            <hr />
            {{ $members->links() }}
        </div>
    </div>
@endsection
