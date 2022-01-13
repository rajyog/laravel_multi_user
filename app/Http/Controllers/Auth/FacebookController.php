<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FacebookController extends Controller {

    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback() {

        $user = Socialite::driver('facebook')->stateless()->user();
//        dd($user);
        $finduser = User::where('email', $user->email)
//                ->where('login_type','3')
//                ->where('facebook_id',$user->id)
                ->first();
        //dd($finduser);
        if ($finduser) {
                 User::where("email", $user->email)->update(["facebook_id" => $user->id]);
                 Auth::login($finduser);
                return redirect('add-user');
            
        } else {
            $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'facebook_id' => $user->id,
                        'filepath' => '',
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

//            if($finduser){
//         
//                Auth::login($finduser);
//        
//                return redirect()->intended('dashboard');
//         
//            }else{
//                $newUser = User::create([
//                    'name' => $user->name,
//                    'email' => $user->email,
//                    'facebook_id'=> $user->id,
//                    'password' => encrypt('123456dummy')
//                ]);
//        
//                Auth::login($newUser);
//        
//                return redirect()->intended('dashboard');
//            }
    }

}
