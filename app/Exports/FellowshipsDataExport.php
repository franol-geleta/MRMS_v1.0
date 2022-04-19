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

use App\Models\Fellowships\FellowshipsDataModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FellowshipsDataExport implements FromCollection, WithHeadings {
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection() {
        // return FellowshipsDataModel::all();
        return collect(FellowshipsDataModel::spreadsheetExportContent ());
    }

    // Exported File Header Defination
    public function headings ():array {
        return [
            'Fellowship ID', 'Fellowship Type', 'Fellowship Label', 'Day Held On', 'Start Time', 'End Time', 'Fellowship Zone', 'Location Owner', 'Location Naming', 'Estabilished Date', 'Is Restructured', 'Restructure Type', 'Restructured Date', 'Restructured To Fellowship', 'Reason for Restructure', 'Fellowship Status'
        ];
    }
}
