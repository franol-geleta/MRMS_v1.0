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
namespace App\Models\Members;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MembersDataModel extends Model {
    use HasFactory;
    use SoftDeletes;
    /**
     * The schema that defines table.
     *
     * @var String
     */
    protected $table = 'sfgbc_Members';
    /**
     * The schema that defines table.
     *
     * @var String
     */
    protected $primaryKey = 'idMember';
    /**
     * Indicates if the model should be timestamped.
     * @var bool
     */
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'appellation',
        'firstName',
        'middleName',
        'lastName',
        'gender',
        'birthDate',
        'civilStatus',
        'status',
        'nationality',
        'photograph'
    ];

    //
    public static function spreadsheetExportContent () {
        $exportContentMembers =
            DB::table ('sfgbc_Members')
                ->leftJoin ('sfgbc_member_ResidentialAddressData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_ResidentialAddressData.idMember')
                ->leftJoin ('sfgbc_member_MembershipData', 'sfgbc_Members.idMember', '=', 'sfgbc_member_MembershipData.idMember')
                ->select (DB::raw("CONCAT(sfgbc_Members.prefix, '0000000',sfgbc_Members.idMember, sfgbc_Members.suffix) AS Member_ID"), 
                    'sfgbc_Members.appellation', 'sfgbc_Members.firstName', 'sfgbc_Members.middleName', 'sfgbc_Members.lastName', 'sfgbc_Members.gender', 'sfgbc_Members.civilStatus', 'sfgbc_Members.birthDate', 'sfgbc_Members.status', 'sfgbc_member_ResidentialAddressData.primaryPhone', 'sfgbc_member_ResidentialAddressData.alternatePhone',

                    'sfgbc_member_MembershipData.howBecameMember', 'sfgbc_member_MembershipData.believedDate', 'sfgbc_member_MembershipData.baptizedDate', 'sfgbc_member_MembershipData.membershipDate',
                    
                    'sfgbc_member_ResidentialAddressData.locationNaming', 'sfgbc_member_ResidentialAddressData.subcity', 'sfgbc_member_ResidentialAddressData.woreda', 'sfgbc_member_ResidentialAddressData.municipality', 'sfgbc_member_ResidentialAddressData.province', 'sfgbc_member_ResidentialAddressData.country', 'sfgbc_member_ResidentialAddressData.email', 'sfgbc_Members.nationality',
                )
                ->orderby('sfgbc_Members.idMember', 'ASC')
            ->get()->toArray();
        return $exportContentMembers;
    }

    //
    public function ResidentialAddressDataModel () {
        $this->hasMany('App\Members\ResidentialAddressDataModel'); 
    }
    //
    public function MembershipDataModel () {
        $this->hasMany('App\Members\MembershipDataModel');
    }
    //
    public function FellowshipDataModel () {
        $this->hasMany('App\Members\FellowshipDataModel');
    }
    //
    public function ServiceSectorDataModel () {
        $this->hasMany('App\Members\ServiceSectorDataModel');
    }
    //
    public function FamilyMemberDataModel () {
        $this->hasMany('App\Members\FamilyMemberDataModel');
    }
    //
    public function WorkExperienceDataModel () {
        $this->hasMany('App\Members\WorkExperienceDataModel');
    }
    //
    public function EducationLevelDataModel () {
        $this->hasMany('App\Members\EducationLevelDataModel');
    }
    //
    public function TransferedDataModel () {
        $this->hasMany('App\Members\TransferedDataModel');
    }
    //
    public function DeceasedDataModel () {
        $this->hasMany('App\Members\DeceasedDataModel');
    }
}
