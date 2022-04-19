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
namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;

use App\Models\Settings\SystemLookupDataModel;
use App\Models\Settings\SystemCountryDataModel;

class SystemVariableDataController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getLookupData () {
        if (SystemLookupDataModel::all()) {
            $zLookupData =
                DB::table('sfgbc_Setting_LookupData')->get();
            return view ('setting.systemvariable.lookupdata', compact ('zLookupData'));
        }
        else {
            return redirect()->route('setting.systemvariable.lookupdata')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Church\'s Look Up data <span style="font-weight: bolder; color: RED;">REGISTERED</span>...');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addLookupData () {
        return view ('setting.systemvariable.alookupdata');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editLookupData ($idLookupData) {
        if (SystemLookupDataModel::find($idLookupData)) {
            $zLookupData =
            DB::table('sfgbc_Setting_LookupData')
                ->where('idLookupData', $idLookupData)
                ->first();
            return view ('setting.systemvariable.elookupdata', compact ('zLookupData'));
        }
        else {
            return redirect()->route('setting.systemvariable.getlookupdata')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s UMID '.$idLookupData.'...');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLookupData ($idLookupData) {
        // Local @Flag variable definition
        $myDataEntryFlag = -1;
        // Object @Model Defination
        $addMemberData = new SystemLookupDataModel();

        // if ( // Personal Information
        //     is_null ($requestMember->file('filePhotograph')) && is_Null ($requestMember->cmbAppillation) && is_Null ($requestMember->txtFirstName) && 
        //     is_Null ($requestMember->txtMiddleName) && is_Null ($requestMember->txtLastName) && is_Null ($requestMember->datMemberBirthDate) && 
        //     is_Null ($requestMember->cmbMemberGender) && is_Null ($requestMember->cmbCivilStatus) && is_Null ($requestMember->cmbNationality) &&
        //     is_Null ($requestMember->rdoHowBecameMember) && is_Null ($requestMember->txtPrevDenomination) &&
        //     is_Null ($requestMember->datBelievedDate) && is_Null ($requestMember->datBaptizedDate) && is_Null ($requestMember->datMembershipDate) &&
        //     is_Null ($requestMember->txtWhoThought)
        //     true) {
        //         $myDataEntryFlag = 0;
        // }

        // if ($myDataEntryFlag === 0) {
        //     return redirect()->back()->withInput()->with('JoshKiyakoo_Error', '***** All <span style="font-weight: bolder; color: RED;">REQUIRED</span> 
        //         fields must be <span style="font-weight: bolder; color: RED;">FILLED</span>.....');
        // }
        // else {
        //     try {
        //         // Member's Data
        //         $addMemberData->appellation = $requestMember->cmbAppillation;
        //         $addMemberData->firstName = $requestMember->txtFirstName;
        //         $addMemberData->middleName = $requestMember->txtMiddleName;
        //         $addMemberData->lastName = $requestMember->txtLastName;
        //         $addMemberData->birthDate = $requestMember->datMemberBirthDate;
        //         $addMemberData->gender = $requestMember->cmbMemberGender;
        //         $addMemberData->civilStatus = $requestMember->cmbCivilStatus;
        //         $addMemberData->disabilityType = $requestMember->txaDisability;
        //         $addMemberData->nationality = $requestMember->cmbNationality;
        //         $addMemberData->status = 'Active';
        //         $addMemberData->memberRemark = $requestMember->txaMemberRemarks;

        //         // Save Member's Related Data on Database
        //         $addResidentialAddressData->save(); // Residential Address Data
        //         $addMembershipData->save(); // Membership Data

        //         return redirect()->route('members.index')
        //             ->with('JoshKiyakoo_Success', '
        //                 <div class="row">
        //                     <div class="col-md-10">
        //                         *** Member\'s profile data for <span style="font-weight: bold; color: BLUE;"> '
        //                         .$addMemberData->appellation .' '.$addMemberData->firstName.' '.$addMemberData->middleName.' '.$addMemberData->lastName.
        //                         '</span> was <span style="font-weight: bolder; color: RED;">REGISTERED</span> Successfully.....
        //                     </div>
        //                     <div class="col-md-2">
        //                         <a class="text-right btn btn-outline-danger" href="members/show/'.$memberLastInsertedID.'">Show</a>
        //                     </div>
        //                 </div>
        //             ');
        //     }
        //     catch (Exception $throwMember) {
        //         return redirect()->route('members.index')
        //             ->with ('JoshKiyakoo_Error', '*** Member\'s profile data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
        //             .$throwMember.getMessage());
        //     }
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateLookupData (Request $requestLookupData, $idLookupData) {
        // Local @Flag variable definition
        $myDataEntryFlag = -1;

        // if (is_null ($requestChurchBrand->file('fileMainLogo')) && is_null ($requestChurchBrand->file('fileFavIcon')) && is_Null ($requestChurchBrand->txtLocalChurchName_amh) && is_Null ($requestChurchBrand->txtLocalChurchName_eng) && is_Null ($requestChurchBrand->txtParentChurchName_amh) && is_Null ($requestChurchBrand->txtParentChurchName_eng) && is_Null ($requestChurchBrand->txtLocalChurchNameColor_amh) && is_Null ($requestChurchBrand->txtLocalChurchNameColor_eng) && is_Null ($requestChurchBrand->chkIsParentChurchName_Checked)) {
        //         $myDataEntryFlag = 0;
        // }

        // if ($myDataEntryFlag === 0) {
        //     return redirect()->back()->withInput()->with('JoshKiyakoo_Error', '***** All <span style="font-weight: bolder; color: RED;">REQUIRED</span> 
        //         fields must be <span style="font-weight: bolder; color: RED;">FILLED</span>.....');
        // }
        // else {
        //     try {
        //         if (LookupDataModel::find($idChurchBrand)) {
        //             // Object Model Defination
        //             $editChurchBrandObj = LookupDataModel::find($idChurchBrand);
        
        //             $editChurchBrandObj->fgbLocalChurchName_amh = $requestChurchBrand->txtLocalChurchName_amh;
        //             $editChurchBrandObj->fgbLocalChurchName_eng = $requestChurchBrand->txtLocalChurchName_eng;
        //             $editChurchBrandObj->fgbParentChurchName_amh = $requestChurchBrand->txtParentChurchName_amh;
        //             $editChurchBrandObj->fgbParentChurchName_eng = $requestChurchBrand->txtParentChurchName_eng;
        //             $editChurchBrandObj->fgbLocalChurchNameColor_amh = $requestChurchBrand->txtLocalChurchNameColor_amh;
        //             $editChurchBrandObj->fgbLocalChurchNameColor_eng = $requestChurchBrand->txtLocalChurchNameColor_eng;
        //             $editChurchBrandObj->fgbIsParentChurchName_Checked = $requestChurchBrand->chkIsParentChurchName_Checked;
        //             $editChurchBrandObj->fgbChurchSloganLabel_amh = $requestChurchBrand->txtChurchSloganLabel_amh;
        //             $editChurchBrandObj->fgbChurchSloganLabel_eng = $requestChurchBrand->txtChurchSloganLabel_eng;
        //             $editChurchBrandObj->fgbChurchSloganColor_amh = $requestChurchBrand->txtChurchSloganColor_amh;
        //             $editChurchBrandObj->fgbChurchSloganColor_eng = $requestChurchBrand->txtChurchSloganColor_eng;
        
        //             // Update Data on Database
        //             $editChurchBrandObj->update();
        
        //             return redirect()->route('setting.church.getbrandname')
        //                 ->with('JoshKiyakoo_Success', '
        //                     <div class="row">
        //                         <div class="col-md-10">
        //                             *** Church\'s profile data for <span style="font-weight: bold; color: BLUE;"> '.
        //                             $editChurchBrandObj->fgbLocalChurchName_amh.' -|- '.$editChurchBrandObj->fgbLocalChurchName_eng
        //                             .'</span> was <span style="font-weight: bolder; color: RED;">UPDATED</span> Successfully.....
        //                         </div>
        //                         <div class="col-md-2">
        //                             <a class="text-right btn btn-outline-danger" href="contactaddress">Next Page</a>
        //                         </div>
        //                     </div>
        //                 ');
        //         }
        //         else {
        //             return redirect()->route('setting.index')
        //             ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Church\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Church\'s UCID '.$idChurchBrand.'...');
        //         }
        //     }
        //     catch (Exception $throwChurchBrand) {
        //         return redirect()->route('setting.index')
        //             ->with ('JoshKiyakoo_Error', '*** Church\'s profile data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
        //             .$throwChurchBrand.getMessage());
        //     }
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCountryList () {
        if (SystemCountryDataModel::all()) {
            $zCountryList =
                DB::table('sfgbc_Setting_LookupData')->get();
            return view ('setting.systemvariable.lookupdata', compact ('zCountryList'));
        }
        else {
            return redirect()->route('setting.systemvariable.getlookupdata')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Church\'s Look Up data <span style="font-weight: bolder; color: RED;">REGISTERED</span>...');
        }
    }
}
