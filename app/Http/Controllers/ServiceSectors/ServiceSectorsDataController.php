<?php
// ======================================================================
//             Designed by:    Eyasu Girma [Kiya]
//                 Mobile:     +251-913-078-029
//                 Email:      sendtokiya@gmail.com
//                 Facebook:   https://facebook.com/JoshKiyakoo
//                 LinkedIn:   https://linkedin.com/in/JoshKiyakoo
//                 Twitter:    https://twitter.com/JoshKiyakoo
//                 GitHub:     https://github.com/JoshKiyakoo
//                 Telegram:   https://t.me/JoshKiyakoo
// ======================================================================
namespace App\Http\Controllers\ServiceSectors;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;

use App\Models\ServiceSectors\ServiceSectorsDataModel;
use App\Exports\ServiceSectorsDataExport;
use Excel;
use PDF;

class ServiceSectorsDataController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $servicesectors =
            DB::table ('sfgbc_ServiceSectors')
                ->select (
                    'idServiceSector', 'serviceSectorType', 'estabilishedDate', 'description', 'isRestructured', 'restructureType', 'restructureDate', 'restructuredToServiceSector', 'restructureReason', 'sectorStatus', 'serviceSectorRemark'
                )
            ->get();
        return view ('servicesectors.index', compact ('servicesectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createServiceSector() {
        return view ('servicesectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeServiceSector(Request $requestServiceSector) {
        // Local @Flag variable definition
        $myDataEntryFlag = -1;
        // Object @Model Defination
        $serviceSectorData = new ServiceSectorsDataModel();

        if (is_Null ($requestServiceSector->cmbServiceSectorType) || is_Null ($requestServiceSector->dateEstabilishedDate) || is_Null ($requestServiceSector->txaServiceSectorDescription) || is_Null ($requestServiceSector->rdoSectorStatus)) {
                $myDataEntryFlag = 0;
        }

        if ($myDataEntryFlag === 0) {
            return redirect()->back()->withInput()->with('JoshKiyakoo_Error', '***** All <span style="font-weight: bolder; color: RED;">REQUIRED</span> 
                fields must be <span style="font-weight: bolder; color: RED;">FILLED</span>.....');
        }
        else {
            try {
                // Service Sector Data
                $serviceSectorData->serviceSectorType = $requestServiceSector->cmbServiceSectorType;
                $serviceSectorData->estabilishedDate = $requestServiceSector->dateEstabilishedDate;
                $serviceSectorData->description = $requestServiceSector->txaServiceSectorDescription;
                $serviceSectorData->sectorStatus = $requestServiceSector->rdoSectorStatus;
                $serviceSectorData->restructureReason = '';
                $serviceSectorData->serviceSectorRemark = $requestServiceSector->txaServiceSectorRemark;
                
                // Save Data on Database
                $serviceSectorData->save();
                $serviceSectorDataLastInsertedID = $serviceSectorData->idServiceSector;

                return redirect()->route('servicesectors.index')
                    ->with('JoshKiyakoo_Success', '
                        <div class="row">
                            <div class="col-md-10">
                                *** Service Sector\'s profile data <span style="font-weight: bold; color: BLUE;"> '
                                .$serviceSectorData->endTime.'</span> was <span style="font-weight: bolder; color: RED;">REGISTERED</span> Successfully.....
                            </div>
                            <div class="col-md-2">
                                <a class="text-right btn btn-outline-danger" href="servicesectors/show/'.$serviceSectorDataLastInsertedID.'">Show</a>
                            </div>
                        </div>
                    ');
            }
            catch (Exception $throwServiceSector) {
                return redirect()->route('servicesectors.index')
                    ->with ('JoshKiyakoo_Error', '*** Service Sector\'s profile data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
                .$throwServiceSector.getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showServiceSector($idServiceSector) {
        if (ServiceSectorsDataModel::find($idServiceSector)) {
            $servicesector =
                DB::table ('sfgbc_ServiceSectors')
                    ->select (
                        'idServiceSector', 'serviceSectorType', 'estabilishedDate', 'description', 'isRestructured', 'restructureType', 'restructureDate', 'restructuredToServiceSector', 'restructureReason', 'sectorStatus', 'serviceSectorRemark'
                    )
                ->where('idServiceSector', $idServiceSector)
                ->first();
            return view ('servicesectors.show', compact ('servicesector'));
        }
        else {
            return redirect()->route('servicesectors.index')
                ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED; ">NO</span> Service Sector\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Service Sector\'s USSID '.$idServiceSector.'...');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editServiceSector($idServiceSector) {
        if (ServiceSectorsDataModel::find($idServiceSector)) {
            $servicesector =
            DB::table('sfgbc_ServiceSectors')
                ->where('idServiceSector', $idServiceSector)
                ->first();
            return view ('servicesectors.edit', compact ('servicesector'));
        }
        else {
            return redirect()->route('servicesectors.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Service Sector\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Service Sector\'s USSID '.$idServiceSector.'...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateServiceSector(Request $requestServiceSector, $idServiceSector) {
        if (ServiceSectorsDataModel::find($idServiceSector)) {
            // Object Model Defination
            $editServiceSectorObj = ServiceSectorsDataModel::find($idServiceSector);
            try {
                if ($requestServiceSector->rdoIsRestructured === 'No') {
                    $requestServiceSector->dateRestructureDate = '';
                    $requestServiceSector->txtRestructureReason = '';
                }
                // Service Sector Data
                $editServiceSectorObj->serviceSectorType = $requestServiceSector->cmbServiceSectorType;
                $editServiceSectorObj->estabilishedDate = $requestServiceSector->dateEstabilishedDate;
                $editServiceSectorObj->description = $requestServiceSector->txaServiceSectorDescription;
                $editServiceSectorObj->isRestructured = $requestServiceSector->rdoIsRestructured;
                $editServiceSectorObj->restructureType = $requestServiceSector->cmbRestructureType;
                $editServiceSectorObj->restructureDate = $requestServiceSector->dateRestructureDate;
                $editServiceSectorObj->restructuredToServiceSector = $requestServiceSector->txtRestructuredTo;
                $editServiceSectorObj->restructureReason = $requestServiceSector->txtRestructureReason;
                $editServiceSectorObj->sectorStatus = $requestServiceSector->rdoServiceSectorStatus;
                $editServiceSectorObj->serviceSectorRemark = $requestServiceSector->txaServiceSectorRemark;
                
                // Update Data on Database
                $editServiceSectorObj->update();
    
                return redirect()->route('servicesectors.index')
                    ->with('JoshKiyakoo_Success', '
                        <div class="row">
                            <div class="col-md-10">
                                *** <span style="font-weight: bold; color: BLUE;">'. $editServiceSectorObj->serviceSectorType.'</span> Service Sector\'s profile data was <span style="font-weight: bolder; color: RED;">UPDATED</span> Successfully.....
                            </div>
                            <div class="col-md-2">
                                <a class="text-right btn btn-outline-danger" href="servicesectors/show/'.$editServiceSectorObj->idServiceSector.'">Show</a>
                            </div>
                        </div>
                    ');
            }
            catch (Exception $throwServiceSector) {
                return redirect()->route('servicesectors.index')
                    ->with ('JoshKiyakoo_Error', '*** Service Sector\'s profile data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
                .$throwServiceSector.getMessage());
            }
        }
        else {
            return redirect()->route('servicesectors.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Service Sector\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Service Sector\'s USSID '.$idServiceSector.'...');
        }
    }

    /**
     * Export content to PDF with View
     * Display a listing of the resource.
     *
     * @return void \Illuminate\Http\Response 
     */
    public function downloadPDF () {
        $servicesectors = ServiceSectorsDataModel::all();
        $pdfData = PDF::loadView('servicesectors.index', compact('servicesectors'));
        return $pdfData->download ('All_SFGLC_ServiceSectors_Export_on_'.date ('Ymd_Hsi').'.pdf');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function downloadEXCEL () {
        return Excel::download (new ServiceSectorsDataExport, 'All_SFGLC_ServiceSectors_Export_on_'.date ('Ymd_Hsi').'.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function downloadCSV () {
        return Excel::download(new ServiceSectorsDataExport, 'All_SFGLC_ServiceSectors_Export_on_'.date ('Ymd_Hsi').'.csv');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyServiceSector($idServiceSector) {
        //
    }
}
