<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\SpecializationController;
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

Route::get('/home', [GuestHomeController::class, 'index'])->name('home');

route::middleware('auth')->name('admin.')->prefix('admin/')->group(
    function(){
        /* rotte protette */
        route::get("specializations", [SpecializationController::class, "index"])->name("specializations");
    }
);

