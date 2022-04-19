<?php
    use App\Models\Members\EducationLevelDataModel;
    use App\Models\Members\WorkExperienceDataModel;
    use App\Models\Members\FamilyMemberDataModel;
    use App\Models\Members\ServiceSectorDataModel;
    use App\Models\Members\FellowshipDataModel;
    use App\Models\Members\TransferedDataModel;
    use App\Models\Members\DeceasedDataModel;
?>

<?php $__env->startSection('myPageTitle', 'የአባሉ ግለ ማህደር | Member\'s Profile'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('members.index')); ?>"><?php echo e(__('Members')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Member\'s Profile')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-10 col-6">
                    <h4 class="page-title"><?php echo e(__('የአባሉ ግለ ማህደር | Member\'s Profile')); ?></h4>
                </div>

                <div class="col-2 text-right">
                    <a href="<?php echo e(route ('members.index')); ?>" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('ተመለስ | Back')); ?></strong></a>
                </div>
            </div>
            <!--	NOTIFICATION MESSAGE	    -->
            <?php if(Session::get('JoshKiyakoo_Success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo html_entity_decode (Session::get('JoshKiyakoo_Success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php elseif(Session::get('JoshKiyakoo_Error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo html_entity_decode (Session::get('JoshKiyakoo_Error')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="offset-1 col-md-8 personal-info">
                                <h3 class="user-name m-t-0 mb-0" style="font-weight:700;"><?php echo e($member->appellation.' '.$member->firstName.' '.$member->middleName.' '.$member->lastName); ?>

                                <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                    <span class="text">
                                        <a data-toggle="tooltip" onClick="return confirm('Are you SURE to EDIT this member\'s Personal Information data?')" data-placement="right" title="Edit Member's Personal Data" href="<?php echo e(route ('members.edit', $member->idMember)); ?>" class="text-right fa fa-pencil btn-sm btn btn-outline"></a>
                                    </span>
                                <?php endif; ?>
                                </h3><hr />
                            </div>
                            <div class="col-sm-3 col-6 text-right m-b-30">
                                <?php if($member->idResidentialAddressData === NULL): ?>
                                    <a data-toggle="tooltip" data-placement="bottom" title="Add Address Data" href="<?php echo e(route ('members.residentialaddress.create', $member->idMember)); ?>" class="btn btn-success btn-rounded" onClick="return confirm('Are you SURE to ADD this member\'s Residential Address data?')"><i class="fa fa-plus"></i> <?php echo e(__(' Add')); ?></a>&nbsp;&nbsp;&nbsp;
                                <?php else: ?>
                                    <a data-toggle="tooltip" data-placement="bottom" title="Show Address Data" href="<?php if($member->idResidentialAddressData === NULL): ?> # <?php else: ?> <?php echo e(route ('members.residentialaddress.show', $member->idResidentialAddressData)); ?> <?php endif; ?>" class="btn btn-success" onClick="return confirm('Are you SURE to View this member\'s Residential Address data?')"><i class="fa fa-desktop"></i><?php echo e(__('')); ?></a>&nbsp;&nbsp;&nbsp;
                                    <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Address Data" href="<?php if($member->idResidentialAddressData === NULL): ?> # <?php else: ?> <?php echo e(route ('members.residentialaddress.edit', $member->idResidentialAddressData)); ?> <?php endif; ?>" class="btn btn-danger" onClick="return confirm('Are you SURE to EDIT this member\'s Residential Address data?')"><i class="fa fa-edit"></i><?php echo e(__('')); ?></a>&nbsp;&nbsp;&nbsp;
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="<?php echo e(URL::to($member->photograph)); ?>" alt="No Image"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <?php if($member->status === 'Active'): ?>
                                                <span class="col-8 custom-badge status-green"><?php echo e($member->status); ?></span>
                                            <?php else: ?>
                                                <span class="col-8 custom-badge status-red"><?php echo e($member->status); ?></span>
                                            <?php endif; ?>
                                            <div class="staff-id" style="font-weight: bold; color: green;"><?php echo e(__('Member\'s UID :')); ?>

                                                <?php $zeroFillID = ""; $idPrefix = ""; $idSuffix = ""; $idPrefix = $member->prefix; ?>
                                                    <?php if($member->idMember < 10): ?> <?php $zeroFillID = '0000000'.$member->idMember; ?>
                                                    <?php elseif($member->idMember < 100): ?> <?php $zeroFillID = '000000'.$member->idMember; ?>
                                                    <?php elseif($member->idMember < 1000): ?> <?php $zeroFillID = '00000'.$member->idMember; ?>
                                                    <?php elseif($member->idMember < 10000): ?> <?php $zeroFillID = '0000'.$member->idMember; ?>
                                                    <?php elseif($member->idMember < 10000): ?> <?php $zeroFillID = '000'.$member->idMember; ?>
                                                    <?php elseif($member->idMember < 100000): ?> <?php $zeroFillID = '00'.$member->idMember; ?>
                                                    <?php elseif($member->idMember < 1000000): ?> <?php $zeroFillID = '0'.$member->idMember; ?>
                                                    <?php else: ?> <?php $zeroFillID = $member->idMember; ?> <?php endif; ?>
                                                <?php $idSuffix = $member->suffix; ?>
                                                
                                                <?php echo e($idPrefix.$zeroFillID.$idSuffix); ?>

                                            </div>
                                            <div class="col-md-12">
                                                <ul class="personal-info">
                                                    <br />
                                                    <li>
                                                        <span class="title"><?php echo e(__('Gender:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($member->gender == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->gender); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Civil Status:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($member->civilStatus == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->civilStatus); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Birthday:')); ?></span>
                                                        <?php
                                                            // $age = (diffDate (date('Y-m-d') - $member->birthDate));
                                                            // data-toggle="tooltip" data-placement="right" title="{{ $age.' years old.' }}" 
                                                        ?>
                                                        <span class="text"><a href="#"><?php if($member->birthDate == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->birthDate); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Nationality:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($member->nationality == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->nationality); ?> <?php endif; ?></a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title"><?php echo e(__('Mobile:')); ?></span>
                                                <span class="text"><a href="#"><?php if($member->primaryPhone == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->primaryPhone); ?> <?php endif; ?></a></span>
                                            </li>
                                            <li>
                                                <span class="title"><?php echo e(__('Alternative:')); ?></span>
                                                <span class="text"><a href="#"><?php if($member->alternatePhone == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->alternatePhone); ?> <?php endif; ?></a></span>
                                            </li>
                                            <li>
                                                <span class="title"><?php echo e(__('Home:')); ?></span>
                                                <span class="text"><a href="#"><?php if($member->homeTelephone == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->homeTelephone); ?> <?php endif; ?></a></span>
                                            </li>
                                            <li>
                                                <span class="title"><?php echo e(__('Office:')); ?></span>
                                                <span class="text"><a href="#"><?php if($member->officeTelephone == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->officeTelephone); ?> <?php endif; ?></a></span>
                                            </li>
                                            <li>
                                                <span class="title"><?php echo e(__('Email:')); ?></span>
                                                <span class="text"><a href="#"><?php if($member->email == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->email); ?> <?php endif; ?></a></span>
                                            </li>
                                            <li>
                                                <span class="title"><?php echo e(__('Address #1:')); ?></span>
                                                <span class="text">
                                                    <?php if($member->country == NULL): ?> <?php echo e(__('Country N/A')); ?> <?php else: ?> <?php echo e($member->country); ?> <?php endif; ?> <?php echo e(__(', Province: ')); ?> <?php if($member->province == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->province); ?> <?php endif; ?>
                                                    <?php echo e(__(', City: ')); ?> <?php if($member->municipality == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->municipality); ?> <?php endif; ?> <?php echo e(__(', Subcity: ')); ?> <?php if($member->subcity == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->subcity); ?> <?php endif; ?> <?php echo e(__(', Woreda: ')); ?> <?php if($member->woreda == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->woreda); ?> <?php endif; ?> <?php echo e(__(', Kebele: ')); ?> <?php if($member->kebele == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->kebele); ?> <?php endif; ?> <?php echo e(__(', Block: ')); ?> <?php if($member->block == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->block); ?> <?php endif; ?> <?php echo e(__(', House No: ')); ?> <?php if($member->houseNum == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->houseNum); ?> <?php endif; ?>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="title"><?php echo e(__('Address #2:')); ?></span>
                                                <span class="text">
                                                    <?php echo e(__('Province: ')); ?> <?php if($member->province == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->province); ?> <?php endif; ?> <?php echo e(__(', Zone: ')); ?> <?php if($member->zone == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->zone); ?> <?php endif; ?>
                                                    <?php echo e(__(', Streetname: ')); ?> <?php if($member->streetname == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->streetname); ?> <?php endif; ?> <?php echo e(__(', Location Naming: ')); ?> <?php if($member->locationNaming == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->locationNaming); ?> <?php endif; ?>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="title"><?php echo e(__('P.O.Box | ZIP:')); ?></span>
                                                <span class="text"><?php if($member->postCode == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->postCode); ?> <?php endif; ?></span>
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
                    <li class="nav-item"><a class="nav-link active" href="#about" data-toggle="tab" style="font-weight: bolder;"><?php echo e(__('About Me')); ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#membership" data-toggle="tab" style="font-weight: bolder;"><?php echo e(__('Membership Data')); ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#family" data-toggle="tab" style="font-weight: bolder;"><?php echo e(__('Family Member Data')); ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#fellowship" data-toggle="tab" style="font-weight: bolder;"><?php echo e(__('Fellowship Data')); ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#servicesector" data-toggle="tab" style="font-weight: bolder;"><?php echo e(__('Service Sector Data')); ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#other" data-toggle="tab" style="font-weight: bolder;"><?php echo e(__('Other Data')); ?></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="about">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <div class="row">
                                        <?php $memberEducationLevelData = DB::table('sfgbc_member_EducationLevelData')->where('idMember', $member->idMember)->where('deleted_at', NULL)->count('idMember'); ?>
                                        <div class="col-sm-4 col-3">
                                            <h4 class="card-title" style="font-weight: bolder;"><?php echo e(__('Member\'s Education Level')); ?></h4>
                                            <h4 style="font-weight: bolder;"><?php echo e(' ('.$memberEducationLevelData.' Record)'); ?></h4>
                                        </div>
                                        <div class="col-sm-8 col-9 text-right m-b-20">
                                            <a href="<?php echo e(route ('members.educationlevel.create', $member->idMember)); ?>" class="btn btn-dark float-right btn-rounded"><i class="fa fa-plus"></i> Add Education Level</a>
                                        </div>
                                    </div>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <?php $__currentLoopData = EducationLevelDataModel::where('idMember', $member->idMember)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $valueEducation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <?php if($valueEducation->hasEducationLevel === 'Yes'): ?>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a class="name"><?php echo e($valueEducation->institution.'  [ '.$valueEducation->educationLevel.' ] '); ?></a>&nbsp;&nbsp;
                                                                <a data-toggle="tooltip" data-placement="top" title="Show Education Level" href="<?php echo e(route ('members.educationlevel.show', $valueEducation->idEducationLevelData)); ?>" class="fa fa-desktop btn-sm btn btn-outline-success" ></a>
                                                                <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                                                    <a data-toggle="tooltip" data-placement="top" title="Edit Education Level" href="<?php echo e(route ('members.educationlevel.edit', $valueEducation->idEducationLevelData)); ?>" class="fa fa-edit btn-sm btn btn-outline-warning" onClick="return confirm('Are you SURE to Edit this member\'s Educational Information data?')"></a>
                                                                <?php endif; ?>
                                                                <?php if(Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active'): ?>
                                                                    <form class="name" action="<?php echo e(route ('members.educationlevel.remove', $valueEducation->idEducationLevelData)); ?>" method="POST" enctype="multipart/form-data">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo e(method_field ('DELETE')); ?>

                                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token ()); ?>">
                                                                        <input type="hidden" name="hdnMemberIDNum" value="<?php echo e($member->idMember); ?>">
                                                                        <button data-toggle="tooltip" data-placement="top" title="Remove Education Level" onClick="return confirm('Are you SURE to DELETE this member\'s Educational Information data?')" 
                                                                        class="fa fa-trash btn-sm btn btn-outline-danger" id="ConfirmDelete"></button>
                                                                    </form>
                                                                <?php endif; ?>
                                                                <div><?php echo e($valueEducation->certification.' in '.$valueEducation->qualification); ?></div>
                                                                <span class="time"><?php echo e($valueEducation->startingDate); ?> - <?php if($valueEducation->stillLearningHere === 'Yes'): ?> <?php echo e(_('Present')); ?> <?php else: ?> <?php echo e($valueEducation->completingDate); ?> <?php endif; ?></span>
                                                            </div>
                                                        </div>
                                                    <?php elseif($valueEducation->hasEducationLevel === 'No' || $valueEducation->hasEducation === NULL): ?>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a data-toggle="tooltip" data-placement="top" title="Edit Education Level" href="<?php echo e(route ('members.educationlevel.edit', $valueEducation->idEducationLevelData)); ?>" class="fa fa-edit btn-sm btn btn-outline-info"></a>
                                                                <a class="name"><?php echo e(__('Education Data Not Available...')); ?></a>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-box mb-0">
                                    <div class="row">
                                        <?php $memberWorkExperienceData = DB::table('sfgbc_member_WorkExperienceData')->where('idMember', $member->idMember)->where('deleted_at', NULL)->count('idMember'); ?>
                                        <div class="col-sm-4 col-3">
                                            <h4 class="card-title" style="font-weight: bolder;"><?php echo e(__('Member\'s Work Experience')); ?></h4>
                                            <h4 style="font-weight: bolder;"><?php echo e(' ('.$memberWorkExperienceData.' Record)'); ?></h4>
                                        </div>
                                        <div class="col-sm-8 col-9 text-right m-b-20">
                                            <a href="<?php echo e(route ('members.workexperience.create', $member->idMember)); ?>" class="btn btn-dark float-right btn-rounded"><i class="fa fa-plus"></i> Add Work Experience</a>
                                        </div>
                                    </div>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <?php $__currentLoopData = WorkExperienceDataModel::where('idMember', $member->idMember)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $valueExperience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <?php if($valueExperience->hasWorkExperience === 'Yes'): ?>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a class="name"><?php echo e($valueExperience->jobPosition.' at '.$valueExperience->organizationName); ?></a>&nbsp;&nbsp;&nbsp;
                                                                <a data-toggle="tooltip" data-placement="top" title="Show Work Experience" href="<?php echo e(route ('members.workexperience.show', $valueExperience->idWorkExperienceData)); ?>" class="fa fa-desktop btn-sm btn btn-outline-success" ></a>
                                                                <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                                                    <a data-toggle="tooltip" data-placement="top" title="Edit Work Experience" href="<?php echo e(route ('members.workexperience.edit', $valueExperience->idWorkExperienceData)); ?>" class="fa fa-edit btn-sm btn btn-outline-warning" onClick="return confirm('Are you SURE to Edit this member\'s Work Experience Information data?')"></a>
                                                                <?php endif; ?>
                                                                <?php if(Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active'): ?>
                                                                    <form class="name" action="<?php echo e(route ('members.workexperience.remove', $valueExperience->idWorkExperienceData)); ?>" method="POST" enctype="multipart/form-data">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo e(method_field ('DELETE')); ?>

                                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token ()); ?>">
                                                                        <input type="hidden" name="hdnMemberIDNum" value="<?php echo e($member->idMember); ?>">
                                                                        <button data-toggle="tooltip" data-placement="top" title="Remove Work Experience" onClick="return confirm('Are you SURE to DELETE this member\'s Work Experience Information data?')" 
                                                                        class="fa fa-trash btn-sm btn btn-outline-danger" id="ConfirmDelete"></button>
                                                                    </form>
                                                                <?php endif; ?>
                                                                <div><?php echo e($valueExperience->organizationType); ?></div>
                                                                <span class="time"><?php echo e($valueExperience->startingDate); ?> - <?php if($valueExperience->stillWorkingHere === 'Yes'): ?> <?php echo e(_('Present')); ?> <?php else: ?> <?php echo e($valueExperience->resignedDate); ?> <?php endif; ?></span>
                                                            </div>
                                                        </div>
                                                    <?php elseif($valueExperience->hasWorkExperience === 'No'): ?>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a class="name"><?php echo e(__('Livelihood Income: ') .$valueExperience->livelihoodIncome); ?></a>&nbsp;&nbsp;&nbsp;
                                                                <a data-toggle="tooltip" data-placement="top" title="Show Work Experience" href="<?php echo e(route ('members.workexperience.show', $valueExperience->idWorkExperienceData)); ?>" class="fa fa-desktop btn-sm btn btn-outline-success" ></a>
                                                                <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                                                    <a data-toggle="tooltip" data-placement="top" title="Edit Work Experience" href="<?php echo e(route ('members.workexperience.edit', $valueExperience->idWorkExperienceData)); ?>" class="fa fa-edit btn-sm btn btn-outline-warning" onClick="return confirm('Are you SURE to Edit this member\'s Work Experience Information data?')"></a>
                                                                <?php endif; ?>
                                                                <?php if(Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active'): ?>
                                                                    <form class="name" action="<?php echo e(route ('members.workexperience.remove', $valueExperience->idWorkExperienceData)); ?>" method="POST" enctype="multipart/form-data">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo e(method_field ('DELETE')); ?>

                                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token ()); ?>">
                                                                        <input type="hidden" name="hdnMemberIDNum" value="<?php echo e($member->idMember); ?>">
                                                                        <button data-toggle="tooltip" data-placement="top" title="Remove Work Experience" onClick="return confirm('Are you SURE to DELETE this member\'s Work Experience Information data?')" 
                                                                        class="fa fa-trash btn-sm btn btn-outline-danger" id="ConfirmDelete"></button>
                                                                    </form>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a class="name"><?php echo e(__('Work Experience Data Not Available...')); ?></a>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="family">
                        <div class="card-box content">
                            <div class="row">
                                <?php $memberFamilyMemberData = DB::table('sfgbc_member_FamilyMemberData')->where('idMember', $member->idMember)->where('deleted_at', NULL)->count('idMember'); ?>
                                <div class="col-sm-7 col-3">
                                    <h4 class="card-title" style="font-weight: bolder;">Member's Family Member</h4>
                                    <h4 style="font-weight: bolder;"><?php echo e(' ('.$memberFamilyMemberData.' Record)'); ?></h4>
                                </div>
                                <div class="col-sm-5 col-9 text-right m-b-20">
                                    <a href="<?php echo e(route ('members.familymember.create', $member->idMember)); ?>" class="btn btn-danger float-right btn-rounded"><i class="fa fa-plus"></i> Add Family Member</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped custom-table">
                                            <thead>
                                                <tr>
                                                    <th><?php echo e(__('No.')); ?></th>
                                                    <th style="min-width:300px;"><?php echo e(__('Full Name')); ?></th>
                                                    <th><?php echo e(__('Gender')); ?></th>
                                                    <th><?php echo e(__('Relationship')); ?></th>
                                                    <th style="min-width: 100px;"><?php echo e(__('Status')); ?></th>
                                                    <th style="min-width:300px;"><?php echo e(__('Worshiping Denomination')); ?></th>
                                                    <th style="min-width: 100px;"><?php echo e(__('Birth Date')); ?></th>
                                                    <th class="text-right"><?php echo e(__('#Action')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $dataCounter = 0; ?>
                                                <?php $__currentLoopData = FamilyMemberDataModel::where([['idMember', $member->idMember], ['hasFamilyMember', 'Yes']])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $valueFamilyMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e(++$dataCounter); ?></td>
                                                        <td><h2><?php echo e($valueFamilyMember->famAppillation.' '.$valueFamilyMember->famFirstName.' '.$valueFamilyMember->famMiddleName.' '.$valueFamilyMember->famLastName); ?></h2></td>
                                                        <td><?php echo e($valueFamilyMember->famGender); ?></td>
                                                        <td><?php echo e($valueFamilyMember->relationship); ?></td>
                                                        <td>
                                                            <?php if($valueFamilyMember->familyStatus === 'Member'): ?>
                                                                <span class="custom-badge status-green"><?php echo e($valueFamilyMember->familyStatus); ?></span>
                                                            <?php elseif($valueFamilyMember->familyStatus === 'Believer'): ?>
                                                                <span class="custom-badge status-purple"><?php echo e($valueFamilyMember->familyStatus); ?></span>
                                                            <?php else: ?>
                                                                <span class="custom-badge status-red"><?php echo e($valueFamilyMember->familyStatus); ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($valueFamilyMember->worshipingDenomination); ?></td>
                                                        <td><?php echo e($valueFamilyMember->famBirthDate); ?></td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="btn-sm btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="<?php echo e(route ('members.familymember.show', $valueFamilyMember->idFamilyMember)); ?>"><i class="btn-sm btn btn-success fa fa-desktop"></i> <?php echo e(__('Show')); ?></a>
                                                                    <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                                                        <a class="dropdown-item" href="<?php echo e(route ('members.familymember.edit', $valueFamilyMember->idFamilyMember)); ?>" onclick="return confirm('Are you sure you want to EDIT member\'s DATA???')"><i class="btn-sm btn btn-warning fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                                                    <?php endif; ?>
                                                                    <?php if(Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active'): ?>
                                                                        <form class="name" action="<?php echo e(route ('members.familymember.remove', $valueFamilyMember->idFamilyMember)); ?>" method="POST" enctype="multipart/form-data">
                                                                            <?php echo csrf_field(); ?>
                                                                            <?php echo e(method_field ('DELETE')); ?>

                                                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token ()); ?>">
                                                                            <input type="hidden" name="hdnMemberIDNum" value="<?php echo e($member->idMember); ?>">
                                                                            <button onClick="return confirm('Are you SURE to DELETE this member\'s Family Member Information data?')" class="dropdown-item fa fa-trash btn-sm btn btn-danger" id="ConfirmDelete"><?php echo e(__('Delete')); ?></button>
                                                                        </form>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <?php $memberFellowshipData = DB::table('sfgbc_member_FellowshipData')->where('idMember', $member->idMember)->where('deleted_at', NULL)->count('idMember'); ?>
                                <div class="col-sm-7 col-3">
                                    <h4 class="card-title" style="font-weight: bolder;">Member's Fellowship Participation</h4>
                                    <h4 style="font-weight: bolder;"><?php echo e(' ('.$memberFellowshipData.' Record)'); ?></h4>
                                </div>
                                <div class="col-sm-5 col-9 text-right m-b-20">
                                    <a href="<?php echo e(route ('members.fellowship.create', $member->idMember)); ?>" class="btn btn-danger float-right btn-rounded"><i class="fa fa-plus"></i> Add Fellowship Data</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped custom-table">
                                            <thead>
                                                <tr>
                                                    <th><?php echo e(__('No.')); ?></th>
                                                    <th style="min-width:400px;"><?php echo e(__('Fellowship Name')); ?></th>
                                                    <th style="min-width: 200px;"><?php echo e(__('Fellowship Type')); ?></th>
                                                    <th style="min-width: 200px;"><?php echo e(__('Role on Fellowship')); ?></th>
                                                    <th style="min-width: 150px;"><?php echo e(__('Joined Date')); ?></th>
                                                    <th style="min-width: 150px;"><?php echo e(__('Hall Name')); ?></th>
                                                    <th style="min-width: 400px;"><?php echo e(__('Fellowship Remarks')); ?></th>
                                                    <th class="text-right"><?php echo e(__('#Action')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $dataCounter = 0; ?>
                                                <?php $__currentLoopData = FellowshipDataModel::where([['idMember', $member->idMember], ['hasFellowship', 'Yes']])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $valueFellowshipData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e(++$dataCounter); ?></td>
                                                        <td><h2><?php echo e($valueFellowshipData->fellowshipName); ?></h2></td>
                                                        <td><?php echo e($valueFellowshipData->fellowshipType); ?></td>
                                                        <td>
                                                            <?php if($valueFellowshipData->roleOnFellowship === 'Main Leader' || $valueFellowshipData->roleOnFellowship === 'Assistant Leader'): ?>
                                                                <span class="custom-badge status-red"><?php echo e($valueFellowshipData->roleOnFellowship); ?></span>
                                                            <?php elseif($valueFellowshipData->roleOnFellowship === 'Chairman' || $valueFellowshipData->roleOnFellowship === 'Vice Chairman' || $valueFellowshipData->roleOnFellowship === 'Secretary' || $valueFellowshipData->roleOnFellowship === 'Accountant' || $valueFellowshipData->roleOnFellowship === 'Cashier'): ?>
                                                                <span class="custom-badge status-blue"><?php echo e($valueFellowshipData->roleOnFellowship); ?></span>
                                                            <?php elseif($valueFellowshipData->roleOnFellowship === 'Supervisor' || $valueFellowshipData->roleOnFellowship === 'Representative' || $valueFellowshipData->roleOnFellowship === 'Co-ordinator'): ?>
                                                                <span class="custom-badge status-purple"><?php echo e($valueFellowshipData->roleOnFellowship); ?></span>
                                                            <?php else: ?>
                                                                <span class="custom-badge status-green"><?php echo e($valueFellowshipData->roleOnFellowship); ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($valueFellowshipData->joinedDate); ?></td>
                                                        <td><?php echo e($valueFellowshipData->hallName); ?></td>
                                                        <td><?php echo e(Str::of ($valueFellowshipData->fellowRemarks)->substr(0, 50)->append('...')); ?></td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="btn-sm btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="<?php echo e(route ('members.fellowship.show', $valueFellowshipData->idFellowshipData)); ?>"><i class="btn-sm btn btn-success fa fa-desktop"></i> <?php echo e(__('Show')); ?></a>
                                                                    <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                                                        <a class="dropdown-item" href="<?php echo e(route ('members.fellowship.edit', $valueFellowshipData->idFellowshipData)); ?>" onclick="return confirm('Are you sure you want to EDIT member\'s DATA???')"><i class="btn-sm btn btn-warning fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                                                    <?php endif; ?>
                                                                    <?php if(Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active'): ?>
                                                                        <form class="name" action="<?php echo e(route ('members.fellowship.remove', $valueFellowshipData->idFellowshipData)); ?>" method="POST" enctype="multipart/form-data">
                                                                            <?php echo csrf_field(); ?>
                                                                            <?php echo e(method_field ('DELETE')); ?>

                                                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token ()); ?>">
                                                                            <input type="hidden" name="hdnMemberIDNum" value="<?php echo e($member->idMember); ?>">
                                                                            <button onClick="return confirm('Are you SURE to DELETE this member\'s Fellowship Information data?')" class="dropdown-item fa fa-trash btn-sm btn btn-danger" id="ConfirmDelete"><?php echo e(__('Delete')); ?></button>
                                                                        </form>
                                                                    <?php endif; ?>
                                                                    
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <?php $memberServiceSectorData = DB::table('sfgbc_member_ServiceSectorData')->where('idMember', $member->idMember)->where('deleted_at', NULL)->count('idMember'); ?>
                                <div class="col-sm-7 col-3">
                                    <h4 class="card-title" style="font-weight: bolder;">Member's Service Sector Participation</h4>
                                    <h4 style="font-weight: bolder;"><?php echo e(' ('.$memberServiceSectorData.' Record)'); ?></h4>
                                </div>
                                <div class="col-sm-5 col-9 text-right m-b-20">
                                    <a href="<?php echo e(route ('members.servicesector.create', $member->idMember)); ?>" class="btn btn-danger float-right btn-rounded"><i class="fa fa-plus"></i> Add Service Sector</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped custom-table">
                                            <thead>
                                                <tr>
                                                    <th><?php echo e(__('No.')); ?></th>
                                                    <th style="min-width:400px;"><?php echo e(__('Service Sector Name')); ?></th>
                                                    <th style="min-width: 200px;"><?php echo e(__('Role on Sector')); ?></th>
                                                    <th style="min-width: 150px;"><?php echo e(__('Joined Date')); ?></th>
                                                    <th style="min-width: 300px;"><?php echo e(__('Burden Member Has')); ?></th>
                                                    <th style="min-width: 400px;"><?php echo e(__('Service Sector Remarks')); ?></th>
                                                    <th class="text-right"><?php echo e(__('#Action')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $dataCounter = 0; ?>
                                                <?php $__currentLoopData = ServiceSectorDataModel::where('idMember', $member->idMember)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $valueServiceSector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e(++$dataCounter); ?></td>
                                                        <td><h2><?php echo e($valueServiceSector->serviceSectorName); ?></h2></td>
                                                        <td>
                                                            <?php if($valueServiceSector->roleOnSector === 'Main Leader' || $valueServiceSector->roleOnSector === 'Assistant Leader'): ?>
                                                                <span class="custom-badge status-red"><?php echo e($valueServiceSector->roleOnSector); ?></span>
                                                            <?php elseif($valueServiceSector->roleOnSector === 'Chairman' || $valueServiceSector->roleOnSector === 'Vice Chairman' || $valueServiceSector->roleOnSector === 'Secretary' || $valueServiceSector->roleOnSector === 'Accountant' || $valueServiceSector->roleOnSector === 'Cashier'): ?>
                                                                <span class="custom-badge status-blue"><?php echo e($valueServiceSector->roleOnSector); ?></span>
                                                            <?php elseif($valueServiceSector->roleOnSector === 'Supervisor' || $valueServiceSector->roleOnSector === 'Representative' || $valueServiceSector->roleOnSector === 'Co-ordinator'): ?>
                                                                <span class="custom-badge status-purple"><?php echo e($valueServiceSector->roleOnSector); ?></span>
                                                            <?php else: ?>
                                                                <span class="custom-badge status-green"><?php echo e($valueServiceSector->roleOnSector); ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($valueServiceSector->joinedDate); ?></td>
                                                        <td><?php echo e(Str::of ($valueServiceSector->burdenDetail)->substr(0, 50)->append('...')); ?></td>
                                                        <td><?php echo e(Str::of ($valueServiceSector->sectorRemarks)->substr(0, 50)->append('...')); ?></td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="btn-sm btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="<?php echo e(route ('members.servicesector.show', $valueServiceSector->idServiceSectorData)); ?>"><i class="btn-sm btn btn-success fa fa-desktop"></i> <?php echo e(__('Show')); ?></a>
                                                                    <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                                                        <a class="dropdown-item" href="<?php echo e(route ('members.servicesector.edit', $valueServiceSector->idServiceSectorData)); ?>" onclick="return confirm('Are you sure you want to EDIT member\'s DATA???')"><i class="btn-sm btn btn-warning fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                                                    <?php endif; ?>
                                                                    <?php if(Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active'): ?>
                                                                        <form class="name" action="<?php echo e(route ('members.servicesector.remove', $valueServiceSector->idServiceSectorData)); ?>" method="POST" enctype="multipart/form-data">
                                                                            <?php echo csrf_field(); ?>
                                                                            <?php echo e(method_field ('DELETE')); ?>

                                                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token ()); ?>">
                                                                            <input type="hidden" name="hdnMemberIDNum" value="<?php echo e($member->idMember); ?>">
                                                                            <button onClick="return confirm('Are you SURE to DELETE this member\'s Service Sector Information data?')" class="dropdown-item fa fa-trash btn-sm btn btn-danger" id="ConfirmDelete"><?php echo e(__('Delete')); ?></button>
                                                                        </form>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <h4 class="card-title" style="font-weight: bolder;"><?php echo e(__('Member\'s Membership Information')); ?></h4>
                                </div>
                                <div class="col-sm-4 text-right m-b-20">
                                    <?php if($member->idMembershipData === NULL): ?>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Add Membership Data" href="<?php echo e(route ('members.membership.create', $member->idMember)); ?>" class="btn btn-success btn-rounded" onClick="return confirm('Are you SURE to ADD this member\'s Membership data?')"><i class="fa fa-plus"></i><?php echo e(__(' Add')); ?></a>&nbsp;&nbsp;&nbsp;
                                    <?php else: ?>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Show  Membership Data" href="<?php if($member->idMembershipData === NULL): ?> # <?php else: ?> <?php echo e(route ('members.membership.show', $member->idMembershipData)); ?> <?php endif; ?>" class="btn btn-success" onClick="return confirm('Are you SURE to Show this member\'s Membership data?')"><i class="fa fa-desktop"></i></a>&nbsp;&nbsp;&nbsp;
                                        <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                            <a data-toggle="tooltip" data-placement="bottom" title="Edit  Membership Data" href="<?php if($member->idMembershipData === NULL): ?> # <?php else: ?> <?php echo e(route ('members.membership.edit', $member->idMembershipData)); ?> <?php endif; ?>" class="btn btn-danger" onClick="return confirm('Are you SURE to EDIT this member\'s Membership data?')"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card-box">
                                    <h3 class="card-title"><?php echo e(__('Membership Information')); ?></h3>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group form-focus">
                                                <label class="focus-label"><?php echo e(__('How Became Member')); ?></label>
                                                <input type="text" class="form-control floating" name="rdoHowBecameMember" value="<?php echo e($member->howBecameMember); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label"><?php echo e(__('Previous Denomination')); ?></label>
                                                <input type="text" class="form-control floating" name="txtPrevDenomination" value="<?php echo e($member->previousDenomination); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-focus">
                                                <label class="focus-label"><?php echo e(__('Believed Date')); ?></label>
                                                <input type="text" class="form-control floating" name="datBelievedDate" value="<?php echo e($member->believedDate); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-focus">
                                                <label class="focus-label"><?php echo e(__('Baptized Date')); ?></label>
                                                <input type="text" class="form-control floating" name="datBaptizedDate" value="<?php echo e($member->baptizedDate); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label"><?php echo e(__('Who Thought Doctrine')); ?></label>
                                                <input type="text" class="form-control floating" name="txtWhoThought" value="<?php echo e($member->whoThoughtDoctrine); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-focus">
                                                <label class="focus-label"><?php echo e(__('Membership Date')); ?></label>
                                                <input type="text" class="form-control floating" name="datMembershipDate" value="<?php echo e($member->membershipDate); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="focus-label"><?php echo e(__('Serving Kind')); ?></label>
                                                <textarea class="form-control" name="txaServingKind" disabled><?php echo e($member->servingKind); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="focus-label"><?php echo e(__('Membership Remarks')); ?></label>
                                                <textarea cols="30" rows="10" class="form-control" name="txaAddressRemarks" disabled><?php echo e($member->membershipRemark); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="other">
                        <div class="card-box content">
                            <?php if($member->status === 'Inactive'): ?>
                                <?php $__currentLoopData = TransferedDataModel::where('idMember', $member->idMember)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transferMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row">
                                        <div class="card-box col-md-12">
                                            <div class="row">
                                                <div class="col-sm-8 col-3">
                                                    <h4 class="card-title" style="font-weight: bolder;"><?php echo e(__('Member\'s Transfer Information')); ?></h4>
                                                </div>
                                                <div class="col-sm-4 text-right m-b-20">
                                                    <form id="newMemberForm" action="<?php echo e(route ('members.deactivated', $member->idMember)); ?>" method="POST" enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo e(method_field ('POST')); ?>

                                                        <input type="hidden" name="htidTransfer" value="<?php echo e($transferMember->idTransfer); ?>" />
                                                        <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                                            <button data-toggle="tooltip" data-placement="top" title="Edit Transfer Data" class="btn btn-warning float-right fa fa-pencil"><?php echo e(__(' Edit')); ?></button>
                                                        <?php endif; ?>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label"><?php echo e(__('Transfer Type')); ?></label>
                                                        <input type="text" class="form-control floating" name="txtTransferType" value="<?php echo e($transferMember->transferType); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label"><?php echo e(__('Transfer Date')); ?></label>
                                                        <input type="text" class="form-control floating" name="txtTransferDate" value="<?php echo e($transferMember->transferDate); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label"><?php echo e(__('Church Transfer To')); ?></label>
                                                        <input type="text" class="form-control floating" name="txtChurchTransfer" value="<?php echo e($transferMember->churchTransfer); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label"><?php echo e(__('Transfer Location')); ?></label>
                                                        <input type="text" class="form-control floating" name="txtTransferLocation" value="<?php echo e($transferMember->transferLocation); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label"><?php echo e(__('Outgoing Transfer Letter Num.')); ?></label>
                                                        <input type="text" class="form-control floating" name="txtTransferLetterNum" value="<?php echo e($transferMember->transferLetterNum); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="focus-label"><?php echo e(__('Member\'s Transfer Remarks')); ?></label>
                                                        <textarea cols="30" rows="7" class="form-control" name="txaTransferRemarks" disabled><?php echo e($transferMember->transferRemarks); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = DeceasedDataModel::where('idMember', $member->idMember)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $deceasedMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row">
                                        <div class="card-box col-md-12">
                                            <div class="row">
                                                <div class="col-sm-8 col-3">
                                                    <h4 class="card-title" style="font-weight: bolder;"><?php echo e(__('Member\'s Decease Information')); ?></h4>
                                                </div>
                                                <div class="col-sm-4 text-right m-b-20">
                                                    <form id="newMemberForm" action="<?php echo e(route ('members.deactivated', $member->idMember)); ?>" method="POST" enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo e(method_field ('POST')); ?>

                                                        <input type="hidden" name="hdidDecease" value="<?php echo e($deceasedMember->idDeceasedMemberData); ?>" />
                                                        <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                                            <button data-toggle="tooltip" data-placement="top" title="Edit Decease Data" class="btn btn-danger float-right fa fa-pencil"><?php echo e(__(' Edit')); ?></button>
                                                        <?php endif; ?>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label"><?php echo e(__('Deceased Date')); ?></label>
                                                        <input type="text" class="form-control floating" name="txtDeceaseDate" value="<?php echo e($deceasedMember->deceaseDate); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label"><?php echo e(__('Decease Reason')); ?></label>
                                                        <input type="text" class="form-control floating" name="txtDeceaseReason" value="<?php echo e($deceasedMember->deceaseReason); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label"><?php echo e(__('Who Notified')); ?></label>
                                                        <input type="text" class="form-control floating" name="txtWhoNotified" value="<?php echo e($deceasedMember->whoNotified); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label"><?php echo e(__('Relationship with Deceased')); ?></label>
                                                        <input type="text" class="form-control floating" name="txtDeceaseRelationship" value="<?php echo e($deceasedMember->deceaseRelationship); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label"><?php echo e(__('Funeral Place')); ?></label>
                                                        <input type="text" class="form-control floating" name="txtFuneralPlace" value="<?php echo e($deceasedMember->funeralPlace); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label"><?php echo e(__('Funeral Date')); ?></label>
                                                        <input type="text" class="form-control floating" name="txtFuneralDate" value="<?php echo e($deceasedMember->funeralDate); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label"><?php echo e(__('Funeral Time')); ?></label>
                                                        <input type="text" class="form-control floating" name="txtfuneralTime" value="<?php echo e($deceasedMember->funeralTime); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label"><?php echo e(__('Funeral Coordinator')); ?></label>
                                                        <input type="text" class="form-control floating" name="txtFuneralCoordinator" value="<?php echo e($deceasedMember->funeralCoordinator); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="focus-label"><?php echo e(__('Member\'s Deceased Remarks')); ?></label>
                                                        <textarea cols="30" rows="7" class="form-control" name="txaDeceaseRemarks" disabled><?php echo e($deceasedMember->deceaseRemarks); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-sm-10 col-3">
                                    <h4 class="card-title" style="font-weight: bolder;"><?php echo e(__('Member\'s Mecellanious Information')); ?></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card-box col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="focus-label"><?php echo e(__('Disability Type [ If Any ]')); ?></label>
                                                <textarea class="form-control" name="txaAddressRemarks" disabled><?php echo e($member->disabilityType); ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="focus-label"><?php echo e(__('Residential Address Remarks')); ?></label>
                                                <textarea cols="30" rows="3" class="form-control" name="txaAddressRemarks" disabled><?php echo e($member->residentialAddressRemark); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="focus-label"><?php echo e(__('Member\'s Personal Remarks')); ?></label>
                                                <textarea cols="30" rows="12" class="form-control" name="txaAddressRemarks" disabled><?php echo e($member->memberRemark); ?></textarea>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/members/show.blade.php ENDPATH**/ ?>