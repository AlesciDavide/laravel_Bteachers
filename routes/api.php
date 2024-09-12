<?php

use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});

Route::get('/profiles', [ProfileController::class, 'index'])->name('api.profiles.index');
Route::get('/profiles/search', [ProfileController::class, 'profileSearch'])->name('api.profile.search');
Route::get('/profiles/{profile}', [ProfileController::class, 'show'])->name('api.profiles.show');
Route::post('/profiles/{profile}', [ProfileController::class, 'store'])->name('api.profile.store');

