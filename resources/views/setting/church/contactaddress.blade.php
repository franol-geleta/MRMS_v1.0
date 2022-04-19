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
@extends('layouts.mrmsSettingLayout')
@section('myPageTitle', 'ማስተካከያ | Setting')
@section('SettingContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('setting.index') }}">{{ __('Setting') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Church Information - Contact & Address') }}</li>
                    </ol>
                </nav>
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
                    <form id="editChurchBrandNameForm" action="{{ route ('setting.church.setcontactaddress', $zContactAddress->idContactAddress) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field ('PUT') }}
                        <h3 class="page-title">{{ __('Church Information Setup [ Contact & Address ]') }}</h3>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <label>{{ __('Land Line Phone Number 1') }}<span class="text-danger">*</span></label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtLandLinePhone1" value="{{ $zContactAddress->fgbLandLinePhone1 }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <label>{{ __('Land Line Phone Number 2') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtLandLinePhone2" value="{{ $zContactAddress->fgbLandLinePhone2 }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <label>{{ __('Land Line Phone Number 3') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtLandLinePhone3" value="{{ $zContactAddress->fgbLandLinePhone3 }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <label>{{ __('Mobile Phone Number 1') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-mobile-phone"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtMobilePhone1" value="{{ $zContactAddress->fgbMobilePhone1 }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <label>{{ __('Mobile Phone Number 2') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-mobile-phone"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtMobilePhone2" value="{{ $zContactAddress->fgbMobilePhone2 }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <label>{{ __('Mobile Phone Number 3') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-mobile-phone"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtMobilePhone3" value="{{ $zContactAddress->fgbMobilePhone3 }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <label>{{ __('Fax Mail 1') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-fax"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtFaxMail1" value="{{ $zContactAddress->fgbFaxMail1 }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <label>{{ __('Fax Mail 2') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-fax"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtFaxMail2" value="{{ $zContactAddress->fgbFaxMail2 }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <label>{{ __('Postal Code') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-o"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtPostalCode" value="{{ $zContactAddress->fgbPostalCode }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label>{{ __('Public Email') }}<span class="text-danger">*</span></label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
									</div>
                                    <input class="form-control" type="email" name="milPublicEmail" value="{{ $zContactAddress->fgbPublicEmail }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label>{{ __('Office Email') }}</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
									</div>
                                    <input class="form-control" type="email" name="milOfficeEmail" value="{{ $zContactAddress->fgbOfficeEmail }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label">{!! html_entity_decode('ሀገር <span style="font-weight: bolder; color: RED;">*</span> | Country <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                    <select class="select form-control floating" name="cmbCountry" required>
                                        <option value="">{{ __('Select Country') }}</option>
                                        @foreach(DB::table('sfgbc_Setting_LookupData')->pluck('list_CountryName') as $value)
                                            <option value="@if ($zContactAddress->fgbCountry === $value) {{ $value }}" selected @else {{ $value }}" @endif > {{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label">{!! html_entity_decode('ግዛት <span style="font-weight: bolder; color: RED;">*</span> | Province <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                    <select class="select form-control floating" name="cmbProvince" required>
                                        <option value="">{{ __('Select Province') }}</option>
                                        @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 5)->pluck('list_LookupDataName') as $value)
                                            <option value="@if ($zContactAddress->fgbProvince === $value) {{ $value }}" selected @else {{ $value }}" @endif>{{ $value }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="form-group form-focus">
                                    <label class="focus-label">{{ __('Municipality | City') }} <span class="text-danger">*</span></label>
                                    <input class="form-control floating" type="text" name="txtMunicipality" value="{{ $zContactAddress->fgbMunicipality }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="form-group form-focus">
                                    <label class="focus-label">{{ __('Street Name/Number') }}</label>
                                    <input class="form-control" type="text" name="txtStreetName" value="{{ $zContactAddress->fgbStreetName }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="form-group form-focus">
                                    <label class="focus-label">{{ __('Zone | Awraja') }}</label>
                                    <input class="form-control" type="text" name="txtZone" value="{{ $zContactAddress->fgbZone }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label">{!! html_entity_decode('ክፍለ ከተማ <span style="font-weight: bolder; color: RED;">*</span> | Subcity <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                    <select class="select form-control floating" name="cmbSubcity" required>
                                        <option value="">{{ __('Select Subcity') }}</option>
                                        @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 6)->pluck('list_LookupDataName') as $value)
                                            <option value="@if ($zContactAddress->fgbSubcity === $value) {{ $value }}" selected @else {{ $value }}" @endif>{{ $value }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="form-group form-focus">
                                    <label class="focus-label">{{ __('Woreda') }}<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="txtWoreda" value="{{ $zContactAddress->fgbWoreda }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="form-group form-focus">
                                    <label class="focus-label">{{ __('Kebele') }}</label>
                                    <input class="form-control" type="text" name="txtKebele" value="{{ $zContactAddress->fgbKebele }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="form-group form-focus">
                                    <label class="focus-label">{{ __('Block Number') }}</label>
                                    <input class="form-control" type="text" name="txtBlockNum" value="{{ $zContactAddress->fgbBlockNum }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="form-group form-focus">
                                    <label class="focus-label">{{ __('House Number') }}<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="txtHouseNum" value="{{ $zContactAddress->fgbHouseNum }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label>{{ __('Address | Location Naming') }}<span class="text-danger">*</span></label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-map"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtLocationNaming" value="{{ $zContactAddress->fgbLocationNaming }}" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12 text-center m-t-20">
                                <button class="btn btn-danger submit-btn">{{ __('Save Data') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
