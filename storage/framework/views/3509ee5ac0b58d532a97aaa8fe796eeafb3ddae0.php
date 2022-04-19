<?php $__env->startSection('myPageTitle', 'አዲስ የስራ ልምድ መረጃ መመዝገቢያ | Add Work Experience Data'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-dashboard">&nbsp;&nbsp;</i><?php echo e(__('Home - Dashboard')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('members.index')); ?>"><?php echo e(__('Members')); ?></a></li>
                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('Work Experience')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Add Member\'s Work Experience')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-10 col-6">
                    <h4 class="page-title"><?php echo e(__('አዲስ የአባሉ የስራ ልምድ መረጃ መመዝገቢያ | Add Member\'s Work Experience Data')); ?></h4>
                </div>
                <div class="col-2 text-right">
                    <a href="<?php echo e(route ('members.show', $member->idMember)); ?>" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('ተመለስ | Back')); ?></strong></a>
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
                                <h3 class="user-name m-t-0 mb-0" style="font-weight:700;"><?php echo e($member->appellation.' '.$member->firstName.' '.$member->middleName.' '.$member->lastName); ?></h3><hr />
                            </div>
                        </div>
                        <div class="profile-view offset-1">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="<?php echo e(URL::to($member->photograph)); ?>" alt="No Image"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-1">
                                        <br />&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-5 profile-info-left">
                                        <br />
                                        <?php if($member->status === 'Active'): ?>
                                            <span class="col-12 custom-badge status-green"><?php echo e($member->status); ?></span>
                                        <?php else: ?>
                                            <span class="col-12 custom-badge status-red"><?php echo e($member->status); ?></span>
                                        <?php endif; ?>
                                        <?php $idPrefix = $member->prefix; ?>
                                            <?php if($member->idMember < 10): ?> <?php $zeroFillID = '0000000'.$member->idMember; ?>
                                            <?php elseif($member->idMember < 100): ?> <?php $zeroFillID = '000000'.$member->idMember; ?>
                                            <?php elseif($member->idMember < 1000): ?> <?php $zeroFillID = '00000'.$member->idMember; ?>
                                            <?php elseif($member->idMember < 10000): ?> <?php $zeroFillID = '0000'.$member->idMember; ?>
                                            <?php elseif($member->idMember < 10000): ?> <?php $zeroFillID = '000'.$member->idMember; ?>
                                            <?php elseif($member->idMember < 100000): ?> <?php $zeroFillID = '00'.$member->idMember; ?>
                                            <?php elseif($member->idMember < 1000000): ?> <?php $zeroFillID = '0'.$member->idMember; ?>
                                            <?php else: ?> <?php $zeroFillID = $member->idMember; ?> <?php endif; ?>
                                        <?php $idSuffix = $member->suffix; ?>
                                        <div class="staff-id" style="font-weight: bold; color: green;"><?php echo e(__('Member\'s UID :')); ?>

                                            <?php echo e($idPrefix.$zeroFillID.$idSuffix); ?>

                                        </div>
                                        <br />
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
                                                        <span class="text"><a href="#"><?php if($member->primaryPhone == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->primaryPhone); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Email:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($member->email == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($member->email); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Birthday:')); ?></span>
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
                        <h4 class="card-title"><?php echo e(__('የአባሉ የስራ ልምድ መረጃ | Member\'s Residence Address')); ?></h4>
                        <form action="<?php echo e(route ('members.workexperience.store', $member->idMember)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field ('POST')); ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="display-block"><?php echo e(__('የስራ መረጃ አለ?')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span><?php echo e(__(' | Has Work Experience?')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span></label>
                                                    <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 26)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="rdoHasWorkExperience" id="rdoWorkExperienceInfo_<?php echo e($value); ?>" value="<?php echo e($value); ?>" onClick="itemWorkExperienceDataVisibility()">
                                                            <label class="form-check-label" for="rdoWorkExperienceInfo_<?php echo e($value); ?>"><?php echo e($value); ?></label>
                                                        </div>  
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-9" id="expLivelihoodIncome">
                                                <div class="form-group">
                                                    <label class="focus-label"><?php echo e(__('መተዳደሪያ | Livelihood Income')); ?></label>
                                                    <textarea cols="30" rows="3" class="form-control" name="txaLivelihoodIncome" placeholder="Please leave your comment regarding work here..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="expOrganizationType">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label"><?php echo e(__('የድርጅቱ ዓይነት | Organization Type')); ?></label>
                                                    <select class="select form-control floating" name="cmbOrganizationType">
                                                        <option value=""><?php echo e(__('Select Organization Type')); ?></option>
                                                        <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 9)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="expCompanyName">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የድርጅቱ ሥም | Company Name')); ?></label>
                                                    <input type="text" class="form-control floating" name="txtCompanyName" placeholder="Company Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="expWorkLocation">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የስራ ቦታ መጠሪያ | Work Location')); ?></label>
                                                    <input type="text" class="form-control floating" name="txtWorkLocation" placeholder="Work Location">
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="expJobPosition">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የስራ መደብ | Job Position')); ?></label>
                                                    <input type="text" class="form-control floating" name="txtJobPosition" placeholder="Job Position">
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="expStartingDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የጀመረበት ቀን | Starting Date [Period From]')); ?></label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="datWorkStartingDate" id="WorkStartingDatePicker" placeholder="Work Starting Date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="expStillWorkingHere">
                                                <div class="form-group">
                                                    <label class="display-block"><?php echo e(__('አሁን እዚህ ይሰራሉ? | Still working here?')); ?></label>
                                                    <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 26)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="rdoStillWorkingHere" id="rdoStillWorkingHere_<?php echo e($value); ?>" value="<?php echo e($value); ?>" onClick="itemWorkExperienceDataVisibility()">
                                                            <label class="form-check-label" for="rdoStillWorkingHere_<?php echo e($value); ?>"><?php echo e($value); ?></label>
                                                        </div>  
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="expResignedDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የለቀቀበት ቀን | Resigned Date [Period To]')); ?></label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="datResignedDate" id="WorkResignedDatePicker" placeholder="Work Resigned Date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="expWorkExperienceRemarks">
                                                <div class="form-group">
                                                    <label class="focus-label"><?php echo e(__('የስራ መረጃ ማስታወሻ | Work Remarks')); ?></label>
                                                    <textarea cols="30" rows="7" class="form-control" name="txaWorkExperiencelRemarks" placeholder="Please leave your comment regarding work here..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="hdnMemberID" value="<?php echo e($member->idMember); ?>">
                            <div class="text-center m-t-20">
                                <input class="btn btn-danger submit-btn" type="submit" value="SAVE DATA">
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
<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/members/workexperience/create.blade.php ENDPATH**/ ?>