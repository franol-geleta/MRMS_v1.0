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

class SFGBCMembersResidentialAddressDataTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sfgbc_member_ResidentialAddressData', function (Blueprint $table) {
            $table->id ('idResidentialAddressData', 30)->unsigned();
            $table->string ('country', 150)->default('Ethiopia');
            $table->string ('province', 100)->default('Addis Ababa');
            $table->string ('municipality', 100)->default('Addis Ababa');
            $table->string ('zone', 100)->nullable()->default('Addis Ababa');
            $table->string ('streetname', 100)->nullable();
            $table->string ('subcity', 70);
            $table->string ('woreda', 70);
            $table->string ('kebele', 70)->nullable();
            $table->string ('block', 25)->nullable();
            $table->string ('houseNum', 25)->nullable();
            $table->string ('locationNaming', 150);
            $table->string ('primaryPhone', 25);
            $table->string ('alternatePhone', 25)->nullable();
            $table->string ('homeTelephone', 25)->nullable();
            $table->string ('officeTelephone', 25)->nullable();
            $table->string ('postCode', 50)->nullable();
            $table->string ('email', 70)->nullable();
            $table->longText ('residentialAddressRemark')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('sfgbc_member_ResidentialAddressData', function (Blueprint $table) {
            $table->foreignId ('idMember', 30)->constrained('sfgbc_Members', 'idMember');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::dropIfExists('sfgbc_member_ResidentialAddressData');
    }
}
