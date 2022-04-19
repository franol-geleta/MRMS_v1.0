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
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
