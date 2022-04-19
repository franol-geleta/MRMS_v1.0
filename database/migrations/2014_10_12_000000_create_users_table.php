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

class CreateUsersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // Schema::create('sfgbc_User_UserAccounts', function (Blueprint $table) {
        //     $table->id('idUserAccount', 20)->unsigned();;
        //     $table->string('isMember', 5)->default('No');
        //     $table->string('userFirstName', 50)->nullable();
        //     $table->string('userMiddleName', 50)->nullable();
        //     $table->string('userLastName', 50)->nullable();
        //     $table->string('userGender', 7)->nullable();
        //     $table->string('userAvatar')->nullable();
        //     $table->string('userUsername', 100)->unique();
        //     $table->string('userPassword');
        //     $table->string('userEmail', 100)->unique();
        //     $table->string('accessRole', 70);
        //     $table->string('accountStatus', 70);
        //     $table->string('isBlocked', 5)->nullable()->default('No');
        //     $table->string('isSuspended', 5)->nullable()->default('No');
        //     $table->string('suspendedSince', 25)->nullable();
        //     $table->string('suspendedUntil', 25)->nullable();
        //     $table->longText('userAccountRemark')->nullable();
        //     $table->timestamp('emailVerified_at')->nullable();

        //     $table->rememberToken();
        //     $table->timestamps();
        //     $table->softDeletes();
        // });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
            $table->string('status');
            $table->timestamp('email_verified_at')->nullable(); 
        
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }
}
