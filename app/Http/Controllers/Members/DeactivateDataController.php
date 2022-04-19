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
use App\Models\Members\TransferedDataModel;
use App\Models\Members\DeceasedDataModel;

class DeactivateDataController extends Controller {
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
    public function deactivateMember ($idMember) {
        if (MembersDataModel::find($idMember)) {
            $member =
                    DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email'
                    )
                ->where('sfgbc_Members.idMember', $idMember)
                ->first();
            return view ('members.deactivate', compact ('member'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s UID '.$idMember.'...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addTransferMember (Request $requestTransfer, $idMember) {
        // Object Model Defination
        $memberTransferObj = new TransferedDataModel ();
        $memberObj = new MembersDataModel();

        if (MembersDataModel::find($idMember)) {
            // Add Member's Transfer Data
            $memberTransferObj->transferType = $requestTransfer->cmbTransferType;
            $memberTransferObj->transferDate = $requestTransfer->datTransferDate;
            $memberTransferObj->churchTransfer = $requestTransfer->txtChurchTransfer;
            $memberTransferObj->transferLocation = $requestTransfer->txtTransferLocation;
            $memberTransferObj->transferLetterNum = $requestTransfer->txtTransferLetterNum;
            $memberTransferObj->transferRemark = $requestTransfer->txaTransferRemarks;
            $memberTransferObj->idMember = $idMember;
            // Change Member's Status
            $memberObj = MembersDataModel::find($idMember);
            $memberObj->status = 'Inactive';

            // Save Data on Database
            $memberObj->update();
            $memberTransferObj->save();

            return redirect()->route('members.show', $idMember)
                ->with('JoshKiyakoo_Success', '
                    <div class="row">
                        <div class="col-md-10">
                        *** <span style="font-weight: bold; color: RED;"> TRANSFERED </span> Member\'s profile data is <span style="font-weight: bold; color: BLUE;"> DEACTIVATED </span> Successfully.....
                        </div>
                    </div>
                ');
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s UID '.$idMember.'...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addDeceaseMember (Request $requestDecease, $idMember) {
        // Object Model Defination
        $memberDeceaseObj = new DeceasedDataModel ();
        $memberObj = new MembersDataModel();

        if (MembersDataModel::find($idMember)) {
            // Add Member's Transfer Data
            $memberDeceaseObj->deceaseDate = $requestDecease->datDeceaseDate;
            $memberDeceaseObj->deceaseReason = $requestDecease->txtDeceaseReason;
            $memberDeceaseObj->whoNotified = $requestDecease->txtWhoNotified;
            $memberDeceaseObj->deceaseRelationship = $requestDecease->cmbDeceaseRelationship;
            $memberDeceaseObj->funeralPlace = $requestDecease->txtFuneralPlace;
            $memberDeceaseObj->funeralDate = $requestDecease->datFuneralDate;
            $memberDeceaseObj->funeralTime = $requestDecease->timFuneralTime;
            $memberDeceaseObj->funeralCoordinator = $requestDecease->cmbFuneralCoordinator;
            $memberDeceaseObj->deceaseRemark = $requestDecease->txaDeceaseRemarks;
            $memberDeceaseObj->idMember = $idMember;
            // Change Member's Status
            $memberObj = MembersDataModel::find($idMember);
            $memberObj->status = 'Inactive';

            // Save Data on Database
            $memberObj->update();
            $memberDeceaseObj->save();

            return redirect()->route('members.show', $idMember)
                ->with('JoshKiyakoo_Success', '
                    <div class="row">
                        <div class="col-md-10">
                            *** <span style="font-weight: bold; color: RED;"> DECEASED </span> Member\'s profile data is <span style="font-weight: bold; color: BLUE;"> DEACTIVATED </span> Successfully.....
                        </div>
                    </div>
                ');
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s UID '.$idMember.'...');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivatedMember (Request $requestDeactivated, $idMember) {
        if (MembersDataModel::find($idMember) || (DeceasedDataModel::find($requestDeactivated->hdidDecease) || TransferedDataModel::find($requestDeactivated->htidTransfer))) {
        // if (MembersDataModel::find($idMember) && (DeceaseDataModel::where('idMember', $idMember) && DeceaseDataModel::where('idMember', $idMember))) {
            $deactivatedMember =
                    DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->leftJoin ('sfgbc_member_TransferedData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_TransferedData.idMember')
                    ->leftJoin ('sfgbc_member_DeceasedData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_DeceasedData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email',

                        'sfgbc_member_TransferedData.idTransferedMemberData', 'sfgbc_member_TransferedData.transferType', 'sfgbc_member_TransferedData.transferDate', 'sfgbc_member_TransferedData.churchTransfer', 'sfgbc_member_TransferedData.transferLocation', 'sfgbc_member_TransferedData.transferLetterNum', 'sfgbc_member_TransferedData.transferRemark',
                        
                        'sfgbc_member_DeceasedData.idDeceasedMemberData', 'sfgbc_member_DeceasedData.deceaseDate', 'sfgbc_member_DeceasedData.deceaseReason', 'sfgbc_member_DeceasedData.whoNotified', 'sfgbc_member_DeceasedData.deceaseRelationship', 'sfgbc_member_DeceasedData.funeralPlace', 'sfgbc_member_DeceasedData.funeralDate', 'sfgbc_member_DeceasedData.funeralTime', 'sfgbc_member_DeceasedData.funeralCoordinator', 'sfgbc_member_DeceasedData.deceaseRemark'
                    )
                ->where('sfgbc_Members.idMember', $idMember)
                ->first();
            return view ('members.deactivated', compact ('deactivatedMember'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s UID '.$idMember.'...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTransferMember (Request $requestTransfer, $idMember) {
        if (MembersDataModel::find($idMember) && TransferedDataModel::where('idMember', $idMember)) {
            // Object Model Defination
            $editTransferObj = TransferedDataModel::find($requestTransfer->hdIDTransfer);

            // Member's Transfer Data
            $editTransferObj->transferType = $requestTransfer->cmbTransferType;
            $editTransferObj->transferDate = $requestTransfer->datTransferDate;
            $editTransferObj->churchTransfer = $requestTransfer->txtChurchTransfer;
            $editTransferObj->transferLocation = $requestTransfer->txtTransferLocation;
            $editTransferObj->transferLetterNum = $requestTransfer->txtTransferLetterNum;
            $editTransferObj->transferRemark = $requestTransfer->txaTransferRemark;
            $editTransferObj->idMember = $idMember;

            // Save Data Changes on Database
            $editTransferObj->update();

            return redirect()->route('members.show', $idMember)
                ->with('JoshKiyakoo_Success', '
                    <div class="row">
                        <div class="col-md-10">
                            *** <span style="font-weight: bold; color: RED;"> TRANSFERED </span> Member\'s profile data is <span style="font-weight: bold; color: BLUE;"> UPDATED </span> Successfully.....
                        </div>
                    </div>
                ');
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data or Member\'s Transfer information <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s UID '.$idMember.'...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editDeceaseMember (Request $requestDecease, $idMember) {
        if (MembersDataModel::find($idMember) && DeceasedDataModel::where('idMember', $idMember)) {
            // Object Model Defination
            $editDeceaseObj = DeceasedDataModel::find($requestDecease->hdIDDecease);

            // Member's Decease Data
            $editDeceaseObj->deceaseDate = $requestDecease->datDeceaseDate;
            $editDeceaseObj->deceaseReason = $requestDecease->txtDeceaseReason;
            $editDeceaseObj->whoNotified = $requestDecease->txtWhoNotified;
            $editDeceaseObj->deceaseRelationship = $requestDecease->cmbDeceaseRelationship;
            $editDeceaseObj->funeralPlace = $requestDecease->txtFuneralPlace;
            $editDeceaseObj->funeralDate = $requestDecease->datFuneralDate;
            $editDeceaseObj->funeralTime = $requestDecease->timFuneralTime;
            $editDeceaseObj->funeralCoordinator = $requestDecease->cmbFuneralCoordinator;
            $editDeceaseObj->deceaseRemark = $requestDecease->txaDeceaseRemark;
            $editDeceaseObj->idMember = $idMember;

            // Save Data Changes on Database
            $editDeceaseObj->update();

            return redirect()->route('members.show', $idMember)
                ->with('JoshKiyakoo_Success', '
                    <div class="row">
                        <div class="col-md-10">
                            *** <span style="font-weight: bold; color: RED;"> DECEASED </span> Member\'s profile data is <span style="font-weight: bold; color: BLUE;"> UPDATED </span> Successfully.....
                        </div>
                    </div>
                ');
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data or Member\'s Decease information <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s UID '.$idMember.'...');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewTransferedMember () {
        $transferedMembers =
            DB::table ('sfgbc_Members')
                ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                ->leftJoin ('sfgbc_member_TransferedData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_TransferedData.idMember')
                ->select (
                    'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',

                    'sfgbc_member_TransferedData.idTransferedMemberData', 'sfgbc_member_TransferedData.transferType', 'sfgbc_member_TransferedData.transferDate', 'sfgbc_member_TransferedData.churchTransfer', 'sfgbc_member_TransferedData.transferLocation', 'sfgbc_member_TransferedData.transferLetterNum', 'sfgbc_member_TransferedData.transferRemark'
                )
                // ->where('sfgbc_Members.status', '=', 'Inactive', 'AND', 'sfgbc_member_TransferedData.isTransfered', '=', 'Yes')
                ->where('sfgbc_member_TransferedData.isTransfered', '=', 'Yes')
                ->orderby('sfgbc_Members.idMember', 'ASC')
            ->get();
        return view ('members.transfered', compact ('transferedMembers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewDeceasedMember () {
        $deceasedMembers =
            DB::table ('sfgbc_Members')
                ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                ->leftJoin ('sfgbc_member_DeceasedData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_DeceasedData.idMember')
                ->select (
                    'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',

                    'sfgbc_member_DeceasedData.idDeceasedMemberData', 'sfgbc_member_DeceasedData.deceaseDate', 'sfgbc_member_DeceasedData.deceaseReason', 'sfgbc_member_DeceasedData.whoNotified', 'sfgbc_member_DeceasedData.deceaseRelationship', 'sfgbc_member_DeceasedData.funeralPlace', 'sfgbc_member_DeceasedData.funeralDate', 'sfgbc_member_DeceasedData.funeralTime', 'sfgbc_member_DeceasedData.funeralCoordinator', 'sfgbc_member_DeceasedData.deceaseRemark'
                )
                // ->where('sfgbc_Members.status', '=', 'Inactive', 'AND', 'sfgbc_member_DeceasedData.isDeceased', '=', 'Yes')
                ->where('sfgbc_member_DeceasedData.isDeceased', '=', 'Yes')
                ->orderby('sfgbc_Members.idMember', 'ASC')
            ->get();
        return view ('members.deceased', compact ('deceasedMembers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewInactiveMember () {
        $inactiveMembers =
            DB::table ('sfgbc_Members')
                ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                ->leftJoin ('sfgbc_member_DeceasedData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_DeceasedData.idMember')
                ->leftJoin ('sfgbc_member_TransferedData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_TransferedData.idMember')
                ->select (
                    'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',

                    'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email',

                    'sfgbc_member_DeceasedData.deceaseDate', 'sfgbc_member_DeceasedData.deceaseReason', 'sfgbc_member_DeceasedData.whoNotified', 'sfgbc_member_DeceasedData.deceaseRelationship', 'sfgbc_member_DeceasedData.funeralPlace', 'sfgbc_member_DeceasedData.funeralDate', 'sfgbc_member_DeceasedData.funeralTime', 'sfgbc_member_DeceasedData.funeralCoordinator',

                    'sfgbc_member_TransferedData.transferType', 'sfgbc_member_TransferedData.transferDate', 'sfgbc_member_TransferedData.churchTransfer', 'sfgbc_member_TransferedData.transferLocation', 'sfgbc_member_TransferedData.transferLetterNum'
                )
                ->where('sfgbc_Members.status', '=', 'Inactive')
                ->orderby('sfgbc_Members.idMember', 'ASC')
            ->get();
        return view ('members.inactive', compact ('inactiveMembers'));
    }
}
