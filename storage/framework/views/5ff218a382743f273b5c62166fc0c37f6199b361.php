<?php use App\Models\Members\MembersDataModel; ?>

<?php $__env->startSection('myPageTitle', 'የአባላት ዝርዝር | Members\' Cataloge'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Members')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-9">
                    <h4 class="page-title"><?php echo e(__('የአባላት ዝርዝር | Members\' Cataloge')); ?></h4>
                </div>
                <div class="col-3 text-right">
                    <a href="<?php echo e(route ('members.create')); ?>" class="btn btn-danger float-right btn-rounded"><i class="fa fa-user-plus">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('Add New Member')); ?></strong></a>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-7">
                    <form action="" method="" id="" name="">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group form-focus">
                                    <label class="focus-label"><?php echo e(__('የአባላት መፈለጊያ | Search Members')); ?></label>
                                    <input type="text" name="txtSearchMember" id="iSearchMember" class="form-control floating" placeholder="የአባሉ ስም | Member's Name">
                                </div>
                            </div>
                            <div class="col-md-4 filter-row">
                                <a href="#" class="btn btn-success btn-block"> <strong><?php echo e(__('ፈልግ | Search')); ?></strong> </a><br />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 filter-row">
                    <div class="col-md-12">
                        
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Comma Delimited Text (*.csv) file" href="<?php echo e(route ('members.tocsv')); ?>" class="btn btn-secondary float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to CSV (Comma Delimited Spreedsheet) format?');"><i class="fa fa-file-text-o">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('csv')); ?></strong></a>
                    </div>
                    <div class="col-md-12">
                        
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Spreadsheet Format (*.xlxs | *.ods) file" href="<?php echo e(route ('members.toexcel')); ?>" class="btn btn-warning float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to EXCEL (MS-Excel Spreedsheet) format?');"><i class="fa fa-file-excel-o">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('Excel')); ?></strong></a>
                    </div>
                    <div class="col-md-12">
                         
                        
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Portable Document Format (*.pdf) file" href="#" class="btn btn-primary float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to PDF (Portable Document File) format?');"><i class="fa fa-file-pdf-o">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('pdf')); ?></strong></a>
                    </div>
                </div>
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
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                
                                <tr>
                                    <th class="text-center" style="min-width: 10px;"><?php echo e(__('#')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Member ID')); ?></th>
                                    <th class="wrap" style="min-width: 400px;"><?php echo e(__('Photo || Full Name')); ?></th>
                                    <th style="min-width: 25px;"><?php echo e(__('Gender')); ?></th>
                                    <th style="min-width: 100px;"><?php echo e(__('Status')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Civil Status')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Primary Phone No.')); ?></th>
                                    <th style="min-width: 200px;"><?php echo e(__('Email Address')); ?></th>
                                    <th style="min-width: 100px;"><?php echo e(__('Birth Date')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('How Became Member')); ?></th>
                                    <th style="min-width: 120px;"><?php echo e(__('Believed Date')); ?></th>
                                    <th style="min-width: 120px;"><?php echo e(__('Baptaized Date')); ?></th>
                                    <th style="min-width: 120px;"><?php echo e(__('Membership Date')); ?></th>
                                    <th style="min-width: 200px;"><?php echo e(__('Location Naming')); ?></th>
                                    <th style="min-width: 100px;"><?php echo e(__('Nationality')); ?></th>
                                    <th class="text-center" style="min-width: 155px;"><?php echo e(__('Action ( # )')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data => $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        
                                        <td class="text-right">
                                            <div data-toggle="tooltip" data-placement="right" title="Action Key" class="dropdown dropdown-action">
                                                <a href="#" class="btn-sm btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="<?php echo e(route ('members.show', $member->idMember)); ?>"><i class="btn-sm btn btn-success fa fa-desktop"></i> <?php echo e(__('Show')); ?></a>
                                                    <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                                        <a class="dropdown-item" href="<?php echo e(route ('members.edit', $member->idMember)); ?>" onClick="return confirm ('Are you SURE to EDIT this member\'s data?');"><i class="btn-sm btn btn-warning fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                                    <?php endif; ?>
                                                    <?php if(Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active'): ?>
                                                        <a class="dropdown-item" href="<?php echo e(route ('members.remove', $member->idMember)); ?>" onClick="return confirm ('Are you SURE to DELETE this member\'s data?');"><i class="btn-sm btn btn-danger fa fa-trash"></i> <?php echo e(__('Delete')); ?></a>
                                                    <?php endif; ?>
                                                    <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                                        <a class="dropdown-item" href="<?php echo e(route ('members.deactivate', $member->idMember)); ?>" onClick="return confirm ('Are you SURE to DEACTIVATE this member\'s data?');"><i class="btn-sm btn btn-dark fa fa-times"></i> <?php echo e(__('Deactivate')); ?></a>
                                                    <?php endif; ?>
                                                    
                                                </div>
                                            </div>
                                        </td>

                                        
                                        <td>
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
                                            
                                            <?php echo e($idPrefix.$zeroFillID.$idSuffix); ?>

                                        </td>
                                        <td>
                                            <img width="30" height="30" src="<?php echo e(URL::to($member->photograph)); ?>" class="rounded-circle" alt="|_No.Member.Photo_|">
                                            <h2><?php echo e($member->appellation.' '.$member->firstName.' '.$member->middleName.' '.$member->lastName); ?> </h2>
                                        </td>
                                        <td><?php echo e($member->gender); ?></td>
                                        <td>
                                            <?php if($member->status === 'Active'): ?> <span class="custom-badge status-green"><?php echo e($member->status); ?></span>
                                            <?php else: ?> <span class="custom-badge status-red"><?php echo e($member->status); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($member->civilStatus); ?></td>
                                        <td><?php echo e($member->primaryPhone); ?></td>
                                        <td><?php echo e($member->email); ?></td>
                                        <td><?php echo e($member->birthDate); ?></td>
                                        <td><?php echo e($member->howBecameMember); ?></td>
                                        <td><?php echo e($member->believedDate); ?></td>
                                        <td><?php echo e($member->baptizedDate); ?></td>
                                        <td><?php echo e($member->membershipDate); ?></td>
                                        <td><?php echo e(Str::of($member->locationNaming)->substr(0, 39)->append('...')); ?></td>
                                        <td><?php echo e($member->nationality); ?></td>

                                        
                                        <td class="text-right">
                                            <a data-toggle="tooltip" data-placement="top" title="Show" class="btn-sm btn btn-success fa fa-desktop" href="<?php echo e(URL::to ('members/show', $member->idMember)); ?>"></a>
                                            <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn-sm btn btn-warning fa fa-edit" href="<?php echo e(URL::to ('members/edit', $member->idMember)); ?>" onClick="return confirm ('Are you SURE to EDIT this member\'s data?');"></a>
                                            <?php endif; ?>
                                            <?php if(Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active'): ?>
                                                <a data-toggle="tooltip" data-placement="top" title="Delete" class="btn-sm btn btn-danger fa fa-trash" href="<?php echo e(URL::to ('members/remove', $member->idMember)); ?>" data-toggle="modal" onClick="return confirm ('Are you SURE to DELETE this member\'s data?');"></a>
                                            <?php endif; ?>
                                            <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                                <a data-toggle="tooltip" data-placement="top" title="Deactivate" class="btn-sm btn btn-dark fa fa-times" href="<?php echo e(URL::to ('members/deactivate', $member->idMember)); ?>" data-toggle="modal" onClick="return confirm ('Are you SURE to DEACTIVATE this member\'s data?');"></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <hr />
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        //
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/members/index.blade.php ENDPATH**/ ?>