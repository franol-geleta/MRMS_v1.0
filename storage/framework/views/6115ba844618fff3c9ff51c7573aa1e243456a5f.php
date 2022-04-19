<?php
    use App\Models\Members\MembersDataModel;
    use App\Models\ServiceSectors\ServiceSectorsDataModel;
    use App\Models\Fellowships\FellowshipsDataModel;
    use App\Models\Members\FellowshipDataModel;
?>

<?php $__env->startSection('myPageTitle', 'መነሻ ገጽ | Dashboard - Home'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href=""><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                    </ol>
                </nav>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-users" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                <?php $memberCount = DB::table('sfgbc_Members')->count(); ?> <?php echo e($memberCount); ?>

                            </h3>
                            <span class="widget-title1">Members <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg2"><i class="fa fa-male"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                <?php $maleMemberCount = MembersDataModel::where('gender', 'Male')->count(); ?> <?php echo e($maleMemberCount); ?>

                            </h3>
                            <span class="widget-title2">Male <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg4"><i class="fa fa-female" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                <?php $femaleMemberCount = MembersDataModel::where('gender', 'Female')->count(); ?> <?php echo e($femaleMemberCount); ?>

                            </h3>
                            <span class="widget-title4">Female <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3> 
                                <?php $inactiveMemberCount = MembersDataModel::where('status', 'Inactive')->count(); ?> <?php echo e($inactiveMemberCount); ?>

                            </h3>
                            <span class="widget-title3">Inactive <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php $newMembers = MembersDataModel::orderBy('idMember', 'DESC')->limit(7)->get(); ?> 
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block"><?php echo e(__('New Members')); ?></h4> <a href="<?php echo e(route ('members.index')); ?>" class="btn btn-primary float-right"><?php echo e(__('View all Members')); ?></a>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table mb-0 new-patient-table">
                                    <tbody>
                                        <tr>
                                            <th><?php echo e(__('Member\'s Full Name')); ?></th>
                                            <th><?php echo e(__('Gender')); ?></th>
                                            <th><?php echo e(__('Civil Status')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                        <?php $__currentLoopData = $newMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <img width="28" height="28" class="rounded-circle" src="<?php echo e($newMember->photograph); ?>" alt="">
                                                    <h2><?php echo e($newMember->appellation.' '.$newMember->firstName.' '.$newMember->middleName.' '.$newMember->lastName); ?></h2>
                                                </td>
                                                <td><?php echo e($newMember->gender); ?></td>
                                                <td><?php echo e($newMember->civilStatus); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route ('members.show', $newMember->idMember)); ?>"><button class="btn btn-danger btn-primary-one float-right">View</button></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="card member-panel">
                        <div class="card-header bg-white">
                            <h4 class="card-title mb-0"><?php echo e(__('Fellowship Leaders')); ?></h4>
                        </div>
                        <?php
                            $fellowshipStaffs = DB::table('sfgbc_Members')
                                ->join ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                                ->join ('sfgbc_member_FellowshipData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_FellowshipData.idMember')
                                ->select (
                                    'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.photograph',
                                    'sfgbc_member_ResidentialAddressData.primaryPhone',
                                    'sfgbc_member_FellowshipData.idMember', 'sfgbc_member_FellowshipData.roleOnFellowship', 'sfgbc_member_FellowshipData.fellowshipType', 'sfgbc_member_FellowshipData.fellowshipName'
                                )
                            ->where('sfgbc_member_FellowshipData.hasFellowship', '=', 'Yes', 'AND', 'sfgbc_member_FellowshipData.roleOnFellowship','!=', 'Member')
                            ->orderby('sfgbc_Members.firstName', 'ASC')
                            ->get();
                        ?>
                        <?php $__currentLoopData = $fellowshipStaffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fellowshipStaff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card-body">
                                <ul class="contact-list">
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a style="font-weight: bolder;" href="<?php echo e(route ('members.show', $fellowshipStaff->idMember)); ?>" title="<?php echo e($fellowshipStaff->appellation.' '.$fellowshipStaff->firstName.' '.$fellowshipStaff->middleName.' '.$fellowshipStaff->lastName); ?>"><img src="<?php echo e($fellowshipStaff->photograph); ?>" alt="<?php echo e($fellowshipStaff->appellation.' '.$fellowshipStaff->firstName.' '.$fellowshipStaff->middleName.' '.$fellowshipStaff->lastName); ?>" class="w-40 rounded-circle"><span class="status online"></span></a>
                                            </div>
                                            
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis"><a href="<?php echo e(route ('members.show', $fellowshipStaff->idMember)); ?>" title="<?php echo e($fellowshipStaff->appellation.' '.$fellowshipStaff->firstName.' '.$fellowshipStaff->middleName.' '.$fellowshipStaff->lastName); ?>"><strong><?php echo e($fellowshipStaff->appellation.' '.$fellowshipStaff->firstName.' '.$fellowshipStaff->middleName.' '.$fellowshipStaff->lastName); ?></strong></a></span>
                                                <span class="contact-date"><?php echo e($fellowshipStaff->roleOnFellowship.' @ '.$fellowshipStaff->fellowshipType.' on '.$fellowshipStaff->fellowshipName); ?></span>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-date"><?php echo e($fellowshipStaff->primaryPhone); ?></span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="card-header">
                            <a href="<?php echo e(route ('fellowships.index')); ?>" class="btn btn-dark float-right"><?php echo e(__('View all Fellowships')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                <?php $fellowshipCount = DB::table('sfgbc_Fellowships')->count(); ?> <?php echo e($fellowshipCount); ?>

                            </h3>
                            <span class="widget-title1">Fellowships<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg2"><i class="fa fa-map-signs" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                <?php $typeFellowshipCount = FellowshipsDataModel::distinct('fellowshipType')->count('fellowshipType'); ?> <?php echo e($typeFellowshipCount); ?>

                            </h3>
                            <span class="widget-title2">Type<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg4"><i class="fa fa-arrows"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                <?php $zoneFellowshipCount = FellowshipsDataModel::distinct('fellowshipZone')->count('fellowshipZone'); ?> <?php echo e($zoneFellowshipCount); ?>

                            </h3>
                            <span class="widget-title4">Zone<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3> 
                                <?php $inactiveFellowshipCount = FellowshipsDataModel::where('fellowshipStatus', 'Inactive')->count(); ?> <?php echo e($inactiveFellowshipCount); ?>

                            </h3>
                            <span class="widget-title3">Inactive<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block"><?php echo e(__('Upcoming Appointments')); ?></h4> <a href="#" class="btn btn-primary float-right"><?php echo e(__('View all Appointments')); ?></a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <th><?php echo e(__('Member\'s Full Name')); ?></th>
                                            <th><?php echo e(__('Gender')); ?></th>
                                            <th><?php echo e(__('Civil Status')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                        <?php $__currentLoopData = $newMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                               <td>
                                                    <img width="28" height="28" class="rounded-circle" src="<?php echo e($newMember->photograph); ?>" alt="">
                                                    <h2><?php echo e($newMember->appellation.' '.$newMember->firstName.' '.$newMember->middleName.' '.$newMember->lastName); ?></h2>
                                                </td>
                                                <td><?php echo e($newMember->gender); ?></td>
                                                <td><?php echo e($newMember->civilStatus); ?></td>
                                                  <td>
                                                    <a href="<?php echo e(route ('members.show', $newMember->idMember)); ?>"><button class="btn btn-danger btn-primary-one float-right">View</button></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="card member-panel">
                        <div class="card-header bg-white">
                            <h4 class="card-title mb-0"><strong><?php echo e(_('Service Sector Leaders')); ?></strong></h4>
                        </div>
                        <?php
                            $serviceSectorStaffs = DB::table('sfgbc_Members')
                                ->join ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                                ->join ('sfgbc_member_ServiceSectorData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ServiceSectorData.idMember')
                                ->select (
                                    'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.photograph',
                                    'sfgbc_member_ResidentialAddressData.primaryPhone',
                                    'sfgbc_member_ServiceSectorData.serviceSectorName', 'sfgbc_member_ServiceSectorData.roleOnSector'
                                )
                            ->where('sfgbc_member_ServiceSectorData.hasServiceSector', '=', 'Yes', 'AND', 'sfgbc_member_ServiceSectorData.roleOnSector','!=', 'Member')
                            ->orderby('sfgbc_Members.firstName', 'ASC')
                            ->get();
                        ?>
                        <?php $__currentLoopData = $serviceSectorStaffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceSectorStaff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card-body">
                                <ul class="contact-list">
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a style="font-weight: bolder;" href="<?php echo e(route ('members.show', $serviceSectorStaff->idMember)); ?>" title="<?php echo e($serviceSectorStaff->appellation.' '.$serviceSectorStaff->firstName.' '.$serviceSectorStaff->middleName.' '.$serviceSectorStaff->lastName); ?>"><img src="<?php echo e($serviceSectorStaff->photograph); ?>" alt="<?php echo e($serviceSectorStaff->appellation.' '.$serviceSectorStaff->firstName.' '.$serviceSectorStaff->middleName.' '.$serviceSectorStaff->lastName); ?>" class="w-40 rounded-circle"><span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis"><a href="<?php echo e(route ('members.show', $serviceSectorStaff->idMember)); ?>" title="<?php echo e($serviceSectorStaff->appellation.' '.$serviceSectorStaff->firstName.' '.$serviceSectorStaff->middleName.' '.$serviceSectorStaff->lastName); ?>"><strong><?php echo e($serviceSectorStaff->appellation.' '.$serviceSectorStaff->firstName.' '.$serviceSectorStaff->middleName.' '.$serviceSectorStaff->lastName); ?></strong></a></span>
                                                <span class="contact-date"><?php echo e($serviceSectorStaff->serviceSectorName.' on '.$serviceSectorStaff->roleOnSector); ?></span>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-date"><?php echo e($serviceSectorStaff->primaryPhone); ?></span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        <div class="card-header">
                            <a href="<?php echo e(route ('servicesectors.index')); ?>" class="btn btn-danger float-right"><?php echo e(__('View all Service Sectors')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-cubes" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                <?php $serviceSectorCount = DB::table('sfgbc_ServiceSectors')->count(); ?> <?php echo e($serviceSectorCount); ?>

                            </h3>
                            <span class="widget-title1"><?php echo e(__('Total Service Sector')); ?><i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg4"><i class="fa fa-puzzle-piece" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                <?php $typeServiceSectorCount = ServiceSectorsDataModel::distinct('serviceSectorType')->count('serviceSectorType'); ?> <?php echo e($typeServiceSectorCount); ?>

                            </h3>
                            <span class="widget-title4"><?php echo e(__('Service Sector Type')); ?><i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3> 
                                <?php $inactiveServiceSectorCount = ServiceSectorsDataModel::where('sectorStatus', 'Inactive')->count(); ?> <?php echo e($inactiveServiceSectorCount); ?>

                            </h3>
                            <span class="widget-title3"><?php echo e(__('Inactive Service Sector')); ?><i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/dashboard.blade.php ENDPATH**/ ?>