<?php $__env->startSection('myPageTitle', 'የመኖሪያ አድራሻ ማስተካከያ | Edit Residential Address Data'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-dashboard">&nbsp;&nbsp;</i><?php echo e(__('Home - Dashboard')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('members.index')); ?>"><?php echo e(__('Members')); ?></a></li>
                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('Residential Address')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Edit Member\'s Residential Address')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-10 col-6">
                    <h4 class="page-title"><?php echo e(__('የአባሉ የመኖሪያ አድራሻ ማስተካከያ | Edit Member\'s Residential Address Data')); ?></h4>
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
                        <h4 class="card-title"><?php echo e(__('የአባሉ የመኖሪያ አድራሻ | Member\'s Residential Address')); ?></h4>
                        <form action="<?php echo e(route ('members.residentialaddress.update', $member->idResidentialAddressData)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field ('PUT')); ?>

                            <input type="hidden" class="form-control floating" name="hdnMemberIDNum" value="<?php echo e($member->idMember); ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label"><?php echo html_entity_decode('ሀገር <span style="font-weight: bolder; color: RED;">*</span> | Country <span style="font-weight: bolder; color: RED;">*</span>'); ?></label>
                                                    <select class="select form-control floating" name="cmbCountry" required>
                                                        <option value=""><?php echo e(__('Select Country')); ?></option>

                                                        <?php $__currentLoopData = DB::table('sfgbc_Setting_CountryList')->pluck('list_CountryName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php if($member->country === $value): ?> <?php echo e($value); ?>" selected <?php else: ?> <?php echo e($value); ?>" <?php endif; ?> > <?php echo e($value); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label"><?php echo html_entity_decode('ግዛት <span style="font-weight: bolder; color: RED;">*</span> | Province <span style="font-weight: bolder; color: RED;">*</span>'); ?></label>
                                                    <select class="select form-control floating" name="cmbProvince" required>
                                                        <option value=""><?php echo e(__('Select Province')); ?></option>
                                                        <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 5)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php if($member->province === $value): ?> <?php echo e($value); ?>" selected <?php else: ?> <?php echo e($value); ?>" <?php endif; ?>><?php echo e($value); ?> </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo html_entity_decode('ከተማ <span style="font-weight: bolder; color: RED;">*</span> | Municipality <span style="font-weight: bolder; color: RED;">*</span>'); ?></label>
                                                    <input type="text" class="form-control floating" name="txtMunicipality" required placeholder="Your City | Town..." value="<?php echo e($member->municipality); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የመንገድ ሥም/ቁጥር | Street Name/Num.')); ?></label>
                                                    <input type="text" class="form-control floating" name="txtStreetName" placeholder="Street name/number" value="<?php echo e($member->streetname); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('ዞን | Zone')); ?></label>
                                                    <input type="text" class="form-control floating" name="txtZone" placeholder="Your Zone | Ketena" value="<?php echo e($member->zone); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label"><?php echo html_entity_decode('ክፍለ ከተማ <span style="font-weight: bolder; color: RED;">*</span> | Subcity <span style="font-weight: bolder; color: RED;">*</span>'); ?></label>
                                                    <select class="select form-control floating" name="cmbSubcity" required>
                                                        <option value=""><?php echo e(__('Select Subcity')); ?></option>
                                                        <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 6)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php if($member->subcity === $value): ?> <?php echo e($value); ?>" selected <?php else: ?> <?php echo e($value); ?>" <?php endif; ?>><?php echo e($value); ?> </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo html_entity_decode('ወረዳ <span style="font-weight: bolder; color: RED;">*</span> | Woreda <span style="font-weight: bolder; color: RED;">*</span>'); ?></label>
                                                    <input type="text" class="form-control floating" name="txtWoreda" required placeholder="Woreda" value="<?php echo e($member->woreda); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('ቀበሌ | Kebele')); ?></label>
                                                    <input type="text" class="form-control floating" name="txtKebele" placeholder="Kebele" value="<?php echo e($member->kebele); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('ሰፈር | Block')); ?></label>
                                                    <input type="text" class="form-control floating" name="txtBlockMender" placeholder="Your Block | Mender | Sefer" value="<?php echo e($member->block); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የቤት ቁጥር | House No.')); ?></label>
                                                    <input type="text" class="form-control floating" name="txtHouseNum" placeholder="House No." value="<?php echo e($member->houseNum); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo html_entity_decode('የቦታው ልዩ መጠሪያ ስም <span style="font-weight: bolder; color: RED;">*</span> | Location Naming <span style="font-weight: bolder; color: RED;">*</span>'); ?></label>
                                                    <input type="text" class="form-control floating" name="txtLocationNaming" required placeholder="Location | Place Naming" value="<?php echo e($member->locationNaming); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo html_entity_decode('ሞባይል (ቀዳሚ) <span style="font-weight: bolder; color: RED;">*</span> | Mobile (Primary) <span style="font-weight: bolder; color: RED;">*</span>'); ?></label>
                                                    <div class="cal-icon">
                                                        <input class="form-control floating" type="tel" name="telePrimaryMobile" required placeholder="Mobile phone" value="<?php echo e($member->primaryPhone); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('ሞባይል (አማራጭ) | Mobile (Optional)')); ?></label>
                                                    <div class="cal-icon">
                                                        <input class="form-control floating" type="tel" name="teleAlternateMobile" placeholder="Mobile phone (additional)" value="<?php echo e($member->alternatePhone); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የቤት ስልክ | Home Telephone')); ?></label>
                                                    <div class="cal-icon">
                                                        <input class="form-control floating" type="tel" name="teleHomeTelephone" placeholder="Home landline phone" value="<?php echo e($member->homeTelephone); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የቢሮ ስልክ | Office Telephone')); ?></label>
                                                    <div class="cal-icon">
                                                        <input class="form-control floating" type="tel" name="teleOfficeTelephone" placeholder="Office landline phone" value="<?php echo e($member->officeTelephone); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('ፖስታ ሣ.ቁ. | P.O.Box')); ?></label>
                                                    <input type="text" class="form-control floating" name="txtPostalCode" placeholder="12345 code 6789" value="<?php echo e($member->postCode); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('ኢሜይል | Email')); ?></label>
                                                    <input type="email" class="form-control floating" name="txtEmail" placeholder="username@somedomain.xyz" value="<?php echo e($member->email); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="focus-label"><?php echo e(__('የአድራሻ ማስታወሻ | Address Remarks')); ?></label>
                                                    <textarea cols="30" rows="10" class="form-control" name="txaAddressRemarks" placeholder="Please leave your comment regarding the member's address here..."><?php echo e($member->residentialAddressRemark); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center m-t-20">
                                <input class="btn btn-danger submit-btn" type="submit" value="SAVE CHANGES">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/members/residentialaddress/edit.blade.php ENDPATH**/ ?>