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

class SFGBCSectorsServiceSectorsDataTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sfgbc_ServiceSectors', function (Blueprint $table) {
            $table->id ('idServiceSector', 30)->unsigned();
            $table->string ('serviceSectorType', 100);
            $table->string ('estabilishedDate');
            $table->longText ('description');
            $table->string ('isRestructured', 5)->default('No');
            $table->string ('restructureType', 25)->default('New');
            $table->string ('restructureDate', 25)->default(date('y-m-d'));
            $table->string ('restructuredToServiceSector', 150)->default('Not Available');
            $table->text ('restructureReason');
            $table->string ('sectorStatus', 10)->default('Inactive');
            $table->longText ('serviceSectorRemark')->nullable();
            
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
        Schema::dropIfExists('sfgbc_ServiceSectors');
    }
}
