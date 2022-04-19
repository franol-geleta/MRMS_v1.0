<?php $__env->startSection('myPageTitle', 'አዲስ የአባልነት መረጃ መመዝገቢያ | New Membership Data'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-dashboard">&nbsp;&nbsp;</i><?php echo e(__('Home - Dashboard')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('members.index')); ?>"><?php echo e(__('Members')); ?></a></li>
                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('Membership')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Add Member\'s Membership Data')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-10 col-6">
                    <h4 class="page-title"><?php echo e(__('አዲስ የአባሉ የአባልነት መረጃ መመዝገቢያ | Add Member\'s Membership Data')); ?></h4>
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
                        <h3 class="card-title"><?php echo e(__('የአባልነት መረጃ | Membership Information')); ?></h3>
                        <form action="<?php echo e(route ('members.membership.store', $member->idMember)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field ('POST')); ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label class="display-block"><?php echo e(__('አባል የሆነበት መንገድ')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span><?php echo e(__(' | How Become Member')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="rdoHowBecameMember" id="rdoHowBecameNewBeliever" value="New Beliver" onclick="itemMembershipDataVisibility()" required>
                                                        <label class="form-check-label" for="product_active"><?php echo e(__('አዲስ አማኝ | New Believer')); ?></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="rdoHowBecameMember" id="rdoHowBecameTransfer" value="Transfer" onclick="itemMembershipDataVisibility ()">
                                                        <label class="form-check-label" for="product_inactive"><?php echo e(__('በዝውውር | Transfer')); ?></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="rdoHowBecameMember" id="rdoHowBecameOtherCase" value="Other Case" onclick="itemMembershipDataVisibility ()">
                                                        <label class="form-check-label" for="product_inactive"><?php echo e(__('ሌላ ምክንያት | Other Case')); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5" id="memBelievedDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('ያመነበት ቀን')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span><?php echo e(__(' | Believed Date')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span></label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="datBelievedDate" id="BelievedDatePicker" placeholder="Believed Date" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="memBaptizedDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የተጠመቀበት ቀን')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span><?php echo e(__(' | Baptized Date')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span></label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating" name="datBaptizedDate" id="BaptizedDatePicker" placeholder="Baptized Date" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8" id="memPreviousReligion">
                                                <div class="form-group form-focus select-focus">
                                                    <label class="focus-label"><?php echo e(__('የቀድሞ ቤተ-እምነት')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span><?php echo e(__(' | Preveious Denomination')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span></label>
                                                    <input type="text" class="form-control floating" name="txtPrevDenomination" required placeholder="Preveious Denomination">
                                                </div>
                                            </div>
                                            <div class="col-md-8" id="memWhoThought">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('የድነት ትምህርት ያስተማረው')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span><?php echo e(__(' | Who Thought Doctrine')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span></label>
                                                    <input type="text" class="form-control floating" name="txtWhoThought" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="memMembershipDate">
                                                <div class="form-group form-focus">
                                                    <label class="focus-label"><?php echo e(__('አባል የሆነበት ቀን')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span><?php echo e(__(' | Membership Date')); ?><span class="text-danger"> <?php echo e(__(' *')); ?></span></label>
                                                    <input type="text" class="form-control floating" name="datMembershipDate" id="MembershipDatePicker" placeholder="MembershipDate" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="memServingKind">
                                                <div class="form-group">
                                                    <label class="focus-label"><?php echo e(__('ያገለግል የነበረበት ዘርፍ | In What Kind Was Serving')); ?></label>
                                                    <div class="cal-icon">
                                                        <textarea cols="30" rows="3" class="form-control floating" name="txaServingKind" placeholder="Please leave your comment regarding the how member serving here..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="memMembershipRemarks">
                                                <div class="form-group">
                                                    <label class="focus-label"><?php echo e(__('አባልነትን የተመለከተ ማስታወሻ | Membership Remarks')); ?></label>
                                                    <textarea cols="30" rows="3" class="form-control" name="txaMembershipRemarks" placeholder="Please leave your comment regarding the membership here..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            $('#BelievedDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#BaptizedDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
            $('#MembershipDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });

        // Radio Button Enabler | Disabler
        function itemMembershipDataVisibility (params) {
            // Member's Membership Information
            var isMembershipNewBeliever = document.getElementById ("rdoHowBecameNewBeliever");
            var isMembershipTransfer = document.getElementById ("rdoHowBecameTransfer");
            var isMembershipOtherCase = document.getElementById ("rdoHowBecameOtherCase");

            if (isMembershipNewBeliever.checked) {
                memServingKind.style.display = "none";
            }
            else if (isMembershipTransfer.checked || isMembershipOtherCase.checked) {
                memServingKind.style.display = "block";
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/members/membership/create.blade.php ENDPATH**/ ?>