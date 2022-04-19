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

class SFGBCMembersFamilyMemberDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sfgbc_member_FamilyMemberData', function (Blueprint $table) {
            $table->id ('idFamilyMember', 30)->unsigned();
            $table->string ('hasFamilyMember', 5)->default('No');
            $table->string ('famAppillation', 25)->nullable();
            $table->string ('famFirstName', 150)->nullable();
            $table->string ('famMiddleName', 150)->nullable();
            $table->string ('famLastName', 150)->nullable();
            $table->string ('famGender', 7)->nullable();
            $table->string ('relationship', 70)->nullable();
            $table->string ('famBirthDate', 25)->nullable();
            $table->string ('worshipingDenomination')->nullable();
            $table->string ('familyStatus', 25)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('sfgbc_member_FamilyMemberData', function (Blueprint $table) {
            $table->foreignId ('idMember', 30)->constrained('sfgbc_Members', 'idMember');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::dropIfExists('sfgbc_member_FamilyMemberData');
    }
}
