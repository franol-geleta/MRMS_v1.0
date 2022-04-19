<?php $__env->startSection('myPageTitle', 'የስራ ልምድ መረጃ ማሳያ | Show Work Experience Data'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('members.index')); ?>"><?php echo e(__('Members')); ?></a></li>
                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('Work Experience')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Show Member\'s Work Experience')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8 col-6">
                    <h4 class="page-title"><?php echo e(__('የአባሉ ስራ ልምድ መረጃ ማሳያ | Show Member\'s Work Experience Data')); ?></h4>
                </div>
                <div class="col-2 text-right">
                    <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                        <a href="<?php echo e(route ('members.workexperience.edit', $memberWorkExperience->idWorkExperienceData)); ?>" class="btn btn-warning float-right btn-rounded"><i class="fa fa-edit">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('አስተካክል | Edit')); ?></strong></a>
                    <?php endif; ?>
                </div>
                <div class="col-2 text-right">
                    <a href="<?php echo e(route ('members.show', $memberWorkExperience->idMember)); ?>" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('ተመለስ | Back')); ?></strong></a>
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
                            <div class="col-md-10 personal-info offset-1">
                                <h3 class="user-name m-t-0 mb-0" style="font-weight:700;"><?php echo e($memberWorkExperience->appellation.' '.$memberWorkExperience->firstName.' '.$memberWorkExperience->middleName.' '.$memberWorkExperience->lastName); ?></h3><hr />
                            </div>
                        </div>
                        <div class="profile-view offset-1">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="<?php echo e(URL::to($memberWorkExperience->photograph)); ?>" alt="No Image"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-1">
                                        <br />&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-5 profile-info-left">
                                        <br />
                                        <?php if($memberWorkExperience->status === 'Active'): ?>
                                            <span class="col-12 custom-badge status-green"><?php echo e($memberWorkExperience->status); ?></span>
                                        <?php else: ?>
                                            <span class="col-12 custom-badge status-red"><?php echo e($memberWorkExperience->status); ?></span>
                                        <?php endif; ?>
                                        <?php $idPrefix = $memberWorkExperience->prefix; ?>
                                            <?php if($memberWorkExperience->idMember < 10): ?> <?php $zeroFillID = '0000000'.$memberWorkExperience->idMember; ?>
                                            <?php elseif($memberWorkExperience->idMember < 100): ?> <?php $zeroFillID = '000000'.$memberWorkExperience->idMember; ?>
                                            <?php elseif($memberWorkExperience->idMember < 1000): ?> <?php $zeroFillID = '00000'.$memberWorkExperience->idMember; ?>
                                            <?php elseif($memberWorkExperience->idMember < 10000): ?> <?php $zeroFillID = '0000'.$memberWorkExperience->idMember; ?>
                                            <?php elseif($memberWorkExperience->idMember < 10000): ?> <?php $zeroFillID = '000'.$memberWorkExperience->idMember; ?>
                                            <?php elseif($memberWorkExperience->idMember < 100000): ?> <?php $zeroFillID = '00'.$memberWorkExperience->idMember; ?>
                                            <?php elseif($memberWorkExperience->idMember < 1000000): ?> <?php $zeroFillID = '0'.$memberWorkExperience->idMember; ?>
                                            <?php else: ?> <?php $zeroFillID = $memberWorkExperience->idMember; ?> <?php endif; ?>
                                        <?php $idSuffix = $memberWorkExperience->suffix; ?>
                                        <div class="staff-id" style="font-weight: bold; color: green;"><?php echo e(__('Member\'s UID :')); ?>

                                            <?php echo e($idPrefix.$zeroFillID.$idSuffix); ?>

                                        </div>
                                        <br />
                                        <div class="col-md-12">
                                            <ul class="personal-info">
                                                <br />
                                                <li>
                                                    <span class="title"><?php echo e(__('Gender:')); ?></span>
                                                    <span class="text"><a href="#"><?php if($memberWorkExperience->gender == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberWorkExperience->gender); ?> <?php endif; ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title"><?php echo e(__('Civil Status:')); ?></span>
                                                    <span class="text"><a href="#"><?php if($memberWorkExperience->civilStatus == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberWorkExperience->civilStatus); ?> <?php endif; ?></a></span>
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
                                                        <span class="title"><?php echo e(__('Mobile:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($memberWorkExperience->primaryPhone == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberWorkExperience->primaryPhone); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Email:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($memberWorkExperience->email == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberWorkExperience->email); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Birthday:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($memberWorkExperience->birthDate == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberWorkExperience->birthDate); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Nationality:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($memberWorkExperience->nationality == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberWorkExperience->nationality); ?> <?php endif; ?></a></span>
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
                        <h4 class="card-title"><?php echo e(__('የአባሉ የስራ ልምድ መረጃ | Member\'s Work Experience Data')); ?></h4>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" class="form-control floating" name="hdnMemberIDNum" value="<?php echo e($memberWorkExperience->idMember); ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="display-block"><?php echo e(__('የስራ መረጃ አለ?')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span><?php echo e(__(' | Has Work Experience?')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span></label>
                                        <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 26)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rdoHasWorkExperience" id="rdoWorkExperienceInfo_<?php echo e($value); ?>" value="<?php echo e($value); ?>" onClick="itemWorkExperienceDataVisibility()" <?php if($memberWorkExperience->hasWorkExperience === $value): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="rdoWorkExperienceInfo_<?php echo e($value); ?>"><?php echo e($value); ?></label>
                                            </div>  
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="col-md-9" id="expLivelihoodIncome">
                                    <div class="form-group">
                                        <label class="focus-label"><?php echo e(__('መተዳደሪያ | Livelihood Income')); ?></label>
                                        <textarea cols="30" rows="3" class="form-control" name="txaLivelihoodIncome" placeholder="Please leave your comment regarding work here..."><?php echo e($memberWorkExperience->livelihoodIncome); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3" id="expOrganizationType">
                                    <div class="form-group form-focus select-focus">
                                        <label class="focus-label"><?php echo e(__('የድርጅቱ ዓይነት | Organization Type')); ?></label>
                                        <select class="select form-control floating" name="cmbOrganizationType">
                                            <option value=""><?php echo e(__('Select Organization Type')); ?></option>
                                            <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 9)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php if($memberWorkExperience->organizationType === $value): ?> <?php echo e($value); ?>" selected <?php else: ?> <?php echo e($value); ?> <?php endif; ?>"><?php echo e($value); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" id="expCompanyName">
                                    <div class="form-group form-focus">
                                        <label class="focus-label"><?php echo e(__('የድርጅቱ ሥም | Company Name')); ?></label>
                                        <input type="text" class="form-control floating" name="txtCompanyName" value="<?php echo e($memberWorkExperience->organizationName); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6" id="expWorkLocation">
                                    <div class="form-group form-focus">
                                        <label class="focus-label"><?php echo e(__('የስራ ቦታ መጠሪያ | Work Location')); ?></label>
                                        <input type="text" class="form-control floating" name="txtWorkLocation" value="<?php echo e($memberWorkExperience->workLocation); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6" id="expJobPosition">
                                    <div class="form-group form-focus">
                                        <label class="focus-label"><?php echo e(__('የስራ መደብ | Job Position')); ?></label>
                                        <input type="text" class="form-control floating" name="txtJobPosition" value="<?php echo e($memberWorkExperience->jobPosition); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4" id="expStartingDate">
                                    <div class="form-group form-focus">
                                        <label class="focus-label"><?php echo e(__('የጀመረበት ቀን | Starting Date [Period From]')); ?></label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control floating" name="datWorkStartingDate" id="WorkStartingDatePicker" value="<?php echo e($memberWorkExperience->startingDate); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" id="expStillWorkingHere">
                                    <div class="form-group">
                                        <label class="display-block"><?php echo e(__('አሁን እዚህ ይሰራሉ? | Still working here?')); ?></label>
                                        <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 26)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rdoStillWorkingHere" id="rdoStillWorkingHere_<?php echo e($value); ?>" value="<?php echo e($value); ?>" onClick="itemWorkExperienceDataVisibility()" <?php if($memberWorkExperience->stillWorkingHere === $value): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="rdoStillWorkingHere_<?php echo e($value); ?>"><?php echo e($value); ?></label>
                                            </div>  
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="col-md-4" id="expResignedDate">
                                    <div class="form-group form-focus">
                                        <label class="focus-label"><?php echo e(__('የለቀቀበት ቀን | Resigned Date [Period To]')); ?></label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control floating" name="datResignedDate" id="WorkResignedDatePicker" value="<?php echo e($memberWorkExperience->resignedDate); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="expWorkExperienceRemarks">
                                    <div class="form-group">
                                        <label class="focus-label"><?php echo e(__('የስራ መረጃ ማስታወሻ | Work Remarks')); ?></label>
                                        <textarea cols="30" rows="7" class="form-control" name="txaWorkExperiencelRemarks" placeholder="Please leave your comment regarding work here..."><?php echo e($memberWorkExperience->workExperienceRemark); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // Ethiopian Calender
        $(function() {
            $('#WorkStartingDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#WorkResignedDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });
    
        // Radio Button Enabler | Disabler
        function itemWorkExperienceDataVisibility (params) {            
            // Member's Work Experience Information
            var isWorkExperienceYes = document.getElementById ("rdoWorkExperienceInfo_Yes");
            var isStillWorkingHereYes = document.getElementById ("rdoStillWorkingHere_Yes");
            expLivelihoodIncome.style.display = isWorkExperienceYes.checked ? "none" : "block";
            expOrganizationType.style.display = isWorkExperienceYes.checked ? "block" : "none";
            expCompanyName.style.display = isWorkExperienceYes.checked ? "block" : "none";
            expWorkLocation.style.display = isWorkExperienceYes.checked ? "block" : "none";
            expJobPosition.style.display = isWorkExperienceYes.checked ? "block" : "none";
            expStartingDate.style.display = isWorkExperienceYes.checked ? "block" : "none";
            expStillWorkingHere.style.display = isWorkExperienceYes.checked ? "block" : "none";
            expResignedDate.style.display = isWorkExperienceYes.checked && !isStillWorkingHereYes.checked ? "block" : "none";
            expWorkExperienceRemarks.style.display = isWorkExperienceYes.checked ? "block" : "none";
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/members/workexperience/show.blade.php ENDPATH**/ ?>