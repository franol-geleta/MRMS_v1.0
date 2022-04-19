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
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersDataSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        DB::table('sfgbc_Members')
            ->insert(array(
                array("idMember"=> 1, "appellation"=>'Weyzerit', "firstName"=>'Saron', "middleName"=>'Kefelegn', "lastName"=>'Ashagre', "gender"=>'Female', "birthDate"=>'1954-05-13', "civilStatus"=>'Legally Separated', "nationality"=>'Ethiopian', "status"=>'Inactive', "photograph"=>'storage/MRMS_MembersProfilePhoto/mrmsProfileImage_FName_MName_LName_Gender_YYYYMMDD_HHMMSS.jpg', "prefix"=>'SFGLC/', "suffix"=>'/21', "disabilityType"=>NULL, "memberRemark"=>NULL, "remember_token"=>NULL, "created_at"=>'2021-01-05 13:33:32', "updated_at"=>NULL, "deleted_at"=>NULL),
            )
        );
    }
}
