<?php use App\Models\ServiceSectors\ServiceSectorsDataModel; ?>

<?php $__env->startSection('myPageTitle', 'የአገልግሎት ዘርፍ ዝርዝር | Service Sectors\' Cataloge'); ?>
<?php $__env->startSection('MainContent'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route ('dashboard')); ?>"><i class="fa fa-home">&nbsp;&nbsp;</i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Service Sectors')); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-8">
                    <h4 class="page-title"><?php echo e(__('የአገልግሎት ዘርፍ ዝርዝር | Service Sectors\' Cataloge')); ?></h4>
                </div>
                <div class="col-4 text-right">
                    <a href="<?php echo e(route ('servicesectors.create')); ?>" class="btn btn-danger float-right btn-rounded"><i class="fa fa-user-plus">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('Add New Service Sector')); ?></strong></a>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group form-focus">
                        <label class="focus-label"><?php echo e(__('የአገልግሎት ዘርፍ መፈለጊያ | Search Service Sectors')); ?></label>
                        <input type="text" class="form-control floating" placeholder="የአገልግሎት ዘርፉ ስም | Service Sector's Name">
                    </div>
                </div>
                <div class="col-md-2 filter-row">
                    <a href="#" class="btn btn-success btn-block"> <strong><?php echo e(__('ፈልግ | Search')); ?></strong> </a><br />
                </div>
                <div class="col-md-5 filter-row">
                    <div class="col-md-12">
                        
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Comma Delimited Text (*.csv) file" href="<?php echo e(route ('servicesectors.tocsv')); ?>" class="btn btn-secondary float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to CSV (Comma Delimited Spreedsheet) format?');"><i class="fa fa-file-text-o">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('csv')); ?></strong></a>
                    </div>
                    <div class="col-md-12">
                        
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Spreadsheet Format (*.xlxs | *.ods) file" href="<?php echo e(route ('servicesectors.toexcel')); ?>" class="btn btn-warning float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to EXCEL (MS-Excel Spreedsheet) format?');"><i class="fa fa-file-excel-o">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('Excel')); ?></strong></a>
                    </div>
                    <div class="col-md-12">
                        
                        
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Portable Document Format (*.pdf) file" href="#" class="btn btn-primary float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to PDF (Portable Document File) format?');"><i class="fa fa-file-pdf-o">&nbsp;&nbsp;&nbsp;</i><strong><?php echo e(__('pdf')); ?></strong></a>
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
                                    <th style="min-width: 100px;"><?php echo e(__('Service Sector ID')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Service Sector Type')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Estabilished Date')); ?></th>
                                    <th style="min-width: 100px;"><?php echo e(__('Status')); ?></th>
                                    <th style="min-width: 450px;"><?php echo e(__('description')); ?></th>
                                    <th style="min-width: 120px;"><?php echo e(__('Is Restructured')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Restructure Type')); ?></th>
                                    <th style="min-width: 150px;"><?php echo e(__('Restructured Date')); ?></th>
                                    <th style="min-width: 220px;"><?php echo e(__('Restructured To Service Sector')); ?></th>
                                    <th style="min-width: 200px;"><?php echo e(__('Restructure Reason')); ?></th>
                                    <th style="min-width: 250px;"><?php echo e(__('Remark')); ?></th>
                                    <th class="text-center" style="min-width: 155px;"><?php echo e(__('Action ( # )')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php $__currentLoopData = $servicesectors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data => $servicesector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        
                                        <td class="text-right">
                                            <div data-toggle="tooltip" data-placement="right" title="Action Key" class="dropdown dropdown-action">
                                                <a href="#" class="btn-sm btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="<?php echo e(route ('servicesectors.show', $servicesector->idServiceSector)); ?>"><i class="btn-sm btn btn-success fa fa-desktop"></i> <?php echo e(__('Show')); ?></a>
                                                    <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                                        <a class="dropdown-item" href="<?php echo e(route ('servicesectors.edit', $servicesector->idServiceSector)); ?>" onClick="return confirmEdit('Are you SURE to EDIT this member\'s data?');"><i class="btn-sm btn btn-warning fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                                    <?php endif; ?>
                                                    <?php if(Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active'): ?>
                                                        <a class="dropdown-item" href="<?php echo e(route ('servicesectors.remove', $servicesector->idServiceSector)); ?>" onClick="return confirmDelete('Are you SURE to DELETE this member\'s data?');"><i class="btn-sm btn btn-danger fa fa-trash"></i> <?php echo e(__('Delete')); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <?php if($servicesector->idServiceSector < 10): ?> <?php $zeroFillID = '0000000'.$servicesector->idServiceSector; ?>
                                            <?php elseif($servicesector->idServiceSector < 100): ?> <?php $zeroFillID = '000000'.$servicesector->idServiceSector; ?>
                                            <?php elseif($servicesector->idServiceSector < 1000): ?> <?php $zeroFillID = '00000'.$servicesector->idServiceSector; ?>
                                            <?php elseif($servicesector->idServiceSector < 10000): ?> <?php $zeroFillID = '0000'.$servicesector->idServiceSector; ?>
                                            <?php elseif($servicesector->idServiceSector < 10000): ?> <?php $zeroFillID = '000'.$servicesector->idServiceSector; ?>
                                            <?php elseif($servicesector->idServiceSector < 100000): ?> <?php $zeroFillID = '00'.$servicesector->idServiceSector; ?>
                                            <?php elseif($servicesector->idServiceSector < 1000000): ?> <?php $zeroFillID = '0'.$servicesector->idServiceSector; ?>
                                            <?php else: ?> <?php $zeroFillID = $servicesector->idServiceSector; ?> <?php endif; ?>
                                            <?php echo e($zeroFillID); ?>

                                        </td>
                                        <td><h2><?php echo e($servicesector->serviceSectorType); ?></h2></td>
                                        <td><?php echo e($servicesector->estabilishedDate); ?></td>
                                        <td>
                                            <?php if($servicesector->sectorStatus === 'Active'): ?> <span class="custom-badge status-green"><?php echo e($servicesector->sectorStatus); ?></span>
                                            <?php else: ?> <span class="custom-badge status-red"><?php echo e($servicesector->sectorStatus); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(Str::of($servicesector->description)->substr(0, 39)->append('...')); ?></td>
                                        <td><?php echo e($servicesector->isRestructured); ?></td>
                                        <td><?php echo e($servicesector->restructureType); ?></td>
                                        <td><?php echo e($servicesector->restructureDate); ?></td>
                                        <td><?php echo e($servicesector->restructuredToServiceSector); ?></td>
                                        <td><?php echo e(Str::of($servicesector->restructureReason)->substr(0, 39)->append('...')); ?></td>
                                        <td><?php echo e(Str::of($servicesector->serviceSectorRemark)->substr(0, 39)->append('...')); ?></td>

                                        
                                        <td class="text-right">
                                            <a data-toggle="tooltip" data-placement="top" title="Show" class="btn-sm btn btn-success fa fa-desktop" href="<?php echo e(route ('servicesectors.show', $servicesector->idServiceSector)); ?>"></a>
                                            <?php if((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active'): ?>
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn-sm btn btn-warning fa fa-edit" href="<?php echo e(route ('servicesectors.edit', $servicesector->idServiceSector)); ?>" onClick="return confirmEdit('Are you SURE to EDIT this member\'s data?');"></a>
                                            <?php endif; ?>
                                            <?php if(Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active'): ?>
                                                <a data-toggle="tooltip" data-placement="top" title="Delete" class="btn-sm btn btn-danger fa fa-trash" href="<?php echo e(route ('servicesectors.remove', $servicesector->idServiceSector)); ?>" data-toggle="modal" onClick="return confirmDelete('Are you SURE to DELETE this member\'s data?');"></a>
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

<?php echo $__env->make('layouts.mrmsMainLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mrms.semienfgbc.org/resources/views/servicesectors/index.blade.php ENDPATH**/ ?>