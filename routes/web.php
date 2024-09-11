<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\SponsorController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\SpecializationController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\VoteController;
use App\Http\Controllers\HomeController as GuestHomeController;
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

// Route::get('/home', [GuestHomeController::class, 'index'])->name('home');

Route::get('/reviews/create/{profile}', [ReviewController::class, 'create'])->name('reviews.create');
Route::get('/messages/create/{profile}', [MessageController::class, 'create'])->name('messages.create');
Route::get('profiles/{id}', [ProfileController::class, 'show'])->name('profiles.show');
Route::post('profiles/{id}/vote', [ProfileController::class, 'storeVote'])->name('profiles.vote');


route::middleware('auth')->name('admin.')->prefix('teacher/')->group(

    function () {
        /* rotte protette */
        route::get("specializations", [SpecializationController::class, "index"])->name("specializations.index");
        Route::resource('messages', MessageController::class);
        Route::resource("reviews", ReviewController::class);
        Route::get("votes", [VoteController::class, 'index'])->name('vote.index');
        Route::get("sponsors", [SponsorController::class, 'index'])->name('sponsors.index');
        Route::get("sponsors/{sponsor}", [SponsorController::class, 'show'])->name('sponsors.show');
        Route::resource("profiles", ProfileController::class);
        Route::get('/home', [GuestHomeController::class, 'index'])->name('home');
        Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
        Route::get('/user/update', [UserController::class, 'edit'])->name('user.edit');
    }
);
