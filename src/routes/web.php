<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
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


Route::get('/', [RestaurantController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('restaurants.detail');

Route::middleware('auth')->group(function () {
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

    Route::get('/reservations/done', function () {
        return view('reservations.done');
    })->name('reservations.done');

    Route::get('/mypage', [UserController::class, 'showMypage'])->name('mypage');

    Route::post('restaurants/{restaurant}/favorite', [FavoriteController::class, 'toggleFavorite'])->name('restaurants.favorite');

    Route::post('/reservations/{reservation}/delete', [ReservationController::class, 'delete'])->name('reservations.delete');
});



