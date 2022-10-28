<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

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

// Route::get('dashboard', function () {
//     return view('dashboard');
// });

// Route::resource('authenticate',LoginController::class);

// Route::prefix('authenticateuser')->group(function () {
//     Route::resource('authenticate',LoginController::class);

// });


// Route::group([ 
//             'prefix' => 'admin',
//             'middleware' => 'auth'], function() {
//     Route::resource('users', LoginController::class);
//     // Route::get('login', [LoginController::class, 'index']); 

// });
// Route::prefix('/users')->group(static function() {
//     // Route::get('login', [LoginController::class, 'index'])->name('login');
//     // Route::get('register',[RegisterController::class,'index'])->name('register');

//     Route::resource('login', LoginController::class)->names([
//         'index' => 'login'
//     ]);
//     Route::resource('register', RegisterController::class)->names([
//         'index' => 'register'
//     ]);
// });

// Route::group(['prefix' => 'users'], function () {
// Route::get('dashboard', [RegisterController::class, 'dashboard']); 

Route::get('dashboard', [LoginController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']);
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::resource('todo', TodoController::class);

///email verification
Route::get('account/verify/{token}', [RegisterController::class, 'verifyAccount'])->name('user.verify');
////forgetpassword
Route::get('forget-password',  [ForgotPasswordController::class, 'getEmail']);
Route::post('forget-password',  [ForgotPasswordController::class, 'postEmail']);

///reset password
Route::get('reset-password/{token}', [ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [ResetPasswordController::class, 'updatePassword']);
   
    // Route::get('resetpassword',[LoginController::class,'resetpassword'])->name('resetpassword');


    // Route::resource('register', RegisterController::class)->only('index');
// });

// Route::middleware(['áuth'])