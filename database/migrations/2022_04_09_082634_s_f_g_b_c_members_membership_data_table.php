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

class SFGBCMembersMembershipDataTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sfgbc_member_MembershipData', function (Blueprint $table) {
            $table->id ('idMembershipData', 30)->unsigned();
            $table->string ('howBecameMember', 25);
            $table->string ('previousDenomination');
            $table->string ('believedDate', 25);
            $table->string ('baptizedDate', 25);
            $table->string ('membershipDate', 25);
            $table->text ('servingKind')->nullable();
            $table->string ('whoThoughtDoctrine', 150);
            $table->longText ('membershipRemark')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('sfgbc_member_MembershipData', function (Blueprint $table) {
            $table->foreignId ('idMember', 30)->constrained('sfgbc_Members', 'idMember');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::dropIfExists('sfgbc_member_MembershipData');
    }
}
