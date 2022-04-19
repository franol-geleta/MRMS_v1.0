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

class SFGBCSettingsChurchBrandNameDataTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sfgbc_Setting_BrandName', function (Blueprint $table) {
            $table->id ('idChurchBrand', 1);
            $table->string ('fgbLocalChurchName_amh');
            $table->string ('fgbLocalChurchName_eng');
            $table->string ('fgbParentChurchName_amh');
            $table->string ('fgbParentChurchName_eng');
            $table->string ('fgbMainLogo');
            $table->string ('fgbFavIcon');
            $table->string ('fgbLocalChurchNameColor_amh')->nullable();
            $table->string ('fgbLocalChurchNameColor_eng')->nullable();
            $table->string ('fgbIsParentChurchName_Checked')->nullable();
            $table->string ('fgbChurchSloganLabel_amh')->nullable();
            $table->string ('fgbChurchSloganLabel_eng')->nullable();
            $table->string ('fgbChurchSloganColor_amh')->nullable();
            $table->string ('fgbChurchSloganColor_eng')->nullable();
            
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
        Schema::dropIfExists('sfgbc_Setting_BrandName');
    }
}
