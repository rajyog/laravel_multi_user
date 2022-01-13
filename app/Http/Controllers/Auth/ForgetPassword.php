<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class ForgetPassword extends Controller {

    function __construct() {
        $this->middleware('guest');
    }

    function index() {
        return view("auth.forget_password");
    }

    function PostForgetPassword(Request $request) {
        $email = $request->email;
        $rand_number = random_int(100000, 999999);

        $validator = Validator::make($request->all(), [
                    'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                            ->back()
                            ->withErrors($validator)
                            ->withInput();
        }
        $forget_condition = array(
            'email' => $email
        );
        $resutl = User::getForgetData($forget_condition);
        $details = array(
            'title' => 'Reset password',
            'body' => 'Test mail sent by Laravel 8 using SMTP.',
            'otp' => $rand_number
        );
        if ($resutl != "") {
            $sendResult = ForgetPasswordSend($details, $email);

            $update = User::where('email', $email)
                    ->where('id', $resutl['id'])
                    ->update(['forget_code' => $rand_number]);

            if ($update == 1) {
                $id = Crypt::encryptString($resutl['id']);
                return redirect('forget_password_varify_otp' . "/" . $id);
            }
        } else {
            return redirect()
                            ->back()
                            ->with("error", "email can not be register or exist");
        }
    }

    function forget_password_varify_otp($id) {
        $ids = Crypt::decryptString($id);
        $wh_condition = array(
            'id' => $ids
        );
        $resutl = User::getForgetData($wh_condition);
        if ($resutl != "") {
            return view("auth.otp_forget_password", ["id" => $id]);
        } else {
            return abort(404, 'Page not found.');
        }
    }

    function post_forget_password(Request $request) {
        // dd($request->all());
        $id = $request['id'];
        $ids = Crypt::decryptString($id);
        $otp_number = $request['otp_number'];

        $validator = Validator::make($request->all(), [
                    'otp_number' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                            ->back()
                            ->withErrors($validator)
                            ->withInput();
        }
        $wh_condition = array(
            'id' => $ids,
            'forget_code' => $otp_number
        );
        $resutl = User::getForgetData($wh_condition);
        if ($resutl != "") {
            return redirect('reset_password' . "/" . $id);
        } else {
            return redirect()
                            ->back()
                            ->with("error", "OTP number can not be valid");
        }
    }

    public function reset_password_view($id) {
        $ids = Crypt::decryptString($id);

        $wh_condition = array(
            'id' => $ids,
        );
        $resutl = User::getForgetData($wh_condition);
        if ($resutl != "") {
            return view("auth.reset_password", ["id" => $id]);
        } else {
            return abort(404, 'Page not found.');
        }
    }

    public function post_reset_password(Request $request) {

        $validator = Validator::make($request->all(), [
                    'new_password' => 'required',
                    'con_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            return redirect()
                            ->back()
                            ->withErrors($validator)
                            ->withInput();
        }
        $ids = Crypt::decryptString($request['id']);
        $password = Hash::make($request['new_password']);

        $update = User::where('id', $ids)
                ->update(['forget_code' => '', 'password' => $password]);
        if ($update == 1) {
            return redirect()->route("login");
        }
    }

}
