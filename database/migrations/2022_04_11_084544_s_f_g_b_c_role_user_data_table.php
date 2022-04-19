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

class SFGBCRoleUserDataTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sfgbc_User_RoleUser', function (Blueprint $table) {
            $table->id('idRoleUser');
            $table->bigInteger('idRole')->unsigned();
            $table->bigInteger('idUserAccount')->unsigned();
            
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        // Schema::table('sfgbc_RoleUser', function (Blueprint $table) {
        //     $table->foreignId ('idUserAccount', 20)->constrained('sfgbc_UserAccounts', 'idUserAccount');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sfgbc_User_RoleUser');
    }
}
