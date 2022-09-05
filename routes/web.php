<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\IndexProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\Dashboard\AdminDashboardController;
use App\Http\Controllers\Admin\Dashboard\MerchantsDashboardController;
use App\Http\Controllers\Admin\Dashboard\AdminTokenController;
use App\Http\Controllers\Admin\Dashboard\TransactionDashboardController;
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

Route::get('/', function(){
    return redirect()->route('product.index');
})->name('index');

Route::name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'userLogin'])->name('userLogin');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'userRegister'])->name('userRegister');
    route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('/account')->middleware('auth')->name('account.')->group(function () {
    Route::get('/', [UserProfileController::class, 'index'])->name('index');
    Route::post('/update', [UserProfileController::class, 'update'])->name('update');
});
Route::prefix('/product')->name('product.')->group(function () {
    Route::get('/', [IndexProductController::class, 'index'])->name('index');
    Route::get('/order/{product:slug}', [TransactionController::class, 'order'])->name('order');
    Route::resource('/transaction', TransactionController::class)->except(['show']);
    Route::get('/{product:slug}', [IndexProductController::class, 'show'])->name('show');
});

Route::prefix('/merchant')->middleware('auth')->name('merchant.')->group(function () {
    Route::get('/', [MerchantController::class, 'index'])->name('index');
    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('/product', ProductController::class)->except(['show']);
        Route::resource('/wallet', WalletController::class)->except(['show']);
        Route::get('/transaction', [DashboardTransactionController::class, 'index'])->name('transaction');
        // Route::resource('/profile', ProfileController::class)->except(['show']);
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile', [ProfileController::class, 'update'])->name('update');
    });
        Route::get('/register', [MerchantController::class, 'register'])->name('register');
        Route::post('/register', [MerchantController::class, 'merchantRegister'])->name('merchantRegister');
});
Route::prefix('/orders')->middleware('auth')->name('orders.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
});
Route::prefix('/admin')->middleware(['can:admin-access'])->name('admin.')->group(function () {
    // ADMIN TOKEN
    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
        
        Route::prefix('/transactions')->name('transactions.')->group(function () {
            Route::get('/', [TransactionDashboardController::class, 'index'])->name('index');
            Route::get('/accept/{id}', [TransactionDashboardController::class, 'accepted'])->name('accepted');
            Route::get('/reject/{id}', [TransactionDashboardController::class, 'rejected'])->name('rejected');
        });
        
        Route::prefix('/merchants')->name('merchants.')->group(function () {
            Route::get('/', [MerchantsDashboardController::class, 'index'])->name('index');
            Route::get('/accept/{id}', [MerchantsDashboardController::class, 'accepted'])->name('accepted');
            Route::get('/reject/{id}', [MerchantsDashboardController::class, 'rejected'])->name('rejected');
        });

        Route::prefix('/admintokens')->name('admintokens.')->group(function () {
            Route::get('/', [AdminTokenController::class, 'index'])->name('index');
            Route::post('/', [AdminTokenController::class, 'generate'])->name('generate');
            Route::delete('/{adminToken}', [AdminTokenController::class, 'destroy'])->name('destroy');
        });
    });
});
