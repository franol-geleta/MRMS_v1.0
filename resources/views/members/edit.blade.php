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
@section('myPageTitle', 'የአባል መረጃ ማስተካከያ | Edit Member\'s Data')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('members.index') }}">{{ __('Members') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Member Data') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="page-title">{{ __('የአባሉ የግል መረጃ ማስተካከያ | Edit Member\'s Personal Data') }}</h4>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <form id="editMemberForm" action="{{ route ('members.update', $member->idMember) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field ('PUT') }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">{{ __('ማዕረግ | Appillation') }}<span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <select class="select" name="cmbAppellation">
                                                <option value="">{{ __('Select Appillation') }}</option>
                                                @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 12)->pluck('list_LookupDataName') as $value)
                                                    <option value="@if ($member->appellation === $value) {{ $value }}" selected @else {{ $value }}" @endif>{{ $value }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">{{ __('የአባል ስም | First Name') }}<span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-sm-7">
                                            <input class="form-control" type="text" name="txtFirstName" value="{{ $member->firstName }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">{{ __('የአባት ስም | Middle Name') }}<span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-sm-7">
                                            <input class="form-control" type="text" name="txtMiddleName" value="{{ $member->middleName }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">{{ __('የአያት ስም | Middle Name') }}<span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-sm-7">
                                            <input class="form-control" type="text" name="txtLastName" value="{{ $member->lastName }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-6 col-form-label">{{ __('ፆታ | Gendar') }}<span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-6">
                                            <select class="select" name="cmbMemberGender">
                                                <option value="">{{ __('Select Gender') }}</option>
                                                @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 1)->pluck('list_LookupDataName') as $value)
                                                    <option value="@if ($member->gender === $value) {{ $value }}" selected @else {{ $value }}" @endif>{{ $value }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-6 col-form-label">{{ __('የጋብቻ ሁኔታ | Civil Status') }}<span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-6">
                                            <select class="select" name="cmbCivilStatus">
                                                <option value="">{{ __('Select Civil Status') }}</option>
                                                @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 2)->pluck('list_LookupDataName') as $value)
                                                    <option value="@if ($member->civilStatus === $value) {{ $value }}" selected @else {{ $value }}" @endif>{{ $value }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-6 col-form-label">{{ __('የአባሉ ሁኔታ | Member\'s Status') }}</label>
                                        <div class="col-md-6">
                                            @if($member->status === 'Active')
                                                <span class="col-12 custom-badge status-green">{{ $member->status }}</span>
                                            @else
                                                <span class="col-12 custom-badge status-red">{{ $member->status }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>{{ __('Old Photograph ( 5 x 5 )') }}</label>
                                                <div class="profile-upload">
                                                    <div class="upload-img">
                                                        <img alt="No Member Photo" name="oldMemberProfileImage" src="{{ URL::to($member->photograph) }}">
                                                        <input type="hidden" name="oldMemberProfileImage" value="{{ $member->photograph }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>{{ __('New Photograph ( 5 x 5 )') }}</label>
                                                <div class="profile-upload">
                                                    <div class="upload-img">
                                                        <img id="imagePreview" name="newMemberProfileImage" alt="Add Member Photo" src="{{ asset ('public/icon/No_Images.jpg') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>{{ __('Select New Photograph ( 5 x 5 )') }}<span class="text-danger">&nbsp;*</span></label>
                                                <div class="profile-upload">
                                                    <div class="upload-input">
                                                        <input type="file" class="form-control" name="filePhotograph" onchange="profileProfileImagePreview(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">{{ __('የትውልድ ቀን | Date of Birth') }}<span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-sm-7 cal-icon">
                                            <input type="text" name="datMemberBirthDate" class="form-control" id="MemberBirthDatePicker" value="{{ $member->birthDate }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">{{ __('ዜግነት | Nationality') }}<span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <select class="select" name="cmbNationality">
                                                <option value="">{{ __('Select Nationality') }}</option>
                                                @foreach(DB::table('sfgbc_Setting_CountryList')->pluck('list_CountryNationality') as $value)
                                                    <option value="@if ($member->nationality === $value) {{ $value }}" selected @else {{ $value }}" @endif > {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>{{ __('የአካል ጉዳት (ካለ) | Disability (If Any)') }}</label>
                                        <textarea class="form-control" name="txaDisability">{{ $member->disabilityType }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>{{ __('ማስታወሻ (መግለጫ) | Member\'s Remark') }}</label>
                                        <textarea cols="30" rows="12" class="form-control" name="txaMemberRemark">{{ $member->memberRemark }}</textarea>
                                    </div>
                                </div>
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
    </div>

    <script>
        // Ethiopian Calender
        $(function() {
            $('#MemberBirthDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });

        // Preview Member's Profile Picture
        function profileProfileImagePreview (input) {
            var imageFile = $("input[type=file]").get(0).files[0];
            if (imageFile) {
                var fileReader = new FileReader();
                fileReader.onload = function name(params) {
                    $('#imagePreview').attr("src", fileReader.result);
                }
                fileReader.readAsDataURL(imageFile);
            }
        }
    </script>
@endsection
