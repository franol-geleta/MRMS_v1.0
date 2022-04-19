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
@endphp
@extends('layouts.mrmsMainLayout')
@section('myPageTitle', 'የአዲስ አባል መረጃ መመዝገቢያ | New Member Data Registration')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('members.index') }}">{{ __('Members') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Add New Member Data') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title">{{ __('የአዲስ አባል መረጃ መመዝገቢያ | New Member Data Registration') }}</h4>
                </div>
                <div class="col-4 text-right">
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
            <form id="newMemberForm" action="{{ route ('members.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field ('POST') }}
                <div class="card-box">
                    <h3 class="card-title">{{ __('የግል መረጃ | Personal Information') }}</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                                <img class="inline-block" id="imagePreview" alt="Add Member Photo" src="{{ asset ('public/icon/No_Images.jpg') }}">
                                <div class="fileupload btn">
                                    <span class="btn-text">
                                        {!! html_entity_decode('( 5 x 5 )<br />ፎቶ | Photo <span style="font-weight: bolder; color: BLUE;"> *</span>') !!}
                                        </span>
                                    <input class="upload" type="file" required name="filePhotograph" onchange="profileProfileImagePreview(this)" required>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group form-focus select-focus">
                                            <label class="focus-label">{{ __('ማዕረግ') }} <span class="text-danger"> {{ __(' *') }}</span> {{ __(' | Appillation') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                            <select class="select form-control floating" name="cmbAppillation" required>
                                                <option value="">{{ __('Select Appillation') }}</option>
                                                @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 12)->pluck('list_LookupDataName') as $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">{{ __('የአባል ሥም') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | First Name') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                            <input type="text" class="form-control floating" id="txtFirstName" name="txtFirstName" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">{{ __('የአባት ሥም') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Middle Name') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                            <input type="text" class="form-control floating" name="txtMiddleName" placeholder="Middle Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">{{ __('የአያት ሥም') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Last Name') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                            <input type="text" class="form-control floating" name="txtLastName" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">{{ __('የትውልድ ቀን') }}<span class="text-danger"> {{ __(' *') }}</span>{{ _(' | Date of Birth') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                            <div class="cal-icon">
                                                <input class="form-control floating" name="datMemberBirthDate" type="text" id="MemberBirthDatePicker" placeholder="Date of Birth" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-focus select-focus">
                                            <label class="focus-label">{{ __('ፆታ') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Gendar') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                            <select class="select form-control floating" name="cmbMemberGender" required>
                                                <option value="">{{ __('Select Gender') }}</option>
                                                @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 1)->pluck('list_LookupDataName') as $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-focus select-focus">
                                            <label class="focus-label">{{ __('የጋብቻ ሁኔታ') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Civil Status') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                            <select class="select form-control floating" name="cmbCivilStatus" required>
                                                <option value="">{{ __('Select Civil Status') }}</option>
                                                @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 2)->pluck('list_LookupDataName') as $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-focus select-focus">
                                            <label class="focus-label">{{ __('ዜግነት') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Nationality') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                            <select class="select" name="cmbNationality">
                                                <option value="">{{ __('Select Nationality') }}</option>
                                                @foreach(DB::table('sfgbc_Setting_CountryList')->pluck('list_CountryNationality') as $value)
                                                    <option value="@if ("Ethiopian" === $value) {{ $value }}" selected @else {{ $value }}" @endif > {{ $value }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <h3 class="card-title">{{ __('የመኖሪያ አድራሻ መረጃ | Residential Address Information') }}</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">{{ __('ሀገር') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Country') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                <select class="select form-control floating" name="cmbCountry" required>
                                    <option value="">{{ __('Select Country') }}</option>
                                    @foreach(DB::table('sfgbc_Setting_CountryList')->pluck('list_CountryName') as $value)
                                        <option value="@if ("Ethiopia" === $value) {{ $value }}" selected @else {{ $value }}" @endif > {{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">{{ __('ግዛት') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Province') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                <select class="select form-control floating" name="cmbProvince" required>
                                    <option value="">{{ __('Select Province') }}</option>
                                    @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 5)->pluck('list_LookupDataName') as $value)
                                        <option value="@if ("Addis Ababa" === $value) {{ $value }}" selected @else {{ $value }}" @endif > {{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('ከተማ') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Municipality') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                <input type="text" class="form-control floating" name="txtMunicipality" placeholder="Your City | Town..." required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('የመንገድ ሥም/ቁጥር | Street Name/Num.') }}</label>
                                <input type="text" class="form-control floating" name="txtStreetName" placeholder="Street name/number">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('ዞን | Zone') }}</label>
                                <input type="text" class="form-control floating" name="txtZone" placeholder="Your Zone | Ketena">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">{{ __('ክፍለ ከተማ') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Subcity') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                <select class="select form-control floating" name="cmbSubcity" required>
                                    <option value="">{{ __('Select Subcity') }}</option>
                                    @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 6)->pluck('list_LookupDataName') as $value)
                                        <option value="@if ("Gulele" === $value) {{ $value }}" selected @else {{ $value }}" @endif > {{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('ወረዳ') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Woreda') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                <input type="text" class="form-control floating" name="txtWoreda" placeholder="Woreda" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('ቀበሌ | Kebele') }}</label>
                                <input type="text" class="form-control floating" name="txtKebele" placeholder="Kebele">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('ሰፈር | Block') }}</label>
                                <input type="text" class="form-control floating" name="txtBlockMender" placeholder="Your Block | Mender | Sefer">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('የቤት ቁጥር | House No.') }}</label>
                                <input type="text" class="form-control floating" name="txtHouseNum" placeholder="House No.">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('የቦታው ልዩ መጠሪያ ስም') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Location Naming') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                <input type="text" class="form-control floating" name="txtLocationNaming" placeholder="Location | Place Naming" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('ሞባይል (ቀዳሚ)') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Phone (Primary)') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                <div class="cal-icon">
                                    <input class="form-control floating" type="tel" name="telePrimaryMobile" placeholder="Mobile phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('ሞባይል (አማራጭ) | Phone (Alternate)') }}</label>
                                <div class="cal-icon">
                                    <input class="form-control floating" type="tel" name="teleAlternateMobile" placeholder="Mobile phone (Alternate)">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('የቤት ስልክ | Home Telephone') }}</label>
                                <div class="cal-icon">
                                    <input class="form-control floating" type="tel" name="teleHomeTelephone" placeholder="Home landline phone">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('የቢሮ ስልክ | Office Telephone') }}</label>
                                <div class="cal-icon">
                                    <input class="form-control floating" type="tel" name="teleOfficeTelephone" placeholder="Office landline phone">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('ፖስታ ሣ.ቁ. | P.O.Box') }}</label>
                                <input type="text" class="form-control floating" name="txtPostalCode" placeholder="12345 code 6789">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('ኢሜይል | Email') }}</label>
                                <input type="email" class="form-control floating" name="txtEmail" placeholder="username@somedomain.xyz">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="focus-label">{{ __('የአድራሻ ማስታወሻ | Address Remarks') }}</label>
                                <textarea cols="30" rows="3" class="form-control" name="txaAddressRemarks" placeholder="Please leave your comment regarding the member's address here..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <h3 class="card-title">{{ __('የአባልነት መረጃ | Membership Information') }}</h3>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label class="display-block">{{ __('አባል የሆነበት መንገድ') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | How Become Member') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rdoHowBecameMember" id="rdoHowBecameNewBeliever" value="New Beliver" onclick="itemMembershipDataVisibility()" required>
                                    <label class="form-check-label" for="product_active">{{ __('አዲስ አማኝ | New Believer') }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rdoHowBecameMember" id="rdoHowBecameTransfer" value="Transfer" onclick="itemMembershipDataVisibility ()">
                                    <label class="form-check-label" for="product_inactive">{{ __('በዝውውር | Transfer') }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rdoHowBecameMember" id="rdoHowBecameOtherCase" value="Other Case" onclick="itemMembershipDataVisibility ()">
                                    <label class="form-check-label" for="product_inactive">{{ __('ሌላ ምክንያት | Other Case') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5" id="memBelievedDate">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('ያመነበት ቀን') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Believed Date') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                <div class="cal-icon">
                                    <input class="form-control floating" name="datBelievedDate" type="text" id="BelievedDatePicker" placeholder="Believed Date" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" id="memBaptizedDate">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('የተጠመቀበት ቀን') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Baptized Date') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                <div class="cal-icon">
                                    <input class="form-control floating" name="datBaptizedDate" type="text" id="BaptizedDatePicker" placeholder="Baptized Date" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8" id="memPreviousReligion">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">{{ __('የቀድሞ ቤተ-እምነት') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Preveious Denomination') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                <input type="text" class="form-control floating" name="txtPrevDenomination" required placeholder="Preveious Denomination">
                            </div>
                        </div>
                        <div class="col-md-8" id="memWhoThought">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('የድነት ትምህርት ያስተማረው') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Who Thought Doctrine') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                <input type="text" class="form-control floating" name="txtWhoThought" required>
                            </div>
                        </div>
                        <div class="col-md-4" id="memMembershipDate">
                            <div class="form-group form-focus">
                                <label class="focus-label">{{ __('አባል የሆነበት ቀን') }}<span class="text-danger"> {{ __(' *') }}</span>{{ __(' | Membership Date') }}<span class="text-danger"> {{ __(' *') }}</span></label>
                                <input class="form-control floating" name="datMembershipDate" type="text" id="MembershipDatePicker" placeholder="Membership Date" required>
                            </div>
                        </div>
                        <div class="col-md-12" id="memServingKind">
                            <div class="form-group">
                                <label class="focus-label">{{ __('ያገለግል የነበረበት ዘርፍ | In What Kind Was Serving') }}</label>
                                <div class="cal-icon">
                                    <textarea cols="30" rows="3" class="form-control floating" name="txaServingKind" placeholder="Please leave your comment regarding the how member serving here..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" id="memMembershipRemarks">
                            <div class="form-group">
                                <label class="focus-label">{{ __('አባልነትን የተመለከተ ማስታወሻ | Membership Remarks') }}</label>
                                <textarea cols="30" rows="3" class="form-control" name="txaMembershipRemarks" placeholder="Please leave your comment regarding the membership here..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <h3 class="card-title">{{ __('ተጨማሪ መረጃ | Additional Information') }}</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="focus-label">{{ __('የአካል ጉዳት (ካለ) | Disability (If Any)') }}</label>
                                <textarea cols="30" rows="3" class="form-control" name="txaDisability" placeholder="Please leave your comment regarding Disability (If Any) here..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="focus-label">{{ __('አባሉን የተመለከተ ማስታወሻ | Personal Member\'s Remarks') }}</label>
                                <textarea cols="30" rows="10" class="form-control" name="txaMemberRemarks" placeholder="Please leave your comment here..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center m-t-20">
                    <input class="btn btn-success submit-btn" type="submit" value="CREATE MEMBER">
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        // Ethiopian Calender
        $(function() {
            $('#MemberBirthDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#BelievedDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#BaptizedDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#MembershipDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });
    
        // Radio Button Enabler | Disabler
        function itemMembershipDataVisibility (params) {
            // Member's Membership Information
            var isMembershipNewBeliever = document.getElementById ("rdoHowBecameNewBeliever");
            var isMembershipTransfer = document.getElementById ("rdoHowBecameTransfer");
            var isMembershipOtherCase = document.getElementById ("rdoHowBecameOtherCase");

            if (isMembershipNewBeliever.checked) {
                memServingKind.style.display = "none";
            }
            else if (isMembershipTransfer.checked || isMembershipOtherCase.checked) {
                memServingKind.style.display = "block";
            }
        }

        // Preview Member's Profile Picture
        function profileProfileImagePreview (input) {
            var imageFile = $("input[type=file]").get(0).files[0];
            if (imageFile) {
                var fileReader = new FileReader ();
                fileReader.onload = function name (params) {
                    $('#imagePreview').attr("src", fileReader.result);
                }
                fileReader.readAsDataURL(imageFile);
            }
        }

        // function itemFellowshipDataVisibility (params) {
        //     // Member's Fellowship Information
        //     var isFellowshipYes = document.getElementById ("rdoFellowshipInfoYes");
        //     var isStillParticipatingHereYes = document.getElementById ("rdoStillParticipatingHereYes");
            
        //     felFellowshipType.style.display = isFellowshipYes.checked ? "block" : "none";
        //     felFellowshipName.style.display = isFellowshipYes.checked ? "block" : "none";
        //     felRoleOnFellowship.style.display = isFellowshipYes.checked ? "block" : "none";
        //     felJoinedDate.style.display = isFellowshipYes.checked ? "block" : "none";
        //     felStillParticipatingHere.style.display = isFellowshipYes.checked ? "block" : "none";
        //     felFellowshipRemarks.style.display = isFellowshipYes.checked ? "block" : "none";

        //     felLeftDate.style.display = isFellowshipYes.checked && !isStillParticipatingHereYes.checked ? "block" : "none";
        //     felLeftReason.style.display = isFellowshipYes.checked && !isStillParticipatingHereYes.checked ? "block" : "none";
        // }
        // function itemEducationLevelDataVisibility (params) {
        //     // Member's Education Level Information
        //     var isEducationLevelYes = document.getElementById ("rdoEducationalInfoYes");
        //     var isStillLearningHereYes = document.getElementById ("rdoStillLearningHereYes");
        //     eduEducationalLevel.style.display = isEducationLevelYes.checked ? "block" : "none";
        //     eduInistituteName.style.display = isEducationLevelYes.checked ? "block" : "none";
        //     eduProfession.style.display = isEducationLevelYes.checked ? "block" : "none";
        //     eduCertificationLevel.style.display = isEducationLevelYes.checked ? "block" : "none";
        //     eduStartingDate.style.display = isEducationLevelYes.checked ? "block" : "none";
        //     eduStillLearningHere.style.display = isEducationLevelYes.checked ? "block" : "none";
        //     eduCompletionDate.style.display = isEducationLevelYes.checked && !isStillLearningHereYes.checked ? "block" : "none";
        //     eduEducationalRemarks.style.display = isEducationLevelYes.checked ? "block" : "none";
        // }
        // function itemWorkExperienceDataVisibility (params) {            
        //     // Member's Work Experience Information
        //     var isWorkExperienceYes = document.getElementById ("rdoWorkExperienceInfoYes");
        //     var isStillWorkingHereYes = document.getElementById ("rdoStillWorkingHereYes");
        //     expLivelihoodIncome.style.display = isWorkExperienceYes.checked ? "none" : "block";
        //     expOrganizationType.style.display = isWorkExperienceYes.checked ? "block" : "none";
        //     expCompanyName.style.display = isWorkExperienceYes.checked ? "block" : "none";
        //     expWorkLocation.style.display = isWorkExperienceYes.checked ? "block" : "none";
        //     expJobPosition.style.display = isWorkExperienceYes.checked ? "block" : "none";
        //     expStartingDate.style.display = isWorkExperienceYes.checked ? "block" : "none";
        //     expStillWorkingHere.style.display = isWorkExperienceYes.checked ? "block" : "none";
        //     expResignedDate.style.display = isWorkExperienceYes.checked && !isStillWorkingHereYes.checked ? "block" : "none";
        //     expWorkExperienceRemarks.style.display = isWorkExperienceYes.checked ? "block" : "none";
        // }
        // function itemServiceSectorDataVisibility (params) {
        //     // Member's Service Sector Information
        //     var isServiceSectorYes = document.getElementById ("rdoServiceSectorInfoYes");
        //     var isStillServingHereYes = document.getElementById ("rdoStillServingHereYes");

        //     srvServiceSector.style.display = isServiceSectorYes.checked ? "block" : "none";
        //     srvRoleOnServiceSector.style.display = isServiceSectorYes.checked ? "block" : "none";
        //     srvJoinedDate.style.display = isServiceSectorYes.checked ? "block" : "none";
        //     srvStillServingHere.style.display = isServiceSectorYes.checked ? "block" : "none";
        //     srvServiceSectorRemarks.style.display = isServiceSectorYes.checked ? "block" : "none";

        //     srvLeftDate.style.display = isServiceSectorYes.checked && !isStillServingHereYes.checked ? "block" : "none";
        //     srvLeftReason.style.display = isServiceSectorYes.checked && !isStillServingHereYes.checked ? "block" : "none";
        // }
        // function itemFamilyMemberDataVisibility (params) {
        //     // Member's Family Member Information
        //     var isFamilyMemberYes = document.getElementById ("rdoFamilyMemberInfoYes");
        //     famFullName.style.display = isFamilyMemberYes.checked ? "block" : "none";
        //     famGender.style.display = isFamilyMemberYes.checked ? "block" : "none";
        //     famRelationship.style.display = isFamilyMemberYes.checked ? "block" : "none";
        //     famBirthDate.style.display = isFamilyMemberYes.checked ? "block" : "none";
        //     famWorshipingDenomination.style.display = isFamilyMemberYes.checked ? "block" : "none";
        //     famFamilyMemberStatus.style.display = isFamilyMemberYes.checked ? "block" : "none";
        // }
    </script>
@endsection
