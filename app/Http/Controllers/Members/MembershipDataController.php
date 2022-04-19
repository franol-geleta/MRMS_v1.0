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
use App\Models\Members\MembershipDataModel;

class MembershipDataController extends Controller {
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
    public function createMembership ($idMember) {
        if (MembersDataModel::find($idMember)) {
            $member =
                    DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_MembershipData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_MembershipData.idMember')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email'
                        )
                ->where('sfgbc_Members.idMember', $idMember)
                ->first();
        return view ('members.membership.create', compact ('member'));
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
    public function storeMembership (Request $requestMembership, $idMember) {
        if (MembersDataModel::find($idMember)) {
            // Object Model Defination
            $addMemberMembershipObj = new MembershipDataModel();
            // Membership Data
            $addMemberMembershipObj->howBecameMember = $requestMembership->rdoHowBecameMember;
            $addMemberMembershipObj->believedDate = $requestMembership->datBelievedDate;
            $addMemberMembershipObj->baptizedDate = $requestMembership->datBaptizedDate;
            $addMemberMembershipObj->previousDenomination = $requestMembership->txtPrevDenomination;
            $addMemberMembershipObj->whoThoughtDoctrine = $requestMembership->txtWhoThought;
            $addMemberMembershipObj->membershipDate = $requestMembership->datMembershipDate;
            $addMemberMembershipObj->servingKind = $requestMembership->txaServingKind;
            $addMemberMembershipObj->membershipRemark = $requestMembership->txaMembershipRemarks;
            $addMemberMembershipObj->idMember = $idMember;
            
            // Save Data on Database
            $addMemberMembershipObj->save();

            return redirect()->route('members.show', $idMember)
                ->with('JoshKiyakoo_Success', '
                    <div class="row">
                        <div class="col-md-10">
                            *** Member\'s <span style="font-weight: bold; color: BLUE;"> Membership data </span> was <span style="font-weight: bolder; color: RED;">REGISTERED</span> Successfully.....
                        </div>
                    </div>
                ');
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s Membership data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s UID Number '.$idMember.'...');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editMembership ($idMembership) {
        if (MembershipDataModel::find($idMembership)) {
            $member =
                DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_MembershipData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_MembershipData.idMember')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        'sfgbc_member_MembershipData.idMembershipData', 'sfgbc_member_MembershipData.howBecameMember', 'sfgbc_member_MembershipData.previousDenomination', 'sfgbc_member_MembershipData.believedDate', 'sfgbc_member_MembershipData.baptizedDate', 'sfgbc_member_MembershipData.membershipDate', 'sfgbc_member_MembershipData.servingKind', 'sfgbc_member_MembershipData.whoThoughtDoctrine', 'sfgbc_member_MembershipData.membershipRemark',
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email'
                    )
                ->where('sfgbc_member_MembershipData.idMembershipData', $idMembership)
                ->first();
            return view ('members.membership.edit', compact ('member'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Membership UID Number '.$idMembership.'...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMembership (Request $requestMembership, $idMembership) {
        if (MembershipDataModel::find($idMembership)) {
            // Object Model Defination
            $editMemberMembershipObj = MembershipDataModel::find($idMembership);
            // Membership Data
            $editMemberMembershipObj->howBecameMember = $requestMembership->rdoHowBecameMember;
            $editMemberMembershipObj->believedDate = $requestMembership->datBelievedDate;
            $editMemberMembershipObj->baptizedDate = $requestMembership->datBaptizedDate;
            $editMemberMembershipObj->previousDenomination = $requestMembership->txtPrevDenomination;
            $editMemberMembershipObj->whoThoughtDoctrine = $requestMembership->txtWhoThought;
            $editMemberMembershipObj->membershipDate = $requestMembership->datMembershipDate;
            $editMemberMembershipObj->servingKind = $requestMembership->txaServingKind;
            $editMemberMembershipObj->membershipRemark = $requestMembership->txaMembershipRemarks;
            $idMember = $requestMembership->hdnMemberIDNum;
            // Save Data on Database
            $editMemberMembershipObj->update();

            return redirect()->route('members.show', $idMember)
                ->with('JoshKiyakoo_Success', '
                    <div class="row">
                        <div class="col-md-10">
                            *** Member\'s <span style="font-weight: bold; color: BLUE;"> Membership data </span> was <span style="font-weight: bolder; color: RED;">UPDATED</span> Successfully.....
                        </div>
                    </div>
                ');
        }
        else {
            return redirect()->route('members.show', $idMember)
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s Membership data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Membership UID Number '.$idMembership.'...');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMembership ($idMembership) {
        if (MembershipDataModel::find($idMembership)) {
            $member =
                DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_MembershipData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_MembershipData.idMember')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        'sfgbc_member_MembershipData.idMembershipData', 'sfgbc_member_MembershipData.howBecameMember', 'sfgbc_member_MembershipData.previousDenomination', 'sfgbc_member_MembershipData.believedDate', 'sfgbc_member_MembershipData.baptizedDate', 'sfgbc_member_MembershipData.membershipDate', 'sfgbc_member_MembershipData.servingKind', 'sfgbc_member_MembershipData.whoThoughtDoctrine', 'sfgbc_member_MembershipData.membershipRemark',
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email'
                    )
                ->where('sfgbc_member_MembershipData.idMembershipData', $idMembership)
                ->first();
            return view ('members.membership.show', compact ('member'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Membership UID Number '.$idMembership.'...');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMembership ($idMembership) {
        //
    }
}
