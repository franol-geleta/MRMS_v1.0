<?php $__env->startSection('myPageTitle', 'የአባል መረጃ ማስተካከያ | Edit Member\'s Data'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-dashboard">&nbsp;&nbsp;</i><?php echo e(__('Home - Dashboard')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('members.index')); ?>"><?php echo e(__('Members')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Edit Member Data')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="page-title"><?php echo e(__('የአባሉ የግል መረጃ ማስተካከያ | Edit Member\'s Personal Data')); ?></h4>
                </div>
                <div class="col-4 text-right">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <form id="editMemberForm" action="<?php echo e(route ('members.update', $member->idMember)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field ('PUT')); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('ማዕረግ | Appillation')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <select class="select" name="cmbAppellation">
                                                <option value=""><?php echo e(__('Select Appillation')); ?></option>
                                                <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 12)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php if($member->appellation === $value): ?> <?php echo e($value); ?>" selected <?php else: ?> <?php echo e($value); ?>" <?php endif; ?>><?php echo e($value); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የአባል ስም | First Name')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-sm-7">
                                            <input class="form-control" type="text" name="txtFirstName" value="<?php echo e($member->firstName); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የአባት ስም | Middle Name')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-sm-7">
                                            <input class="form-control" type="text" name="txtMiddleName" value="<?php echo e($member->middleName); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የአያት ስም | Middle Name')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-sm-7">
                                            <input class="form-control" type="text" name="txtLastName" value="<?php echo e($member->lastName); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-6 col-form-label"><?php echo e(__('ፆታ | Gendar')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-6">
                                            <select class="select" name="cmbMemberGender">
                                                <option value=""><?php echo e(__('Select Gender')); ?></option>
                                                <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 1)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php if($member->gender === $value): ?> <?php echo e($value); ?>" selected <?php else: ?> <?php echo e($value); ?>" <?php endif; ?>><?php echo e($value); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-6 col-form-label"><?php echo e(__('የጋብቻ ሁኔታ | Civil Status')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-6">
                                            <select class="select" name="cmbCivilStatus">
                                                <option value=""><?php echo e(__('Select Civil Status')); ?></option>
                                                <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 2)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php if($member->civilStatus === $value): ?> <?php echo e($value); ?>" selected <?php else: ?> <?php echo e($value); ?>" <?php endif; ?>><?php echo e($value); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-6 col-form-label"><?php echo e(__('የአባሉ ሁኔታ | Member\'s Status')); ?></label>
                                        <div class="col-md-6">
                                            <?php if($member->status === 'Active'): ?>
                                                <span class="col-12 custom-badge status-green"><?php echo e($member->status); ?></span>
                                            <?php else: ?>
                                                <span class="col-12 custom-badge status-red"><?php echo e($member->status); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('Old Photograph ( 5 x 5 )')); ?></label>
                                                <div class="profile-upload">
                                                    <div class="upload-img">
                                                        <img alt="No Member Photo" name="oldMemberProfileImage" src="<?php echo e(URL::to($member->photograph)); ?>">
                                                        <input type="hidden" name="oldMemberProfileImage" value="<?php echo e($member->photograph); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('New Photograph ( 5 x 5 )')); ?></label>
                                                <div class="profile-upload">
                                                    <div class="upload-img">
                                                        <img id="imagePreview" name="newMemberProfileImage" alt="Add Member Photo" src="<?php echo e(asset ('public/icon/No_Images.jpg')); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label><?php echo e(__('Select New Photograph ( 5 x 5 )')); ?><span class="text-danger">&nbsp;*</span></label>
                                                <div class="profile-upload">
                                                    <div class="upload-input">
                                                        <input type="file" class="form-control" name="filePhotograph" onchange="profileProfileImagePreview(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የትውልድ ቀን | Date of Birth')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-sm-7 cal-icon">
                                            <input type="text" name="datMemberBirthDate" class="form-control" id="MemberBirthDatePicker" value="<?php echo e($member->birthDate); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('ዜግነት | Nationality')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <select class="select" name="cmbNationality">
                                                <option value=""><?php echo e(__('Select Nationality')); ?></option>
                                                <?php $__currentLoopData = DB::table('sfgbc_Setting_CountryList')->pluck('list_CountryNationality'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php if($member->nationality === $value): ?> <?php echo e($value); ?>" selected <?php else: ?> <?php echo e($value); ?>" <?php endif; ?> > <?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label><?php echo e(__('የአካል ጉዳት (ካለ) | Disability (If Any)')); ?></label>
                                        <textarea class="form-control" name="txaDisability"><?php echo e($member->disabilityType); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label><?php echo e(__('ማስታወሻ (መግለጫ) | Member\'s Remark')); ?></label>
                                        <textarea cols="30" rows="12" class="form-control" name="txaMemberRemark"><?php echo e($member->memberRemark); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-danger submit-btn"><?php echo e(__('SAVE CHANGES')); ?></button>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/members/edit.blade.php ENDPATH**/ ?>