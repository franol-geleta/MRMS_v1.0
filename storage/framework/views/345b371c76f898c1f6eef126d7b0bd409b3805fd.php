<?php use App\Models\Members\MembersDataModel; ?>

<?php $__env->startSection('myPageTitle', 'የተዘዋወሩ አባላት ዝርዝር | Transfered Members\' Cataloge'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('members.index')); ?>"><?php echo e(__('Members')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('All Transfered Members')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4 class="page-title"><?php echo e(__('የተዘዋወሩ አባላት ዝርዝር | Transfered Members\' Cataloge')); ?></h4>
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
                                    <th style="min-width: 150px;"><?php echo e(__('Transfer ID')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Member ID')); ?></th>
                                    <th class="wrap" style="min-width: 400px;"><?php echo e(__('Photo || Full Name')); ?></th>
                                    <th style="min-width: 25px;"><?php echo e(__('Gender')); ?></th>
                                    <th style="min-width: 100px;"><?php echo e(__('Status')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Civil Status')); ?></th>
                                    <th style="min-width: 100px;"><?php echo e(__('Birth Date')); ?></th>
                                    <th style="min-width: 100px;"><?php echo e(__('Transfer Letter No.')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Transfer Type')); ?></th>
                                    <th style="min-width: 120px;"><?php echo e(__('Transfer Date')); ?></th>
                                    <th style="min-width: 200px;"><?php echo e(__('Transfer to Church')); ?></th>
                                    <th style="min-width: 120px;"><?php echo e(__('Transfer Location')); ?></th>
                                    <th style="min-width: 200px;"><?php echo e(__('Transfer Remark')); ?></th>
                                    <th class="text-center" style="min-width: 155px;"><?php echo e(__('Action ( # )')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $transferedMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data => $transferedMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        
                                        <td class="text-right">
                                            <div data-toggle="tooltip" data-placement="right" title="Action Key" class="dropdown dropdown-action">
                                                <a href="#" class="btn-sm btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="<?php echo e(route ('members.show', $transferedMember->idMember)); ?>"><i class="btn-sm btn btn-success fa fa-desktop"></i> <?php echo e(__('Show')); ?></a>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <?php if($transferedMember->idTransferedMemberData < 10): ?> <?php $inactiveZeroFillID = '0000000'.$transferedMember->idTransferedMemberData; ?>
                                            <?php elseif($transferedMember->idTransferedMemberData < 100): ?> <?php $inactiveZeroFillID = '000000'.$transferedMember->idTransferedMemberData; ?>
                                            <?php elseif($transferedMember->idTransferedMemberData < 1000): ?> <?php $inactiveZeroFillID = '00000'.$transferedMember->idTransferedMemberData; ?>
                                            <?php elseif($transferedMember->idTransferedMemberData < 10000): ?> <?php $inactiveZeroFillID = '0000'.$transferedMember->idTransferedMemberData; ?>
                                            <?php elseif($transferedMember->idTransferedMemberData < 10000): ?> <?php $inactiveZeroFillID = '000'.$transferedMember->idTransferedMemberData; ?>
                                            <?php elseif($transferedMember->idTransferedMemberData < 100000): ?> <?php $inactiveZeroFillID = '00'.$transferedMember->idTransferedMemberData; ?>
                                            <?php elseif($transferedMember->idTransferedMemberData < 1000000): ?> <?php $inactiveZeroFillID = '0'.$transferedMember->idTransferedMemberData; ?>
                                            <?php else: ?> <?php $inactiveZeroFillID = $transferedMember->idTransferedMemberData; ?> <?php endif; ?>

                                            <?php echo e($inactiveZeroFillID); ?>

                                        </td>
                                        <td>
                                            <?php $idPrefix = $transferedMember->prefix; ?>
                                                <?php if($transferedMember->idMember < 10): ?> <?php $zeroFillID = '0000000'.$transferedMember->idMember; ?>
                                                <?php elseif($transferedMember->idMember < 100): ?> <?php $zeroFillID = '000000'.$transferedMember->idMember; ?>
                                                <?php elseif($transferedMember->idMember < 1000): ?> <?php $zeroFillID = '00000'.$transferedMember->idMember; ?>
                                                <?php elseif($transferedMember->idMember < 10000): ?> <?php $zeroFillID = '0000'.$transferedMember->idMember; ?>
                                                <?php elseif($transferedMember->idMember < 10000): ?> <?php $zeroFillID = '000'.$transferedMember->idMember; ?>
                                                <?php elseif($transferedMember->idMember < 100000): ?> <?php $zeroFillID = '00'.$transferedMember->idMember; ?>
                                                <?php elseif($transferedMember->idMember < 1000000): ?> <?php $zeroFillID = '0'.$transferedMember->idMember; ?>
                                                <?php else: ?> <?php $zeroFillID = $transferedMember->idMember; ?> <?php endif; ?>
                                            <?php $idSuffix = $transferedMember->suffix; ?>
                                            
                                            <?php echo e($idPrefix.$zeroFillID.$idSuffix); ?>

                                        </td>
                                        <td>
                                            <img width="30" height="30" src="<?php echo e(URL::to($transferedMember->photograph)); ?>" class="rounded-circle" alt="|_No.Member.Photo_|">
                                            <h2><?php echo e($transferedMember->appellation.' '.$transferedMember->firstName.' '.$transferedMember->middleName.' '.$transferedMember->lastName); ?> </h2>
                                        </td>
                                        <td><?php echo e($transferedMember->gender); ?></td>
                                        <td>
                                            <?php if($transferedMember->status === 'Active'): ?> <span class="custom-badge status-green"><?php echo e($transferedMember->status); ?></span>
                                            <?php else: ?> <span class="custom-badge status-red"><?php echo e($transferedMember->status); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($transferedMember->civilStatus); ?></td>
                                        <td><?php echo e($transferedMember->birthDate); ?></td>
                                        <td><?php echo e($transferedMember->transferLetterNum); ?></td>
                                        <td><?php echo e($transferedMember->transferType); ?></td>
                                        <td><?php echo e($transferedMember->transferDate); ?></td>
                                        <td><?php echo e($transferedMember->churchTransfer); ?></td>
                                        <td><?php echo e($transferedMember->transferLocation); ?></td>
                                        <td><?php echo e(Str::of($transferedMember->transferRemark)->substr(0, 39)->append('...')); ?></td>

                                        
                                        <td class="text-right">
                                            <a data-toggle="tooltip" data-placement="top" title="Show" class="btn-sm btn btn-success fa fa-desktop" href="<?php echo e(URL::to ('members/show', $transferedMember->idMember)); ?>"></a>
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

<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/members/transfered.blade.php ENDPATH**/ ?>