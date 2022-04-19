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
use App\Models\Members\ServiceSectorDataModel;

class ServiceSectorDataController extends Controller {
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
    public function createSector ($idMember) {
        if (MembersDataModel::find($idMember)) {
            $memberServiceSector =
                    DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ServiceSectorData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ServiceSectorData.idMember')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email'
                        )
                ->where('sfgbc_Members.idMember', $idMember)
                ->first();
        return view ('members.servicesector.create', compact ('memberServiceSector'));
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
    public function storeSector (Request $requestServiceSector) {
        // Local @Flag variable definition
        $myDataEntryFlag = -1;
        // Object @Model Defination
        $addServiceSectorObj = new ServiceSectorDataModel();

        // Service Sector Information
        if ($requestServiceSector->rdoStillServingHere === 'Yes') {
            if (is_null ($requestServiceSector->cmbServiceSector) && is_Null ($requestServiceSector->cmbRoleOnServiceSector) && is_Null ($requestServiceSector->datSectorJoinedDate) && is_Null ($requestServiceSector->rdoStillServingHere)) {
                $myDataEntryFlag = 0;
            }
            $requestServiceSector->datSectorLeftDate = NULL;
            $requestServiceSector->txtSectorLeftReason = NULL;
        }
        
        if ($requestServiceSector->rdoStillServingHere === 'No') {
            if (is_null ($requestServiceSector->datSectorLeftDate) && is_null ($requestServiceSector->txtSectorLeftReason)) {
                $myDataEntryFlag = 0;
            }
        }

        if ($myDataEntryFlag === 0) {
            return redirect()->back()->withInput()->with('JoshKiyakoo_Error', '***** All <span style="font-weight: bolder; color: RED;">REQUIRED</span> 
                fields must be <span style="font-weight: bolder; color: RED;">FILLED</span>.....');
        }
        else {
            try {
                // Member's Service Sector Data
                $addServiceSectorObj->hasServiceSector = 'Yes';
                $addServiceSectorObj->serviceSectorName = $requestServiceSector->cmbServiceSector;
                $addServiceSectorObj->roleOnSector = $requestServiceSector->cmbRoleOnServiceSector;
                $addServiceSectorObj->joinedDate = $requestServiceSector->datSectorJoinedDate;
                $addServiceSectorObj->stillServingHere = $requestServiceSector->rdoStillServingHere;
                $addServiceSectorObj->leftServingDate = $requestServiceSector->datSectorLeftDate;
                $addServiceSectorObj->leftServingReason = $requestServiceSector->txtSectorLeftReason;
                $addServiceSectorObj->burdenDetail = $requestServiceSector->txaBurden;
                $addServiceSectorObj->memberServiceSectorRemark = $requestServiceSector->txaServiceSectorRemarks;
                $addServiceSectorObj->idMember = $requestServiceSector->hdnMemberID;

                // Save Member's Service Sector Data
                $addServiceSectorObj->save();

                return redirect()->route('members.show', $addServiceSectorObj->idMember)
                    ->with('JoshKiyakoo_Success', '
                        <div class="row">
                            <div class="col-md-10">
                                *** Member\'s Service Sector data <span style="font-weight: bold; color: BLUE;"> '.$addServiceSectorObj->roleOnSector.' of '.$addServiceSectorObj->serviceSectorName.'</span> was <span style="font-weight: bolder; color: RED;">REGISTERED</span> Successfully.....
                            </div>
                        </div>
                    ');
            }
            catch (Exception $throwServiceSectorData) {
                return redirect()->route('members.index')
                    ->with ('JoshKiyakoo_Error', '*** Member\'s Service Sector Data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
                    .$throwServiceSectorData.getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSector ($idServiceSector) {
        if (ServiceSectorDataModel::find($idServiceSector)) {
            $memberServiceSector =
                DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->leftJoin ('sfgbc_member_ServiceSectorData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ServiceSectorData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email',

                        'sfgbc_member_ServiceSectorData.idServiceSectorData', 'sfgbc_member_ServiceSectorData.hasServiceSector', 'sfgbc_member_ServiceSectorData.serviceSectorName', 'sfgbc_member_ServiceSectorData.roleOnSector', 'sfgbc_member_ServiceSectorData.joinedDate', 'sfgbc_member_ServiceSectorData.stillServingHere', 'sfgbc_member_ServiceSectorData.leftServingDate', 'sfgbc_member_ServiceSectorData.leftServingReason', 'sfgbc_member_ServiceSectorData.burdenDetail', 'sfgbc_member_ServiceSectorData.memberServiceSectorRemark'
                    )
                ->where('sfgbc_member_ServiceSectorData.idServiceSectorData', $idServiceSector)
                ->first();
            return view ('members.servicesector.show', compact ('memberServiceSector'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Service Sector UID '.$idServiceSector.'...');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSector ($idServiceSector) {
        if (ServiceSectorDataModel::find($idServiceSector)) {
            $memberServiceSector =
                DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->leftJoin ('sfgbc_member_ServiceSectorData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ServiceSectorData.idMember')
                    ->select (
                        'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix',
                        
                        'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email',
                        
                        'sfgbc_member_ServiceSectorData.idServiceSectorData', 'sfgbc_member_ServiceSectorData.hasServiceSector', 'sfgbc_member_ServiceSectorData.serviceSectorName', 'sfgbc_member_ServiceSectorData.roleOnSector', 'sfgbc_member_ServiceSectorData.joinedDate', 'sfgbc_member_ServiceSectorData.stillServingHere', 'sfgbc_member_ServiceSectorData.leftServingDate', 'sfgbc_member_ServiceSectorData.leftServingReason', 'sfgbc_member_ServiceSectorData.burdenDetail', 'sfgbc_member_ServiceSectorData.memberServiceSectorRemark'
                    )
                ->where('sfgbc_member_ServiceSectorData.idServiceSectorData', $idServiceSector)
                ->first();
            return view ('members.servicesector.edit', compact ('memberServiceSector'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Education Level UID '.$idServiceSector.'...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSector (Request $requestServiceSector, $idServiceSector) {
        if (ServiceSectorDataModel::find($idServiceSector)) {
            // Object Model Defination
            $editServiceSectorObj = ServiceSectorDataModel::find($idServiceSector);
            // Member's Family Memeber Data
            $editServiceSectorObj->hasServiceSector = 'Yes';
            $editServiceSectorObj->serviceSectorName = $requestServiceSector->cmbServiceSector;
            $editServiceSectorObj->roleOnSector = $requestServiceSector->cmbRoleOnServiceSector;
            $editServiceSectorObj->joinedDate = $requestServiceSector->datSectorJoinedDate;
            $editServiceSectorObj->stillServingHere = $requestServiceSector->rdoStillServingHere;
            $editServiceSectorObj->leftServingDate = $requestServiceSector->datSectorLeftDate;
            $editServiceSectorObj->leftServingReason = $requestServiceSector->txtSectorLeftReason;
            $editServiceSectorObj->burdenDetail = $requestServiceSector->txaBurden;
            $editServiceSectorObj->memberServiceSectorRemark = $requestServiceSector->txaServiceSectorRemarks;
            $idMember = $requestServiceSector->hdnMemberID;

            // Save Data on Database
            $editServiceSectorObj->update();

            return redirect()->route('members.show', $idMember)
                ->with('JoshKiyakoo_Success', '
                    <div class="row">
                        <div class="col-md-10">
                            *** Member\'s <span style="font-weight: bold; color: BLUE;"> Service Sector data </span> was <span style="font-weight: bolder; color: RED;">UPDATED</span> Successfully.....
                        </div>
                    </div>
                ');
        }
        else {
            return redirect()->route('members.show', $idMember)
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s Service Sector data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s Service Sector UID Number '.$idServiceSector.'...');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroySector (Request $requestServiceSector, $idServiceSector) {
        try {
            if (ServiceSectorDataModel::find($idServiceSector)) {
                // Soft Remove
                ServiceSectorDataModel::destroy($idServiceSector);
                
                return redirect()->route ('members.show', $requestServiceSector->hdnMemberIDNum)
                    ->with('JoshKiyakoo_Success', '
                        <div class="row">
                            <div class="col-md-10">
                                *** Member\'s <span style="font-weight: bold; color: BLUE;"> Service Sector data </span> was <span style="font-weight: bolder; color: RED;">DELETED</span> Successfully.....
                            </div>
                        </div>
                    ');
            }
        } 
        catch (Exception $throwServiceSectorData) {
            return redirect()->route('members.index')
                ->with ('JoshKiyakoo_Error', '*** Member\'s Service Sector Data is <span style="font-weight: bolder; color: RED;">NOT DELETED</span>...<hr />'
                .$throwServiceSectorData.getMessage());
        }
    }
}
