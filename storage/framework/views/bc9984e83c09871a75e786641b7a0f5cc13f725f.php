<?php use App\Models\Fellowships\FellowshipsDataModel; ?>

<?php $__env->startSection('myPageTitle', 'የህብረቶች ዝርዝር | Fellowships\' Cataloge'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Fellowships')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-9">
                    <h4 class="page-title"><?php echo e(__('የህብረቶች ዝርዝር | Fellowships\' Cataloge')); ?></h4>
                </div>
                <div class="col-3 text-right">
                    <a href="<?php echo e(route ('fellowships.create')); ?>" class="btn btn-danger float-right btn-rounded"><i class="fa fa-user-plus">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('Add New Fellowship')); ?></strong></a>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group form-focus">
                        <label class="focus-label"><?php echo e(__('የህብረቶች መፈለጊያ | Search Fellowships')); ?></label>
                        <input type="text" class="form-control floating" placeholder="የህብረቱ ስም | Fellowship's Name">
                    </div>
                </div>
                <div class="col-md-2 filter-row">
                    <a href="#" class="btn btn-success btn-block"> <strong><?php echo e(__('ፈልግ | Search')); ?></strong> </a><br />
                </div>
                <div class="col-md-5 filter-row">
                    <div class="col-md-12">
                        
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Comma Delimited Text (*.csv) file" href="<?php echo e(route ('fellowships.tocsv')); ?>" class="btn btn-secondary float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to CSV (Comma Delimited Spreedsheet) format?');"><i class="fa fa-file-text-o">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('csv')); ?></strong></a>
                    </div>
                    <div class="col-md-12">
                        
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Spreadsheet Format (*.xlxs | *.ods) file" href="<?php echo e(route ('fellowships.toexcel')); ?>" class="btn btn-warning float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to EXCEL (MS-Excel Spreedsheet) format?');"><i class="fa fa-file-excel-o">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('Excel')); ?></strong></a>
                    </div>
                    <div class="col-md-12">
                        
                        
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Portable Document Format (*.pdf) file" href="#" class="btn btn-primary float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to PDF (Portable Document File) format?');"><i class="fa fa-file-pdf-o">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('pdf')); ?></strong></a>
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
                                    <th style="min-width: 100px;"><?php echo e(__('Fellowship ID')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Fellowship Type')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Fellowship Label')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Day Held On')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Fellowship Time')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Fellowship Zone')); ?></th>
                                    <th style="min-width: 100px;"><?php echo e(__('Status')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Location Owner')); ?></th>
                                    <th style="min-width: 250px;"><?php echo e(__('Location Naming')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Estabilished On')); ?></th>
                                    <th style="min-width: 120px;"><?php echo e(__('Is Restructured')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Restructure Type')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Restructured On')); ?></th>
                                    <th style="min-width: 220px;"><?php echo e(__('Restructured To Fellowship')); ?></th>
                                    <th style="min-width: 200px;"><?php echo e(__('Restructure Reason')); ?></th>
                                    <th style="min-width: 250px;"><?php echo e(__('Remark')); ?></th>
                                    <th class="text-center" style="min-width: 155px;"><?php echo e(__('Action ( # )')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $fellowships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data => $fellowship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        
                                        <td class="text-right">
                                            <div data-toggle="tooltip" data-placement="right" title="Action Key" class="dropdown dropdown-action">
                                                <a href="#" class="btn-sm btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="<?php echo e(route ('fellowships.show', $fellowship->idFellowship)); ?>"><i class="btn-sm btn btn-success fa fa-desktop"></i> <?php echo e(__('Show')); ?></a>
                                                    <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                                        <a class="dropdown-item" href="<?php echo e(route ('fellowships.edit', $fellowship->idFellowship)); ?>" onClick="return confirmEdit('Are you SURE to EDIT this member\'s data?');"><i class="btn-sm btn btn-warning fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                                    <?php endif; ?>
                                                    <?php if(Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active'): ?>
                                                        <a class="dropdown-item" href="<?php echo e(route ('fellowships.remove', $fellowship->idFellowship)); ?>" onClick="return confirmDelete('Are you SURE to DELETE this member\'s data?');"><i class="btn-sm btn btn-danger fa fa-trash"></i> <?php echo e(__('Delete')); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <?php if($fellowship->idFellowship < 10): ?> <?php $zeroFillID = '0000000'.$fellowship->idFellowship; ?>
                                            <?php elseif($fellowship->idFellowship < 100): ?> <?php $zeroFillID = '000000'.$fellowship->idFellowship; ?>
                                            <?php elseif($fellowship->idFellowship < 1000): ?> <?php $zeroFillID = '00000'.$fellowship->idFellowship; ?>
                                            <?php elseif($fellowship->idFellowship < 10000): ?> <?php $zeroFillID = '0000'.$fellowship->idFellowship; ?>
                                            <?php elseif($fellowship->idFellowship < 10000): ?> <?php $zeroFillID = '000'.$fellowship->idFellowship; ?>
                                            <?php elseif($fellowship->idFellowship < 100000): ?> <?php $zeroFillID = '00'.$fellowship->idFellowship; ?>
                                            <?php elseif($fellowship->idFellowship < 1000000): ?> <?php $zeroFillID = '0'.$fellowship->idFellowship; ?>
                                            <?php else: ?> <?php $zeroFillID = $fellowship->idFellowship; ?> <?php endif; ?>
                                            <?php echo e($zeroFillID); ?>

                                        </td>
                                        <td><h2><?php echo e($fellowship->fellowshipType); ?></h2></td>
                                        <td><h2><?php echo e($fellowship->fellowshipLabel); ?></h2></td>
                                        <td><?php echo e($fellowship->dayHeldOn); ?></td>
                                        <td><?php echo e($fellowship->startTime. ' - ' .$fellowship->endTime); ?></td>
                                        <td><?php echo e($fellowship->fellowshipZone); ?></td>
                                        <td>
                                            <?php if($fellowship->fellowshipStatus === 'Active'): ?> <span class="custom-badge status-green"><?php echo e($fellowship->fellowshipStatus); ?></span>
                                            <?php else: ?> <span class="custom-badge status-red"><?php echo e($fellowship->fellowshipStatus); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($fellowship->locationOwner); ?></td>
                                        <td><?php echo e(Str::of($fellowship->locationNaming)->substr(0, 39)->append('...')); ?></td>
                                        <td><?php echo e($fellowship->estabilishedDate); ?></td>
                                        <td><?php echo e($fellowship->isRestructured); ?></td>
                                        <td><?php echo e($fellowship->restructureType); ?></td>
                                        <td><?php echo e($fellowship->restructuredDate); ?></td>
                                        <td><?php echo e($fellowship->restructuredToFellowship); ?></td>
                                        <td><?php echo e(Str::of($fellowship->restructureReason)->substr(0, 39)->append('...')); ?></td>
                                        <td><?php echo e(Str::of($fellowship->fellowshipRemark)->substr(0, 39)->append('...')); ?></td>

                                        
                                        <td class="text-right">
                                            <a data-toggle="tooltip" data-placement="top" title="Show" class="btn-sm btn btn-success fa fa-desktop" href="<?php echo e(route ('fellowships.show', $fellowship->idFellowship)); ?>"></a>
                                            <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn-sm btn btn-warning fa fa-edit" href="<?php echo e(route ('fellowships.edit', $fellowship->idFellowship)); ?>" onClick="return confirmEdit('Are you SURE to EDIT this member\'s data?');"></a>
                                            <?php endif; ?>
                                            <?php if(Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active'): ?>
                                                <a data-toggle="tooltip" data-placement="top" title="Delete" class="btn-sm btn btn-danger fa fa-trash" href="<?php echo e(route ('fellowships.remove', $fellowship->idFellowship)); ?>" data-toggle="modal" onClick="return confirmDelete('Are you SURE to DELETE this member\'s data?');"></a>
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
        $.confirmEdit ({
            title : 'Confirm!' ,
            // content : 'confirm!' ,
            confirm : function (){
                alert ( 'Operation Confirmed!' );
            },
            cancel : function (){
                alert ( 'Operation Canceled!' );
            }
        });

        $.confirmDelete ({
            title : 'Confirm!' ,
            // content : 'confirm!' ,
            confirm : function (){
                alert ( 'Operation Confirmed!' );
            },
            cancel : function (){
                alert ( 'Operation Canceled!' );
            }
        });
        
        $.confirmDeactivate ({
            title : 'Confirm!' ,
            // content : 'confirm!' ,
            confirm : function (){
                alert ( 'Operation Confirmed!' );
            },
            cancel : function (){
                alert ( 'Operation Canceled!' );
            }
        });
        
        $.excelFileExport ({
            title : 'Confirm!' ,
            // content : 'confirm!' ,
            confirm : function (){
                alert ( 'Operation Confirmed!' );
            },
            cancel : function (){
                alert ( 'Operation Canceled!' );
            }
        });
        
        $.csvFileExport ({
            title : 'Confirm!' ,
            // content : 'confirm!' ,
            confirm : function (){
                alert ( 'Operation Confirmed!' );
            },
            cancel : function (){
                alert ( 'Operation Canceled!' );
            }
        });
        
        $.pdfFileExport ({
            title : 'Confirm!' ,
            // content : 'confirm!' ,
            confirm : function (){
                alert ( 'Operation Confirmed!' );
            },
            cancel : function (){
                alert ( 'Operation Canceled!' );
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/fellowships/index.blade.php ENDPATH**/ ?>