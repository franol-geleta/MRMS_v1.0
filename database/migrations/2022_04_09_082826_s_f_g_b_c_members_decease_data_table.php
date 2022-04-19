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

class SFGBCMembersDeceaseDataTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sfgbc_member_DeceasedData', function (Blueprint $table) {
            $table->id ('idDeceasedMemberData', 30)->unsigned();
            $table->string ('isDeceased', 5)->default('Yes');
            $table->string ('deceaseDate', 25);
            $table->text ('deceaseReason');
            $table->string ('whoNotified', 150);
            $table->string ('deceaseRelationship', 70);
            $table->string ('funeralPlace', 150);
            $table->string ('funeralDate', 25);
            $table->time ('funeralTime');
            $table->string ('funeralCoordinator', 50);
            $table->longText ('deceaseRemark')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('sfgbc_member_DeceasedData', function (Blueprint $table) {
            $table->foreignId ('idMember', 30)->constrained('sfgbc_Members', 'idMember');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sfgbc_member_DeceasedData');
    }
}
