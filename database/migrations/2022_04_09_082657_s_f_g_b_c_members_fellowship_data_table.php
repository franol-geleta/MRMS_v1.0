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

class SFGBCMembersFellowshipDataTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sfgbc_member_FellowshipData', function (Blueprint $table) {
            $table->id ('idFellowshipData', 30)->unsigned();
            $table->string ('hasFellowship', 5)->default('No');
            $table->string ('fellowshipType', 70)->nullable();
            $table->string ('fellowshipName', 200)->nullable();
            $table->string ('roleOnFellowship', 70)->nullable();
            $table->string ('joinedDate', 25)->nullable();
            $table->string ('hallName')->nullable()->default('Not Available');;
            $table->string ('stillParticipatingHere', 5)->nullable();
            $table->string ('leftFellowshipDate', 25)->nullable();
            $table->text ('leftFellowshipReason')->nullable();
            $table->longText ('memberFellowshipRemark')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::table('sfgbc_member_FellowshipData', function (Blueprint $table) {
            $table->foreignId ('idMember', 30)->constrained('sfgbc_Members', 'idMember');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::dropIfExists('sfgbc_member_FellowshipData');
    }
}
