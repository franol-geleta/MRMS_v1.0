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
use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use App\Models\User;

class SignUpDataController extends Controller {
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function createUserAccount () {
        return view('setting.users.signup');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeUserAccount (Request $requestUserAccount) {
        $requestUserAccount->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        $newUserAccount = User::create([
            'name' => $requestUserAccount->x,
            'password' => Hash::make($requestUserAccount->x),
            'email' => $requestUserAccount->x,
            'role' => $requestUserAccount->x,
            'status' => 'Active',
            'email_verified_at' => NULL
        ]);

        event(new Registered($newUserAccount));

        Auth::login($newUserAccount);

        return redirect(RouteServiceProvider::HOME);
    }
}
