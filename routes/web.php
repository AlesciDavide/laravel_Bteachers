<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\SponsorController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\SpecializationController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\VoteController;
use App\Http\Controllers\HomeController as GuestHomeController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



route::middleware('auth')->name('admin.')->prefix('teacher/')->group(

    function () {
        /* rotte protette */
        Route::resource('messages', MessageController::class);
        Route::resource("reviews", ReviewController::class);
        Route::get("votes", [VoteController::class, 'index'])->name('vote.index');
        Route::get("sponsors", [SponsorController::class, 'index'])->name('sponsors.index');
        Route::get("sponsors/{sponsor}", [SponsorController::class, 'show'])->name('sponsors.show');
        Route::resource("profiles", ProfileController::class);
        Route::get('/home', [GuestHomeController::class, 'index'])->name('home');
        Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
        Route::get('/user/update', [UserController::class, 'edit'])->name('user.edit');
        Route::get("profile/statistics", [ProfileController::class, 'statisticsPage'])->name('profile.statistics');
        Route::get("profile/payment-history", [ProfileController::class, 'paymentHistory'])->name('profile.payment-history');
        Route::get('/sponsors/payment/{sponsor}', [PaymentController::class, 'showPaymentPage'])->name('payment.show');
        Route::post('/sponsors/checkout/{sponsor}', [PaymentController::class, 'checkout'])->name('payment.checkout');
    }
);
