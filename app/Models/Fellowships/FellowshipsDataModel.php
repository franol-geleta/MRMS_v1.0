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
namespace App\Models\Fellowships;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FellowshipsDataModel extends Model {
    use HasFactory;
    use SoftDeletes;

    /**
     * The schema that defines table.
     *
     * @var String
     */
    protected $table = 'sfgbc_Fellowships';
    /**
     * The schema that defines table.
     *
     * @var String
     */
    protected $primaryKey = 'idFellowship';
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
        'fellowshipType',
        'dayHeldOn',
        'startTime',
        'endTime',
        'fellowshipZone',
        'locationOwner',
        'locationNaming',
        'estabilishedDate'
    ];

    //
    public static function spreadsheetExportContent () {
        $exportContentFellowships =
            DB::table ('sfgbc_Fellowships')
                ->select (DB::raw("CONCAT('0000000',sfgbc_Fellowships.idFellowship) AS Fellowship_ID"), 'sfgbc_Fellowships.fellowshipType', 'sfgbc_Fellowships.fellowshipLabel', 'sfgbc_Fellowships.dayHeldOn', 'sfgbc_Fellowships.startTime', 'sfgbc_Fellowships.endTime', 'sfgbc_Fellowships.fellowshipZone', 'sfgbc_Fellowships.locationOwner', 'sfgbc_Fellowships.locationNaming', 'sfgbc_Fellowships.estabilishedDate', 'sfgbc_Fellowships.isRestructured', 'sfgbc_Fellowships.restructureType', 'sfgbc_Fellowships.restructuredDate', 'sfgbc_Fellowships.restructuredToFellowship', 'sfgbc_Fellowships.restructureReason', 'sfgbc_Fellowships.fellowshipStatus'
                )
                ->orderby('sfgbc_Fellowships.idFellowship', 'ASC')
            ->get()->toArray();
        return $exportContentFellowships;
    }

    //
    public function ActivityDataModel () {
        $this->hasMany('App\Members\ActivityDataModel');
    }
    //
    public function AttendanceDataModel () {
        $this->hasMany('App\Members\AttendanceDataModel');
    }
}
