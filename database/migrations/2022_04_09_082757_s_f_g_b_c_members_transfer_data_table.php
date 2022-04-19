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

class SFGBCMembersTransferDataTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sfgbc_member_TransferedData', function (Blueprint $table) {
            $table->id ('idTransferedMemberData', 30)->unsigned();
            $table->string ('isTransfered', 5)->default('Yes');
            $table->string ('transferType', 70);
            $table->string ('transferDate', 25);
            $table->string ('churchTransfer', 200);
            $table->string ('transferLocation', 150);
            $table->string ('transferLetterNum', 100);
            $table->longText ('transferRemark')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::table('sfgbc_member_TransferedData', function (Blueprint $table) {
            $table->foreignId ('idMember', 30)->constrained('sfgbc_Members', 'idMember');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sfgbc_member_TransferedData');
    }
}
