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
use App\Models\Members\WorkExperienceDataModel;

class WorkExperienceDataController extends Controller {
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
    public function createExperience ($idMember) {
        if (MembersDataModel::find($idMember)) {
            $member =
                    DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_WorkExperienceData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_WorkExperienceData.idMember')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email'
                        )
                ->where('sfgbc_Members.idMember', $idMember)
                ->first();
        return view ('members.workexperience.create', compact ('member'));
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
    public function storeExperience (Request $requestWorkExperience) {
        // Local @Flag variable definition
        $myDataEntryFlag = -1;
        // Object @Model Defination
        $addWorkExperienceObj = new WorkExperienceDataModel();

        // Education Level Information
        if ($requestWorkExperience->rdoHasWorkExperience === 'No') {
            if (is_Null ($requestWorkExperience->txaLivelihoodIncome)) {
                $myDataEntryFlag = 0;
            }
            else {
                $requestWorkExperience->cmbOrganizationType = NULL;
                $requestWorkExperience->txtCompanyName = NULL;
                $requestWorkExperience->txtWorkLocation = NULL;
                $requestWorkExperience->txtJobPosition = NULL;
                $requestWorkExperience->datWorkStartingDate = NULL;
                $requestWorkExperience->rdoStillWorkingHere = NULL;
                $requestWorkExperience->datResignedDate = NULL;
            }

        }

        if ($requestWorkExperience->rdoHasWorkExperience === 'Yes') {
            if (is_null ($requestWorkExperience->cmbOrganizationType) && is_Null ($requestWorkExperience->txtCompanyName) && is_Null ($requestWorkExperience->txtWorkLocation) && is_Null ($requestWorkExperience->txtJobPosition) && is_Null ($requestWorkExperience->datWorkStartingDate) && is_Null ($requestWorkExperience->rdoStillWorkingHere)) {
                $myDataEntryFlag = 0;
            }
            $requestWorkExperience->txaLivelihoodIncome = NULL;
        }
        
        if ($myDataEntryFlag === 0) {
            return redirect()->back()->withInput()->with('JoshKiyakoo_Error', '***** All <span style="font-weight: bolder; color: RED;">REQUIRED</span> fields must be <span style="font-weight: bolder; color: RED;">FILLED</span>.....');
        }
        else {
            try {
                // Member's Work Experience Data
                $addWorkExperienceObj->hasWorkExperience = $requestWorkExperience->rdoHasWorkExperience;
                $addWorkExperienceObj->livelihoodIncome = $requestWorkExperience->txaLivelihoodIncome;
                $addWorkExperienceObj->organizationType = $requestWorkExperience->cmbOrganizationType;
                $addWorkExperienceObj->organizationName = $requestWorkExperience->txtCompanyName;
                $addWorkExperienceObj->workLocation = $requestWorkExperience->txtWorkLocation;
                $addWorkExperienceObj->jobPosition = $requestWorkExperience->txtJobPosition;
                $addWorkExperienceObj->startingDate = $requestWorkExperience->datWorkStartingDate;
                $addWorkExperienceObj->stillWorkingHere = $requestWorkExperience->rdoStillWorkingHere;
                $addWorkExperienceObj->resignedDate = $requestWorkExperience->datResignedDate;
                $addWorkExperienceObj->workExperienceRemark = $requestWorkExperience->txaWorkExperiencelRemarks;
                $addWorkExperienceObj->idMember = $requestWorkExperience->hdnMemberID;

                // Save Member's Work Experience Data
                $addWorkExperienceObj->save();

                return redirect()->route('members.show', $addWorkExperienceObj->idMember)
                    ->with('JoshKiyakoo_Success', '
                        <div class="row">
                            <div class="col-md-10">
                                *** Member\'s Work Experience data <span style="font-weight: bold; color: BLUE;"> '
                                .$addWorkExperienceObj->certification.' in '.$addWorkExperienceObj->qualification.' from '.$addWorkExperienceObj->institution.
                                '</span> was <span style="font-weight: bolder; color: RED;">REGISTERED</span> Successfully.....
                            </div>
                        </div>
                    ');
            }
            catch (Exception $throwWorkExperienceData) {
                return redirect()->route('members.index')
                    ->with ('JoshKiyakoo_Error', '*** Member\'s Work Experience Data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
                    .$throwWorkExperienceData.getMessage());
            }
        }
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showExperience ($idExperience) {
        if (WorkExperienceDataModel::find($idExperience)) {
            $memberWorkExperience =
                DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->leftJoin ('sfgbc_member_WorkExperienceData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_WorkExperienceData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email',

                        'sfgbc_member_WorkExperienceData.idWorkExperienceData', 'sfgbc_member_WorkExperienceData.hasWorkExperience', 'sfgbc_member_WorkExperienceData.organizationType', 'sfgbc_member_WorkExperienceData.organizationName', 'sfgbc_member_WorkExperienceData.workLocation', 'sfgbc_member_WorkExperienceData.jobPosition', 'sfgbc_member_WorkExperienceData.startingDate', 'sfgbc_member_WorkExperienceData.stillWorkingHere', 'sfgbc_member_WorkExperienceData.resignedDate', 'sfgbc_member_WorkExperienceData.livelihoodIncome', 'sfgbc_member_WorkExperienceData.workExperienceRemark'
                    )
                ->where('sfgbc_member_WorkExperienceData.idWorkExperienceData', $idExperience)
                ->first();
            return view ('members.workexperience.show', compact ('memberWorkExperience'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Work Experience UID '.$idExperience.'...');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editExperience ($idExperience) {
        if (WorkExperienceDataModel::find($idExperience)) {
            $memberWorkExperience =
                DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_WorkExperienceData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_WorkExperienceData.idMember')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email', 'sfgbc_member_WorkExperienceData.idWorkExperienceData', 'sfgbc_member_WorkExperienceData.hasWorkExperience', 'sfgbc_member_WorkExperienceData.organizationType', 'sfgbc_member_WorkExperienceData.organizationName', 'sfgbc_member_WorkExperienceData.workLocation', 'sfgbc_member_WorkExperienceData.jobPosition', 'sfgbc_member_WorkExperienceData.startingDate', 'sfgbc_member_WorkExperienceData.stillWorkingHere', 'sfgbc_member_WorkExperienceData.resignedDate', 'sfgbc_member_WorkExperienceData.livelihoodIncome', 'sfgbc_member_WorkExperienceData.workExperienceRemark'
                    )
                ->where('sfgbc_member_WorkExperienceData.idWorkExperienceData', $idExperience)
                ->first();
            return view ('members.workexperience.edit', compact ('memberWorkExperience'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Work Experience UID '.$idExperience.'...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateExperience (Request $requestWorkExperience, $idExperience) {
        try {
            if (WorkExperienceDataModel::find($idExperience)) {
                // Object Model Defination
                $editWorkExperienceObj = WorkExperienceDataModel::find($idExperience);
                /// Member's Work Experience Data
                $editWorkExperienceObj->hasWorkExperience = $requestWorkExperience->rdoHasWorkExperience;
                $editWorkExperienceObj->livelihoodIncome = $requestWorkExperience->txaLivelihoodIncome;
                $editWorkExperienceObj->organizationType = $requestWorkExperience->cmbOrganizationType;
                $editWorkExperienceObj->organizationName = $requestWorkExperience->txtCompanyName;
                $editWorkExperienceObj->workLocation = $requestWorkExperience->txtWorkLocation;
                $editWorkExperienceObj->jobPosition = $requestWorkExperience->txtJobPosition;
                $editWorkExperienceObj->startingDate = $requestWorkExperience->datWorkStartingDate;
                $editWorkExperienceObj->stillWorkingHere = $requestWorkExperience->rdoStillWorkingHere;
                $editWorkExperienceObj->resignedDate = $requestWorkExperience->datResignedDate;
                $editWorkExperienceObj->workExperienceRemark = $requestWorkExperience->txaWorkExperiencelRemarks;
                $idMember = $requestWorkExperience->hdnMemberIDNum;

                // Save Data on Database
                $editWorkExperienceObj->update();

                return redirect()->route('members.show', $idMember)
                    ->with('JoshKiyakoo_Success', '
                        <div class="row">
                            <div class="col-md-10">
                                *** Member\'s <span style="font-weight: bold; color: BLUE;"> Work Experience data </span> was <span style="font-weight: bolder; color: RED;">UPDATED</span> Successfully.....
                            </div>
                        </div>
                    ');
            }
            else {
                return redirect()->route('members.show', $idMember)
                ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s Work Experience data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Work Experience UID Number '.$idExperience.'...');
            }
        }
        catch (Exception $throwWorkExperienceData) {
            return redirect()->route('members.index')
                ->with ('JoshKiyakoo_Error', '*** Member\'s Work Experience Data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
                .$throwWorkExperienceData.getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyExperience (Request $requestWorkExperience, $idExperience) {
        try {
            if (WorkExperienceDataModel::find($idExperience)) {
                // Soft Remove
                WorkExperienceDataModel::destroy($idExperience);
                
                return redirect()->route ('members.show', $requestWorkExperience->hdnMemberIDNum)
                    ->with('JoshKiyakoo_Success', '
                        <div class="row">
                            <div class="col-md-10">
                                *** Member\'s <span style="font-weight: bold; color: BLUE;"> Work Experience data </span> was <span style="font-weight: bolder; color: RED;">DELETED</span> Successfully.....
                            </div>
                        </div>
                    ');
            }
        } 
        catch (Exception $throwWorkExperienceData) {
            return redirect()->route('members.index')
                ->with ('JoshKiyakoo_Error', '*** Member\'s Work Experience Data is <span style="font-weight: bolder; color: RED;">NOT DELETED</span>...<hr />'
                .$throwWorkExperienceData.getMessage());
        }
    }
}
