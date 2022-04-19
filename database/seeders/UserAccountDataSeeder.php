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
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserAccountDataSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Nothing to triger...
        User::truncate();
                
        $superadmin = User::create([
            'id' => 1,
            'name' => 'Super_Admin',
            'password' => Hash::make('sfgbc#super@dmin'),
            'email' => 'webmaster@semienfgbc.org',
            'role' => 'Super Admin',
            'status' => 'Active'
        ]);

        $editor = User::create([
            'id' => 2,
            'name' => 'Church_Editor',
            'password' => Hash::make('sfgbc#editor'),
            'email' => 'editor@semienfgbc.org',
            'role' => 'Editor',
            'status' => 'Active'
        ]);

        $guest = User::create([
            'id' => 3,
            'name' => 'Church_Guest',
            'password' => Hash::make('sfgbc#guest'),
            'email' => 'guest@semienfgbc.org',
            'role' => 'Guest',
            'status' => 'Active'
        ]);
    }
}
