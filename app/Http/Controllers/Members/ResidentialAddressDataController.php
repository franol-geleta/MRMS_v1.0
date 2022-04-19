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
use App\Models\Members\ResidentialAddressDataModel;

class ResidentialAddressDataController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createAddress ($idMember) {
        if (MembersDataModel::find($idMember)) {
            $member =
                    DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix'
                        )
                ->where('sfgbc_Members.idMember', $idMember)
                ->first();
        return view ('members.residentialaddress.create', compact ('member'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s UMID '.$idMember.'...');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAddress ($idAddress) {
        if (ResidentialAddressDataModel::find($idAddress)) {
            $member =
                DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        'sfgbc_member_ResidentialAddressData.idResidentialAddressData', 'sfgbc_member_ResidentialAddressData.country', 'sfgbc_member_ResidentialAddressData.province', 'sfgbc_member_ResidentialAddressData.municipality', 'sfgbc_member_ResidentialAddressData.subcity', 'sfgbc_member_ResidentialAddressData.streetname', 'sfgbc_member_ResidentialAddressData.zone', 'sfgbc_member_ResidentialAddressData.woreda', 'sfgbc_member_ResidentialAddressData.kebele', 'sfgbc_member_ResidentialAddressData.block', 'sfgbc_member_ResidentialAddressData.houseNum', 'sfgbc_member_ResidentialAddressData.locationNaming', 'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.alternatePhone', 'sfgbc_member_ResidentialAddressData.homeTelephone', 'sfgbc_member_ResidentialAddressData.officeTelephone', 'sfgbc_member_ResidentialAddressData.postCode', 'sfgbc_member_ResidentialAddressData.email', 'sfgbc_member_ResidentialAddressData.residentialAddressRemark'
                    )
                ->where('sfgbc_member_ResidentialAddressData.idResidentialAddressData', $idAddress)
                ->first();
            return view ('members.residentialaddress.edit', compact ('member'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Residence Address UID Number '.$idAddress.'...');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAddress (Request $requestMemberAddress, $idMember) {
        if (MembersDataModel::find($idMember)) {
            // Object Model Defination
            $addMemberAddressObj = new ResidentialAddressDataModel();
            // Address Data
            $addMemberAddressObj->country = $requestMemberAddress->cmbCountry;
            $addMemberAddressObj->province = $requestMemberAddress->cmbProvince;
            $addMemberAddressObj->municipality = $requestMemberAddress->txtMunicipality;
            $addMemberAddressObj->streetname = $requestMemberAddress->txtStreetName;
            $addMemberAddressObj->zone = $requestMemberAddress->txtZone;
            $addMemberAddressObj->subcity = $requestMemberAddress->cmbSubcity;
            $addMemberAddressObj->woreda = $requestMemberAddress->txtWoreda;
            $addMemberAddressObj->kebele = $requestMemberAddress->txtKebele;
            $addMemberAddressObj->block = $requestMemberAddress->txtBlockMender;
            $addMemberAddressObj->houseNum = $requestMemberAddress->txtHouseNum;
            $addMemberAddressObj->locationNaming = $requestMemberAddress->txtLocationNaming;
            $addMemberAddressObj->primaryPhone = $requestMemberAddress->telePrimaryMobile;
            $addMemberAddressObj->alternatePhone = $requestMemberAddress->teleAlternateMobile;
            $addMemberAddressObj->homeTelephone = $requestMemberAddress->teleHomeTelephone;
            $addMemberAddressObj->officeTelephone = $requestMemberAddress->teleOfficeTelephone;
            $addMemberAddressObj->postCode = $requestMemberAddress->txtPostalCode;
            $addMemberAddressObj->email = $requestMemberAddress->txtEmail;
            $addMemberAddressObj->residentialAddressRemark = $requestMemberAddress->txaAddressRemarks;
            $addMemberAddressObj->idMember = $idMember;
            // Save Data on Database
            $addMemberAddressObj->save();

            return redirect()->route('members.show', $idMember)
                ->with('JoshKiyakoo_Success', '
                    <div class="row">
                        <div class="col-md-10">
                            *** Member\'s <span style="font-weight: bold; color: BLUE;"> Residential Address data </span> was <span style="font-weight: bolder; color: RED;">REGISTERED</span> Successfully.....
                        </div>
                    </div>
                ');
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s Residential Address data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s UID Number '.$idMember.'...');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAddress ($idAddress) {
        if (ResidentialAddressDataModel::find($idAddress)) {
            $member =
                DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        'sfgbc_member_ResidentialAddressData.idResidentialAddressData', 'sfgbc_member_ResidentialAddressData.country', 'sfgbc_member_ResidentialAddressData.province', 'sfgbc_member_ResidentialAddressData.municipality', 'sfgbc_member_ResidentialAddressData.subcity', 'sfgbc_member_ResidentialAddressData.streetname', 'sfgbc_member_ResidentialAddressData.zone', 'sfgbc_member_ResidentialAddressData.woreda', 'sfgbc_member_ResidentialAddressData.kebele', 'sfgbc_member_ResidentialAddressData.block', 'sfgbc_member_ResidentialAddressData.houseNum', 'sfgbc_member_ResidentialAddressData.locationNaming', 'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.alternatePhone', 'sfgbc_member_ResidentialAddressData.homeTelephone', 'sfgbc_member_ResidentialAddressData.officeTelephone', 'sfgbc_member_ResidentialAddressData.postCode', 'sfgbc_member_ResidentialAddressData.email', 'sfgbc_member_ResidentialAddressData.residentialAddressRemark'
                    )
                ->where('sfgbc_member_ResidentialAddressData.idResidentialAddressData', $idAddress)
                ->first();
            return view ('members.residentialaddress.show', compact ('member'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Residence Address UID Number '.$idAddress.'...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAddress (Request $requestMemberAddress, $idAddress) {
        if (ResidentialAddressDataModel::find($idAddress)) {
            // Object Model Defination
            $editMemberAddressObj = ResidentialAddressDataModel::find($idAddress);
            // Address Data
            $editMemberAddressObj->country = $requestMemberAddress->cmbCountry;
            $editMemberAddressObj->province = $requestMemberAddress->cmbProvince;
            $editMemberAddressObj->municipality = $requestMemberAddress->txtMunicipality;
            $editMemberAddressObj->streetname = $requestMemberAddress->txtStreetName;
            $editMemberAddressObj->zone = $requestMemberAddress->txtZone;
            $editMemberAddressObj->subcity = $requestMemberAddress->cmbSubcity;
            $editMemberAddressObj->woreda = $requestMemberAddress->txtWoreda;
            $editMemberAddressObj->kebele = $requestMemberAddress->txtKebele;
            $editMemberAddressObj->block = $requestMemberAddress->txtBlockMender;
            $editMemberAddressObj->houseNum = $requestMemberAddress->txtHouseNum;
            $editMemberAddressObj->locationNaming = $requestMemberAddress->txtLocationNaming;
            $editMemberAddressObj->primaryPhone = $requestMemberAddress->telePrimaryMobile;
            $editMemberAddressObj->alternatePhone = $requestMemberAddress->teleAlternateMobile;
            $editMemberAddressObj->homeTelephone = $requestMemberAddress->teleHomeTelephone;
            $editMemberAddressObj->officeTelephone = $requestMemberAddress->teleOfficeTelephone;
            $editMemberAddressObj->postCode = $requestMemberAddress->txtPostalCode;
            $editMemberAddressObj->email = $requestMemberAddress->txtEmail;
            $editMemberAddressObj->residentialAddressRemark = $requestMemberAddress->txaAddressRemarks;
            $idMember = $requestMemberAddress->hdnMemberIDNum;
            // Save Data on Database
            $editMemberAddressObj->update();

            return redirect()->route('members.show', $idMember)
                ->with('JoshKiyakoo_Success', '
                    <div class="row">
                        <div class="col-md-10">
                            *** Member\'s <span style="font-weight: bold; color: BLUE;"> Residential Address data </span> was <span style="font-weight: bolder; color: RED;">UPDATED</span> Successfully.....
                        </div>
                    </div>
                ');
        }
        else {
            return redirect()->route('members.show', $idMember)
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s Residential Address data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Residential Address UID Number '.$idAddress.'...');
        }
    }
}
