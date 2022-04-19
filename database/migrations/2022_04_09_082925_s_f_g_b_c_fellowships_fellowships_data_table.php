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

class SFGBCFellowshipsFellowshipsDataTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sfgbc_Fellowships', function (Blueprint $table) {
            $table->id ('idFellowship', 30)->unsigned();
            $table->string ('fellowshipType', 50);
            $table->string ('fellowshipLabel', 50);
            $table->string ('dayHeldOn', 15);
            $table->time ('startTime');
            $table->time ('endTime');
            $table->string ('fellowshipZone', 50);
            $table->string ('locationOwner', 150);
            $table->string ('locationNaming', 250);
            $table->string ('estabilishedDate', 25);
            $table->string ('isRestructured', 5)->default('No');
            $table->string ('restructureType', 20)->default('New');
            $table->string ('restructuredDate', 25)->default(date('y-m-d'));
            $table->string ('restructuredToFellowship', 150)->default('Not Available');
            $table->text ('restructureReason');
            $table->string ('fellowshipStatus', 10)->default('Inactive');
            $table->longText ('fellowshipRemark')->nullable();
            
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
        Schema::dropIfExists('sfgbc_Fellowships');
    }
}
