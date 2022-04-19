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
    use App\Models\Members\EducationLevelDataModel;
    use App\Models\Members\WorkExperienceDataModel;
    use App\Models\Members\FamilyMemberDataModel;
    use App\Models\Members\ServiceSectorDataModel;
    use App\Models\Members\FellowshipDataModel;
    use App\Models\Members\TransferedDataModel;
    use App\Models\Members\DeceasedDataModel;
@endphp
@extends('layouts.mrmsMainLayout')
@section('myPageTitle', 'የአባሉ ግለ ማህደር | Member\'s Profile')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('members.index') }}">{{ __('Members') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Member\'s Profile') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-10 col-6">
                    <h4 class="page-title">{{ __('የአባሉ ግለ ማህደር | Member\'s Profile') }}</h4>
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
                            <div class="offset-1 col-md-8 personal-info">
                                <h3 class="user-name m-t-0 mb-0" style="font-weight:700;">{{ $member->appellation.' '.$member->firstName.' '.$member->middleName.' '.$member->lastName }}
                                @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                    <span class="text">
                                        <a data-toggle="tooltip" onClick="return confirm('Are you SURE to EDIT this member\'s Personal Information data?')" data-placement="right" title="Edit Member's Personal Data" href="{{ route ('members.edit', $member->idMember) }}" class="text-right fa fa-pencil btn-sm btn btn-outline"></a>
                                    </span>
                                @endif
                                </h3><hr />
                            </div>
                            <div class="col-sm-3 col-6 text-right m-b-30">
                                @if ($member->idResidentialAddressData === NULL)
                                    <a data-toggle="tooltip" data-placement="bottom" title="Add Address Data" href="{{ route ('members.residentialaddress.create', $member->idMember) }}" class="btn btn-success btn-rounded" onClick="return confirm('Are you SURE to ADD this member\'s Residential Address data?')"><i class="fa fa-plus"></i> {{ __(' Add') }}</a>&nbsp;&nbsp;&nbsp;
                                @else
                                    <a data-toggle="tooltip" data-placement="bottom" title="Show Address Data" href="@if ($member->idResidentialAddressData === NULL) # @else {{ route ('members.residentialaddress.show', $member->idResidentialAddressData) }} @endif" class="btn btn-success" onClick="return confirm('Are you SURE to View this member\'s Residential Address data?')"><i class="fa fa-desktop"></i>{{ __('') }}</a>&nbsp;&nbsp;&nbsp;
                                    @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Address Data" href="@if ($member->idResidentialAddressData === NULL) # @else {{ route ('members.residentialaddress.edit', $member->idResidentialAddressData) }} @endif" class="btn btn-danger" onClick="return confirm('Are you SURE to EDIT this member\'s Residential Address data?')"><i class="fa fa-edit"></i>{{ __('') }}</a>&nbsp;&nbsp;&nbsp;
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="{{ URL::to($member->photograph) }}" alt="No Image"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            @if($member->status === 'Active')
                                                <span class="col-8 custom-badge status-green">{{ $member->status }}</span>
                                            @else
                                                <span class="col-8 custom-badge status-red">{{ $member->status }}</span>
                                            @endif
                                            <div class="staff-id" style="font-weight: bold; color: green;">{{ __('Member\'s UID :') }}
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
                                                
                                                {{ $idPrefix.$zeroFillID.$idSuffix }}
                                            </div>
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
                                                    <li>
                                                        <span class="title">{{ __('Birthday:') }}</span>
                                                        @php
                                                            // $age = (diffDate (date('Y-m-d') - $member->birthDate));
                                                            // data-toggle="tooltip" data-placement="right" title="{{ $age.' years old.' }}" 
                                                        @endphp
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
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">{{ __('Mobile:') }}</span>
                                                <span class="text"><a href="#">@if ($member->primaryPhone == NULL) {{ __('N/A') }} @else {{ $member->primaryPhone }} @endif</a></span>
                                            </li>
                                            <li>
                                                <span class="title">{{ __('Alternative:') }}</span>
                                                <span class="text"><a href="#">@if ($member->alternatePhone == NULL) {{ __('N/A') }} @else {{ $member->alternatePhone }} @endif</a></span>
                                            </li>
                                            <li>
                                                <span class="title">{{ __('Home:') }}</span>
                                                <span class="text"><a href="#">@if ($member->homeTelephone == NULL) {{ __('N/A') }} @else {{ $member->homeTelephone }} @endif</a></span>
                                            </li>
                                            <li>
                                                <span class="title">{{ __('Office:') }}</span>
                                                <span class="text"><a href="#">@if ($member->officeTelephone == NULL) {{ __('N/A') }} @else {{ $member->officeTelephone }} @endif</a></span>
                                            </li>
                                            <li>
                                                <span class="title">{{ __('Email:') }}</span>
                                                <span class="text"><a href="#">@if ($member->email == NULL) {{ __('N/A') }} @else {{ $member->email }} @endif</a></span>
                                            </li>
                                            <li>
                                                <span class="title">{{ __('Address #1:') }}</span>
                                                <span class="text">
                                                    @if ($member->country == NULL) {{ __('Country N/A') }} @else {{ $member->country }} @endif {{ __(', Province: ') }} @if ($member->province == NULL) {{ __('N/A') }} @else {{ $member->province }} @endif
                                                    {{ __(', City: ') }} @if ($member->municipality == NULL) {{ __('N/A') }} @else {{ $member->municipality }} @endif {{ __(', Subcity: ') }} @if ($member->subcity == NULL) {{ __('N/A') }} @else {{ $member->subcity }} @endif {{ __(', Woreda: ') }} @if ($member->woreda == NULL) {{ __('N/A') }} @else {{ $member->woreda }} @endif {{ __(', Kebele: ') }} @if ($member->kebele == NULL) {{ __('N/A') }} @else {{ $member->kebele }} @endif {{ __(', Block: ') }} @if ($member->block == NULL) {{ __('N/A') }} @else {{ $member->block }} @endif {{ __(', House No: ') }} @if ($member->houseNum == NULL) {{ __('N/A') }} @else {{ $member->houseNum }} @endif
                                                </span>
                                            </li>
                                            <li>
                                                <span class="title">{{ __('Address #2:') }}</span>
                                                <span class="text">
                                                    {{ __('Province: ') }} @if ($member->province == NULL) {{ __('N/A') }} @else {{ $member->province }} @endif {{ __(', Zone: ') }} @if ($member->zone == NULL) {{ __('N/A') }} @else {{ $member->zone }} @endif
                                                    {{ __(', Streetname: ') }} @if ($member->streetname == NULL) {{ __('N/A') }} @else {{ $member->streetname }} @endif {{ __(', Location Naming: ') }} @if ($member->locationNaming == NULL) {{ __('N/A') }} @else {{ $member->locationNaming }} @endif
                                                </span>
                                            </li>
                                            <li>
                                                <span class="title">{{ __('P.O.Box | ZIP:') }}</span>
                                                <span class="text">@if ($member->postCode == NULL) {{ __('N/A') }} @else {{ $member->postCode }} @endif</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-tabs">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item"><a class="nav-link active" href="#about" data-toggle="tab" style="font-weight: bolder;">{{ __('About Me') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#membership" data-toggle="tab" style="font-weight: bolder;">{{ __('Membership Data') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#family" data-toggle="tab" style="font-weight: bolder;">{{ __('Family Member Data') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#fellowship" data-toggle="tab" style="font-weight: bolder;">{{ __('Fellowship Data') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#servicesector" data-toggle="tab" style="font-weight: bolder;">{{ __('Service Sector Data') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#other" data-toggle="tab" style="font-weight: bolder;">{{ __('Other Data') }}</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="about">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <div class="row">
                                        @php $memberEducationLevelData = DB::table('sfgbc_member_EducationLevelData')->where('idMember', $member->idMember)->where('deleted_at', NULL)->count('idMember'); @endphp
                                        <div class="col-sm-4 col-3">
                                            <h4 class="card-title" style="font-weight: bolder;">{{ __('Member\'s Education Level') }}</h4>
                                            <h4 style="font-weight: bolder;">{{ ' ('.$memberEducationLevelData.' Record)' }}</h4>
                                        </div>
                                        <div class="col-sm-8 col-9 text-right m-b-20">
                                            <a href="{{ route ('members.educationlevel.create', $member->idMember) }}" class="btn btn-dark float-right btn-rounded"><i class="fa fa-plus"></i> Add Education Level</a>
                                        </div>
                                    </div>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            @foreach(EducationLevelDataModel::where('idMember', $member->idMember)->get() as $key => $valueEducation)
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    @if($valueEducation->hasEducationLevel === 'Yes')
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a class="name">{{ $valueEducation->institution.'  [ '.$valueEducation->educationLevel.' ] ' }}</a>&nbsp;&nbsp;
                                                                <a data-toggle="tooltip" data-placement="top" title="Show Education Level" href="{{ route ('members.educationlevel.show', $valueEducation->idEducationLevelData) }}" class="fa fa-desktop btn-sm btn btn-outline-success" ></a>
                                                                @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                                                    <a data-toggle="tooltip" data-placement="top" title="Edit Education Level" href="{{ route ('members.educationlevel.edit', $valueEducation->idEducationLevelData) }}" class="fa fa-edit btn-sm btn btn-outline-warning" onClick="return confirm('Are you SURE to Edit this member\'s Educational Information data?')"></a>
                                                                @endif
                                                                @if (Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active')
                                                                    <form class="name" action="{{ route ('members.educationlevel.remove', $valueEducation->idEducationLevelData) }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        {{ method_field ('DELETE') }}
                                                                        <input type="hidden" name="_token" value="{{ csrf_token () }}">
                                                                        <input type="hidden" name="hdnMemberIDNum" value="{{ $member->idMember }}">
                                                                        <button data-toggle="tooltip" data-placement="top" title="Remove Education Level" onClick="return confirm('Are you SURE to DELETE this member\'s Educational Information data?')" 
                                                                        class="fa fa-trash btn-sm btn btn-outline-danger" id="ConfirmDelete"></button>
                                                                    </form>
                                                                @endif
                                                                <div>{{ $valueEducation->certification.' in '.$valueEducation->qualification }}</div>
                                                                <span class="time">{{ $valueEducation->startingDate }} - @if ($valueEducation->stillLearningHere === 'Yes') {{ _('Present') }} @else {{ $valueEducation->completingDate }} @endif</span>
                                                            </div>
                                                        </div>
                                                    @elseif ($valueEducation->hasEducationLevel === 'No' || $valueEducation->hasEducation === NULL)
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a data-toggle="tooltip" data-placement="top" title="Edit Education Level" href="{{ route ('members.educationlevel.edit', $valueEducation->idEducationLevelData) }}" class="fa fa-edit btn-sm btn btn-outline-info"></a>
                                                                <a class="name">{{ __('Education Data Not Available...') }}</a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-box mb-0">
                                    <div class="row">
                                        @php $memberWorkExperienceData = DB::table('sfgbc_member_WorkExperienceData')->where('idMember', $member->idMember)->where('deleted_at', NULL)->count('idMember'); @endphp
                                        <div class="col-sm-4 col-3">
                                            <h4 class="card-title" style="font-weight: bolder;">{{ __('Member\'s Work Experience') }}</h4>
                                            <h4 style="font-weight: bolder;">{{ ' ('.$memberWorkExperienceData.' Record)' }}</h4>
                                        </div>
                                        <div class="col-sm-8 col-9 text-right m-b-20">
                                            <a href="{{ route ('members.workexperience.create', $member->idMember) }}" class="btn btn-dark float-right btn-rounded"><i class="fa fa-plus"></i> Add Work Experience</a>
                                        </div>
                                    </div>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            @foreach(WorkExperienceDataModel::where('idMember', $member->idMember)->get() as $key => $valueExperience)
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    @if ($valueExperience->hasWorkExperience === 'Yes')
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a class="name">{{ $valueExperience->jobPosition.' at '.$valueExperience->organizationName }}</a>&nbsp;&nbsp;&nbsp;
                                                                <a data-toggle="tooltip" data-placement="top" title="Show Work Experience" href="{{ route ('members.workexperience.show', $valueExperience->idWorkExperienceData) }}" class="fa fa-desktop btn-sm btn btn-outline-success" ></a>
                                                                @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                                                    <a data-toggle="tooltip" data-placement="top" title="Edit Work Experience" href="{{ route ('members.workexperience.edit', $valueExperience->idWorkExperienceData) }}" class="fa fa-edit btn-sm btn btn-outline-warning" onClick="return confirm('Are you SURE to Edit this member\'s Work Experience Information data?')"></a>
                                                                @endif
                                                                @if (Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active')
                                                                    <form class="name" action="{{ route ('members.workexperience.remove', $valueExperience->idWorkExperienceData) }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        {{ method_field ('DELETE') }}
                                                                        <input type="hidden" name="_token" value="{{ csrf_token () }}">
                                                                        <input type="hidden" name="hdnMemberIDNum" value="{{ $member->idMember }}">
                                                                        <button data-toggle="tooltip" data-placement="top" title="Remove Work Experience" onClick="return confirm('Are you SURE to DELETE this member\'s Work Experience Information data?')" 
                                                                        class="fa fa-trash btn-sm btn btn-outline-danger" id="ConfirmDelete"></button>
                                                                    </form>
                                                                @endif
                                                                <div>{{ $valueExperience->organizationType }}</div>
                                                                <span class="time">{{ $valueExperience->startingDate }} - @if ($valueExperience->stillWorkingHere === 'Yes') {{ _('Present') }} @else {{ $valueExperience->resignedDate }} @endif</span>
                                                            </div>
                                                        </div>
                                                    @elseif ($valueExperience->hasWorkExperience === 'No')
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a class="name">{{ __('Livelihood Income: ') .$valueExperience->livelihoodIncome }}</a>&nbsp;&nbsp;&nbsp;
                                                                <a data-toggle="tooltip" data-placement="top" title="Show Work Experience" href="{{ route ('members.workexperience.show', $valueExperience->idWorkExperienceData) }}" class="fa fa-desktop btn-sm btn btn-outline-success" ></a>
                                                                @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                                                    <a data-toggle="tooltip" data-placement="top" title="Edit Work Experience" href="{{ route ('members.workexperience.edit', $valueExperience->idWorkExperienceData) }}" class="fa fa-edit btn-sm btn btn-outline-warning" onClick="return confirm('Are you SURE to Edit this member\'s Work Experience Information data?')"></a>
                                                                @endif
                                                                @if (Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active')
                                                                    <form class="name" action="{{ route ('members.workexperience.remove', $valueExperience->idWorkExperienceData) }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        {{ method_field ('DELETE') }}
                                                                        <input type="hidden" name="_token" value="{{ csrf_token () }}">
                                                                        <input type="hidden" name="hdnMemberIDNum" value="{{ $member->idMember }}">
                                                                        <button data-toggle="tooltip" data-placement="top" title="Remove Work Experience" onClick="return confirm('Are you SURE to DELETE this member\'s Work Experience Information data?')" 
                                                                        class="fa fa-trash btn-sm btn btn-outline-danger" id="ConfirmDelete"></button>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a class="name">{{ __('Work Experience Data Not Available...') }}</a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="family">
                        <div class="card-box content">
                            <div class="row">
                                @php $memberFamilyMemberData = DB::table('sfgbc_member_FamilyMemberData')->where('idMember', $member->idMember)->where('deleted_at', NULL)->count('idMember'); @endphp
                                <div class="col-sm-7 col-3">
                                    <h4 class="card-title" style="font-weight: bolder;">Member's Family Member</h4>
                                    <h4 style="font-weight: bolder;">{{ ' ('.$memberFamilyMemberData.' Record)' }}</h4>
                                </div>
                                <div class="col-sm-5 col-9 text-right m-b-20">
                                    <a href="{{ route ('members.familymember.create', $member->idMember) }}" class="btn btn-danger float-right btn-rounded"><i class="fa fa-plus"></i> Add Family Member</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped custom-table">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('No.') }}</th>
                                                    <th style="min-width:300px;">{{ __('Full Name') }}</th>
                                                    <th>{{ __('Gender') }}</th>
                                                    <th>{{ __('Relationship') }}</th>
                                                    <th style="min-width: 100px;">{{ __('Status') }}</th>
                                                    <th style="min-width:300px;">{{ __('Worshiping Denomination') }}</th>
                                                    <th style="min-width: 100px;">{{ __('Birth Date') }}</th>
                                                    <th class="text-right">{{ __('#Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $dataCounter = 0; @endphp
                                                @foreach(FamilyMemberDataModel::where([['idMember', $member->idMember], ['hasFamilyMember', 'Yes']])->get() as $key => $valueFamilyMember)
                                                    <tr>
                                                        <td>{{ ++$dataCounter }}</td>
                                                        <td><h2>{{ $valueFamilyMember->famAppillation.' '.$valueFamilyMember->famFirstName.' '.$valueFamilyMember->famMiddleName.' '.$valueFamilyMember->famLastName }}</h2></td>
                                                        <td>{{ $valueFamilyMember->famGender }}</td>
                                                        <td>{{ $valueFamilyMember->relationship }}</td>
                                                        <td>
                                                            @if($valueFamilyMember->familyStatus === 'Member')
                                                                <span class="custom-badge status-green">{{ $valueFamilyMember->familyStatus }}</span>
                                                            @elseif($valueFamilyMember->familyStatus === 'Believer')
                                                                <span class="custom-badge status-purple">{{ $valueFamilyMember->familyStatus }}</span>
                                                            @else
                                                                <span class="custom-badge status-red">{{ $valueFamilyMember->familyStatus }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $valueFamilyMember->worshipingDenomination }}</td>
                                                        <td>{{ $valueFamilyMember->famBirthDate }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="btn-sm btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="{{ route ('members.familymember.show', $valueFamilyMember->idFamilyMember) }}"><i class="btn-sm btn btn-success fa fa-desktop"></i> {{ __('Show') }}</a>
                                                                    @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                                                        <a class="dropdown-item" href="{{ route ('members.familymember.edit', $valueFamilyMember->idFamilyMember) }}" onclick="return confirm('Are you sure you want to EDIT member\'s DATA???')"><i class="btn-sm btn btn-warning fa fa-edit"></i> {{ __('Edit') }}</a>
                                                                    @endif
                                                                    @if (Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active')
                                                                        <form class="name" action="{{ route ('members.familymember.remove', $valueFamilyMember->idFamilyMember) }}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            {{ method_field ('DELETE') }}
                                                                            <input type="hidden" name="_token" value="{{ csrf_token () }}">
                                                                            <input type="hidden" name="hdnMemberIDNum" value="{{ $member->idMember }}">
                                                                            <button onClick="return confirm('Are you SURE to DELETE this member\'s Family Member Information data?')" class="dropdown-item fa fa-trash btn-sm btn btn-danger" id="ConfirmDelete">{{ __('Delete') }}</button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="fellowship">
                        <div class="card-box content">
                            <div class="row">
                                @php $memberFellowshipData = DB::table('sfgbc_member_FellowshipData')->where('idMember', $member->idMember)->where('deleted_at', NULL)->count('idMember'); @endphp
                                <div class="col-sm-7 col-3">
                                    <h4 class="card-title" style="font-weight: bolder;">Member's Fellowship Participation</h4>
                                    <h4 style="font-weight: bolder;">{{ ' ('.$memberFellowshipData.' Record)' }}</h4>
                                </div>
                                <div class="col-sm-5 col-9 text-right m-b-20">
                                    <a href="{{ route ('members.fellowship.create', $member->idMember) }}" class="btn btn-danger float-right btn-rounded"><i class="fa fa-plus"></i> Add Fellowship Data</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped custom-table">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('No.') }}</th>
                                                    <th style="min-width:400px;">{{ __('Fellowship Name') }}</th>
                                                    <th style="min-width: 200px;">{{ __('Fellowship Type') }}</th>
                                                    <th style="min-width: 200px;">{{ __('Role on Fellowship') }}</th>
                                                    <th style="min-width: 150px;">{{ __('Joined Date') }}</th>
                                                    <th style="min-width: 150px;">{{ __('Hall Name') }}</th>
                                                    <th style="min-width: 400px;">{{ __('Fellowship Remarks') }}</th>
                                                    <th class="text-right">{{ __('#Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $dataCounter = 0; @endphp
                                                @foreach(FellowshipDataModel::where([['idMember', $member->idMember], ['hasFellowship', 'Yes']])->get() as $key => $valueFellowshipData)
                                                    <tr>
                                                        <td>{{ ++$dataCounter }}</td>
                                                        <td><h2>{{ $valueFellowshipData->fellowshipName }}</h2></td>
                                                        <td>{{ $valueFellowshipData->fellowshipType }}</td>
                                                        <td>
                                                            @if($valueFellowshipData->roleOnFellowship === 'Main Leader' || $valueFellowshipData->roleOnFellowship === 'Assistant Leader')
                                                                <span class="custom-badge status-red">{{ $valueFellowshipData->roleOnFellowship }}</span>
                                                            @elseif($valueFellowshipData->roleOnFellowship === 'Chairman' || $valueFellowshipData->roleOnFellowship === 'Vice Chairman' || $valueFellowshipData->roleOnFellowship === 'Secretary' || $valueFellowshipData->roleOnFellowship === 'Accountant' || $valueFellowshipData->roleOnFellowship === 'Cashier')
                                                                <span class="custom-badge status-blue">{{ $valueFellowshipData->roleOnFellowship }}</span>
                                                            @elseif($valueFellowshipData->roleOnFellowship === 'Supervisor' || $valueFellowshipData->roleOnFellowship === 'Representative' || $valueFellowshipData->roleOnFellowship === 'Co-ordinator')
                                                                <span class="custom-badge status-purple">{{ $valueFellowshipData->roleOnFellowship }}</span>
                                                            @else
                                                                <span class="custom-badge status-green">{{ $valueFellowshipData->roleOnFellowship }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $valueFellowshipData->joinedDate }}</td>
                                                        <td>{{ $valueFellowshipData->hallName }}</td>
                                                        <td>{{ Str::of ($valueFellowshipData->fellowRemarks)->substr(0, 50)->append('...') }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="btn-sm btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="{{ route ('members.fellowship.show', $valueFellowshipData->idFellowshipData) }}"><i class="btn-sm btn btn-success fa fa-desktop"></i> {{ __('Show') }}</a>
                                                                    @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                                                        <a class="dropdown-item" href="{{ route ('members.fellowship.edit', $valueFellowshipData->idFellowshipData) }}" onclick="return confirm('Are you sure you want to EDIT member\'s DATA???')"><i class="btn-sm btn btn-warning fa fa-edit"></i> {{ __('Edit') }}</a>
                                                                    @endif
                                                                    @if (Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active')
                                                                        <form class="name" action="{{ route ('members.fellowship.remove', $valueFellowshipData->idFellowshipData) }}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            {{ method_field ('DELETE') }}
                                                                            <input type="hidden" name="_token" value="{{ csrf_token () }}">
                                                                            <input type="hidden" name="hdnMemberIDNum" value="{{ $member->idMember }}">
                                                                            <button onClick="return confirm('Are you SURE to DELETE this member\'s Fellowship Information data?')" class="dropdown-item fa fa-trash btn-sm btn btn-danger" id="ConfirmDelete">{{ __('Delete') }}</button>
                                                                        </form>
                                                                    @endif
                                                                    
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="servicesector">
                        <div class="card-box content">
                            <div class="row">
                                @php $memberServiceSectorData = DB::table('sfgbc_member_ServiceSectorData')->where('idMember', $member->idMember)->where('deleted_at', NULL)->count('idMember'); @endphp
                                <div class="col-sm-7 col-3">
                                    <h4 class="card-title" style="font-weight: bolder;">Member's Service Sector Participation</h4>
                                    <h4 style="font-weight: bolder;">{{ ' ('.$memberServiceSectorData.' Record)' }}</h4>
                                </div>
                                <div class="col-sm-5 col-9 text-right m-b-20">
                                    <a href="{{ route ('members.servicesector.create', $member->idMember) }}" class="btn btn-danger float-right btn-rounded"><i class="fa fa-plus"></i> Add Service Sector</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped custom-table">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('No.') }}</th>
                                                    <th style="min-width:400px;">{{ __('Service Sector Name') }}</th>
                                                    <th style="min-width: 200px;">{{ __('Role on Sector') }}</th>
                                                    <th style="min-width: 150px;">{{ __('Joined Date') }}</th>
                                                    <th style="min-width: 300px;">{{ __('Burden Member Has') }}</th>
                                                    <th style="min-width: 400px;">{{ __('Service Sector Remarks') }}</th>
                                                    <th class="text-right">{{ __('#Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $dataCounter = 0; @endphp
                                                @foreach(ServiceSectorDataModel::where('idMember', $member->idMember)->get() as $key => $valueServiceSector)
                                                    <tr>
                                                        <td>{{ ++$dataCounter }}</td>
                                                        <td><h2>{{ $valueServiceSector->serviceSectorName }}</h2></td>
                                                        <td>
                                                            @if($valueServiceSector->roleOnSector === 'Main Leader' || $valueServiceSector->roleOnSector === 'Assistant Leader')
                                                                <span class="custom-badge status-red">{{ $valueServiceSector->roleOnSector }}</span>
                                                            @elseif($valueServiceSector->roleOnSector === 'Chairman' || $valueServiceSector->roleOnSector === 'Vice Chairman' || $valueServiceSector->roleOnSector === 'Secretary' || $valueServiceSector->roleOnSector === 'Accountant' || $valueServiceSector->roleOnSector === 'Cashier')
                                                                <span class="custom-badge status-blue">{{ $valueServiceSector->roleOnSector }}</span>
                                                            @elseif($valueServiceSector->roleOnSector === 'Supervisor' || $valueServiceSector->roleOnSector === 'Representative' || $valueServiceSector->roleOnSector === 'Co-ordinator')
                                                                <span class="custom-badge status-purple">{{ $valueServiceSector->roleOnSector }}</span>
                                                            @else
                                                                <span class="custom-badge status-green">{{ $valueServiceSector->roleOnSector }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $valueServiceSector->joinedDate }}</td>
                                                        <td>{{ Str::of ($valueServiceSector->burdenDetail)->substr(0, 50)->append('...') }}</td>
                                                        <td>{{ Str::of ($valueServiceSector->sectorRemarks)->substr(0, 50)->append('...') }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="btn-sm btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="{{ route ('members.servicesector.show', $valueServiceSector->idServiceSectorData) }}"><i class="btn-sm btn btn-success fa fa-desktop"></i> {{ __('Show') }}</a>
                                                                    @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                                                        <a class="dropdown-item" href="{{ route ('members.servicesector.edit', $valueServiceSector->idServiceSectorData) }}" onclick="return confirm('Are you sure you want to EDIT member\'s DATA???')"><i class="btn-sm btn btn-warning fa fa-edit"></i> {{ __('Edit') }}</a>
                                                                    @endif
                                                                    @if (Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active')
                                                                        <form class="name" action="{{ route ('members.servicesector.remove', $valueServiceSector->idServiceSectorData) }}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            {{ method_field ('DELETE') }}
                                                                            <input type="hidden" name="_token" value="{{ csrf_token () }}">
                                                                            <input type="hidden" name="hdnMemberIDNum" value="{{ $member->idMember }}">
                                                                            <button onClick="return confirm('Are you SURE to DELETE this member\'s Service Sector Information data?')" class="dropdown-item fa fa-trash btn-sm btn btn-danger" id="ConfirmDelete">{{ __('Delete') }}</button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="membership">
                        <div class="card-box content">
                            <div class="row">
                                <div class="col-sm-8 col-3">
                                    <h4 class="card-title" style="font-weight: bolder;">{{ __('Member\'s Membership Information') }}</h4>
                                </div>
                                <div class="col-sm-4 text-right m-b-20">
                                    @if ($member->idMembershipData === NULL)
                                        <a data-toggle="tooltip" data-placement="bottom" title="Add Membership Data" href="{{ route ('members.membership.create', $member->idMember) }}" class="btn btn-success btn-rounded" onClick="return confirm('Are you SURE to ADD this member\'s Membership data?')"><i class="fa fa-plus"></i>{{ __(' Add') }}</a>&nbsp;&nbsp;&nbsp;
                                    @else
                                        <a data-toggle="tooltip" data-placement="bottom" title="Show  Membership Data" href="@if ($member->idMembershipData === NULL) # @else {{ route ('members.membership.show', $member->idMembershipData) }} @endif" class="btn btn-success" onClick="return confirm('Are you SURE to Show this member\'s Membership data?')"><i class="fa fa-desktop"></i></a>&nbsp;&nbsp;&nbsp;
                                        @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                            <a data-toggle="tooltip" data-placement="bottom" title="Edit  Membership Data" href="@if ($member->idMembershipData === NULL) # @else {{ route ('members.membership.edit', $member->idMembershipData) }} @endif" class="btn btn-danger" onClick="return confirm('Are you SURE to EDIT this member\'s Membership data?')"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="card-box">
                                    <h3 class="card-title">{{ __('Membership Information') }}</h3>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">{{ __('How Became Member') }}</label>
                                                <input type="text" class="form-control floating" name="rdoHowBecameMember" value="{{ $member->howBecameMember }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">{{ __('Previous Denomination') }}</label>
                                                <input type="text" class="form-control floating" name="txtPrevDenomination" value="{{ $member->previousDenomination }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">{{ __('Believed Date') }}</label>
                                                <input type="text" class="form-control floating" name="datBelievedDate" value="{{ $member->believedDate }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">{{ __('Baptized Date') }}</label>
                                                <input type="text" class="form-control floating" name="datBaptizedDate" value="{{ $member->baptizedDate }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">{{ __('Who Thought Doctrine') }}</label>
                                                <input type="text" class="form-control floating" name="txtWhoThought" value="{{ $member->whoThoughtDoctrine }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">{{ __('Membership Date') }}</label>
                                                <input type="text" class="form-control floating" name="datMembershipDate" value="{{ $member->membershipDate }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="focus-label">{{ __('Serving Kind') }}</label>
                                                <textarea class="form-control" name="txaServingKind" disabled>{{ $member->servingKind }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="focus-label">{{ __('Membership Remarks') }}</label>
                                                <textarea cols="30" rows="10" class="form-control" name="txaAddressRemarks" disabled>{{ $member->membershipRemark }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="other">
                        <div class="card-box content">
                            @if ($member->status === 'Inactive')
                                @foreach(TransferedDataModel::where('idMember', $member->idMember)->get() as $key => $transferMember)
                                    <div class="row">
                                        <div class="card-box col-md-12">
                                            <div class="row">
                                                <div class="col-sm-8 col-3">
                                                    <h4 class="card-title" style="font-weight: bolder;">{{ __('Member\'s Transfer Information') }}</h4>
                                                </div>
                                                <div class="col-sm-4 text-right m-b-20">
                                                    <form id="newMemberForm" action="{{ route ('members.deactivated', $member->idMember) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        {{ method_field ('POST') }}
                                                        <input type="hidden" name="htidTransfer" value="{{ $transferMember->idTransfer }}" />
                                                        @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                                            <button data-toggle="tooltip" data-placement="top" title="Edit Transfer Data" class="btn btn-warning float-right fa fa-pencil">{{ __(' Edit') }}</button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">{{ __('Transfer Type') }}</label>
                                                        <input type="text" class="form-control floating" name="txtTransferType" value="{{ $transferMember->transferType }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">{{ __('Transfer Date') }}</label>
                                                        <input type="text" class="form-control floating" name="txtTransferDate" value="{{ $transferMember->transferDate }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">{{ __('Church Transfer To') }}</label>
                                                        <input type="text" class="form-control floating" name="txtChurchTransfer" value="{{ $transferMember->churchTransfer }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">{{ __('Transfer Location') }}</label>
                                                        <input type="text" class="form-control floating" name="txtTransferLocation" value="{{ $transferMember->transferLocation }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">{{ __('Outgoing Transfer Letter Num.') }}</label>
                                                        <input type="text" class="form-control floating" name="txtTransferLetterNum" value="{{ $transferMember->transferLetterNum }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="focus-label">{{ __('Member\'s Transfer Remarks') }}</label>
                                                        <textarea cols="30" rows="7" class="form-control" name="txaTransferRemarks" disabled>{{ $transferMember->transferRemarks }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @foreach(DeceasedDataModel::where('idMember', $member->idMember)->get() as $key => $deceasedMember)
                                    <div class="row">
                                        <div class="card-box col-md-12">
                                            <div class="row">
                                                <div class="col-sm-8 col-3">
                                                    <h4 class="card-title" style="font-weight: bolder;">{{ __('Member\'s Decease Information') }}</h4>
                                                </div>
                                                <div class="col-sm-4 text-right m-b-20">
                                                    <form id="newMemberForm" action="{{ route ('members.deactivated', $member->idMember) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        {{ method_field ('POST') }}
                                                        <input type="hidden" name="hdidDecease" value="{{ $deceasedMember->idDeceasedMemberData }}" />
                                                        @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                                            <button data-toggle="tooltip" data-placement="top" title="Edit Decease Data" class="btn btn-danger float-right fa fa-pencil">{{ __(' Edit') }}</button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">{{ __('Deceased Date') }}</label>
                                                        <input type="text" class="form-control floating" name="txtDeceaseDate" value="{{ $deceasedMember->deceaseDate }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">{{ __('Decease Reason') }}</label>
                                                        <input type="text" class="form-control floating" name="txtDeceaseReason" value="{{ $deceasedMember->deceaseReason }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">{{ __('Who Notified') }}</label>
                                                        <input type="text" class="form-control floating" name="txtWhoNotified" value="{{ $deceasedMember->whoNotified }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">{{ __('Relationship with Deceased') }}</label>
                                                        <input type="text" class="form-control floating" name="txtDeceaseRelationship" value="{{ $deceasedMember->deceaseRelationship }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">{{ __('Funeral Place') }}</label>
                                                        <input type="text" class="form-control floating" name="txtFuneralPlace" value="{{ $deceasedMember->funeralPlace }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">{{ __('Funeral Date') }}</label>
                                                        <input type="text" class="form-control floating" name="txtFuneralDate" value="{{ $deceasedMember->funeralDate }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">{{ __('Funeral Time') }}</label>
                                                        <input type="text" class="form-control floating" name="txtfuneralTime" value="{{ $deceasedMember->funeralTime }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">{{ __('Funeral Coordinator') }}</label>
                                                        <input type="text" class="form-control floating" name="txtFuneralCoordinator" value="{{ $deceasedMember->funeralCoordinator }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="focus-label">{{ __('Member\'s Deceased Remarks') }}</label>
                                                        <textarea cols="30" rows="7" class="form-control" name="txaDeceaseRemarks" disabled>{{ $deceasedMember->deceaseRemarks }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="row">
                                <div class="col-sm-10 col-3">
                                    <h4 class="card-title" style="font-weight: bolder;">{{ __('Member\'s Mecellanious Information') }}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card-box col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="focus-label">{{ __('Disability Type [ If Any ]') }}</label>
                                                <textarea class="form-control" name="txaAddressRemarks" disabled>{{ $member->disabilityType }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="focus-label">{{ __('Residential Address Remarks') }}</label>
                                                <textarea cols="30" rows="3" class="form-control" name="txaAddressRemarks" disabled>{{ $member->residentialAddressRemark }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="focus-label">{{ __('Member\'s Personal Remarks') }}</label>
                                                <textarea cols="30" rows="12" class="form-control" name="txaAddressRemarks" disabled>{{ $member->memberRemark }}</textarea>
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
    </div>
@endsection
