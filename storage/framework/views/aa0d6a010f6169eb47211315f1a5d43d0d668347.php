<?php $__env->startSection('myPageTitle', 'የአባሉ የቤተሰብ አባል ማሳያ | Show Family Member Data'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('members.index')); ?>"><?php echo e(__('Members')); ?></a></li>
                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('Family Member')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Show Member\'s Family Member Data')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8 col-6">
                    <h4 class="page-title"><?php echo e(__('የአባሉ የቤተሰብ አባል ማሳያ | Show Member\'s Familiy Member Data')); ?></h4>
                </div>
                <div class="col-2 text-right">
                    <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                        <a href="<?php echo e(route ('members.familymember.edit', $memberFamilyMember->idFamilyMember)); ?>" class="btn btn-warning float-right btn-rounded"><i class="fa fa-edit">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('አስተካክል | Edit')); ?></strong></a>
                    <?php endif; ?>
                </div>
                <div class="col-2 text-right">
                    <a href="<?php echo e(route ('members.show', $memberFamilyMember->idMember)); ?>" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('ተመለስ | Back')); ?></strong></a>
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
                                <h3 class="user-name m-t-0 mb-0" style="font-weight:700;"><?php echo e($memberFamilyMember->appellation.' '.$memberFamilyMember->firstName.' '.$memberFamilyMember->middleName.' '.$memberFamilyMember->lastName); ?></h3><hr />
                            </div>
                        </div>
                        <div class="profile-view offset-1">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="<?php echo e(URL::to($memberFamilyMember->photograph)); ?>" alt="No Image"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-1">
                                        <br />&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-5 profile-info-left">
                                        <br />
                                        <?php if($memberFamilyMember->status === 'Active'): ?>
                                            <span class="col-12 custom-badge status-green"><?php echo e($memberFamilyMember->status); ?></span>
                                        <?php else: ?>
                                            <span class="col-12 custom-badge status-red"><?php echo e($memberFamilyMember->status); ?></span>
                                        <?php endif; ?>
                                        <?php $idPrefix = $memberFamilyMember->prefix; ?>
                                            <?php if($memberFamilyMember->idMember < 10): ?> <?php $zeroFillID = '0000000'.$memberFamilyMember->idMember; ?>
                                            <?php elseif($memberFamilyMember->idMember < 100): ?> <?php $zeroFillID = '000000'.$memberFamilyMember->idMember; ?>
                                            <?php elseif($memberFamilyMember->idMember < 1000): ?> <?php $zeroFillID = '00000'.$memberFamilyMember->idMember; ?>
                                            <?php elseif($memberFamilyMember->idMember < 10000): ?> <?php $zeroFillID = '0000'.$memberFamilyMember->idMember; ?>
                                            <?php elseif($memberFamilyMember->idMember < 10000): ?> <?php $zeroFillID = '000'.$memberFamilyMember->idMember; ?>
                                            <?php elseif($memberFamilyMember->idMember < 100000): ?> <?php $zeroFillID = '00'.$memberFamilyMember->idMember; ?>
                                            <?php elseif($memberFamilyMember->idMember < 1000000): ?> <?php $zeroFillID = '0'.$memberFamilyMember->idMember; ?>
                                            <?php else: ?> <?php $zeroFillID = $memberFamilyMember->idMember; ?> <?php endif; ?>
                                        <?php $idSuffix = $memberFamilyMember->suffix; ?>
                                        <div class="staff-id" style="font-weight: bold; color: green;"><?php echo e(__('Member\'s UID :')); ?>

                                            <?php echo e($idPrefix.$zeroFillID.$idSuffix); ?>

                                        </div>
                                        <br />
                                        <div class="col-md-12">
                                            <ul class="personal-info">
                                                <br />
                                                <li>
                                                    <span class="title"><?php echo e(__('Gender:')); ?></span>
                                                    <span class="text"><a href="#"><?php if($memberFamilyMember->gender == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberFamilyMember->gender); ?> <?php endif; ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title"><?php echo e(__('Civil Status:')); ?></span>
                                                    <span class="text"><a href="#"><?php if($memberFamilyMember->civilStatus == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberFamilyMember->civilStatus); ?> <?php endif; ?></a></span>
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
                                                        <span class="text"><a href="#"><?php if($memberFamilyMember->primaryPhone == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberFamilyMember->primaryPhone); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Email:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($memberFamilyMember->email == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberFamilyMember->email); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Birthday:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($memberFamilyMember->birthDate == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberFamilyMember->birthDate); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Nationality:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($memberFamilyMember->nationality == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberFamilyMember->nationality); ?> <?php endif; ?></a></span>
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
                        <h4 class="card-title"><?php echo e(__('የአባሉ የቤተሰብ አባል | Member\'s Family Member')); ?></h4>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field ('POST')); ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-md-3" id="famFullName">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የቤተሰብ አባል መለያ | Family Member ID')); ?></label>
                                                    <input type="text" class="form-control floating" name="txtFamilyMemberID" value="<?php echo e($memberFamilyMember->idFamilyMember); ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label"><?php echo e(__('ማዕረግ | Appillation')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span></label>
                                                    <select class="select form-control floating" name="cmbFamilyAppillation">
                                                        <option value=""><?php echo e(__('Select Appillation')); ?></option>
                                                        <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 12)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php if($memberFamilyMember->famAppillation === $value): ?> <?php echo e($value); ?>" selected <?php else: ?> <?php echo e($value); ?>" <?php endif; ?>><?php echo e($value); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="famFullName">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የአባሉ ሥም | First Name')); ?></label>
                                                    <input type="text" class="form-control floating" name="txtFamilyFirstName" value="<?php echo e($memberFamilyMember->famFirstName); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="famFullName">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የአባት ሥም | Middle Name')); ?></label>
                                                    <input type="text" class="form-control floating" name="txtFamilyMiddleName" value="<?php echo e($memberFamilyMember->famMiddleName); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="famFullName">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የአያት ሥም | Last Name')); ?></label>
                                                    <input type="text" class="form-control floating" name="txtFamilyLastName" value="<?php echo e($memberFamilyMember->famLastName); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="famGender">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label"><?php echo e(__('ፆታ | Gender')); ?></label>
                                                    <select class="select form-control floating" name="cmbFamilyGender">
                                                        <option value=""><?php echo e(__('Select Gender')); ?></option>
                                                        <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 1)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php if($memberFamilyMember->famGender === $value): ?> <?php echo e($value); ?>" selected <?php else: ?> <?php echo e($value); ?>" <?php endif; ?>><?php echo e($value); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="famRelationship">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label"><?php echo e(__('ዝምድና | Relationship')); ?></label>
                                                    <select class="select form-control floating" name="cmbRelationship">
                                                        <option value=""><?php echo e(__('Select Relationship Type')); ?></option>
                                                        <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 14)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php if($memberFamilyMember->relationship === $value): ?> <?php echo e($value); ?>" selected <?php else: ?> <?php echo e($value); ?>" <?php endif; ?>><?php echo e($value); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="famBirthDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የትውልድ ቀን | Date of Birth')); ?></label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="datFamilyBirthDate" id="FamilyBirthDatePicker" value="<?php echo e($memberFamilyMember->famBirthDate); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="famWorshipingDenomination">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የሚያመልክበት ቤተ-እምነት | Worshiping Denomination')); ?></label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="txtWorshipingDenomination" value="<?php echo e($memberFamilyMember->worshipingDenomination); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="famFamilyMemberStatus">
                                                <div class="form-group">
                                                    <label class="display-block"><?php echo e(__('የቤተሰብ አባል ሁኔታ | Family Member Status')); ?></label>
                                                    <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 28)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="rdoFamilyMemberStatus" id="rdoFamilyMemberStatus_<?php echo e($value); ?>" value="<?php if($memberFamilyMember->familyStatus === $value): ?> <?php echo e($value); ?>" checked <?php else: ?> <?php echo e($value); ?>" <?php endif; ?>>
                                                            <label class="form-check-label" for="rdoFamilyMemberStatus_<?php echo e($value); ?>"><?php echo e($value); ?></label>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
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
            $('#FamilyBirthDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/members/familymember/show.blade.php ENDPATH**/ ?>