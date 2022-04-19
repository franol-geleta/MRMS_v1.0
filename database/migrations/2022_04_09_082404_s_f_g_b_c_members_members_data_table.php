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

class SFGBCMembersMembersDataTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sfgbc_Members', function (Blueprint $table) {
            $table->id ('idMember', 30)->unsigned();
            $table->string ('appellation', 25);
            $table->string ('firstName', 50);
            $table->string ('middleName', 50);
            $table->string ('lastName', 50);
            $table->string ('gender', 7);
            $table->string ('birthDate', 25);
            $table->string ('civilStatus', 20);
            $table->string ('nationality', 250)->default('Ethiopian');
            $table->string ('status', 10)->default('Active');
            $table->string ('photograph');
            $table->string ('prefix', 50)->default('ethFGBC/');
            $table->string ('suffix', 50)->default(date('/y'));
            $table->string ('disabilityType')->nullable();
            $table->longText ('memberRemark')->nullable();
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
        Schema::dropIfExists('sfgbc_Members');
    }
}
