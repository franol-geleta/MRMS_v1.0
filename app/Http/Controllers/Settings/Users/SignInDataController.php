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
namespace App\Http\Controllers\Settings\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SignInDataController extends Controller {
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Church_Guest
    // @dminGuEs7
    public function validateUerAccount (Request $requestSignIn) {
        $signInCredentials = $requestSignIn->validate([
            'email' => ['required', 'string'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($signInCredentials)) {
            $requestSignIn->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }

        return back()->with ('JoshKiyakoo_Error', '*** <span style="font-weight: bolder; color: RED;">CAUTION !!!</span><hr />The provided credentials <span style="font-weight: bolder; color: RED;"> DO NOT MATCH </span> our records.<br />Please try again...<br />');
    }

}
