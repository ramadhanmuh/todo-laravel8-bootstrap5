<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\User\LogoutController as UserLogoutController;
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

Route::get('/', [HomeController::class, 'index'])
        ->middleware('loggedoutuser')
        ->name('home');

Route::prefix('login')->group(function () {
        Route::middleware('loggedoutuser')->group(function () {
                Route::get('/', [LoginController::class, 'show'])
                        ->name('login.show');
                Route::post('/', [LoginController::class, 'authenticate'])
                        ->name('login.authenticate')
                        ->middleware(['throttle:5,5']);
        });
});

Route::prefix('forgot-password')->group(function () {
        Route::middleware('loggedoutuser')->group(function () {
                Route::get('/', [ForgotPasswordController::class, 'show'])
                        ->name('forgot-password.show');
                Route::post('/', [ForgotPasswordController::class, 'send'])
                        ->name('forgot-password.send')
                        ->middleware(['throttle:3,5']);
        });
});

Route::prefix('register')->group(function () {
        Route::middleware('loggedoutuser')->group(function () {
                Route::get('/', [RegisterController::class, 'show'])
                        ->name('register.show');
                Route::post('/', [RegisterController::class, 'save'])
                        ->name('register.save')
                        ->middleware(['throttle:3,5']);
        });
});

Route::prefix('reset-password')->group(function () {
        Route::middleware('loggedoutuser')->group(function () {
                Route::get('/', [ResetPasswordController::class, 'show'])
                        ->name('reset-password.show');

                Route::post('/', [ResetPasswordController::class, 'save'])
                        ->name('reset-password.save')
                        ->middleware(['throttle:3,5']);
        });
});

Route::prefix('user')->group(function () {
        Route::middleware('userisloggedin')->group(function () {
                Route::get('home', [UserHomeController::class, 'index'])
                        ->name('user.home');

                Route::post('logout', UserLogoutController::class)
                        ->name('user.logout');
        });
});

Route::get('users/{id}/verification/{token}', [VerificationController::class, 'verify'])
        ->name('verification');

