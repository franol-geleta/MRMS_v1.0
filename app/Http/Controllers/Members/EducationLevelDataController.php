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
namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Members\MembersDataModel;
use App\Models\Members\EducationLevelDataModel;

class EducationLevelDataController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEducation ($idMember) {
        if (MembersDataModel::find($idMember)) {
            $member =
                    DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_EducationLevelData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_EducationLevelData.idMember')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email'
                        )
                ->where('sfgbc_Members.idMember', $idMember)
                ->first();
        return view ('members.educationlevel.create', compact ('member'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s UMID '.$idMember.'...');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEducation (Request $requestEducationLevel) {
        // Local @Flag variable definition
        $myDataEntryFlag = -1;
        // Object @Model Defination
        $addEducationLevelObj = new EducationLevelDataModel();

        // Education Level Information
        if (is_null ($requestEducationLevel->cmbEducationalLevel) && is_Null ($requestEducationLevel->txtProfession) && is_Null ($requestEducationLevel->cmbCertificationLevel) && is_Null ($requestEducationLevel->txtInistituteName) && is_Null ($requestEducationLevel->rdoStillLearningHere)) {
                $myDataEntryFlag = 0;
        }

        if ($myDataEntryFlag === 0) {
            return redirect()->back()->withInput()->with('JoshKiyakoo_Error', '***** All <span style="font-weight: bolder; color: RED;">REQUIRED</span> 
                fields must be <span style="font-weight: bolder; color: RED;">FILLED</span>.....');
        }
        else {
            try {
                // Member's Education Level Data
                $addEducationLevelObj->hasEducationLevel = 'Yes';
                $addEducationLevelObj->educationLevel = $requestEducationLevel->cmbEducationalLevel;
                $addEducationLevelObj->qualification = $requestEducationLevel->txtProfession;
                $addEducationLevelObj->certification = $requestEducationLevel->cmbCertificationLevel;
                $addEducationLevelObj->institution = $requestEducationLevel->txtInistituteName;
                $addEducationLevelObj->startingDate = $requestEducationLevel->datEducationStartingDate;
                $addEducationLevelObj->stillLearningHere = $requestEducationLevel->rdoStillLearningHere;
                $addEducationLevelObj->completingDate = $requestEducationLevel->datCompletionDate;
                $addEducationLevelObj->educationLevelRemark = $requestEducationLevel->txaEducationalRemarks;
                $addEducationLevelObj->idMember = $requestEducationLevel->hdnMemberID;

                // Save Member's Education Level Data
                $addEducationLevelObj->save();

                return redirect()->route('members.show', $addEducationLevelObj->idMember)
                    ->with('JoshKiyakoo_Success', '
                        <div class="row">
                            <div class="col-md-10">
                                *** Member\'s Education Level data <span style="font-weight: bold; color: BLUE;"> '
                                .$addEducationLevelObj->certification.' in '.$addEducationLevelObj->qualification.' from '.$addEducationLevelObj->institution.
                                '</span> was <span style="font-weight: bolder; color: RED;">REGISTERED</span> Successfully.....
                            </div>
                        </div>
                    ');
            }
            catch (Exception $throwEducationLevelData) {
                return redirect()->route('members.index')
                    ->with ('JoshKiyakoo_Error', '*** Member\'s Education Level Data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
                    .$throwEducationLevelData.getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEducation ($idEducation) {
        if (EducationLevelDataModel::find($idEducation)) {
            $memberEducationLevel =
                DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->leftJoin ('sfgbc_member_EducationLevelData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_EducationLevelData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email',

                        'sfgbc_member_EducationLevelData.idEducationLevelData', 'sfgbc_member_EducationLevelData.hasEducationLevel', 'sfgbc_member_EducationLevelData.educationLevel', 'sfgbc_member_EducationLevelData.qualification', 'sfgbc_member_EducationLevelData.certification', 'sfgbc_member_EducationLevelData.institution', 'sfgbc_member_EducationLevelData.startingDate', 'sfgbc_member_EducationLevelData.stillLearningHere', 'sfgbc_member_EducationLevelData.completingDate', 'sfgbc_member_EducationLevelData.educationLevelRemark'
                    )
                ->where('sfgbc_member_EducationLevelData.idEducationLevelData', $idEducation)
                ->first();
            return view ('members.educationlevel.show', compact ('memberEducationLevel'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Education Level UID '.$idEducation.'...');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editEducation ($idEducation) {
         if (EducationLevelDataModel::find($idEducation)) {
            $memberEducationLevel =
                DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_EducationLevelData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_EducationLevelData.idMember')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email', 'sfgbc_member_EducationLevelData.idEducationLevelData', 'sfgbc_member_EducationLevelData.hasEducationLevel', 'sfgbc_member_EducationLevelData.educationLevel', 'sfgbc_member_EducationLevelData.qualification', 'sfgbc_member_EducationLevelData.certification', 'sfgbc_member_EducationLevelData.institution', 'sfgbc_member_EducationLevelData.startingDate', 'sfgbc_member_EducationLevelData.stillLearningHere', 'sfgbc_member_EducationLevelData.completingDate', 'sfgbc_member_EducationLevelData.educationLevelRemark'
                    )
                ->where('sfgbc_member_EducationLevelData.idEducationLevelData', $idEducation)
                ->first();
            return view ('members.educationlevel.edit', compact ('memberEducationLevel'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Education Level UID '.$idEducation.'...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEducation (Request $requestEducationLevel, $idEducation) {
        if (EducationLevelDataModel::find($idEducation)) {
            // Object Model Defination
            $editEducationLevelObj = EducationLevelDataModel::find($idEducation);
            // Member's Education Level Data
            $editEducationLevelObj->hasEducationLevel = 'Yes';
            $editEducationLevelObj->educationLevel = $requestEducationLevel->cmbEducationalLevel;
            $editEducationLevelObj->qualification = $requestEducationLevel->txtProfession;
            $editEducationLevelObj->certification = $requestEducationLevel->cmbCertificationLevel;
            $editEducationLevelObj->institution = $requestEducationLevel->txtInistituteName;
            $editEducationLevelObj->startingDate = $requestEducationLevel->datEducationStartingDate;
            $editEducationLevelObj->stillLearningHere = $requestEducationLevel->rdoStillLearningHere;
            $editEducationLevelObj->completingDate = $requestEducationLevel->datCompletionDate;
            $editEducationLevelObj->educationLevelRemark = $requestEducationLevel->txaEducationalRemarks;
            $idMember = $requestEducationLevel->hdnMemberIDNum;

            // Save Data on Database
            $editEducationLevelObj->update();

            return redirect()->route('members.show', $idMember)
                ->with('JoshKiyakoo_Success', '
                    <div class="row">
                        <div class="col-md-10">
                            *** Member\'s <span style="font-weight: bold; color: BLUE;"> Education Level data </span> was <span style="font-weight: bolder; color: RED;">UPDATED</span> Successfully.....
                        </div>
                    </div>
                ');
        }
        else {
            return redirect()->route('members.show', $idMember)
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s Education Level data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Education Level UID Number '.$idEducation.'...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyEducation (Request $requestEducationLevel, $idEducation) {
        try {
            if (EducationLevelDataModel::find($idEducation)) {
                // Soft Remove
                EducationLevelDataModel::destroy($idEducation);
                
                return redirect()->route ('members.show', $requestEducationLevel->hdnMemberIDNum)
                    ->with('JoshKiyakoo_Success', '
                        <div class="row">
                            <div class="col-md-10">
                                *** Member\'s <span style="font-weight: bold; color: BLUE;"> Education Level data </span> was <span style="font-weight: bolder; color: RED;">DELETED</span> Successfully.....
                            </div>
                        </div>
                    ');
            }
        } 
        catch (Exception $throwEducationLevelData) {
            return redirect()->route('members.index')
                ->with ('JoshKiyakoo_Error', '*** Member\'s Education Level Data is <span style="font-weight: bolder; color: RED;">NOT DELETED</span>...<hr />'
                .$throwEducationLevelData.getMessage());
        }
    }
}
