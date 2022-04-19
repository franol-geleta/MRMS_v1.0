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
    use App\Models\Members\ServiceSectorDataModel;
    use App\Models\Members\FellowshipDataModel;
@endphp
@extends('layouts.mrmsMainLayout')
@section('myPageTitle', 'የቢሮ አባላትና ኃላፊዎች ማህደር | Staff Members Profile')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('members.index') }}">{{ __('Members') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Staff Members Profile') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-10">
                    <h4 class="page-title">{{ __('የቢሮ አባላትና ኃላፊዎች ማህደር | Staff Members Profile') }}</h4>
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

            {{ $staffMembers->links() }} <hr />
            <div class="row doctor-grid">
                @foreach ($staffMembers as $data => $staffMember)
                    <div class="col-md-3 col-sm-3  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="#"><img src="{{ URL::to($staffMember->photograph) }}" alt="Image"></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route ('members.show', $staffMember->idMember) }}"><i class="fa fa-pencil m-r-5"></i> {{ __('Show') }}</a>
                                </div>
                            </div>
                            <h4 class="doctor-name text-ellipsis" style="font-weight: bolder;">{{ $staffMember->appellation." ".$staffMember->firstName." ".$staffMember->middleName." ".$staffMember->lastName }}</h4>
                            <div class="doc-prof">@if (is_NULL($staffMember->primaryPhone)) {{ __(' - ') }} @else {{ $staffMember->primaryPhone }} @endif {{ _(' / ') }} @if (is_NULL($staffMember->alternatePhone)) {{ __(' - ') }} @else {{ $staffMember->alternatePhone }} @endif</div>
                            <div class="doc-prof">@if (is_NULL($staffMember->email)) {{ __('No Email') }} @else {{ $staffMember->email }} @endif </div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> {{ $staffMember->municipality." city, around ". $staffMember->locationNaming." area." }}
                            </div>
                            <hr />
                            <div  class="user-country">
                                <label class="float-left" style="font-weight: bolder;">{{ __('Service Sector(s)') }}</label><br />
                                @foreach(ServiceSectorDataModel::where([['idMember', $staffMember->idMember], ['hasServiceSector', 'Yes']])->get() as $key => $memberServiceSectorData)
                                    <li class="float-left"> {{ $memberServiceSectorData->roleOnSector." @ ".$memberServiceSectorData->serviceSectorName."." }}</li>
                                @endforeach
                            </div>
                            <br />
                            <div class="user-country">
                                <label class="float-left" style="font-weight: bolder;"><br />{{ __('Fellowship(s)') }}</label><br />
                                @foreach(FellowshipDataModel::where([['idMember', $staffMember->idMember], ['hasFellowship', 'Yes'], ['roleOnFellowship', '!=' , 'Member']])->get() as $key => $memberFellowshipData)
                                    <li class="float-left">{{ $memberFellowshipData->roleOnFellowship." @ ". $memberFellowshipData->fellowshipType." on ".$memberFellowshipData->fellowshipName."." }}</li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr />
            {{ $staffMembers->links() }}
        </div>
    </div>
@endsection
