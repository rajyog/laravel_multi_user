<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\CheckLoginType;

//use Storage;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        // dd($data);
        return Validator::make($data, [
                    'name' => ['required', 'string', 'max:255'],
                     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//                    'email' => [
//                        'required',
//                        'string', 'email', 'max:255',
//                        new CheckLoginType()
//                    ],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'files' => ['required', 'max:1024', 'mimes:jpg'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data) {
        $file = $data['files'];
        $file_name = time() . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $file_name, 'public');
        return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'filepath' => $filePath,
                    'role_id' => '1',
                    'gender' => '0',
                    'country' => '0',
                    'state' => '0',
                    'city' => '0',
                    'login_type' => '0',
                    'addedby' => '1'
        ]);
    }

}
