<?php

use Illuminate\Support\Facades\Mail;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

//if(!function_exists(sampleDefaultHelper)){
function sampleDefaultHelper() {
    return 'hello';
}

//}

function userAddMailSend($details,$email) {
     $mail = Mail::to('parulvaghela9537@gmail.com')->send(new \App\Mail\MyTestMail($details));
    return true;
}

function ForgetPasswordSend($details,$email) {
     $mail = Mail::to('parulvaghela9537@gmail.com')->send(new \App\Mail\MyTestMail($details));
    return true;
}
