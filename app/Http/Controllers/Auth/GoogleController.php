<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller {

    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback() {

        //$user = Socialite::driver('google')->user();
        $user = Socialite::driver('google')->stateless()->user();
        // dd($user);
//            $finduser = User::where('google_id', $user->id)->first();
        $finduser = User::where('email', $user->email)
//                ->where('login_type','2' )
//                ->where('google_id', $user->id)
                ->first();
        if ($finduser) {
            User::where("email", $user->email)->update(["google_id" => $user->id]);
            Auth::login($finduser);
            return redirect('add-user');
        } else {
            $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id' => $user->id,
                        'filepath' => $user->user['picture'],
                        'role_id' => '1',
                        'gender' => '0',
                        'country' => '0',
                        'state' => '0',
                        'city' => '0',
                        'addedby' => '1',
                        'login_type' => '0',
                        'password' => encrypt('123456dummy')
            ]);

            Auth::login($newUser);

            return redirect('add-user');
        }
    }

}
