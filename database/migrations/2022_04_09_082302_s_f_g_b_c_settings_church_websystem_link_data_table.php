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

class SFGBCSettingsChurchWebsystemLinkDataTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('sfgbc_setting_WebSystemLink', function (Blueprint $table) {
            $table->id ('idWebsystemLink', 1);
            $table->string ('fgbMainDomainURL1');
            $table->string ('fgbMainDomainURL2')->nullable();
            $table->string ('fgbMainDomainURL3')->nullable();
            $table->string ('fgbSubDomainURL1');
            $table->string ('fgbSubDomainURL2')->nullable();
            $table->string ('fgbSubDomainURL3')->nullable();
            $table->string ('fgbSubDomainName1_amh')->nullable();
            $table->string ('fgbSubDomainName1_eng')->nullable();
            $table->string ('fgbSubDomainName2_amh')->nullable();
            $table->string ('fgbSubDomainName2_eng')->nullable();
            $table->string ('fgbSubDomainName3_amh')->nullable();
            $table->string ('fgbSubDomainName3_eng')->nullable();

            $table->string ('fgbFacebookURL')->nullable();
            $table->string ('fgbTelegramURL')->nullable();
            $table->string ('fgbYoutubeURL')->nullable();
            $table->string ('fgbTwitterURL')->nullable();
            $table->string ('fgbLinkedinURL')->nullable();
            $table->string ('fgbInstagramURL')->nullable();
            $table->string ('fgbWhatsappURL')->nullable();
            $table->string ('fgbSkypeURL')->nullable();
            
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
        Schema::dropIfExists('sfgbc_setting_WebSystemLink');
    }
}
