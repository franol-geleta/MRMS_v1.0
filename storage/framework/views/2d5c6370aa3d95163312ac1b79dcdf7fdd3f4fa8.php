<?php $__env->startSection('myPageTitle', 'የአገልግሎት ዘርፍ መረጃ ማሳያ | Show Service Sector\'s Data'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('servicesectors.index')); ?>"><?php echo e(__('Service Sectors')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Show Service Sector Data')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="page-title"><?php echo e(__('የአገልግሎት ዘርፉ መረጃ ማሳያ | Show Service Sectors\'s Data')); ?></h4>
                </div>
                <div class="col-3 text-right">
                    <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                        <a href="<?php echo e(route ('servicesectors.edit', $servicesector->idServiceSector)); ?>" class="btn btn-warning float-right btn-rounded"><i class="fa fa-edit">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('አስተካክል | Edit')); ?></strong></a>
                    <?php endif; ?>
                </div>
                <div class="col-3 text-right">
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

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የአገልግሎት ዘርፉ መለያ | Service Sector ID')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($servicesector->idServiceSector); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የተመሰረተበት ቀን | Founded Date')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($servicesector->estabilishedDate); ?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የአገልግሎት ዘርፉ ዓይነት | Service Sector Type')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($servicesector->serviceSectorType); ?>">
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="col-md-12 col-form-label"><?php echo e(__('የአገልግሎት ዘርፉ ማብራሪያ | Service Sector Description')); ?><span class="text-danger">&nbsp;*</span></label>
                            <textarea class="richTextContent form-control" rows="12" cols="30" disabled><?php echo e($servicesector->description); ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('በድጋሚ ተዋቅሯል | Is Restructured')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($servicesector->isRestructured); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የተዋቀረበት ዓይነት | Restructure Type')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($servicesector->restructureType); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የተዋቀረበት ቀን | Restructure Date')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($servicesector->restructureDate); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-10 col-form-label"><?php echo e(__('ወደ ምን ተዋቀረ | Restructured to')); ?><span class="text-danger">&nbsp;*</span></label>
                            <input class="form-control" type="text" value="<?php echo e($servicesector->restructuredToServiceSector); ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-form-label"><?php echo e(__('የተዋቀረበት ምክንያት | Reason for Restructure')); ?><span class="text-danger">&nbsp;*</span></label>
                            <textarea class="form-control" rows="7" cols="30"><?php echo e($servicesector->restructureReason); ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-10 col-form-label"><?php echo e(__('የአገልግሎት ዘርፉ ሁኔታ | Fellowship Status')); ?><span class="text-danger">&nbsp;*</span></label>
                                    <input class="form-control" type="text" value="<?php echo e($servicesector->sectorStatus); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-form-label"><?php echo e(__('የአገልግሎት ዘርፉ ማስታወሻ | Fellowship Remark')); ?><span class="text-danger">&nbsp;*</span></label>
                            <textarea class="form-control" rows="12" cols="30"><?php echo e($servicesector->serviceSectorRemark); ?></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // Simple Rich Text Editor
        $('.richTextContent').richText();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/servicesectors/show.blade.php ENDPATH**/ ?>