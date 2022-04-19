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

class SFGBCMembersServiceSectorDataTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sfgbc_member_ServiceSectorData', function (Blueprint $table) {
            $table->id ('idServiceSectorData', 30)->unsigned();
            $table->string ('hasServiceSector', 5)->default('No');
            $table->string ('serviceSectorName', 150)->nullable();
            $table->string ('roleOnSector', 70)->nullable();
            $table->string ('joinedDate', 25)->nullable();
            $table->string ('stillServingHere', 5)->nullable();
            $table->string ('leftServingDate', 25)->nullable();
            $table->string ('leftServingReason')->nullable();
            $table->string ('burdenDetail')->nullable();
            $table->longText ('memberServiceSectorRemark')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('sfgbc_member_ServiceSectorData', function (Blueprint $table) {
            $table->foreignId ('idMember', 30)->constrained('sfgbc_Members', 'idMember');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::dropIfExists('sfgbc_member_ServiceSectorData');
    }
}
