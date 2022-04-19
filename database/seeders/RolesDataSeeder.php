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
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoleDataModel;

class RolesDataSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        RoleDataModel::truncate();

        RoleDataModel::create (['roleName' => 'Super Administrator']);
        RoleDataModel::create (['roleName' => 'Administrator']);
        RoleDataModel::create (['roleName' => 'Manager']);
        RoleDataModel::create (['roleName' => 'Moderator']);
        RoleDataModel::create (['roleName' => 'Supervisor']);
        RoleDataModel::create (['roleName' => 'Coordinator']);

        RoleDataModel::create (['roleName' => 'Editor']);
        RoleDataModel::create (['roleName' => 'Guest']);
    }
}
