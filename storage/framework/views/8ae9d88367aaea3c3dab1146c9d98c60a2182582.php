<?php 
    use App\Models\Fellowships\FellowshipsDataModel;
    use Illuminate\Support\Facades\DB;
?>

<?php $__env->startSection('myPageTitle', 'የህብረት መረጃ መመዝገቢያ | Add Fellowship Data'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('members.index')); ?>"><?php echo e(__('Members')); ?></a></li>
                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('Fellowship')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Add Member\'s Fellowship Data')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-10 col-6">
                    <h4 class="page-title"><?php echo e(__('የአባሉ የህብረት መረጃ መመዝገቢያ | Add Member\'s Fellowship Data')); ?></h4>
                </div>
                <div class="col-2 text-right">
                    <a href="<?php echo e(route ('members.show', $memberFellowship->idMember)); ?>" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('ተመለስ | Back')); ?></strong></a>
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
                                <h3 class="user-name m-t-0 mb-0" style="font-weight:700;"><?php echo e($memberFellowship->appellation.' '.$memberFellowship->firstName.' '.$memberFellowship->middleName.' '.$memberFellowship->lastName); ?></h3><hr />
                            </div>
                        </div>
                        <div class="profile-view offset-1">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="<?php echo e(URL::to($memberFellowship->photograph)); ?>" alt="No Image"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-1">
                                        <br />&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-5 profile-info-left">
                                        <br />
                                        <?php if($memberFellowship->status === 'Active'): ?>
                                            <span class="col-12 custom-badge status-green"><?php echo e($memberFellowship->status); ?></span>
                                        <?php else: ?>
                                            <span class="col-12 custom-badge status-red"><?php echo e($memberFellowship->status); ?></span>
                                        <?php endif; ?>
                                        <?php $idPrefix = $memberFellowship->prefix; ?>
                                            <?php if($memberFellowship->idMember < 10): ?> <?php $zeroFillID = '0000000'.$memberFellowship->idMember; ?>
                                            <?php elseif($memberFellowship->idMember < 100): ?> <?php $zeroFillID = '000000'.$memberFellowship->idMember; ?>
                                            <?php elseif($memberFellowship->idMember < 1000): ?> <?php $zeroFillID = '00000'.$memberFellowship->idMember; ?>
                                            <?php elseif($memberFellowship->idMember < 10000): ?> <?php $zeroFillID = '0000'.$memberFellowship->idMember; ?>
                                            <?php elseif($memberFellowship->idMember < 10000): ?> <?php $zeroFillID = '000'.$memberFellowship->idMember; ?>
                                            <?php elseif($memberFellowship->idMember < 100000): ?> <?php $zeroFillID = '00'.$memberFellowship->idMember; ?>
                                            <?php elseif($memberFellowship->idMember < 1000000): ?> <?php $zeroFillID = '0'.$memberFellowship->idMember; ?>
                                            <?php else: ?> <?php $zeroFillID = $memberFellowship->idMember; ?> <?php endif; ?>
                                        <?php $idSuffix = $memberFellowship->suffix; ?>
                                        <div class="staff-id" style="font-weight: bold; color: green;"><?php echo e(__('Member\'s UID :')); ?>

                                            <?php echo e($idPrefix.$zeroFillID.$idSuffix); ?>

                                        </div>
                                        <br />
                                        <div class="col-md-12">
                                            <ul class="personal-info">
                                                <br />
                                                <li>
                                                    <span class="title"><?php echo e(__('Gender:')); ?></span>
                                                    <span class="text"><a href="#"><?php if($memberFellowship->gender == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberFellowship->gender); ?> <?php endif; ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title"><?php echo e(__('Civil Status:')); ?></span>
                                                    <span class="text"><a href="#"><?php if($memberFellowship->civilStatus == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberFellowship->civilStatus); ?> <?php endif; ?></a></span>
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
                                                        <span class="text"><a href="#"><?php if($memberFellowship->primaryPhone == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberFellowship->primaryPhone); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Email:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($memberFellowship->email == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberFellowship->email); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Birthday:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($memberFellowship->birthDate == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberFellowship->birthDate); ?> <?php endif; ?></a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title"><?php echo e(__('Nationality:')); ?></span>
                                                        <span class="text"><a href="#"><?php if($memberFellowship->nationality == NULL): ?> <?php echo e(__('N/A')); ?> <?php else: ?> <?php echo e($memberFellowship->nationality); ?> <?php endif; ?></a></span>
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
                        <h4 class="card-title"><?php echo e(__('የአባሉ የህብረት መረጃ መመዝገቢያ | Add Member\'s Fellowship Data')); ?></h4>
                        <form action="<?php echo e(route ('members.fellowship.store', $memberFellowship->idMember)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field ('POST')); ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-md-4" id="felFellowshipType">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label"><?php echo e(__('የህብረት ዓይነት | Fellowship Type')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span></label>
                                                    <select class="select form-control floating" name="cmbFellowshipType" required>
                                                        <option value=""><?php echo e(__('Select Fellowship Type')); ?></option>
                                                        <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 13)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-8" id="felFellowshipName">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label"><?php echo e(__('የህብረት ሥም | Fellowship Name')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span></label>
                                                    <select class="select form-control floating" name="cmbFellowshipName" required>
                                                        <option value=""><?php echo e(__('Select Fellowship Name')); ?></option>
                                                        <?php $valueFellowships = DB::table('sfgbc_Fellowships')->get(); ?>
                                                        <?php $__currentLoopData = $valueFellowships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valueFellow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($valueFellow->fellowshipType.' | '.$valueFellow->dayHeldOn.' | '.$valueFellow->startTime.' - '.$valueFellow->endTime); ?> <?php if($valueFellow->fellowshipLabel === NULL): ?> <?php echo e(''); ?> <?php else: ?> <?php echo e(' | '.$valueFellow->fellowshipLabel); ?> <?php endif; ?>">
                                                                <?php echo e($valueFellow->fellowshipType.' | '.$valueFellow->dayHeldOn.' | '.$valueFellow->startTime.' - '.$valueFellow->endTime); ?> <?php if($valueFellow->fellowshipLabel === NULL): ?> <?php echo e(''); ?> <?php else: ?> <?php echo e(' | '.$valueFellow->fellowshipLabel); ?> <?php endif; ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="felRoleOnFellowship">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label"><?php echo e(__('በህብረት ያለው ድርሻ | Role on Fellowship')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span></label>
                                                    <select class="select form-control floating" name="cmbRoleOnFellowship" required>
                                                        <option value=""><?php echo e(__('Select Role Type')); ?></option>
                                                        <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 11)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="felJoinedDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የተቀላቀለበት ቀን | Joined Date')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span></label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="datFellowshipJoinedDate" id="FellowshipJoinedDatePicker" placeholder="Fellowship Joined Date" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="felJoinedDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የሚካሄድበት አዳራሽ | Hall Name')); ?></label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="txtFellowshipHallName" placeholder="Hall Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="felStillParticipatingHere">
                                                <div class="form-group">
                                                    <label class="display-block"><?php echo e(__('አሁን እዚህ ይሳተፋሉ? | Still Participating here?')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span></label>
                                                    <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 26)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="rdoStillParticipatingHere" id="rdoStillParticipatingHere_<?php echo e($value); ?>" value="<?php echo e($value); ?>" onClick="itemFellowshipDataVisibility()" required>
                                                            <label class="form-check-label" for="rdoStillParticipatingHere_<?php echo e($value); ?>"><?php echo e($value); ?></label>
                                                        </div>  
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="felLeftDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የለቀቀበት ቀን | Lefted Date')); ?></label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="datFellowshipLeftDate" id="FellowshipLeftDatePicker" placeholder="Fellowship Left Date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="felLeftReason">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የለቀቀበት ምክንያት | Reason to Left')); ?></label>
                                                    <input type="text" class="form-control floating" name="txtFellowshipLeftReason" placeholder="Reason to left the fellowship">
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="felFellowshipRemarks">
                                                <div class="form-group">
                                                    <label class="focus-label"><?php echo e(__('የህብረት ማስታወሻ | Fellowship Remarks')); ?></label>
                                                    <textarea cols="30" rows="3" class="form-control" name="txaFellowshipRemarks" placeholder="Please leave your comment regarding the fellowship here..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="hdnMemberID" value="<?php echo e($memberFellowship->idMember); ?>">
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
            $('#FellowshipJoinedDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#FellowshipLeftDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });
        // Radio Button Enabler | Disabler
        function itemFellowshipDataVisibility (params) {
            // Member's Fellowship Information
            var isStillParticipatingHereYes = document.getElementById ("rdoStillParticipatingHere_Yes");
            
            felLeftDate.style.display = !isStillParticipatingHereYes.checked ? "block" : "none";
            felLeftReason.style.display = !isStillParticipatingHereYes.checked ? "block" : "none";
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/members/fellowship/create.blade.php ENDPATH**/ ?>