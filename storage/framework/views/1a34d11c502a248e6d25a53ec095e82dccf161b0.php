<?php $__env->startSection('myPageTitle', 'ማስተካከያ | Setting'); ?>
<?php $__env->startSection('SettingContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-dashboard">&nbsp;&nbsp;</i><?php echo e(__('Home - Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Setting')); ?></li>
                    </ol>
                </nav>
            </div>
            <!-- Start app main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <h2 class="section-title" style="font-weight: bolder;"><?php echo e(__('Overview Setting')); ?></h2>
                        <br />
                        <p class="section-lead" style="font-weight: bolder;"><?php echo e(__('Organize and adjust all configurational settings about this site.')); ?></p>
                        <hr /><br />
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card card-large-icon">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="bg-danger text-white text-center">
                                                <h1><i class="fa fa-bank"></i></h1>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="card-body">
                                                <h3 style="font-weight: bolder;"><?php echo e(__('Church Profile Setup')); ?></h3>
                                                <p><?php echo e(__('This section is used to manage and modify general settings of the system owner; such as church name, site title, site description, address and so on.')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <a href="<?php echo e(route ('setting.church.getbrandname')); ?>" class="text-center " style="font-weight: bolder;"><?php echo e(__('Change Setting')); ?> <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card card-large-icon">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="bg-success text-white text-center">
                                                <h1><i class="fa fa-cubes"></i></h1>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="card-body">
                                                <h3 style="font-weight: bolder;"><?php echo e(__('System Variables Setup')); ?></h3>
                                                <p><?php echo e(__('This used to setup some system lookup data and variables that are very essential for the system.')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <a href="<?php echo e(route ('setting.systemvariable.getlookupdata')); ?>" class="text-center" style="font-weight: bolder;"><?php echo e(__('Change Setting')); ?> <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card card-large-icon">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="bg-dark text-white text-center">
                                                <h1><i class="fa fa-users"></i></h1>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="card-body">
                                                <h3 style="font-weight: bolder;"><?php echo e(__('User Account Manager')); ?></h3>
                                                <p><?php echo e(__('This is used to define and manage all user\'s account management; creating, modifing and assigning and revoking roles and previlages management.')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <a href="#" class="text-center" style="font-weight: bolder;"><?php echo e(__('Change Setting')); ?><i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card card-large-icon">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="bg-primary text-white text-center">
                                                <h1><i class="fa fa-recycle"></i></h1>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="card-body">
                                                <h3 style="font-weight: bolder;"><?php echo e(__('System Automation Setup')); ?></h3>
                                                <p><?php echo e(__('Settings about automation such as backup automation, restore operation and so on.')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <a href="#" class="text-center" style="font-weight: bolder;"><?php echo e(__('Change Setting')); ?><i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mrmsSettingLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/setting/index.blade.php ENDPATH**/ ?>