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

class SFGBCMembersEducationLevelDataTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sfgbc_member_EducationLevelData', function (Blueprint $table) {
            $table->id ('idEducationLevelData', 30)->unsigned();
            $table->string ('hasEducationLevel', 5)->default('No');
            $table->string ('educationLevel', 70)->nullable();
            $table->string ('qualification', 100)->nullable();
            $table->string ('certification', 50)->nullable();
            $table->string ('institution')->nullable();
            $table->string ('startingDate', 25)->nullable();
            $table->string ('stillLearningHere', 5)->nullable();
            $table->string ('completingDate')->nullable();
            $table->longText ('educationLevelRemark')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('sfgbc_member_EducationLevelData', function (Blueprint $table) {
            $table->foreignId ('idMember', 30)->constrained('sfgbc_Members', 'idMember');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::dropIfExists('sfgbc_member_EducationLevelData');
    }
}
