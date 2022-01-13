<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\RoleController;
use app\Http\Controllers\UserAddController;
use app\Http\Controllers\UserListController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Auth\ForgetPassword;
use App\Http\Controllers\Auth\GoogleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('forget_password',[App\Http\Controllers\Auth\ForgetPassword::class,'index'])->name('password.forget');
Route::post('postforget_password',[App\Http\Controllers\Auth\ForgetPassword::class,'PostForgetPassword'])->name('password.postforget_password');
Route::get('forget_password_varify_otp/{id}',[App\Http\Controllers\Auth\ForgetPassword::class,'forget_password_varify_otp']);
Route::post('post_forget_password',[App\Http\Controllers\Auth\ForgetPassword::class,'post_forget_password'])->name('password.post_forget_password');
Route::get('reset_password/{id}',[App\Http\Controllers\Auth\ForgetPassword::class,'reset_password_view'])->name('password.reset_password');
Route::post('post_reset_password',[App\Http\Controllers\Auth\ForgetPassword::class,'post_reset_password'])->name('password.post_reset_password');


Route::get('auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback']);


Route::get('auth/facebook', [App\Http\Controllers\Auth\FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [App\Http\Controllers\Auth\FacebookController::class, 'handleFacebookCallback']);









Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add-role', [App\Http\Controllers\RoleController::class, 'index'])->name('add-role');
Route::post('/postRoledata', [App\Http\Controllers\RoleController::class, 'postRoledata'])->name('postRoledata');
Route::get('/listroledata', [App\Http\Controllers\RoleController::class, 'listroledata'])->name('listroledata');
Route::get('/listdata', [App\Http\Controllers\RoleController::class, 'listdata'])->name('listdata');



Route::get('/add-user', [App\Http\Controllers\UserAddController::class, 'index'])->name('add-user');
Route::get('/edit-user/{id}', [App\Http\Controllers\UserAddController::class, 'edit_user'])->name('edit-user');

Route::post('/postuserdata', [App\Http\Controllers\UserAddController::class, 'postuserdata'])->name('postuserdata');
Route::post('/getstatedata', [App\Http\Controllers\UserAddController::class, 'getstatedata'])->name('getstatedata');
Route::post('/getcitydata', [App\Http\Controllers\UserAddController::class, 'getcitydata'])->name('getcitydata');
Route::post('/userdata', [App\Http\Controllers\UserAddController::class, 'ajax_userdata'])->name('userdata');
Route::post('/deleteuserdata', [App\Http\Controllers\UserAddController::class, 'deleteuserdata'])->name('deleteuserdata');


Route::get('userlist',[App\Http\Controllers\UserListController::class,'index'])->name('userlist');
Route::post('ajax_userlist',[App\Http\Controllers\UserListController::class,'ajax_userlist'])->name('ajax_userlist');
Route::post('custome_ajax_userlist',[App\Http\Controllers\UserListController::class,'custome_ajax_userlist'])->name('custome_ajax_userlist');
Route::post('custome_ajax_pagination_link',[App\Http\Controllers\UserListController::class,'custome_ajax_pagination_link'])->name('custome_ajax_pagination_link');











Route::get('sendmail', function () {
   
  $details = [
      'title' => 'Mail from Online Web Tutor',
      'body' => 'Test mail sent by Laravel 8 using SMTP.'
  ];
 
  $mail = Mail::to('parulvaghela9537@gmail.com')->send(new \App\Mail\MyTestMail());
 
  dd($mail);
});






