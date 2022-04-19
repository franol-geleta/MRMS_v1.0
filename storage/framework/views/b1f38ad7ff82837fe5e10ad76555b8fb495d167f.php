<?php use App\Models\Members\MembersDataModel; ?>

<?php $__env->startSection('myPageTitle', 'የክሰሙ አባላት ዝርዝር | Deactivated Members\' Cataloge'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('members.index')); ?>"><?php echo e(__('Members')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('All Inactive Members')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4 class="page-title"><?php echo e(__('የክሰሙ አባላት ዝርዝር | Deactivated Members\' Cataloge')); ?></h4>
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
                                    <th style="min-width: 100px;"><?php echo e(__('Deactivated #')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Member ID')); ?></th>
                                    <th class="wrap" style="min-width: 400px;"><?php echo e(__('Photo || Full Name')); ?></th>
                                    <th style="min-width: 25px;"><?php echo e(__('Gender')); ?></th>
                                    <th style="min-width: 100px;"><?php echo e(__('Status')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Civil Status')); ?></th>
                                    <th style="min-width: 100px;"><?php echo e(__('Phone Number')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Email')); ?></th>
                                    <th style="min-width: 100px;"><?php echo e(__('Birth Date')); ?></th>

                                    <th style="min-width: 100px;"><?php echo e(__('Transfer Letter No.')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Transfer Type')); ?></th>
                                    <th style="min-width: 120px;"><?php echo e(__('Transfer Date')); ?></th>
                                    <th style="min-width: 200px;"><?php echo e(__('Transfer to Church')); ?></th>
                                    <th style="min-width: 120px;"><?php echo e(__('Transfer Location')); ?></th>

                                    <th style="min-width: 150px;"><?php echo e(__('Decease Date')); ?></th>
                                    <th style="min-width: 200px;"><?php echo e(__('Decease Reason')); ?></th>
                                    <th style="min-width: 100px;"><?php echo e(__('Who Notified')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Relationship with Deceased')); ?></th>
                                    <th style="min-width: 120px;"><?php echo e(__('Funeral Place')); ?></th>
                                    <th style="min-width: 120px;"><?php echo e(__('Funeral Date')); ?></th>
                                    <th style="min-width: 120px;"><?php echo e(__('Funeral Time')); ?></th>
                                    <th style="min-width: 100px;"><?php echo e(__('Funeral Coordinator')); ?></th>

                                    <th class="text-center" style="min-width: 155px;"><?php echo e(__('Action ( # )')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $dataCounter = 0; ?>
                                <?php $__currentLoopData = $inactiveMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data => $inactiveMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        
                                        <td class="text-right">
                                            <div data-toggle="tooltip" data-placement="right" title="Action Key" class="dropdown dropdown-action">
                                                <a href="#" class="btn-sm btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="<?php echo e(route ('members.show', $inactiveMember->idMember)); ?>"><i class="btn-sm btn btn-success fa fa-desktop"></i> <?php echo e(__('Show')); ?></a>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <td><?php echo e(++$dataCounter); ?></td>
                                        <td>
                                            <?php $idPrefix = $inactiveMember->prefix; ?>
                                                <?php if($inactiveMember->idMember < 10): ?> <?php $zeroFillID = '0000000'.$inactiveMember->idMember; ?>
                                                <?php elseif($inactiveMember->idMember < 100): ?> <?php $zeroFillID = '000000'.$inactiveMember->idMember; ?>
                                                <?php elseif($inactiveMember->idMember < 1000): ?> <?php $zeroFillID = '00000'.$inactiveMember->idMember; ?>
                                                <?php elseif($inactiveMember->idMember < 10000): ?> <?php $zeroFillID = '0000'.$inactiveMember->idMember; ?>
                                                <?php elseif($inactiveMember->idMember < 10000): ?> <?php $zeroFillID = '000'.$inactiveMember->idMember; ?>
                                                <?php elseif($inactiveMember->idMember < 100000): ?> <?php $zeroFillID = '00'.$inactiveMember->idMember; ?>
                                                <?php elseif($inactiveMember->idMember < 1000000): ?> <?php $zeroFillID = '0'.$inactiveMember->idMember; ?>
                                                <?php else: ?> <?php $zeroFillID = $inactiveMember->idMember; ?> <?php endif; ?>
                                            <?php $idSuffix = $inactiveMember->suffix; ?>
                                            
                                            <?php echo e($idPrefix.$zeroFillID.$idSuffix); ?>

                                        </td>
                                        <td>
                                            <img width="30" height="30" src="<?php echo e(URL::to($inactiveMember->photograph)); ?>" class="rounded-circle" alt="|_No.Member.Photo_|">
                                            <h2><?php echo e($inactiveMember->appellation.' '.$inactiveMember->firstName.' '.$inactiveMember->middleName.' '.$inactiveMember->lastName); ?> </h2>
                                        </td>
                                        <td><?php echo e($inactiveMember->gender); ?></td>
                                        <td>
                                            <?php if($inactiveMember->status === 'Active'): ?> <span class="custom-badge status-green"><?php echo e($inactiveMember->status); ?></span>
                                            <?php else: ?> <span class="custom-badge status-red"><?php echo e($inactiveMember->status); ?></span>
                                            <?php endif; ?>
                                        </td>

                                        <td><?php echo e($inactiveMember->civilStatus); ?></td>
                                        <td><?php echo e($inactiveMember->primaryPhone); ?></td>
                                        <td><?php echo e($inactiveMember->email); ?></td>
                                        <td><?php echo e($inactiveMember->birthDate); ?></td>

                                        <td><?php echo e($inactiveMember->transferLetterNum); ?></td>
                                        <td><?php echo e($inactiveMember->transferType); ?></td>
                                        <td><?php echo e($inactiveMember->transferDate); ?></td>
                                        <td><?php echo e($inactiveMember->churchTransfer); ?></td>
                                        <td><?php echo e($inactiveMember->transferLocation); ?></td>

                                        <td><?php echo e($inactiveMember->deceaseDate); ?></td>
                                        <td><?php echo e($inactiveMember->deceaseReason); ?></td>
                                        <td><?php echo e($inactiveMember->whoNotified); ?></td>
                                        <td><?php echo e($inactiveMember->deceaseRelationship); ?></td>
                                        <td><?php echo e($inactiveMember->funeralPlace); ?></td>
                                        <td><?php echo e($inactiveMember->funeralDate); ?></td>
                                        <td><?php echo e($inactiveMember->funeralTime); ?></td>
                                        <td><?php echo e($inactiveMember->funeralCoordinator); ?></td>
                                        
                                        
                                        <td class="text-right">
                                            <a data-toggle="tooltip" data-placement="top" title="Show" class="btn-sm btn btn-success fa fa-desktop" href="<?php echo e(URL::to ('members/show', $inactiveMember->idMember)); ?>"></a>
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

<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/members/inactive.blade.php ENDPATH**/ ?>