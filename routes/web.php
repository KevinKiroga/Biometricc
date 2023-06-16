<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Agrupa varias rutas en una sola
Route::prefix('/')->group(function () {

    // Rutas para el login
    Route::get('/' , [AuthController::class, 'login'])->name('login');
    Route::post('/' , [AuthController::class, 'authenticate'])->name('authenticate');

    // Rutas para el registro
    Route::get('/register' , [AuthController::class, 'register']);
    Route::post('/register' , [AuthController::class, 'store']);

    // Rutas para el password reset
    Route::get('/forgot-password' , [AuthController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('/forgot-password' , [AuthController::class, 'verifyEmail'])->name('verifyEmail');
    Route::get('/resetPassword/{token}' , [AuthController::class, 'resetPassword']);
    Route::post('/resetPassword' , [AuthController::class, 'updatePassword'])->name('updatePassword');

    // Rutas para el logout
    Route::post('/logout' , [AuthController::class, 'logout'])->name('logout');

});



Route::group(['middleware' => 'prevent-back-history-middleware'], function () {

    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', function () {
            return view('rules.layout.pageHome');
        })->name('dashboard');


    });
});
