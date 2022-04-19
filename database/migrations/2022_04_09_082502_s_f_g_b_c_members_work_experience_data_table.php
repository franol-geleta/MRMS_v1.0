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

class SFGBCMembersWorkExperienceDataTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sfgbc_member_WorkExperienceData', function (Blueprint $table) {
            $table->id ('idWorkExperienceData', 30)->unsigned();
            $table->string ('hasWorkExperience', 5)->default('No');
            $table->string ('organizationType', 30)->nullable();
            $table->string ('organizationName')->nullable();
            $table->string ('workLocation', 150)->nullable();
            $table->string ('jobPosition', 120)->nullable();
            $table->string ('startingDate', 25)->nullable();
            $table->string ('stillWorkingHere', 5)->nullable();
            $table->string ('resignedDate', 25)->nullable();
            $table->string ('livelihoodIncome')->nullable();
            $table->longText ('workExperienceRemark')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('sfgbc_member_WorkExperienceData', function (Blueprint $table) {
            $table->foreignId ('idMember', 30)->constrained('sfgbc_Members', 'idMember');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::dropIfExists('sfgbc_member_WorkExperienceData');
    }
}
