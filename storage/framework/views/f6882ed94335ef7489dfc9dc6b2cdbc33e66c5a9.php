<?php $__env->startSection('myPageTitle', 'የአባሉ የአገልግሎት ዘርፍ መረጃ መመዝገቢያ | Add Service Sector Data'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('members.index')); ?>"><?php echo e(__('Members')); ?></a></li>
                        <li class="breadcrumb-item"><a href="#  "><?php echo e(__('Service Sector')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Add Member\'s Service Sector Data')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-10 col-6">
                    <h4 class="page-title"><?php echo e(__('የአባሉ የአገልግሎት ዘርፍ መረጃ መመዝገቢያ | Add Member\'s Service Sector Data')); ?></h4>
                </div>
                <div class="col-2 text-right">
                    <a href="<?php echo e(route ('members.show', $memberServiceSector->idMember)); ?>" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('ተመለስ | Back')); ?></strong></a>
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
                                <h3 class="user-name m-t-0 mb-0" style="font-weight:700;"><?php echo e($memberServiceSector->appellation.' '.$memberServiceSector->firstName.' '.$memberServiceSector->middleName.' '.$memberServiceSector->lastName); ?></h3><hr />
                            </div>
                        </div>
                        <div class="profile-view offset-1">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="<?php echo e(URL::to($memberServiceSector->photograph)); ?>" alt="No Image"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-1">
                                        <br />&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-5 profile-info-left">
                                        <br />
                                        <?php if($memberServiceSector->status === 'Active'): ?>
                                            <span class="col-12 custom-badge status-green"><?php echo e($memberServiceSector->status); ?></span>
                                        <?php else: ?>
                                            <span class="col-12 custom-badge status-red"><?php echo e($memberServiceSector->status); ?></span>
                                        <?php endif; ?>
                                        <?php $idPrefix = $memberServiceSector->prefix; ?>
                                            <?php if($memberServiceSector->idMember < 10): ?> <?php $zeroFillID = '0000000'.$memberServiceSector->idMember; ?>
                                            <?php elseif($memberServiceSector->idMember < 100): ?> <?php $zeroFillID = '000000'.$memberServiceSector->idMember; ?>
                                            <?php elseif($memberServiceSector->idMember < 1000): ?> <?php $zeroFillID = '00000'.$memberServiceSector->idMember; ?>
                                            <?php elseif($memberServiceSector->idMember < 10000): ?> <?php $zeroFillID = '0000'.$memberServiceSector->idMember; ?>
                                            <?php elseif($memberServiceSector->idMember < 10000): ?> <?php $zeroFillID = '000'.$memberServiceSector->idMember; ?>
                                            <?php elseif($memberServiceSector->idMember < 100000): ?> <?php $zeroFillID = '00'.$memberServiceSector->idMember; ?>
                                            <?php elseif($memberServiceSector->idMember < 1000000): ?> <?php $zeroFillID = '0'.$memberServiceSector->idMember; ?>
                                            <?php else: ?> <?php $zeroFillID = $memberServiceSector->idMember; ?> <?php endif; ?>
                                        <?php $idSuffix = $memberServiceSector->suffix; ?>
                                        <div class="staff-id" style="font-weight: bold; color: green;"><?php echo e(__('Member\'s UID :')); ?>

                                            <?php echo e($idPrefix.$zeroFillID.$idSuffix); ?>

                                        </div>
                                        <br />
                                        <div class="col-md-12">
                                            <ul class="personal-info">
                                                <br />
                                                <li>
                                                    <span class="title"><?php echo e(__('Gender:')); ?></span>
                                                    <span class="text"><a href="#"><?php if($memberServiceSector->gender == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberServiceSector->gender); ?> <?php endif; ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title"><?php echo e(__('Civil Status:')); ?></span>
                                                    <span class="text"><a href="#"><?php if($memberServiceSector->civilStatus == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberServiceSector->civilStatus); ?> <?php endif; ?></a></span>
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
                                                        <span class="text"><a href="#"><?php if($memberServiceSector->primaryPhone == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberServiceSector->primaryPhone); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Email:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($memberServiceSector->email == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberServiceSector->email); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Birthday:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($memberServiceSector->birthDate == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberServiceSector->birthDate); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Nationality:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($memberServiceSector->nationality == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberServiceSector->nationality); ?> <?php endif; ?></a></span>
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
                        <h4 class="card-title"><?php echo e(__('የአባሉ የአገልግሎት ዘርፍ መረጃ መመዝገቢያ | Add Member\'s Service Sector Data')); ?></h4>
                        <form action="<?php echo e(route ('members.servicesector.store', $memberServiceSector->idMember)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field ('POST')); ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-md-4" id="srvServiceSector">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label"><?php echo e(__('የአገልግሎት ዘርፍ | Service Sector')); ?></label>
                                                    <select class="select form-control floating" name="cmbServiceSector" required>
                                                        <option value=""><?php echo e(__('Select Service Sector')); ?></option>
                                                            <?php $valueServiceSectors = DB::table('sfgbc_ServiceSectors')->get(); ?>
                                                            <?php $__currentLoopData = $valueServiceSectors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valueServiceSector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($valueServiceSector->serviceSectorType.' | '.$valueServiceSector->sectorStatus); ?>">
                                                                    <?php echo e($valueServiceSector->serviceSectorType.' | '.$valueServiceSector->sectorStatus); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="srvRoleOnServiceSector">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label"><?php echo e(__('በዘርፉ ያለው ድርሻ | Role on Sector')); ?></label>
                                                    <select class="select form-control floating" name="cmbRoleOnServiceSector" required>
                                                        <option value=""><?php echo e(__('Select Role Type')); ?></option>
                                                        <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 11)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="srvJoinedDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የተቀላቀለበት ቀን | Joined Date')); ?></label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="datSectorJoinedDate" id="SectorJoinedDatePicker" placeholder="Member's Service Sector Joined Date" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="srvStillServingHere">
                                                <div class="form-group">
                                                    <label class="display-block"><?php echo e(__('አሁን እዚህ ያገለግላሉ? | Still Serving here?')); ?></label>
                                                    <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 26)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="rdoStillServingHere" id="rdoStillServingHere_<?php echo e($value); ?>" value="<?php echo e($value); ?>" onClick="itemServiceSectorDataVisibility()">
                                                            <label class="form-check-label" for="rdoStillServingHere_<?php echo e($value); ?>"><?php echo e($value); ?></label>
                                                        </div>  
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="srvLeftDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የለቀቀበት ቀን | Lefted Date')); ?></label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="datSectorLeftDate" id="SectorLeftDatePicker" placeholder="Member's Service Sector Left Date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="srvLeftReason">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የለቀቀበት ምክንያት | Lefted Reason')); ?></label>
                                                    <input type="text" class="form-control floating" name="txtSectorLeftReason" placeholder="Reason to left the service sector">
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="srvBurden">
                                                <div class="form-group">
                                                    <label class="focus-label"><?php echo e(__('አባሉ ያለው የአገልግሎት ሸክም | Burden Member has')); ?></label>
                                                    <textarea cols="30" rows="3" class="form-control" name="txaBurden" placeholder="Please leave your comment regarding member's burden and service sector participation here..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="srvServiceSectorRemarks">
                                                <div class="form-group">
                                                    <label class="focus-label"><?php echo e(__('በአገልግሎት ዘርፉ ላይ ማስታወሻ | Service Sector Remarks')); ?></label>
                                                    <textarea cols="30" rows="5" class="form-control" name="txaServiceSectorRemarks" placeholder="Please leave your comment regarding member's burden and service sector participation here..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="hdnMemberID" value="<?php echo e($memberServiceSector->idMember); ?>">
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
            $('#SectorJoinedDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#SectorLeftDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });
        function itemServiceSectorDataVisibility (params) {
            // Member's Service Sector Information
            var isStillServingHereYes = document.getElementById ("rdoStillServingHere_Yes");

            srvLeftDate.style.display = !isStillServingHereYes.checked ? "block" : "none";
            srvLeftReason.style.display = !isStillServingHereYes.checked ? "block" : "none";
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/members/servicesector/create.blade.php ENDPATH**/ ?>