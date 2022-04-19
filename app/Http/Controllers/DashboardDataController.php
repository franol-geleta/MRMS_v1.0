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
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardDataController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showFellowshipStaffs () {
        $fellowshipStaffs =
            DB::table ('sfgbc_Members')
                ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                ->leftJoin ('sfgbc_member_FellowshipData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_FellowshipData.idMember')
                ->select (
                    'sfgbc_Members.idMember', 'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.photograph',
                    'sfgbc_member_ResidentialAddressData.primaryPhone',
                    'sfgbc_member_FellowshipData.idMember', 'sfgbc_member_FellowshipData.roleOnFellowship', 'sfgbc_member_FellowshipData.fellowshipType', 'sfgbc_member_FellowshipData.fellowshipName'
                )
                ->where('sfgbc_member_FellowshipData.hasFellowship', '=', 'Yes', 'AND', 'sfgbc_member_FellowshipData.roleOnFellowship','!=', 'Member')
                ->orderby('sfgbc_Members.firstName', 'ASC')->get();
        return view ('dashboard', compact ('fellowshipStaffs'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showServiceSectorStaffs () {
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
}
