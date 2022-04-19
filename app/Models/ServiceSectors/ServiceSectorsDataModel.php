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
namespace App\Models\ServiceSectors;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ServiceSectorsDataModel extends Model {
    use HasFactory;
    use SoftDeletes;

    /**
     * The schema that defines table.
     *
     * @var String
     */
    protected $table = 'sfgbc_ServiceSectors';
    /**
     * The schema that defines table.
     *
     * @var String
     */
    protected $primaryKey = 'idServiceSector';
    /**
     * Indicates if the model should be timestamped.
     * @var bool
     */
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idServiceSector',
        'serviceSectorType',
        'estabilishedDate'
    ];

    // 
    public static function spreadsheetExportContent () {
        $exportContentServiceSectors =
            DB::table ('sfgbc_ServiceSectors')
                ->select (DB::raw("CONCAT('0000000', sfgbc_ServiceSectors.idServiceSector) AS ServiceSector_ID"), 'sfgbc_ServiceSectors.serviceSectorType', 'sfgbc_ServiceSectors.estabilishedDate', 'sfgbc_ServiceSectors.isRestructured', 'sfgbc_ServiceSectors.restructureType', 'sfgbc_ServiceSectors.restructureDate', 'sfgbc_ServiceSectors.restructuredToServiceSector', 'sfgbc_ServiceSectors.restructureReason', 'sfgbc_ServiceSectors.sectorStatus'
                )
                ->orderby('sfgbc_ServiceSectors.idServiceSector', 'ASC')
            ->get()->toArray();
        return $exportContentServiceSectors;
    }
}
