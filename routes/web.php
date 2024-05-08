<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SchedualController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('service');
Route::get('/schedual', [SchedualController::class, 'index'])->name('schedual');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['UserLoginRequired'])->prefix('/user')->group(function () {
    Route::get('/editprofile',[UserController::class,'editprofile'])->name('user.editprofile');
    Route::POST('/editprofile',[UserController::class,'updateprofile'])->name('user.updateprofile');
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::view('/changepassword', 'frontend/resetpassword', ['forgotpassword' => false])->name('user.changepassword');
    Route::post('/changepassword',[UserController::class,'changepassword'])->name('user.changepassword');
}
);
Route::post('/otp/{acesstoken}', [UserController::class,'verifyOtp'])->name('user.verify');
Route::get('/otp/{acesstoken}', [UserController::class,'showOtpForm'])->name('user.otp');
Route::get('/sendotp', [UserController::class,'SendOtp'])->name('user.SendOtp');


Route::post('/user/forgetotp/{acesstoken}', [UserController::class,'verifyforgotOtp']);
Route::view('/user/forgotpassword', 'frontend.resetpassword', ['forgotpassword' => true])->name('user.forgotpassword');
Route::post('/user/forgotpassword',[UserController::class,'forgotpassword'])->name('user.forgotpassword');
Route::View('user/registartion','frontend/register')->name('user.registration');
Route::post('user/registartion', [UserController::class, 'create'])->name('user.registration');
Route::post('user/login', [UserController::class, 'login'])->name('user.login');
Route::view('user/login', 'frontend/login')->name('user.login');

// *********************** Admin ******************
Route::get('/admin/home/{show?}',[AdminController::class,'index']);
Route::get('/admin/message/{id}',[AdminController::class,'message']);
Route::post('admin/message/{id}',[AdminController::class,'messagereplay']);
Route::get('admin/messagemarkasread/{markread}/{id}',[AdminController::class,'messagemarkasread']);
Route::get('admin/messagetrash/{id}',[AdminController::class,'messagetrash']);
Route::get('admin/messagedelete/{delete}/{id}',[AdminController::class,'messagedelete']);
