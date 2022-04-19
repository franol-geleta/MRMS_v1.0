<?php $__env->startSection('myPageTitle', 'የአባላት የማህደር ምስል ክምችት | Members\' Profile Picture Store'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('members.index')); ?>"><?php echo e(__('Members')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Members\' Profile Picture')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-10">
                    <h4 class="page-title"><?php echo e(__('የአባላት የማህደር ምስል ክምችት | Members\' Profile Picture Store')); ?></h4>
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
            
            <?php echo e($members->links()); ?> <hr />
            <div class="row">
                <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data => $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 m-b-20">
                        <a href="<?php echo e(route ('members.show', $member->idMember)); ?>">
                            <?php $zeroFillID = ""; $idPrefix = ""; $idSuffix = ""; $idPrefix = $member->prefix; ?>
                                <?php if($member->idMember < 10): ?> <?php $zeroFillID = '0000000'.$member->idMember; ?>
                                <?php elseif($member->idMember < 100): ?> <?php $zeroFillID = '000000'.$member->idMember; ?>
                                <?php elseif($member->idMember < 1000): ?> <?php $zeroFillID = '00000'.$member->idMember; ?>
                                <?php elseif($member->idMember < 10000): ?> <?php $zeroFillID = '0000'.$member->idMember; ?>
                                <?php elseif($member->idMember < 10000): ?> <?php $zeroFillID = '000'.$member->idMember; ?>
                                <?php elseif($member->idMember < 100000): ?> <?php $zeroFillID = '00'.$member->idMember; ?>
                                <?php elseif($member->idMember < 1000000): ?> <?php $zeroFillID = '0'.$member->idMember; ?>
                                <?php else: ?> <?php $zeroFillID = $member->idMember; ?> <?php endif; ?>
                            <?php $idSuffix = $member->suffix; ?>
                                                
                            <h5 style="text-align: center;"><?php echo e($idPrefix.$zeroFillID.$idSuffix); ?></h5>
                            
                            <img data-toggle="tooltip" data-placement="bottom" title="<?php echo e($member->appellation.' '.$member->firstName.' '.$member->middleName.' '.$member->lastName.' || '.$member->gender.' || '.$member->status); ?>" class="img-thumbnail" src="<?php echo e(URL::to($member->photograph)); ?>" alt="<?php echo e($idPrefix.$zeroFillID.$idSuffix.' | '.$member->appellation.' '.$member->firstName.' '.$member->middleName.' '.$member->lastName.' || '.$member->gender.' || '.$member->status); ?>">
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <hr />
            <?php echo e($members->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/members/avatar.blade.php ENDPATH**/ ?>