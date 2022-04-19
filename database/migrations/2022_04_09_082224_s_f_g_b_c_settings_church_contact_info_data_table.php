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
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SFGBCSettingsChurchContactInfoDataTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sfgbc_setting_ContactInformation', function (Blueprint $table) {
            $table->id ('idContactInfo', 1);
            $table->string ('fgbLandLinePhone1');
            $table->string ('fgbLandLinePhone2')->nullable();
            $table->string ('fgbLandLinePhone3')->nullable();
            $table->string ('fgbMobilePhone1')->nullable();
            $table->string ('fgbMobilePhone2')->nullable();
            $table->string ('fgbMobilePhone3')->nullable();
            $table->string ('fgbFaxMail1')->nullable();
            $table->string ('fgbFaxMail2')->nullable();
            $table->string ('fgbPostalCode')->nullable();
            $table->string ('fgbPublicEmail')->nullable();
            $table->string ('fgbOfficeEmail')->nullable();
            $table->string ('fgbCountry');
            $table->string ('fgbProvince');
            $table->string ('fgbMunicipality');
            $table->string ('fgbStreetName')->nullable();
            $table->string ('fgbWoreda');
            $table->string ('fgbZone')->nullable();
            $table->string ('fgbSubcity');
            $table->string ('fgbKebele')->nullable();
            $table->string ('fgbBlockNum')->nullable();
            $table->string ('fgbHouseNum')->nullable();
            $table->string ('fgbLocationNaming');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sfgbc_setting_ContactInformation');
    }
}
