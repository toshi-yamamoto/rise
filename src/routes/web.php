<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReservationController;

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
Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('restaurants.show');

Route::middleware('auth')->group(function () {
    // Route::get('/', [AuthController::class, 'index']);

    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

    Route::get('/reservations/done', function () {
        return view('reservations.done');
    })->name('reservations.done');
});



