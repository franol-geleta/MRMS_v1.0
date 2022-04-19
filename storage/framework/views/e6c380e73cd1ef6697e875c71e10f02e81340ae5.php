<?php $__env->startSection('myPageTitle', 'የአዲስ ህብረት መመዝገቢያ | New Fellowship Registration'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('fellowships.index')); ?>"><?php echo e(__('Fellowships')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Add Fellowship Data')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title"><?php echo e(__('የአዲስ ህብረት መረጃ መመዝገቢያ | New Fellowship Data Registration')); ?></h4>
                </div>
                <div class="col-4 text-right">
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
            <form id="newMemberForm" action="<?php echo e(route ('fellowships.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo e(method_field ('POST')); ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የህብረቱ ዓይነት | Fellowship Type')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <select class="select" name="cmbFellowshipType" required> 
                                                <option value=""><?php echo e(__('Select Fellowship Type')); ?></option>
                                                <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 13)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የህብረቱ ስያሜ | Fellowship Label')); ?></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="txtFellowshipLabel" placeholder="የህብረቱ ስያሜ | Fellowship Label">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የቤተክርስቲያን ዞን | Church Local Zone')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <select class="select" name="cmbFellowshipZone" required>
                                                <option value=""><?php echo e(__('Select Church Local Zone')); ?></option>
                                                <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 25)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የሚካሄድበት ቤት ባለቤት ስም | Location Owner Name')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="txtLocationOwner" placeholder="የሚካሄድበት ቤት ባለቤት ስም | Location Owner Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የሚካሄድበት ቦታ ስም | Location Naming')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="txtFellowshipLocation" placeholder="የሚካሄድበት ቦታ ስም | Location Naming">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የተቋቋመበት ቀን | Founded Date')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="dateFoundedDate" id="FellowshipFoundedDatePicker" placeholder="Fellowship Founded Date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የሚካሄድበት ቀን | Fellowship Day')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <select class="select" name="cmbFellowshipHeldOn" required> 
                                                <option value=""><?php echo e(__('Select Fellowship Day Held On')); ?></option>
                                                <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 21)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የሚጀምርበት ሰዓት | Starting Time')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <input type="time" name="timeStartingTime" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የሚያበቃበት ሰዓት | End Time')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <input type="time" name="timeEndingTime" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የህብረቱ ሁኔታ | Fellowship Status')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 27)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="rdoFellowshipStatus" id="rdoFellowshipStatus_<?php echo e($value); ?>" value="<?php echo e($value); ?>">
                                                    <label class="form-check-label" for="rdoFellowshipStatus_<?php echo e($value); ?>"><?php echo e($value); ?></label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label"><?php echo e(__('የህብረቱ ማስታወሻ | Fellowship Remarks')); ?></label>
                                        <div class="col-md-12">
                                            <textarea rows="10" cols="5" class="form-control" name="txaFellowshipRemark" placeholder="Enter remarks regarding the fellowship..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center m-t-20">
                    <input class="btn btn-danger submit-btn" type="submit" value="CREATE FELLOWSHIP">
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        // Ethiopian Calender
        $(function() {
            $('#FellowshipFoundedDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });

        // Radio Button Enabler | Disabler
        function itemEducationLevelDataVisibility (params) {
            // Member's Education Level Information
            var isStillLearningHere_Yes = document.getElementById ("rdoStillLearningHere_Yes");
            eduCompletionDate.style.display =  !isStillLearningHere_Yes.checked ? "block" : "none";
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/fellowships/create.blade.php ENDPATH**/ ?>