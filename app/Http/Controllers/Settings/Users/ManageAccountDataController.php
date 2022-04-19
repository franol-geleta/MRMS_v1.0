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
use App\Models\User;

class ManageAccountDataController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct() {
    //     $this->middleware('auth');
    // }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editUserAccount (User $user) {
        // if (Gate::denies ('edit-users')) {
        //     return redirect (route ('admin.users.index'));
        // }
        // $roles = RoleDataMOdel::all();
        // return view ('admin.users.edit')->with ([
        //     'user' => $user,
        //     'roles' => $roles
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateUserAccount (Request $request, User $user) {
        // $user->roles()->sync($request->roles);

        // $user->name = $request->name;
        // $user->email = $request->email;

        // if ($user->save()) {
        //     $request->session()->flash('success', 'User Data '. $user->name .' is UPDATED SUCCESSFULLY !!!');
        // }
        // else {
        //     $request->session()->flash('danger', 'ERROR: User Data '. $user->name .' is NOT UPDATED !!!');
        // }

        // return redirect()->route('setting.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroyUserAccount (User $user) {
        // if (Gate::denies ('delete-users')) {
        //     return redirect (route ('setting.users.index'));
        // }

        // $user->roles()->detach();
        // $user->delete();
        // return redirect()->route('setting.users.index');
    }
}
