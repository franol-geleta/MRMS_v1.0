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

class SFGBCSettingsLookupDataTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('sfgbc_Setting_LookupData', function (Blueprint $table) {
            $table->id ('idLookupData')->unsigned();
            $table->string ('list_LookupDataType');
            $table->string ('list_LookupDataName');
            $table->string ('list_LookupDataDescription')->nullable()->default('Not Available - N/A');
            $table->integer ('list_LookupDataParent');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('sfgbc_Setting_CountryList', function (Blueprint $table) {
            $table->id ('idCountryList', 5)->unsigned();
            $table->string('list_CountryName')->unique();
            $table->string('list_CountryNationality');

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
        //
        Schema::dropIfExists('sfgbc_Setting_LookupData');
        Schema::dropIfExists('sfgbc_Setting_CountryList');
    }
}
