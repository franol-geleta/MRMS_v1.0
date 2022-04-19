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
namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ChurchBrandNameDataModel extends Model {
    use HasFactory;
    use SoftDeletes;
    /**
     * The schema that defines table.
     *
     * @var String
     */
    protected $table = 'sfgbc_Setting_BrandName';
    /**
     * The schema that defines table.
     *
     * @var String
     */
    protected $primaryKey = 'idChurchBrand';
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
        'fgbLocalChurchName_amh',
        'fgbLocalChurchName_eng',
        'fgbParentChurchName_amh',
        'fgbParentChurchName_eng',
        'fgbMainLogo',
        'fgbFaveIcon',
        'fgbLocalChurchNameColor_amh',
        'fgbLocalChurchNameColor_eng',
        'fgbIsParentChurchName_Checked',
        'fgbParentChurchName',
        'fgbChurchSloganLabel_amh',
        'fgbChurchSloganLabel_eng',
        'fgbChurchSloganColor_amh',
        'fgbChurchSloganColor_eng'
    ];
}
