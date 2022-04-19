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

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Members\MembersDataModel;

class MembersDataExport implements FromCollection, WithHeadings {
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection() {
        // return MembersDataModel::all();
        return collect(MembersDataModel::spreadsheetExportContent ());
    }

    // Exported File Header Defination
    public function headings ():array {
        return [
            'Member\'s ID', 'Appellation', 'First Name', 'Middle Name', 'Last Name',
            'Gender', 'Civil Status','Birth Date', 'Status', 'Primary Phone', 'Alternate Phone',
            'How Became Member', 'Believed Date', 'Baptized Date', 'Membership Date',
            'Location Naming', 'Subcity', 'Woreda', 'Municipality', 'Province', 'Country', 'Email', 'Nationality'
        ];
    }
}
