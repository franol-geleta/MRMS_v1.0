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
namespace App\Models\Members;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class FellowshipDataModel extends Model {
    use HasFactory;
    use SoftDeletes;
    /**
     * The schema that defines table.
     *
     * @var String
     */
    protected $table = 'sfgbc_member_FellowshipData';
    /**
     * The schema that defines table.
     *
     * @var String
     */
    protected $primaryKey = 'idFellowshipData';
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
        'idMember',
        'hasFellowship'
    ];
    
    //
    public function MembersDataModel () {
        $this->belongsTo('App\Models\Members\MembersDataModel');
    }
}
