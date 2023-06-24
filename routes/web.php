<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\FichaController;
use App\Http\Controllers\Admin\ProgramaController;

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

        Route::get('/dashboard' , [AuthController::class, 'dashboard'])->name('dashboard');


        Route::get('/user/profile' , [ UserController::class, 'profile'])->name('profile');
        Route::put('/user/profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('users/update' , [UserController::class , 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');



        Route::get('/role', [RoleController::class, 'index'])->name('role.index');
        Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
        Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
        Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('/role/update' , [RoleController::class , 'update'])->name('role.update');
        Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

        Route::get('ficha', [FichaController::class, 'index'])->name('ficha.index');
        Route::get('ficha/create', [FichaController::class, 'create'])->name('ficha.create');
        Route::post('ficha', [FichaController::class, 'store'])->name('ficha.store');
        Route::get('ficha/{ficha}/edit', [FichaController::class, 'edit'])->name('ficha.edit');
        Route::put('ficha/update', [FichaController::class, 'update'])->name('ficha.update');
        Route::delete('ficha/{ficha}', [FichaController::class, 'destroy'])->name('ficha.destroy');

        Route::get('programa', [ProgramaController::class, 'index'])->name('programa.index');
        Route::get('programa/create', [ProgramaController::class, 'create'])->name('programa.create');
        Route::post('programa', [ProgramaController::class, 'store'])->name('programa.store');
        Route::get('programa/{programa}/edit', [ProgramaController::class, 'edit'])->name('programa.edit');
        Route::put('programa/{programa}', [ProgramaController::class, 'update'])->name('programa.update');
        Route::delete('programa/{programa}', [ProgramaController::class, 'destroy'])->name('programa.destroy');



    });
});


