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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Church Information - Brand & Name') }}</li>
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
                    <form id="editChurchBrandNameForm" action="{{ route ('setting.church.setbrandname', $zChurchBrandName->idChurchBrand) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field ('PUT') }}
                        <h3 class="page-title">{{ __('Church Information Setup [ Name & Brand ]') }}</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>{{ __('Church Name (Phonetic)') }} <span class="text-danger">*</span></label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-bank"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtLocalChurchName_amh" value="{{ $zChurchBrandName->fgbLocalChurchName_amh }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label>{{ __('Parent Church Name (Phonetic)') }} </label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-star"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtParentChurchName_amh" value="{{ $zChurchBrandName->fgbParentChurchName_amh }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>{{ __('Church Name') }} <span class="text-danger">*</span></label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-bank"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtLocalChurchName_eng" value="{{ $zChurchBrandName->fgbLocalChurchName_eng }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label>{{ __('Parent Church Name') }} </label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-star"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtParentChurchName_eng" value="{{ $zChurchBrandName->fgbParentChurchName_eng }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">{{ __('Church Logo') }}<span class="text-danger">*</span></label>
                            <div class="col-lg-5">
                                <input class="form-control" type="file" name="fileMainLogo" onchange="mainLogoImagePreview(this)">
                                <input type="hidden" name="oldMainLogo" value="{{ $zChurchBrandName->fgbMainLogo }}">
                                <span class="form-text text-muted">{{ __('Recommended image size is 40px x 40px') }}</span>
                            </div>
                            <div class="col-lg-2">
                                <div class="img-thumbnail float-right"><img src="{{ URL::to($zChurchBrandName->fgbMainLogo) }}" alt="" width="50" height="50"></div>
                            </div>
                            <div class="col-lg-2">
                                <div class="img-thumbnail float-right"><img id="imageLogoPreview" src="" alt="" width="50" height="50"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">{{ __('Church Favicon') }}<span class="text-danger">*</span></label>
                            <div class="col-lg-5">
                                <input class="form-control" type="file" name="fileFavIcon" onchange="favIconImagePreview(this)">
                                <input type="hidden" name="oldFavIcon" value="{{ $zChurchBrandName->fgbFavIcon }}" />
                                <span class="form-text text-muted">{{ __('Recommended image size is 20px x 20px') }}</span>
                            </div>
                            <div class="col-lg-2">
                                <div class="settings-image img-thumbnail float-right"><img src="{{ URL::to($zChurchBrandName->fgbFavIcon) }}" class="img-fluid" width="20" height="20" alt=""></div>
                            </div>
                            <div class="col-lg-2">
                                <div class="settings-image img-thumbnail float-right"><img id="imageFavPreview" src="" width="20" height="20" alt=""></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label>{{ __('Brand Color for Church Name (Phonetic)') }} <span class="text-danger">*</span></label>
                                <div class="form-group input-group colorpicker colorpicker-component" id="cp2">
                                    <div class="input-group-prepend input-group-addon">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-square"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtLocalChurchNameColor_amh" value="{{ $zChurchBrandName->fgbLocalChurchNameColor_amh }}" placeholder="Pick Brand Color">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>{{ __('Brand Color for Church Name') }} <span class="text-danger">*</span></label>
                                <div class="form-group input-group colorpicker colorpicker-component" id="cp2">
                                    <div class="input-group-prepend input-group-addon">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-square"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtLocalChurchNameColor_eng" value="{{ $zChurchBrandName->fgbLocalChurchNameColor_eng }}" placeholder="Pick Brand Color">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>{{ __('Brand Color for Parent Church Name') }} <span class="text-danger">*</span></label>
                                <div class="form-group input-group checkbox" id="cp2">
                                    <div class="input-group-prepend input-group-addon">
										<span class="input-group-text" id="basic-addon1"><input type="checkbox" name="chkIsParentChurchName_Checked" value="{{ $zChurchBrandName->fgbIsParentChurchName_Checked }}"></span>
									</div>
                                    <input class="form-control" type="text" name="txtIsParentChurchName_Checked" value="{{-- $zChurchBrandName-> --}}" placeholder="Use Default [ Black ]" disabled>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>{{ __('Slogan (Phonetic)') }} </label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-flag-checkered"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtChurchSloganLabel_amh" value="{{ $zChurchBrandName->fgbChurchSloganLabel_amh }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label>{{ __('Slogan') }} </label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-flag-checkered"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtChurchSloganLabel_eng" value="{{ $zChurchBrandName->fgbChurchSloganLabel_eng }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>{{ __('Pick Brand Color for Slogan (Phonetic)') }} <span class="text-danger">*</span></label>
                                <div class="form-group input-group colorpicker colorpicker-component" id="cp2">
                                    <div class="input-group-prepend input-group-addon">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-square"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtChurchSloganColor_amh" value="{{ $zChurchBrandName->fgbChurchSloganColor_amh }}" placeholder="Pick Brand Color">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>{{ __('Pick Brand Color for Slogan') }} <span class="text-danger">*</span></label>
                                <div class="form-group input-group colorpicker colorpicker-component" id="cp2">
                                    <div class="input-group-prepend input-group-addon">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-square"></i></span>
									</div>
                                    <input class="form-control" type="text" name="txtChurchSloganColor_eng" value="{{ $zChurchBrandName->fgbChurchSloganColor_eng }}" placeholder="Pick Brand Color">
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

    <script type="text/javascript">
        // Color Picker
        $('.colorpicker').colorpicker({});

        // Preview Main Logo Image
        function mainLogoImagePreview (input) {
            var imageFile = $("input[type=file]").get(0).files[0];
            if (imageFile) {
                var fileReader = new FileReader();
                fileReader.onload = function name(params) {
                    $('#imageLogoPreview').attr("src", fileReader.result);
                }
                fileReader.readAsDataURL(imageFile);
            }
        }
        // Preview Fav Icon Image
        function favIconImagePreview (input) {
            var imageFile = $("input[type=file]").get(0).files[0];
            if (imageFile) {
                var fileReader = new FileReader();
                fileReader.onload = function name(params) {
                    $('#imageFavPreview').attr("src", fileReader.result);
                }
                fileReader.readAsDataURL(imageFile);
            }
        }
    </script>
@endsection
