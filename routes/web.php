<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReferralsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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
    Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    // Route::get('/profile-edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/profile',ProfileController::class);

    Route::get('deposit', [TransactionController::class, 'deposit'])->name('deposit.index');
    Route::get('withdraw', [TransactionController::class, 'withdraw'])->name('withdraw.index');
    Route::get('principle_withdraw', [TransactionController::class, 'principleWithdraw'])->name('principleWithdraw');
    Route::post('transaction', [TransactionController::class, 'store'])->name('transaction.store');

    Route::get('associates', [ReferralsController::class, 'index'])->name('associates');
    Route::get('user/{id}', [StatusController::class, 'showUser'])->name('team');
});

Route::prefix('admin')->middleware(['auth', 'adminCheck'])->group(function () {
    Route::get('requests', [StatusController::class, 'index'])->name('approval');
    Route::get('user/{id}', [StatusController::class, 'showUser'])->name('user');
    Route::get('status/user/{id}/{status}', [StatusController::class, 'updateUser'])->name('update.user.status');
    Route::get('status/transaction/{id}/{status}', [StatusController::class, 'updateTransactionRequest'])->name('update.transaction.status');
    Route::resource('settings', SettingsController::class);
});
Route::get('/change-password', [ProfileController::class,'password'])->name('password');

Route::post('/password', [ProfileController::class,'update_password'])->name('update_password');
Route::fallback(function () {
    return view('404');
});
Route::view('testing', 'template');
