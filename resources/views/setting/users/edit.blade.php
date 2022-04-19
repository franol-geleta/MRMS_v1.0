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
                        <li class="breadcrumb-item"><a href="{{ route ('setting') }}">{{ __('Setting') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Users') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title">{{ __('Edit User') }}</h4>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{ route ('setting.user.account') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-chevron-left">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('Back') }}</strong></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form id="editRoleForm" action="" method="POST">
                        @csrf
                        {{ method_field ('PUT') }}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="gen-label">{{ __('User is NOT Member of the Church') }} <span class="text-danger">*</span></label>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="isUserMember" id="isUserNotMemberYes" value="Yes" class="form-check-input" onclick="itemVisibility ()" required>{{ __('Yes') }}
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="isUserMember" id="isUserNotMemberNo" class="form-check-input" value="No" onclick="itemVisibility ()">{{ __('No') }}
                                    </label>
                                </div>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-sm-6" id="usrFirstName">
                                <div class="form-group">
                                    <label>{{ __('First Name') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6" id="usrLastName">
                                <div class="form-group">
                                    <label>{{ __('Last Name') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6" id="usrGender">
                                <div class="form-group gender-select">
                                    <label class="gen-label">{{ __('Gender:') }} <span class="text-danger">*</span></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" class="form-check-input">{{ __('Male') }}
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" class="form-check-input">{{ __('Female') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6" id="usrPhone">
                                <div class="form-group">
                                    <label>{{ __('Phone') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12" id="usrAvatar">
                                <div class="form-group">
                                    <label>{{ __('Avatar') }} <span class="text-danger">*</span></label>
                                    <div class="profile-upload">
                                        <div class="upload-img">
                                            <img class="inline-block" id="imagePreview" alt="Add User Photo" src="{{ asset ('public/icon/No_Images.jpg') }}">
                                        </div>
                                        <div class="upload-input">
                                            <input type="file" class="form-control" required name="filePhotograph" onchange="profileProfileImagePreview(this)">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6" id="usrMemberID">
                                        <div class="form-group">
                                            <label>{{ __('Member ID (If Any)') }}</label>
                                            <div class="cal-icon">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ __('Username') }} <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ __('Email') }} <span class="text-danger">*</span></label>
                                            <input class="form-control" type="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ __('Password') }} <span class="text-danger">*</span></label>
                                            <input class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                            <input class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ __('Access Role') }} <span class="text-danger">*</span></label>
                                            <select class="form-control select">
                                                <option>Administrator</option>
                                                <option>Supervisor</option>
                                                <option>Moderator</option>
                                                <option>Member</option>
                                                <option>Guest</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ __('Access Status') }} <span class="text-danger">*</span></label>
                                            <select class="form-control select">
                                                <option>Active</option>
                                                <option>Suspended</option>
                                                <option>Blocked</option>
                                                <option>Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12"><hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">{{ __('Block') }}</label>
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <input type="checkbox">
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="{{ __('Reason to Block') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">{{ __('Suspend') }}</label>
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <input type="checkbox">
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="{{ __('Reason to Suspend') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-6">
                                        <div class="form-group float-left">
                                            <input id="staff_module" type="checkbox">
                                            <label>{{ __('Block') }} <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group float-left">
                                            <input id="staff_module" type="checkbox">
                                            <label>{{ __('Suspend') }} <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>{{ __('Suspend Reason') }}<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div> --}}
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ __('Suspended Since') }} <span class="text-danger">*</span></label>
                                            <input class="form-control" type="date">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ __('Suspended Until') }} <span class="text-danger">*</span></label>
                                            <input class="form-control" type="date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('User Remark') }}</label>
                            <textarea class="form-control" rows="7" cols="30" placeholder="Short Biography"></textarea>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-danger submit-btn">{{ __('Save Data') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function itemVisibility (params) {
            // User Account Information
            var isUserMember = document.getElementById ("isUserNotMemberYes");
            usrFirstName.style.display = isUserMember.checked ? "block" : "none";
            usrLastName.style.display = isUserMember.checked ? "block" : "none";
            usrGender.style.display = isUserMember.checked ? "block" : "none";
            usrAvatar.style.display = isUserMember.checked ? "block" : "none";
            usrPhone.style.display = isUserMember.checked ? "block" : "none";
            usrMemberID.style.display = isUserMember.checked ? "none" : "block";
        }

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
    </script>
@endsection
