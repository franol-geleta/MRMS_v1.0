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
@section('myPageTitle', 'የመኖሪያ አድራሻ ማስተካከያ | Edit Residential Address Data')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('members.index') }}">{{ __('Members') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ __('Residential Address') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Member\'s Residential Address') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-10 col-6">
                    <h4 class="page-title">{{ __('የአባሉ የመኖሪያ አድራሻ ማስተካከያ | Edit Member\'s Residential Address Data') }}</h4>
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
                        <h4 class="card-title">{{ __('የአባሉ የመኖሪያ አድራሻ | Member\'s Residential Address') }}</h4>
                        <form action="{{ route ('members.residentialaddress.update', $member->idResidentialAddressData) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field ('PUT') }}
                            <input type="hidden" class="form-control floating" name="hdnMemberIDNum" value="{{ $member->idMember }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label">{!! html_entity_decode('ሀገር <span style="font-weight: bolder; color: RED;">*</span> | Country <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                                    <select class="select form-control floating" name="cmbCountry" required>
                                                        <option value="">{{ __('Select Country') }}</option>

                                                        @foreach(DB::table('sfgbc_Setting_CountryList')->pluck('list_CountryName') as $value)
                                                            <option value="@if ($member->country === $value) {{ $value }}" selected @else {{ $value }}" @endif > {{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label">{!! html_entity_decode('ግዛት <span style="font-weight: bolder; color: RED;">*</span> | Province <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                                    <select class="select form-control floating" name="cmbProvince" required>
                                                        <option value="">{{ __('Select Province') }}</option>
                                                        @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 5)->pluck('list_LookupDataName') as $value)
                                                            <option value="@if ($member->province === $value) {{ $value }}" selected @else {{ $value }}" @endif>{{ $value }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{!! html_entity_decode('ከተማ <span style="font-weight: bolder; color: RED;">*</span> | Municipality <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                                    <input type="text" class="form-control floating" name="txtMunicipality" required placeholder="Your City | Town..." value="{{ $member->municipality }}">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('የመንገድ ሥም/ቁጥር | Street Name/Num.') }}</label>
                                                    <input type="text" class="form-control floating" name="txtStreetName" placeholder="Street name/number" value="{{ $member->streetname }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('ዞን | Zone') }}</label>
                                                    <input type="text" class="form-control floating" name="txtZone" placeholder="Your Zone | Ketena" value="{{ $member->zone }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label">{!! html_entity_decode('ክፍለ ከተማ <span style="font-weight: bolder; color: RED;">*</span> | Subcity <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                                    <select class="select form-control floating" name="cmbSubcity" required>
                                                        <option value="">{{ __('Select Subcity') }}</option>
                                                        @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 6)->pluck('list_LookupDataName') as $value)
                                                            <option value="@if ($member->subcity === $value) {{ $value }}" selected @else {{ $value }}" @endif>{{ $value }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{!! html_entity_decode('ወረዳ <span style="font-weight: bolder; color: RED;">*</span> | Woreda <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                                    <input type="text" class="form-control floating" name="txtWoreda" required placeholder="Woreda" value="{{ $member->woreda }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('ቀበሌ | Kebele') }}</label>
                                                    <input type="text" class="form-control floating" name="txtKebele" placeholder="Kebele" value="{{ $member->kebele }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('ሰፈር | Block') }}</label>
                                                    <input type="text" class="form-control floating" name="txtBlockMender" placeholder="Your Block | Mender | Sefer" value="{{ $member->block }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('የቤት ቁጥር | House No.') }}</label>
                                                    <input type="text" class="form-control floating" name="txtHouseNum" placeholder="House No." value="{{ $member->houseNum }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{!! html_entity_decode('የቦታው ልዩ መጠሪያ ስም <span style="font-weight: bolder; color: RED;">*</span> | Location Naming <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                                    <input type="text" class="form-control floating" name="txtLocationNaming" required placeholder="Location | Place Naming" value="{{ $member->locationNaming }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{!! html_entity_decode('ሞባይል (ቀዳሚ) <span style="font-weight: bolder; color: RED;">*</span> | Mobile (Primary) <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                                    <div class="cal-icon">
                                                        <input class="form-control floating" type="tel" name="telePrimaryMobile" required placeholder="Mobile phone" value="{{ $member->primaryPhone }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('ሞባይል (አማራጭ) | Mobile (Optional)') }}</label>
                                                    <div class="cal-icon">
                                                        <input class="form-control floating" type="tel" name="teleAlternateMobile" placeholder="Mobile phone (additional)" value="{{ $member->alternatePhone }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('የቤት ስልክ | Home Telephone') }}</label>
                                                    <div class="cal-icon">
                                                        <input class="form-control floating" type="tel" name="teleHomeTelephone" placeholder="Home landline phone" value="{{ $member->homeTelephone }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('የቢሮ ስልክ | Office Telephone') }}</label>
                                                    <div class="cal-icon">
                                                        <input class="form-control floating" type="tel" name="teleOfficeTelephone" placeholder="Office landline phone" value="{{ $member->officeTelephone }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('ፖስታ ሣ.ቁ. | P.O.Box') }}</label>
                                                    <input type="text" class="form-control floating" name="txtPostalCode" placeholder="12345 code 6789" value="{{ $member->postCode }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">{{ __('ኢሜይል | Email') }}</label>
                                                    <input type="email" class="form-control floating" name="txtEmail" placeholder="username@somedomain.xyz" value="{{ $member->email }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="focus-label">{{ __('የአድራሻ ማስታወሻ | Address Remarks') }}</label>
                                                    <textarea cols="30" rows="10" class="form-control" name="txaAddressRemarks" placeholder="Please leave your comment regarding the member's address here...">{{ $member->residentialAddressRemark }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center m-t-20">
                                @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                    <input class="btn btn-danger submit-btn" type="submit" value="SAVE CHANGES">
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
