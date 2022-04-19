<?php $__env->startSection('myPageTitle', 'አዲስ የአገልግሎት ዘርፍ መመዝገቢያ | New Service Sector Registration'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('servicesectors.index')); ?>"><?php echo e(__('Service Sectors')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Add Service Sector Data')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title"><?php echo e(__('አዲስ የአገልግሎት ዘርፍ መመዝገቢያ | New Service Sector Registration')); ?></h4>
                </div>
                <div class="col-4 text-right">
                    <a href="<?php echo e(route ('servicesectors.index')); ?>" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('ተመለስ | Back')); ?></strong></a>
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
            <form id="newMemberForm" action="<?php echo e(route ('servicesectors.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo e(method_field ('POST')); ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የአገልግሎት ዘርፉ ዓይነት | Service Sector\'s Type')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <select class="select" name="cmbServiceSectorType" required> 
                                                <option value=""><?php echo e(__('Select Service Sector Type')); ?></option>
                                                <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 16)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የተቋቋመበት ቀን | Founded Date')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="dateEstabilishedDate" id="SectorEstabilishedDatePicker" placeholder="Service Sector Estabilished Date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የአገልግሎት ዘርፉ ማብራሪያ | Service Sector\'s Description')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-12">
                                            <textarea rows="50" cols="5" class="richTextContent form-control" name="txaServiceSectorDescription" placeholder="Enter descriptions regarding the Service Sector in detail..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"><?php echo e(__('የአገልግሎት ዘርፉ ሁኔታ | Service Sector\'s Status')); ?><span class="text-danger">&nbsp;*</span></label>
                                        <div class="col-md-7">
                                            <?php $__currentLoopData = DB::table('sfgbc_Setting_LookupData')->where('list_LookupDataParent', '=', 27)->pluck('list_LookupDataName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="rdoSectorStatus" id="rdoSectorStatus_<?php echo e($value); ?>" value="<?php echo e($value); ?>">
                                                    <label class="form-check-label" for="rdoSectorStatus_<?php echo e($value); ?>"><?php echo e($value); ?></label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label"><?php echo e(__('የአገልግሎት ዘርፉ ማስታወሻ | Service Sector\'s Remarks')); ?></label>
                                        <div class="col-md-12">
                                            <textarea rows="10" cols="5" class="form-control" name="txaServiceSectorRemark" placeholder="Enter remarks regarding the fellowship..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center m-t-20">
                    <input class="btn btn-danger submit-btn" type="submit" value="CREATE SERVICE SECTOR">
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        // Ethiopian Calender
        $(function() {
            $('#SectorEstabilishedDatePicker').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
        });

        // Simple Rich Text Editor
        $('.richTextContent').richText();

        // Radio Button Enabler | Disabler
        function itemEducationLevelDataVisibility (params) {
            // Member's Education Level Information
            var isStillLearningHere_Yes = document.getElementById ("rdoStillLearningHere_Yes");
            eduCompletionDate.style.display =  !isStillLearningHere_Yes.checked ? "block" : "none";
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/servicesectors/create.blade.php ENDPATH**/ ?>