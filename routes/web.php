<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


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
Route::view('/','auth.login')->name('/');
// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('/super-login', [LoginController::class, 'doLogin'])->name('do-login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/super-logout', [LoginController::class, 'doLogout'])->name('do-logout');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/index', [UserController::class, 'index'])->name('users.index');
        Route::get('/index-grid', [UserController::class, 'indexGrid'])->name('users.index-grid');
        Route::get('/create', [UserController::class, 'Create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('show/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/trashed', [UserController::class, 'trashed'])->name('users.trashed');
        Route::get('/restore/{id}', [UserController::class, 'restore'])->name('users.restore');
        Route::get('/force-destroy/{id}', [UserController::class, 'forceDestroy'])->name('force.destroy');

    });
    Route::get('dashboard', [AdminController::class, 'Index'])->name('dashboard');

});
