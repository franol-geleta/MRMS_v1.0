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
namespace App\Http\Controllers\Fellowships;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;

use App\Models\Fellowships\FellowshipsDataModel;
use App\Exports\FellowshipsDataExport;
use Excel;
use PDF;

class FellowshipsDataController extends Controller {
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
        $fellowships =
            DB::table ('sfgbc_Fellowships')
                ->select (
                    'idFellowship', 'fellowshipType', 'fellowshipLabel', 'dayHeldOn', 'startTime', 'endTime', 'fellowshipZone','locationOwner', 'locationNaming', 'estabilishedDate', 'isRestructured', 'restructureType', 'restructuredDate', 'restructuredToFellowship', 'restructureReason', 'fellowshipStatus', 'fellowshipRemark'
                )
            ->get();
        return view ('fellowships.index', compact ('fellowships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFellowship() {
        return view ('fellowships.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFellowship(Request $requestFellowship) {
        // Local @Flag variable definition
        $myDataEntryFlag = -1;
        // Object @Model Defination
        $fellowshipData = new FellowshipsDataModel();

        // idFellowship, 
        // fellowshipType, dayHeldOn, startTime, endTime, fellowshipZone, locationOwner, locationNaming, estabilishedOn, isRestructured, restructureType, restructuredOn, restructuredToFellowship, restructureReason, status, fellowshipRemark

        if (is_Null ($requestFellowship->cmbFellowshipType) && is_Null ($requestFellowship->cmbFellowshipHeldOn) && is_Null ($requestFellowship->timeStartingTime) &&
            is_Null ($requestFellowship->timeEndingTime) && is_Null ($requestFellowship->txtLocationOwner) && is_Null ($requestFellowship->txtFellowshipLocation) && is_Null ($requestFellowship->dateFoundedDate) && is_Null ($requestFellowship->rdoFellowshipStatus) && is_Null ($requestFellowship->fellowshipZone)) {
                $myDataEntryFlag = 0;
        }

        if ($myDataEntryFlag === 0) {
            return redirect()->back()->withInput()->with('JoshKiyakoo_Error', '***** All <span style="font-weight: bolder; color: RED;">REQUIRED</span> 
                fields must be <span style="font-weight: bolder; color: RED;">FILLED</span>.....');
        }
        else {
            try {
                // Fellowship Data
                $fellowshipData->fellowshipType = $requestFellowship->cmbFellowshipType;
                $fellowshipData->fellowshipLabel = $requestFellowship->txtFellowshipLabel;
                $fellowshipData->dayHeldOn = $requestFellowship->cmbFellowshipHeldOn;
                $fellowshipData->startTime = $requestFellowship->timeStartingTime;
                $fellowshipData->endTime = $requestFellowship->timeEndingTime;
                $fellowshipData->fellowshipZone = $requestFellowship->cmbFellowshipZone;
                $fellowshipData->locationOwner = $requestFellowship->txtLocationOwner;
                $fellowshipData->locationNaming = $requestFellowship->txtFellowshipLocation;
                $fellowshipData->estabilishedDate = $requestFellowship->dateFoundedDate;
                $fellowshipData->fellowshipStatus = 'Active';
                $fellowshipData->restructureReason = '';
                $fellowshipData->fellowshipRemark = $requestFellowship->txaFellowshipRemark;
                
                // Save Data on Database
                $fellowshipData->save();
                $fellowshipLastInsertedID = $fellowshipData->idFellowship;

                return redirect()->route('fellowships.index')
                    ->with('JoshKiyakoo_Success', '
                        <div class="row">
                            <div class="col-md-10">
                                *** '. $fellowshipData->fellowshipType.' Fellowship\'s profile data on <span style="font-weight: bold; color: BLUE;"> '
                                .$fellowshipData->dayHeldOn .' from '.$fellowshipData->startTime.' to '.$fellowshipData->endTime.'</span> was <span style="font-weight: bolder; color: RED;">REGISTERED</span> Successfully.....
                            </div>
                            <div class="col-md-2">
                                <a class="text-right btn btn-outline-danger" href="fellowships/show/'.$fellowshipLastInsertedID.'">Show</a>
                            </div>
                        </div>
                    ');
            }
            catch (Exception $throwFellowship) {
                return redirect()->route('fellowships.index')
                    ->with ('JoshKiyakoo_Error', '*** Fellowship\'s profile data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
                .$throwFellowship.getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showFellowship($idFellowship) {
        if (FellowshipsDataModel::find($idFellowship)) {
            $fellowship =
                DB::table ('sfgbc_Fellowships')
                    ->select (
                        'idFellowship', 'fellowshipType', 'fellowshipLabel', 'dayHeldOn', 'startTime', 'endTime', 'fellowshipZone','locationOwner', 'locationNaming', 'estabilishedDate', 'isRestructured', 'restructureType', 'restructuredDate', 'restructuredToFellowship', 'restructureReason', 'fellowshipStatus', 'fellowshipRemark'
                    )
                ->where('idFellowship', $idFellowship)
                ->first();
            return view ('fellowships.show', compact ('fellowship'));
        }
        else {
            return redirect()->route('fellowships.index')
                ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED; ">NO</span> Fellowship\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Fellowship\'s UFID '.$idFellowship.'...');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editFellowship($idFellowship) {
        if (FellowshipsDataModel::find($idFellowship)) {
            $fellowship =
            DB::table('sfgbc_Fellowships')
                ->where('idFellowship', $idFellowship)
                ->first();
            return view ('fellowships.edit', compact ('fellowship'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s UMID '.$idMember.'...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFellowship(Request $requestFellowship, $idFellowship) {
        if (FellowshipsDataModel::find($idFellowship)) {
            // Object Model Defination
            $editFellowshipObj = FellowshipsDataModel::find($idFellowship);
            try {
                // Fellowship Data
                $editFellowshipObj->fellowshipType = $requestFellowship->cmbFellowshipType;
                $editFellowshipObj->fellowshipLabel = $requestFellowship->txtFellowshipLabel;
                $editFellowshipObj->dayHeldOn = $requestFellowship->cmbFellowshipHeldOn;
                $editFellowshipObj->startTime = $requestFellowship->timeStartingTime;
                $editFellowshipObj->endTime = $requestFellowship->timeEndingTime;
                $editFellowshipObj->fellowshipZone = $requestFellowship->cmbFellowshipZone;
                $editFellowshipObj->locationOwner = $requestFellowship->txtLocationOwner;
                $editFellowshipObj->locationNaming = $requestFellowship->txtFellowshipLocation;
                $editFellowshipObj->estabilishedDate = $requestFellowship->dateFoundedDate;
                $editFellowshipObj->isRestructured = $requestFellowship->rdoIsRestructured;
                $editFellowshipObj->restructureType = $requestFellowship->cmbRestructureType;
                $editFellowshipObj->restructuredDate = $requestFellowship->dateRestructuredDate;
                $editFellowshipObj->restructuredToFellowship = $requestFellowship->txtRestructuredTo;
                $editFellowshipObj->restructureReason = $requestFellowship->txtRestructureReason;
                $editFellowshipObj->fellowshipStatus = $requestFellowship->rdoFellowshipStatus;
                $editFellowshipObj->fellowshipRemark = $requestFellowship->txaFellowshipRemark;
                
                // Update Data on Database
                $editFellowshipObj->update();
    
                return redirect()->route('fellowships.index')
                    ->with('JoshKiyakoo_Success', '
                        <div class="row">
                            <div class="col-md-10">
                                *** <span style="font-weight: bold; color: BLUE;">'. $editFellowshipObj->fellowshipType.'</span> Fellowship\'s profile data was <span style="font-weight: bolder; color: RED;">UPDATED</span> Successfully.....
                            </div>
                            <div class="col-md-2">
                                <a class="text-right btn btn-outline-danger" href="fellowships/show/'.$editFellowshipObj->idFellowship.'">Show</a>
                            </div>
                        </div>
                    ');
            }
            catch (Exception $throwFellowship) {
                return redirect()->route('fellowships.index')
                    ->with ('JoshKiyakoo_Error', '*** Fellowship\'s profile data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
                .$throwFellowship.getMessage());
            }
        }
        else {
            return redirect()->route('fellowships.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Fellowship\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Fellowship\'s UFID '.$idFellowship.'...');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fellowshipAttendance() {
        return view ('fellowships.attendance.attendance');
    }

    /**
     * Export content to PDF with View
     * Display a listing of the resource.
     *
     * @return void \Illuminate\Http\Response 
     */
    public function downloadPDF () {
        $fellowships = FellowshipsDataModel::all();
        $pdfData = PDF::loadView('fellowships.index', compact('fellowships'));
        return $pdfData->download ('All_SFGLC_Fellowships_Export_'.date ('Ymd_Hsi').'.pdf');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function downloadEXCEL () {
        return Excel::download (new FellowshipsDataExport, 'All_SFGLC_Fellowships_Export_on_'.date ('Ymd_Hsi').'.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function downloadCSV () {
        return Excel::download(new FellowshipsDataExport, 'All_SFGLC_Fellowships_Export_on_'.date ('Ymd_Hsi').'.csv');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyFellowship($idFellowship) {
        //
    }
}
