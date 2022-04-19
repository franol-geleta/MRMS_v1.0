<?php $__env->startSection('myPageTitle', 'የህብረቱ መረጃ ማሳያ | Show Fellowship Data'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('fellowships.index')); ?>"><?php echo e(__('Fellowships')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Show Fellowship Data')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="page-title"><?php echo e(__('የህብረቱ መረጃ ማሳያ | Show Fellowship Data')); ?></h4>
                </div>
                <div class="col-3 text-right">
                    <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                        <a href="<?php echo e(route ('fellowships.edit', $fellowship->idFellowship)); ?>" class="btn btn-warning float-right btn-rounded"><i class="fa fa-edit">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('አስተካክል | Edit')); ?></strong></a>
                    <?php endif; ?>
                </div>
                <div class="col-3 text-right">
                    <a href="<?php echo e(route ('fellowships.index')); ?>" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('ተመለስ | Back')); ?></strong></a>
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
                <div class="col-lg-10 offset-lg-1">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field ('POST')); ?>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የህብረቱ መለያ | Fellowship ID')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($fellowship->idFellowship); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የህብረቱ ዓይነት | Fellowship Type')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($fellowship->fellowshipType); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-5 col-form-label"><?php echo e(__('የህብረቱ ስያሜ | Fellowship Label')); ?></label>
                                    <input type="text" class="form-control" name="txtFellowshipLabel" value="<?php echo e($fellowship->fellowshipLabel); ?>" placeholder="የህብረቱ ስያሜ | Fellowship Label">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የሚካሄድበት ቀን | Fellowship Day Held On')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($fellowship->dayHeldOn); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የሚጀምርበት ሰዓት | Starting Time')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="time" value="<?php echo e($fellowship->startTime); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የሚያበቃበት ሰዓት | Ending Time')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="time" value="<?php echo e($fellowship->endTime); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('ህብረቱ የሚገኝበት ዞን | Fellowship Zone')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($fellowship->fellowshipZone); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የሚካሄድበት ቤት ባለቤት ስም | Location Owner Name')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control" value="<?php echo e($fellowship->locationOwner); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group gender-select">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የሚካሄድበት ቦታ ስም | Location Naming')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control" value="<?php echo e($fellowship->locationNaming); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የተመሰረተበት ቀን | Founded Date')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($fellowship->estabilishedDate); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('በድጋሚ ተዋቅሯል | Is Restructured')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($fellowship->isRestructured); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የተዋቀረበት ዓይነት | Restructure Type')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($fellowship->restructureType); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የተዋቀረበት ቀን | Restructure Date')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($fellowship->restructuredDate); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-form-label"><?php echo e(__('የተዋቀረበት ምክንያት | Reason for Restructure')); ?><span class="text-danger">&nbsp;*</span></label>
                            <textarea class="form-control" rows="7" cols="30"><?php echo e($fellowship->restructureReason); ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('ወደ ምን ተዋቀረ | Restructured to')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($fellowship->restructuredToFellowship); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የህብረቱ ሁኔታ | Fellowship Status')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($fellowship->fellowshipStatus); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-form-label"><?php echo e(__('የህብረቱ ማስታወሻ | Fellowship Remark')); ?><span class="text-danger">&nbsp;*</span></label>
                            <textarea class="form-control" rows="12" cols="30"><?php echo e($fellowship->fellowshipRemark); ?></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/fellowships/show.blade.php ENDPATH**/ ?>