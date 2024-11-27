<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// レストラン一覧と詳細
Route::get('/', [RestaurantController::class, 'index'])->name('restaurants.index');

// レストラン作成用ルート
Route::middleware('auth')->group(function () {
    Route::get('/restaurants/create', [RestaurantController::class, 'create'])->name('restaurants.create');
    Route::post('/restaurants', [RestaurantController::class, 'store'])->name('restaurants.store');
});

Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('restaurants.detail');

// メニュー表示
Route::get('/menu', function () {
    if (Auth::check()) {
        return view('menu1');
    }
    return view('menu2');
})->name('menu');

// 認証が必要なルート
Route::middleware('auth')->group(function () {
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

    Route::get('/reservations/done', function () {
        return view('reservations.done');
    })->name('reservations.done');

    Route::get('/mypage', [UserController::class, 'showMypage'])->name('mypage');

    Route::post('restaurants/{restaurant}/favorite', [FavoriteController::class, 'toggleFavorite'])->name('restaurants.favorite');

    Route::post('/reservations/{reservation}/delete', [ReservationController::class, 'delete'])->name('reservations.delete');

});

// ログアウト用ルート
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


