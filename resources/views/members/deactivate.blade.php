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
@section('myPageTitle', 'ከአባልነት ማክሰም | Deactivate Membership')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('members.index') }}">{{ __('Members') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Deactivate Membership') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-10 col-6">
                    <h4 class="page-title">{{ __('ከአባልነት ማክሰም | Deactivate Membership') }}</h4>
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
            <div class="card-box">
                <form id="newMemberForm" action="{{ route ('members.transfer', $member->idMember) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field ('PUT') }}
                    <h3 class="card-title">{{ __('የአባል ዝውውር | Member\'s Transfer') }}</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">{!! html_entity_decode('የዝውውር ዓይነት <span style="font-weight: bolder; color: RED;">*</span> | Transfer Type <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                <select class="select form-control floating" name="cmbTransferType" required>
                                    <option value="">{{ __('Select Transfer Type') }}</option>
                                    @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 10)->pluck('list_LookupDataName') as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">{!! html_entity_decode('የተዘዋወረበት ቀን <span style="font-weight: bolder; color: RED;">*</span> | Transfer Date <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                <input type="text" class="form-control floating" name="datTransferDate" id="datTransferDatePicker" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">{!! html_entity_decode('የተዘዋወረበት ቤተክርስቲያን <span style="font-weight: bolder; color: RED;">*</span> | Transfered Church <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control floating" name="txtChurchTransfer" placeholder="Transfered to Church..." required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">{!! html_entity_decode('የተዘዋወረበት ቦታ <span style="font-weight: bolder; color: RED;">*</span> | Relocated Place <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control floating" name="txtTransferLocation" placeholder="Location | Country | Place Transfered to..." required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">{!! html_entity_decode('የዝውውር ደብዳቤ ቁጥር <span style="font-weight: bolder; color: RED;">*</span> | Transfer Letter Number <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control floating" name="txtTransferLetterNum" placeholder="Transfer Letter Number" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="focus-label">{{ __('የዝውውር ማስታወሻ | Transfer Remarks') }}</label>
                                <textarea cols="30" rows="7" class="form-control" name="txaTransferRemarks" placeholder="Please leave your comment regarding Member Transfer here..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="add-more">
                        @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                            <input class="btn btn-primary submit-btn" type="submit" value="{{ __('Save Transfer') }}">
                        @endif
                    </div>
                </form>
            </div>
            <div class="card-box">
                <form id="newMemberForm" action="{{ route ('members.decease', $member->idMember) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field ('PUT') }}
                    <h3 class="card-title">{{ __('ያረፈ አባል | Deceased Member') }}</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">{!! html_entity_decode('ያረፈበት ቀን <span style="font-weight: bolder; color: RED;">*</span> | Deceased Date <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                <input type="text" class="form-control floating" name="datDeceaseDate" id="datDeceaseDatePicker" placeholder="Decease Date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">{!! html_entity_decode('የያረፈበት ምክንያት <span style="font-weight: bolder; color: RED;">*</span> | Deceased Reason <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                <input type="text" class="form-control floating" name="txtDeceaseReason" placeholder="Reason for Decease">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">{!! html_entity_decode('ያሳወቀው ሰው <span style="font-weight: bolder; color: RED;">*</span> | Who Notified <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control floating" name="txtWhoNotified" placeholder="Who Notified Member's Decease" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">{!! html_entity_decode('ያለው ዝምድና <span style="font-weight: bolder; color: RED;">*</span> | Relationship <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                <div class="cal-icon">
                                    <select class="select form-control floating" name="cmbDeceaseRelationship" required>
                                        <option value="">{{ __('Select Relationship') }}</option>
                                        @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 14)->pluck('list_LookupDataName') as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">{!! html_entity_decode('የቀብር ቦታ <span style="font-weight: bolder; color: RED;">*</span> | Funeral Place <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control floating" name="txtFuneralPlace" placeholder="Funeral Place" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">{!! html_entity_decode('የቀብር ቀን <span style="font-weight: bolder; color: RED;">*</span> | Funeral Date <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                <input type="text" class="form-control floating" name="datFuneralDate" id="datFuneralDatePicker" placeholder="Funeral Date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">{!! html_entity_decode('የቀብር ሰዓት <span style="font-weight: bolder; color: RED;">*</span> | Funeral Time <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                <input type="time" class="form-control floating" name="timFuneralTime" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">{!! html_entity_decode('የቀብር ስነ-ሥርዓት አስተባባሪ <span style="font-weight: bolder; color: RED;">*</span> | Funeral Coordinator <span style="font-weight: bolder; color: RED;">*</span>') !!}</label>
                                <select class="select form-control floating" name="cmbFuneralCoordinator" required>
                                    <option value="">{{ __('Select Funeral Coordinator') }}</option>
                                    @foreach(DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 15)->pluck('list_LookupDataName') as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="focus-label">{{ __('የእረፍት ማስታወሻ | Decease Remarks') }}</label>
                                <textarea cols="30" rows="7" class="form-control" name="txaDeceaseRemarks" placeholder="Please leave your comment regarding Deceased Member here..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="add-more">
                        @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                            <input class="btn btn-dark submit-btn" type="submit"  value="{{ __('Save Decease') }}">
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // Ethiopian Calender
        $(function() {
            $('#datTransferDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#datDeceaseDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#datFuneralDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });
    </script>
@endsection
