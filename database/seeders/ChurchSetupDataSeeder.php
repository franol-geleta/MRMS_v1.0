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

class ChurchSetupDataSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Church Brand Name
        DB::table('sfgbc_Setting_BrandName')
            ->insert(array(
                array(
                    "idChurchBrand"=> 1,
                    "fgbLocalChurchName_amh"=>'ሰሜን ሙሉ ወንጌል አጥቢያ ቤተክርስቲያን',
                    "fgbLocalChurchName_eng"=>'Semien Full Gospel Local Church',
                    "fgbParentChurchName_amh"=>'የኢትዮጵያ ሙሉ ወንጌል አማኞች ቤተክርስቲያን',
                    "fgbParentChurchName_eng"=>'Ethiopian Full Gospel Believers\' Church',
                    "fgbMainLogo"=>'storage/MRMS_ChurchBrandPhoto/mrmsChurchBrandImage_MainLogo.jpg',
                    "fgbFavIcon"=>'storage/MRMS_ChurchBrandPhoto/mrmsChurchBrandImage_FavIcon.jpg',
                    "fgbLocalChurchNameColor_amh"=>'#066fc2',
                    "fgbLocalChurchNameColor_eng"=>'#c92f2f',
                    "fgbIsParentChurchName_Checked"=>'No',
                    "fgbChurchSloganLabel_amh"=>'ኢየሱስ ክርስቶስ ትናንትና ዛሬ እስከ ለዘላለምም ያው ነው። ወደ ዕብራውያን 13:8',
                    "fgbChurchSloganLabel_eng"=>'Jesus Christ the same Yesterday, and Today, and Forever. Hebrews 13:8',
                    "fgbChurchSloganColor_amh"=>'#066fc2',
                    "fgbChurchSloganColor_eng"=>'#c92f2f',

                    "remember_token"=>NULL,
                    "created_at"=>'2022-01-01 00:00:00',
                    "updated_at"=>NULL,
                    "deleted_at"=>NULL
                )
            )
        );
        // Church Contact Information
        DB::table('sfgbc_setting_ContactInformation')
            ->insert(array(
                array(
                    "idContactInfo"=> 1,
                    "fgbLandLinePhone1"=>'+251 111 564 545',
                    "fgbLandLinePhone2"=>'+251 111 112 211',
                    "fgbLandLinePhone3"=>NULL,
                    "fgbMobilePhone1"=>'+251 905 050 474',
                    "fgbMobilePhone2"=>NULL,
                    "fgbMobilePhone3"=>NULL,
                    "fgbFaxMail1"=>NULL,
                    "fgbFaxMail2"=>NULL,
                    "fgbPostalCode"=>NULL,
                    "fgbPublicEmail"=>'info@semienfgbc.org', 
                    "fgbOfficeEmail"=>'office@semienfgbc.org',
                    "fgbCountry"=>'Ethiopia',
                    "fgbProvince"=>'Addis Ababa',
                    "fgbMunicipality"=>'Addis Ababa',
                    "fgbStreetName"=>'Belay Zeleke St.',
                    "fgbWoreda"=>'04',
                    "fgbZone"=>NULL,
                    "fgbSubcity"=>'Arada',
                    "fgbKebele"=>NULL,
                    "fgbBlockNum"=>NULL,
                    "fgbHouseNum"=>NULL,
                    "fgbLocationNaming"=>'Semien Hotel',

                    "remember_token"=>NULL,
                    "created_at"=>'2022-01-01 00:00:00',
                    "updated_at"=>NULL,
                    "deleted_at"=>NULL
                )
            )
        );
        // Church Websystem Links
        DB::table('sfgbc_setting_WebSystemLink')
            ->insert(array(
                array(
                    "idWebsystemLink"=> 1,
                    "fgbMainDomainURL1"=>'https://semienfgbc.org',
                    "fgbMainDomainURL2"=>NULL,
                    "fgbMainDomainURL3"=>NULL,
                    "fgbSubDomainURL1"=>'https://mrms.semienfgbc.org',
                    "fgbSubDomainURL2"=>NULL,
                    "fgbSubDomainURL3"=>NULL,
                    "fgbSubDomainName1_amh"=>'የአባላት ምዝገባ እና መቆጣጠሪያ ሥርዓት',
                    "fgbSubDomainName1_eng"=>'Members\' Registration & Management System',
                    "fgbSubDomainName2_amh"=>NULL,
                    "fgbSubDomainName2_eng"=>NULL,
                    "fgbSubDomainName3_amh"=>NULL,
                    "fgbSubDomainName3_eng"=>NULL,

                    "fgbFacebookURL"=>'https://semienfgbc.org',
                    "fgbTelegramURL"=>'https://t.me/Semien_FGBC',
                    "fgbYoutubeURL"=>'https://www.youtube.com/channel/UCYdXbL1TNdPMD5i_E6WJcZQ',
                    "fgbTwitterURL"=>'https://twitter.com/SemienFGBC',
                    "fgbLinkedinURL"=>NULL,
                    "fgbWhatsappURL"=>NULL,
                    "fgbSkypeURL"=>NULL,

                    "remember_token"=>NULL,
                    "created_at"=>'2022-01-01 00:00:00',
                    "updated_at"=>NULL,
                    "deleted_at"=>NULL
                )
            )
        );
    }
}
