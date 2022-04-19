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
namespace App\Exports;

use App\Models\ServiceSectors\ServiceSectorsDataModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ServiceSectorsDataExport implements FromCollection, WithHeadings {
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection() {
        // return ServiceSectorsDataModel::all();
        return collect(ServiceSectorsDataModel::spreadsheetExportContent ());
    }

    // Exported File Header Defination
    public function headings ():array {
        return [
            "Service Sector ID", "Service Sector Type", "Estabilished Date", "Is Restructured", "Restructure Type", "Restructure Date", "Restructured To Service Sector", "Reason for Restructure", "Service Sector Status"
        ];
    }
}
