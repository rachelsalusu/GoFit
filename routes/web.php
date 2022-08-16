<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Dashboard\AdminDashboardController;
use App\Http\Controllers\Admin\Dashboard\AdminTokenController;
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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'userLogin'])->name('userLogin');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'userRegister'])->name('userRegister');
    route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('/dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    // All routes dashboard/blogs
});

Route::prefix('/admin')->middleware(['can:admin-access'])->name('admin.')->group(function () {
    // ADMIN TOKEN
    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
        Route::prefix('/admintokens')->name('admintokens.')->group(function () {
            Route::get('/', [AdminTokenController::class, 'index'])->name('index');
            Route::post('/', [AdminTokenController::class, 'generate'])->name('generate');
            Route::delete('/{adminToken}', [AdminTokenController::class, 'destroy'])->name('destroy');
    });
    });
});
