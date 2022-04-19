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
use Illuminate\Http\Request;

use Carbon\Exceptions\Exception;
use Illuminate\Support\Facades\DB;

use App\Models\Members\MembersDataModel;
use App\Models\Members\MembershipDataModel;
use App\Models\Members\ResidentialAddressDataModel;

use App\Exports\MembersDataExport;
use Excel;
use PDF;

class MembersDataController extends Controller {
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
    public function index () {
        $members =
            DB::table ('sfgbc_Members')
                ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                ->leftJoin ('sfgbc_member_MembershipData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_MembershipData.idMember')
                ->select (
                    'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix', 'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.email', 'sfgbc_member_ResidentialAddressData.locationNaming',
                    'sfgbc_member_MembershipData.howBecameMember', 'sfgbc_member_MembershipData.believedDate', 'sfgbc_member_MembershipData.baptizedDate', 'sfgbc_member_MembershipData.membershipDate'
                )
                ->orderby('sfgbc_Members.idMember', 'ASC')
            ->get();
        return view ('members.index', compact ('members'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMember () {
        return view ('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMember (Request $requestMember) {
        // Local @Flag variable definition
        $myDataEntryFlag = -1;
        // Object @Model Defination
        $addMemberData = new MembersDataModel();
        $addResidentialAddressData = new ResidentialAddressDataModel();
        $addMembershipData = new MembershipDataModel();

        if ( // Personal Information
            is_null ($requestMember->file('filePhotograph')) && is_Null ($requestMember->cmbAppillation) && is_Null ($requestMember->txtFirstName) && 
            is_Null ($requestMember->txtMiddleName) && is_Null ($requestMember->txtLastName) && is_Null ($requestMember->datMemberBirthDate) && 
            is_Null ($requestMember->cmbMemberGender) && is_Null ($requestMember->cmbCivilStatus) && is_Null ($requestMember->cmbNationality) && 
             // Residential Address Information
            is_Null ($requestMember->cmbCountry) && is_Null ($requestMember->cmbProvince) && is_Null ($requestMember->txtMunicipality) && 
            is_Null ($requestMember->cmbSubcity) && is_Null ($requestMember->txtWoreda) && is_Null ($requestMember->txtLocation) && is_Null ($requestMember->telePrimaryMobile) && 
             // Membership Information
            is_Null ($requestMember->rdoHowBecameMember) && is_Null ($requestMember->txtPrevDenomination) &&
            is_Null ($requestMember->datBelievedDate) && is_Null ($requestMember->datBaptizedDate) && is_Null ($requestMember->datMembershipDate) &&
            is_Null ($requestMember->txtWhoThought)) {
                $myDataEntryFlag = 0;
        }

        if ($myDataEntryFlag === 0) {
            return redirect()->back()->withInput()->with('JoshKiyakoo_Error', '***** All <span style="font-weight: bolder; color: RED;">REQUIRED</span> 
                fields must be <span style="font-weight: bolder; color: RED;">FILLED</span>.....');
        }
        else {
            try {
                // Member's Data
                $addMemberData->appellation = $requestMember->cmbAppillation;
                $addMemberData->firstName = $requestMember->txtFirstName;
                $addMemberData->middleName = $requestMember->txtMiddleName;
                $addMemberData->lastName = $requestMember->txtLastName;
                $addMemberData->birthDate = $requestMember->datMemberBirthDate;
                $addMemberData->gender = $requestMember->cmbMemberGender;
                $addMemberData->civilStatus = $requestMember->cmbCivilStatus;
                $addMemberData->disabilityType = $requestMember->txaDisability;
                $addMemberData->nationality = $requestMember->cmbNationality;
                $addMemberData->status = 'Active';
                $addMemberData->memberRemark = $requestMember->txaMemberRemarks;

                // Naming and Formating Member's Photo Location
                $tempImage = $requestMember->file('filePhotograph');
                if ($tempImage) {
                    $tempImage_Name = 'mrmsProfileImage_'.$addMemberData->firstName.'_'.$addMemberData->middleName.'_'.$addMemberData->lastName.'_'.$addMemberData->gender.'_'.date ('Ymd_Hsi');
                    $tempImage_Extension = Str::lower($tempImage->getClientOriginalExtension());
                    $tempImage_FullName = $tempImage_Name.'.'.$tempImage_Extension;
                    $tempImage_UploadPath =  'storage/MRMS_MembersProfilePhoto/';
                    $tempImage_Location = $tempImage_UploadPath.$tempImage_FullName;
                    $tempImage->move($tempImage_UploadPath, $tempImage_FullName);
                    $addMemberData->photograph = $tempImage_Location;
                }

                // Save Member's Personal Data
                $addMemberData->save();
                // Locate Last Inserted Member ID
                $memberLastInsertedID = $addMemberData->idMember;

                // Residential Address Data
                $addResidentialAddressData->country = $requestMember->cmbCountry;
                $addResidentialAddressData->province = $requestMember->cmbProvince;
                $addResidentialAddressData->municipality = $requestMember->txtMunicipality;
                $addResidentialAddressData->streetname = $requestMember->txtStreetName;
                $addResidentialAddressData->zone = $requestMember->txtZone;
                $addResidentialAddressData->subcity = $requestMember->cmbSubcity;
                $addResidentialAddressData->woreda = $requestMember->txtWoreda;
                $addResidentialAddressData->kebele = $requestMember->txtKebele;
                $addResidentialAddressData->block = $requestMember->txtBlockMender;
                $addResidentialAddressData->houseNum = $requestMember->txtHouseNum;
                $addResidentialAddressData->locationNaming = $requestMember->txtLocationNaming;
                $addResidentialAddressData->primaryPhone = $requestMember->telePrimaryMobile;
                $addResidentialAddressData->alternatePhone = $requestMember->teleAlternateMobile;
                $addResidentialAddressData->homeTelephone = $requestMember->teleHomeTelephone;
                $addResidentialAddressData->officeTelephone = $requestMember->teleOfficeTelephone;
                $addResidentialAddressData->postCode = $requestMember->txtPostalCode;
                $addResidentialAddressData->email = $requestMember->txtEmail;
                $addResidentialAddressData->residentialAddressRemark = $requestMember->txaAddressRemarks;
                $addResidentialAddressData->idMember = $memberLastInsertedID;

                // Membership Data
                $addMembershipData->howBecameMember = $requestMember->rdoHowBecameMember;
                $addMembershipData->previousDenomination = $requestMember->txtPrevDenomination;
                $addMembershipData->believedDate = $requestMember->datBelievedDate;
                $addMembershipData->baptizedDate = $requestMember->datBaptizedDate;
                $addMembershipData->membershipDate = $requestMember->datMembershipDate;
                $addMembershipData->servingKind = $requestMember->txaServingKind;
                $addMembershipData->whoThoughtDoctrine = $requestMember->txtWhoThought;
                $addMembershipData->membershipRemark = $requestMember->txaMembershipRemarks;
                $addMembershipData->idMember = $memberLastInsertedID;

                // Save Member's Related Data on Database
                $addResidentialAddressData->save(); // Residential Address Data
                $addMembershipData->save(); // Membership Data

                return redirect()->route('members.index')
                    ->with('JoshKiyakoo_Success', '
                        <div class="row">
                            <div class="col-md-10">
                                *** Member\'s profile data for <span style="font-weight: bold; color: BLUE;"> '
                                .$addMemberData->appellation .' '.$addMemberData->firstName.' '.$addMemberData->middleName.' '.$addMemberData->lastName.
                                '</span> was <span style="font-weight: bolder; color: RED;">REGISTERED</span> Successfully.....
                            </div>
                            <div class="col-md-2">
                                <a class="text-right btn btn-outline-danger" href="members/show/'.$memberLastInsertedID.'">Show</a>
                            </div>
                        </div>
                    ');
            }
            catch (Exception $throwMember) {
                return redirect()->route('members.index')
                    ->with ('JoshKiyakoo_Error', '*** Member\'s profile data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
                    .$throwMember.getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMember ($idMember) {
        if (MembersDataModel::find($idMember)) {
            $member =
                DB::table ('sfgbc_Members')
                    ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                    ->leftJoin ('sfgbc_member_MembershipData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_MembershipData.idMember')
                ->select (
                    'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.birthDate', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.nationality', 'sfgbc_Members.status', 'sfgbc_Members.photograph', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix', 'sfgbc_Members.disabilityType', 'sfgbc_Members.memberRemark',

                    'sfgbc_member_ResidentialAddressData.idResidentialAddressData', 'sfgbc_member_ResidentialAddressData.country', 'sfgbc_member_ResidentialAddressData.province', 'sfgbc_member_ResidentialAddressData.municipality', 'sfgbc_member_ResidentialAddressData.subcity', 'sfgbc_member_ResidentialAddressData.streetname', 'sfgbc_member_ResidentialAddressData.zone', 'sfgbc_member_ResidentialAddressData.woreda', 'sfgbc_member_ResidentialAddressData.kebele', 'sfgbc_member_ResidentialAddressData.block', 'sfgbc_member_ResidentialAddressData.houseNum', 'sfgbc_member_ResidentialAddressData.locationNaming', 'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.alternatePhone', 'sfgbc_member_ResidentialAddressData.homeTelephone', 'sfgbc_member_ResidentialAddressData.officeTelephone', 'sfgbc_member_ResidentialAddressData.postCode', 'sfgbc_member_ResidentialAddressData.email', 'sfgbc_member_ResidentialAddressData.residentialAddressRemark',

                    'sfgbc_member_MembershipData.idMembershipData', 'sfgbc_member_MembershipData.howBecameMember', 'sfgbc_member_MembershipData.previousDenomination', 'sfgbc_member_MembershipData.believedDate', 'sfgbc_member_MembershipData.baptizedDate', 'sfgbc_member_MembershipData.membershipDate', 'sfgbc_member_MembershipData.servingKind', 'sfgbc_member_MembershipData.whoThoughtDoctrine', 'sfgbc_member_MembershipData.membershipRemark'
                    )
                ->where('sfgbc_Members.idMember', $idMember)
                ->first();
            return view ('members.show', compact ('member'));
        }
        else {
            return redirect()->route('members.index')
            ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s UMID '.$idMember.'...');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editMember ($idMember) {
        if (MembersDataModel::find($idMember)) {
            $member =
            DB::table('sfgbc_Members')
                ->where('idMember', $idMember)
                ->first();
            return view ('members.edit', compact ('member'));
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
    public function updateMember (Request $requestMember, $idMember) {
        // Local @Flag variable definition
        $myDataEntryFlag = -1;

        if (is_null ($requestMember->file('filePhotograph')) && is_Null ($requestMember->cmbAppillation) && is_Null ($requestMember->txtFirstName) && 
            is_Null ($requestMember->txtMiddleName) && is_Null ($requestMember->txtLastName) && is_Null ($requestMember->datMemberBirthDate) && 
            is_Null ($requestMember->cmbMemberGender) && is_Null ($requestMember->cmbCivilStatus) && is_Null ($requestMember->cmbNationality)) {
                $myDataEntryFlag = 0;
        }

        if ($myDataEntryFlag === 0) {
            return redirect()->back()->withInput()->with('JoshKiyakoo_Error', '***** All <span style="font-weight: bolder; color: RED;">REQUIRED</span> 
                fields must be <span style="font-weight: bolder; color: RED;">FILLED</span>.....');
        }
        else {
            try {
                if (MembersDataModel::find($idMember)) {
                    // Object Model Defination
                    $editMemberObj = MembersDataModel::find($idMember);
        
                    // Member Data
                    $editMemberObj->appellation = $requestMember->cmbAppellation;
                    $editMemberObj->firstName = $requestMember->txtFirstName;
                    $editMemberObj->middleName = $requestMember->txtMiddleName;
                    $editMemberObj->lastName = $requestMember->txtLastName;
                    $editMemberObj->birthDate = $requestMember->datMemberBirthDate;
                    $editMemberObj->gender = $requestMember->cmbMemberGender;
                    $editMemberObj->civilStatus = $requestMember->cmbCivilStatus;
                    $editMemberObj->disabilityType = $requestMember->txaDisability;
                    $editMemberObj->nationality = $requestMember->cmbNationality;
                    $editMemberObj->memberRemark = $requestMember->txaMemberRemark;
        
                    // Naming and Formating Member's Photo Location
                    $tempImage = $requestMember->file('filePhotograph');
                    $OldMemberProfileImage = $requestMember->oldMemberProfileImage;
                    if (is_file($OldMemberProfileImage)) {
                        unlink ($OldMemberProfileImage);
                    }
                    if ($tempImage) {
                        $tempImage_Name = 'mrmsProfileImage_'.$editMemberObj->firstName.'_'.$editMemberObj->middleName.'_'.$editMemberObj->lastName.'_'.$editMemberObj->gender.'_'.date ('Ymd_Hsi');
                        $tempImage_Extension = Str::lower($tempImage->getClientOriginalExtension());
                        $tempImage_FullName = $tempImage_Name.'.'.$tempImage_Extension;
                        $tempImage_UploadPath =  'storage/MRMS_MembersProfilePhoto/';
                        $tempImage_Location = $tempImage_UploadPath.$tempImage_FullName;
                        $tempImage->move($tempImage_UploadPath, $tempImage_FullName);
                        $editMemberObj->photograph = $tempImage_Location;
                    }
        
                    // Update Data on Database
                    $editMemberObj->update();
        
                    return redirect()->route('members.index')
                        ->with('JoshKiyakoo_Success', '
                            <div class="row">
                                <div class="col-md-10">
                                    *** Member\'s profile data for <span style="font-weight: bold; color: BLUE;"> '.
                                    $editMemberObj->appellation.' '.$editMemberObj->firstName.' '.$editMemberObj->middleName.' '.$editMemberObj->lastName.
                                    '</span> was <span style="font-weight: bolder; color: RED;">UPDATED</span> Successfully.....
                                </div>
                                <div class="col-md-2">
                                    <a class="text-right btn btn-outline-danger" href="members/show/'.$idMember.'">Show</a>
                                </div>
                            </div>
                        ');
                }
                else {
                    return redirect()->route('members.index')
                    ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s UMID '.$idMember.'...');
                }
            }
            catch (Exception $throwMember) {
                return redirect()->route('members.index')
                    ->with ('JoshKiyakoo_Error', '*** Member\'s profile data is <span style="font-weight: bolder; color: RED;">NOT REGISTERED</span>...<hr />'
                    .$throwMember.getMessage());
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAvatar () {
        $members =
            DB::table ('sfgbc_Members')
                ->select (
                    'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.photograph', 'sfgbc_Members.gender', 'sfgbc_Members.status', 'sfgbc_Members.prefix', 'sfgbc_Members.suffix','sfgbc_Members.status'
                    )
            ->simplePaginate(96);
        return view ('members.avatar', compact ('members'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showStaffMember () {
        $staffMembers =
            DB::table ('sfgbc_Members')
                ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                ->leftJoin ('sfgbc_member_ServiceSectorData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ServiceSectorData.idMember')
                ->leftJoin ('sfgbc_member_FellowshipData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_FellowshipData.idMember')
                ->select (
                    'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.photograph',
                    
                    'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.alternatePhone', 'sfgbc_member_ResidentialAddressData.email', 'sfgbc_member_ResidentialAddressData.municipality', 'sfgbc_member_ResidentialAddressData.locationNaming',
                    )
                ->where('sfgbc_member_ServiceSectorData.hasServiceSector', '=', 'Yes', 'OR' ,'sfgbc_member_FellowshipData.hasFellowship', '=', 'Yes')
                ->orderby('sfgbc_Members.idMember', 'ASC')
                // ->distinct()
            ->simplePaginate(12);
        return view ('members.staffmember', compact ('staffMembers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function iSearchMember (Request $requestMember) {
    //     if (MembersDataModel::find($idMember)) {
    //         //...
    //     }
    //     else {
    //         return redirect()->route('members.index')
    //             ->with('JoshKiyakoo_Error', '*** There is <span style="font-weight: bolder; color: RED;">NO</span> Member\'s profile data <span style="font-weight: bolder; color: RED;">REGISTERED</span> with the provided Member\'s UMID '.$idMember.'...');
    //     }
    // }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    // public function autocomplete (Request $request) {
    //     $data = MembersDataModel::select("firstName")
    //         ->where("firstName","LIKE","%{$request->input('query')}%")
    //         ->get();
    //     return response()->json($data);
    // }

    /**
     * Export content to PDF with View
     * Display a listing of the resource.
     *
     * @return void \Illuminate\Http\Response 
     */
    public function downloadPDF () {
        $members = MembersDataModel::all();
        $pdfData = PDF::loadView('members.index', compact('members'));
        return $pdfData->download ('All_SFGLC_Members_Export_on_'.date ('Ymd_Hsi').'.pdf');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function downloadEXCEL () {
        return Excel::download (new MembersDataExport, 'All_SFGLC_Members_Export_on_'.date ('Ymd_Hsi').'.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function downloadCSV () {
        return Excel::download(new MembersDataExport, 'All_SFGLC_Members_Export_on_'.date ('Ymd_Hsi').'.csv');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMember ($idMember) {
        try {
            if (MembersDataModel::find($idMember)) {
                // Soft Remove
                MembersDataModel::destroy($idMember);
                
                return redirect()->route ('members.show', $idMember)
                    ->with('JoshKiyakoo_Success', '
                        <div class="row">
                            <div class="col-md-10">
                                *** Member\'s <span style="font-weight: bold; color: BLUE;"> data </span> was <span style="font-weight: bolder; color: RED;">DELETED</span> Successfully.....
                            </div>
                        </div>
                    ');
            }
        } 
        catch (Exception $throwMemberData) {
            return redirect()->route('members.index')
                ->with ('JoshKiyakoo_Error', '*** Member\'s Data is <span style="font-weight: bolder; color: RED;">NOT DELETED</span>...<hr />'
                .$throwMemberData.getMessage());
        }
    }
}
