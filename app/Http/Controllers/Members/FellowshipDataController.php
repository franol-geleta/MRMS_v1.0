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
use App\Models\Members\FellowshipDataModel;

class FellowshipDataController extends Controller {
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
    public function createFellowship ($idMember) {
        if (MembersDataModel::find($idMember)) {
            $memberFellowship =
                    DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->leftJoin ('sfgbc_member_FellowshipData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_FellowshipData.idMember')
                    ->select (
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email',
                        
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix'
                        )
                ->where('sfgbc_Members.idMember', $idMember)
                ->first();
        return view ('members.fellowship.create', compact ('memberFellowship'));
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
    public function storeFellowship (Request $requestFellowship) {
        // Local @Flag variable definition
        $myDataEntryFlag = -1;
        // Object @Model Defination
        $addMemberFellowshipObj = new FellowshipDataModel();

        // Fellowship Information
        if ($requestFellowship->rdoStillParticipatingHere === 'No') {
            if (is_null ($requestFellowship->datFellowshipLeftDate) && is_Null ($requestFellowship->txtFellowshipLeftReason)) {
                $myDataEntryFlag = 0;
            }
        }
        else {
            if (is_null ($requestFellowship->cmbFellowshipType) && is_Null ($requestFellowship->cmbFellowshipName) && is_Null ($requestFellowship->cmbRoleOnFellowship) && is_Null ($requestFellowship->datFellowshipJoinedDate) && is_Null ($requestFellowship->rdoStillParticipatingHere)) {
                $myDataEntryFlag = 0;
            }
            $requestFellowship->datFellowshipLeftDate = NULL;
            $requestFellowship->txtFellowshipLeftReason = NULL;
        }

        if ($myDataEntryFlag === 0) {
            return redirect()->back()->withInput()->with('JoshKiyakoo_Error', '***** All <span style="font-weight: bolder; color: RED;">REQUIRED</span> 
                fields must be <span style="font-weight: bolder; color: RED;">FILLED</span>.....');
        }
        else {
            try {
                // Member's Fellowship Data
                $addMemberFellowshipObj->hasFellowship = 'Yes';
                $addMemberFellowshipObj->fellowshipType = $requestFellowship->cmbFellowshipType;
                $addMemberFellowshipObj->fellowshipName = $requestFellowship->cmbFellowshipName;
                $addMemberFellowshipObj->roleOnFellowship = $requestFellowship->cmbRoleOnFellowship;
                $addMemberFellowshipObj->joinedDate = $requestFellowship->datFellowshipJoinedDate;
                $addMemberFellowshipObj->hallName = $requestFellowship->txtFellowshipHallName;
                $addMemberFellowshipObj->stillParticipatingHere = $requestFellowship->rdoStillParticipatingHere;
                $addMemberFellowshipObj->leftFellowshipDate = $requestFellowship->datFellowshipLeftDate;
                $addMemberFellowshipObj->leftFellowshipReason = $requestFellowship->txtFellowshipLeftReason;
                $addMemberFellowshipObj->memberFellowshipRemark = $requestFellowship->txaFellowshipRemarks;
                $addMemberFellowshipObj->idMember = $requestFellowship->hdnMemberID;

                // Save Member's Fellowship Data
                $addMemberFellowshipObj->save();

                return redirect()->route('members.show', $addMemberFellowshipObj->idMember)
                    ->with('JoshKiyakoo_Success', '
                        <div class="row">
                            <div class="col-md-10">
                                *** Member\'s Fellowship data <span style="font-weight: bold; color: BLUE;"> '
                                .$addMemberFellowshipObj->fellowshipType.' named '.$addMemberFellowshipObj->fellowshipName.' with role '.$addMemberFellowshipObj->roleOnFellowship.
                                '</span> was <span style="font-weight: bolder; color: RED;">REGISTERED</span> Successfully.....
                            </div>
                        </div>
                    ');
            }
            catch (Exception $throwFellowshipData) {
                return redirect()->route('members.index')
                    ->with ('JoshKiyakoo_Error', '*** Member\'s Fellowship Data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
                    .$throwFellowshipData.getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showFellowship ($idFellowship) {
        if (FellowshipDataModel::find($idFellowship)) {
            $memberFellowship =
                DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->leftJoin ('sfgbc_member_FellowshipData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_FellowshipData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email',

                        'sfgbc_member_FellowshipData.idFellowshipData', 'sfgbc_member_FellowshipData.fellowshipType', 'sfgbc_member_FellowshipData.hallName', 'sfgbc_member_FellowshipData.fellowshipName', 'sfgbc_member_FellowshipData.roleOnFellowship', 'sfgbc_member_FellowshipData.joinedDate', 'sfgbc_member_FellowshipData.stillParticipatingHere', 'sfgbc_member_FellowshipData.leftFellowshipDate', 'sfgbc_member_FellowshipData.leftFellowshipReason', 'sfgbc_member_FellowshipData.memberFellowshipRemark'
                    )
                ->where('sfgbc_member_FellowshipData.idFellowshipData', $idFellowship)
                ->first();
            return view ('members.fellowship.show', compact ('memberFellowship'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Fellowship UID '.$idFellowship.'...');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editFellowship ($idFellowship) {
        if (FellowshipDataModel::find($idFellowship)) {
            $memberFellowship =
                DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->leftJoin ('sfgbc_member_FellowshipData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_FellowshipData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email',

                        'sfgbc_member_FellowshipData.idFellowshipData', 'sfgbc_member_FellowshipData.fellowshipType', 'sfgbc_member_FellowshipData.hallName', 'sfgbc_member_FellowshipData.fellowshipName', 'sfgbc_member_FellowshipData.roleOnFellowship', 'sfgbc_member_FellowshipData.joinedDate', 'sfgbc_member_FellowshipData.stillParticipatingHere', 'sfgbc_member_FellowshipData.leftFellowshipDate', 'sfgbc_member_FellowshipData.leftFellowshipReason', 'sfgbc_member_FellowshipData.memberFellowshipRemark'
                    )
                ->where('sfgbc_member_FellowshipData.idFellowshipData', $idFellowship)
                ->first();
            return view ('members.fellowship.edit', compact ('memberFellowship'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Fellowship UID '.$idFellowship.'...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFellowship (Request $requestFellowship, $idFellowship) {
        if (FellowshipDataModel::find($idFellowship)) {
            // Object Model Defination
            $editMemberFellowshipObj = FellowshipDataModel::find($idFellowship);
            // Member's Family Memeber Data
            $editMemberFellowshipObj->hasFellowship = 'Yes';
            $editMemberFellowshipObj->fellowshipType = $requestFellowship->cmbFellowshipType;
            $editMemberFellowshipObj->fellowshipName = $requestFellowship->cmbFellowshipName;
            $editMemberFellowshipObj->roleOnFellowship = $requestFellowship->cmbRoleOnFellowship;
            $editMemberFellowshipObj->joinedDate = $requestFellowship->datFellowshipJoinedDate;
            $editMemberFellowshipObj->hallName = $requestFellowship->txtFellowshipHallName;
            $editMemberFellowshipObj->stillParticipatingHere = $requestFellowship->rdoStillParticipatingHere;
            $editMemberFellowshipObj->leftFellowshipDate = $requestFellowship->datFellowshipLeftDate;
            $editMemberFellowshipObj->leftFellowshipReason = $requestFellowship->txtFellowshipLeftReason;
            $editMemberFellowshipObj->memberFellowshipRemark = $requestFellowship->txaFellowshipRemarks;
            $idMember = $requestFellowship->hdnMemberID;

            // Save Data on Database
            $editMemberFellowshipObj->update();

            return redirect()->route('members.show', $idMember)
                ->with('JoshKiyakoo_Success', '
                    <div class="row">
                        <div class="col-md-10">
                            *** Member\'s <span style="font-weight: bold; color: BLUE;"> Fellowship data </span> was <span style="font-weight: bolder; color: RED;">UPDATED</span> Successfully.....
                        </div>
                    </div>
                ');
        }
        else {
            return redirect()->route('members.show', $idMember)
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s Fellowship data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Fellowship UID Number '.$idFellowship.'...');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyFellowship (Request $requestFellowship, $idFellowship) {
        try {
            if (FellowshipDataModel::find($idFellowship)) {
                // Soft Remove
                FellowshipDataModel::destroy($idFellowship);
                
                return redirect()->route ('members.show', $requestFellowship->hdnMemberIDNum)
                    ->with('JoshKiyakoo_Success', '
                        <div class="row">
                            <div class="col-md-10">
                                *** Member\'s <span style="font-weight: bold; color: BLUE;"> Fellowship data </span> was <span style="font-weight: bolder; color: RED;">DELETED</span> Successfully.....
                            </div>
                        </div>
                    ');
            }
        } 
        catch (Exception $throwMemberFellowshipData) {
            return redirect()->route('members.index')
                ->with ('JoshKiyakoo_Error', '*** Member\'s Fellowship Data is <span style="font-weight: bolder; color: RED;">NOT DELETED</span>...<hr />'
                .$throwMemberFellowshipData.getMessage());
        }
    }
}
