<?php
    use App\Models\Members\ServiceSectorDataModel;
    use App\Models\Members\FellowshipDataModel;
?>

<?php $__env->startSection('myPageTitle', 'የቢሮ አባላትና ኃላፊዎች ማህደር | Staff Members Profile'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('members.index')); ?>"><?php echo e(__('Members')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Staff Members Profile')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-10">
                    <h4 class="page-title"><?php echo e(__('የቢሮ አባላትና ኃላፊዎች ማህደር | Staff Members Profile')); ?></h4>
                </div>

                <div class="col-2 text-right">
                    <a href="<?php echo e(route ('members.index')); ?>" class="btn btn-primary float-right btn-rounded"><i class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('ተመለስ | Back')); ?></strong></a>
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

            <?php echo e($staffMembers->links()); ?> <hr />
            <div class="row doctor-grid">
                <?php $__currentLoopData = $staffMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data => $staffMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 col-sm-3  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="#"><img src="<?php echo e(URL::to($staffMember->photograph)); ?>" alt="Image"></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?php echo e(route ('members.show', $staffMember->idMember)); ?>"><i class="fa fa-pencil m-r-5"></i> <?php echo e(__('Show')); ?></a>
                                </div>
                            </div>
                            <h4 class="doctor-name text-ellipsis" style="font-weight: bolder;"><?php echo e($staffMember->appellation." ".$staffMember->firstName." ".$staffMember->middleName." ".$staffMember->lastName); ?></h4>
                            <div class="doc-prof"><?php if(is_NULL($staffMember->primaryPhone)): ?> <?php echo e(__(' - ')); ?> <?php else: ?> <?php echo e($staffMember->primaryPhone); ?> <?php endif; ?> <?php echo e(_(' / ')); ?> <?php if(is_NULL($staffMember->alternatePhone)): ?> <?php echo e(__(' - ')); ?> <?php else: ?> <?php echo e($staffMember->alternatePhone); ?> <?php endif; ?></div>
                            <div class="doc-prof"><?php if(is_NULL($staffMember->email)): ?> <?php echo e(__('No Email')); ?> <?php else: ?> <?php echo e($staffMember->email); ?> <?php endif; ?> </div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> <?php echo e($staffMember->municipality." city, around ". $staffMember->locationNaming." area."); ?>

                            </div>
                            <hr />
                            <div  class="user-country">
                                <label class="float-left" style="font-weight: bolder;"><?php echo e(__('Service Sector(s)')); ?></label><br />
                                <?php $__currentLoopData = ServiceSectorDataModel::where([['idMember', $staffMember->idMember], ['hasServiceSector', 'Yes']])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $memberServiceSectorData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="float-left"> <?php echo e($memberServiceSectorData->roleOnSector." @ ".$memberServiceSectorData->serviceSectorName."."); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <br />
                            <div class="user-country">
                                <label class="float-left" style="font-weight: bolder;"><br /><?php echo e(__('Fellowship(s)')); ?></label><br />
                                <?php $__currentLoopData = FellowshipDataModel::where([['idMember', $staffMember->idMember], ['hasFellowship', 'Yes'], ['roleOnFellowship', '!=' , 'Member']])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $memberFellowshipData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="float-left"><?php echo e($memberFellowshipData->roleOnFellowship." @ ". $memberFellowshipData->fellowshipType." on ".$memberFellowshipData->fellowshipName."."); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <hr />
            <?php echo e($staffMembers->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/members/staffmember.blade.php ENDPATH**/ ?>