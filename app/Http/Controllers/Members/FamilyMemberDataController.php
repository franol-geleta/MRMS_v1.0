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
use App\Models\Members\FamilyMemberDataModel;

class FamilyMemberDataController extends Controller {
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
    public function createFamily ($idMember) {
        if (MembersDataModel::find($idMember)) {
            $memberFamilyMember =
                DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->leftJoin ('sfgbc_member_FamilyMemberData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_FamilyMemberData.idMember')
                    ->select (
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email',
                        
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix'
                        )
                ->where('sfgbc_Members.idMember', $idMember)
                ->first();
        return view ('members.familymember.create', compact ('memberFamilyMember'));
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
    public function storeFamily (Request $requestFamilyMember, $idMember) {
         // Local @Flag variable definition
         $myDataEntryFlag = -1;
         // Object @Model Defination
         $addFamilyMemberObj = new FamilyMemberDataModel();
 
         // Education Level Information
         if (is_null ($requestFamilyMember->cmbAppillation) && is_Null ($requestFamilyMember->txtFamilyFirstName) && is_Null ($requestFamilyMember->txtFamilyMiddleName) && is_Null ($requestFamilyMember->txtFamilyLastName) && is_Null ($requestFamilyMember->cmbFamilyGender) && is_Null ($requestFamilyMember->cmbRelationship) && is_Null ($requestFamilyMember->datFamilyBirthDate) && is_Null ($requestFamilyMember->txtWorshipingDenomination) && is_Null ($requestFamilyMember->rdoFamilyMemberStatus)) {
                 $myDataEntryFlag = 0;
         }
 
         if ($myDataEntryFlag === 0) {
             return redirect()->back()->withInput()->with('JoshKiyakoo_Error', '***** All <span style="font-weight: bolder; color: RED;">REQUIRED</span> 
                 fields must be <span style="font-weight: bolder; color: RED;">FILLED</span>.....');
         }
         else {
             try {
                 // Member's Education Level Data
                 $addFamilyMemberObj->hasFamilyMember = 'Yes';
                 $addFamilyMemberObj->famAppillation = $requestFamilyMember->cmbFamilyAppillation;
                 $addFamilyMemberObj->famFirstName = $requestFamilyMember->txtFamilyFirstName;
                 $addFamilyMemberObj->famMiddleName = $requestFamilyMember->txtFamilyMiddleName;
                 $addFamilyMemberObj->famLastName = $requestFamilyMember->txtFamilyLastName;
                 $addFamilyMemberObj->famGender = $requestFamilyMember->cmbFamilyGender;
                 $addFamilyMemberObj->relationship = $requestFamilyMember->cmbRelationship;
                 $addFamilyMemberObj->famBirthDate = $requestFamilyMember->datFamilyBirthDate;
                 $addFamilyMemberObj->worshipingDenomination = $requestFamilyMember->txtWorshipingDenomination;
                 $addFamilyMemberObj->familyStatus = $requestFamilyMember->rdoFamilyMemberStatus;
                 $addFamilyMemberObj->idMember = $idMember;
 
                 // Save Member's Family Member Data
                 $addFamilyMemberObj->save();
 
                 return redirect()->route('members.show', $addFamilyMemberObj->idMember)
                     ->with('JoshKiyakoo_Success', '
                         <div class="row">
                             <div class="col-md-10">
                                 *** Member\'s Family Member data <span style="font-weight: bold; color: BLUE;"> '
                                 .$addFamilyMemberObj->famAppillation.' '.$addFamilyMemberObj->famFirstName.' '.$addFamilyMemberObj->famMiddleName.' '.$addFamilyMemberObj->famLastName.' as '.$addFamilyMemberObj->relationship.'</span> was <span style="font-weight: bolder; color: RED;">REGISTERED</span> Successfully.....
                             </div>
                         </div>
                     ');
             }
             catch (Exception $throwFamilyMemberData) {
                 return redirect()->route('members.index')
                     ->with ('JoshKiyakoo_Error', '*** Member\'s Family Member Data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
                     .$throwFamilyMemberData.getMessage());
             }
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showFamily ($idFamilyMember) {
        if (FamilyMemberDataModel::find($idFamilyMember)) {
            $memberFamilyMember =
                DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->leftJoin ('sfgbc_member_FamilyMemberData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_FamilyMemberData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email',

                        'sfgbc_member_FamilyMemberData.idFamilyMember', 'sfgbc_member_FamilyMemberData.hasFamilyMember', 'sfgbc_member_FamilyMemberData.famAppillation', 'sfgbc_member_FamilyMemberData.famFirstName', 'sfgbc_member_FamilyMemberData.famMiddleName', 'sfgbc_member_FamilyMemberData.famLastName', 'sfgbc_member_FamilyMemberData.famGender', 'sfgbc_member_FamilyMemberData.relationship', 'sfgbc_member_FamilyMemberData.famBirthDate', 'sfgbc_member_FamilyMemberData.worshipingDenomination', 'sfgbc_member_FamilyMemberData.familyStatus'
                    )
                ->where('sfgbc_member_FamilyMemberData.idFamilyMember', $idFamilyMember)
                ->first();
            return view ('members.familymember.show', compact ('memberFamilyMember'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Family Member UID '.$idFamilyMember.'...');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editFamily ($idFamilyMember) {
        if (FamilyMemberDataModel::find($idFamilyMember)) {
            $memberFamilyMember =
                DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->leftJoin ('sfgbc_member_FamilyMemberData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_FamilyMemberData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email',
                        
                        'sfgbc_member_FamilyMemberData.idFamilyMember', 'sfgbc_member_FamilyMemberData.hasFamilyMember', 'sfgbc_member_FamilyMemberData.famAppillation', 'sfgbc_member_FamilyMemberData.famFirstName', 'sfgbc_member_FamilyMemberData.famMiddleName', 'sfgbc_member_FamilyMemberData.famLastName', 'sfgbc_member_FamilyMemberData.famGender', 'sfgbc_member_FamilyMemberData.relationship', 'sfgbc_member_FamilyMemberData.famBirthDate', 'sfgbc_member_FamilyMemberData.worshipingDenomination', 'sfgbc_member_FamilyMemberData.familyStatus'
                    )
                ->where('sfgbc_member_FamilyMemberData.idFamilyMember', $idFamilyMember)
                ->first();
            return view ('members.familymember.edit', compact ('memberFamilyMember'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Education Level UID '.$idFamilyMember.'...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFamily (Request $requestFamilyMember, $idFamilyMember) {
        if (FamilyMemberDataModel::find($idFamilyMember)) {
            // Object Model Defination
            $editFamilyMemberObj = FamilyMemberDataModel::find($idFamilyMember);
            // Member's Family Memeber Data
            $editFamilyMemberObj->hasFamilyMember = 'Yes';
            $editFamilyMemberObj->famAppillation = $requestFamilyMember->cmbFamilyAppillation;
            $editFamilyMemberObj->famFirstName = $requestFamilyMember->txtFamilyFirstName;
            $editFamilyMemberObj->famMiddleName = $requestFamilyMember->txtFamilyMiddleName;
            $editFamilyMemberObj->famLastName = $requestFamilyMember->txtFamilyLastName;
            $editFamilyMemberObj->famGender = $requestFamilyMember->cmbFamilyGender;
            $editFamilyMemberObj->relationship = $requestFamilyMember->cmbRelationship;
            $editFamilyMemberObj->famBirthDate = $requestFamilyMember->datFamilyBirthDate;
            $editFamilyMemberObj->worshipingDenomination = $requestFamilyMember->txtWorshipingDenomination;
            $editFamilyMemberObj->familyStatus = $requestFamilyMember->rdoFamilyMemberStatus;
            $idMember = $requestFamilyMember->hdnMemberID;

            // Save Data on Database
            $editFamilyMemberObj->update();

            return redirect()->route('members.show', $idMember)
                ->with('JoshKiyakoo_Success', '
                    <div class="row">
                        <div class="col-md-10">
                            *** Member\'s <span style="font-weight: bold; color: BLUE;"> Family Member data </span> was <span style="font-weight: bolder; color: RED;">UPDATED</span> Successfully.....
                        </div>
                    </div>
                ');
        }
        else {
            return redirect()->route('members.show', $idMember)
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s Family Member data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Family Member UID Number '.$idFamilyMember.'...');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyFamily (Request $requestFamilyMember, $idFamilyMember) {
        try {
            if (FamilyMemberDataModel::find($idFamilyMember)) {
                                
                // Soft Remove
                FamilyMemberDataModel::destroy($idFamilyMember);
                
                return redirect()->route ('members.show', $requestFamilyMember->hdnMemberIDNum)
                    ->with('JoshKiyakoo_Success', '
                        <div class="row">
                            <div class="col-md-10">
                                *** Member\'s <span style="font-weight: bold; color: BLUE;"> Family Member data </span> was <span style="font-weight: bolder; color: RED;">DELETED</span> Successfully.....
                            </div>
                        </div>
                    ');
            }
        } 
        catch (Exception $throwFamilyMemberData) {
            return redirect()->route('members.index')
                ->with ('JoshKiyakoo_Error', '*** Member\'s Family Member Data is <span style="font-weight: bolder; color: RED;">NOT DELETED</span>...<hr />'
                .$throwFamilyMemberData.getMessage());
        }
    }
}
