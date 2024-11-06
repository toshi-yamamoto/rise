<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class UserController extends Controller
{
    public function showMypage()
    {
        $userId = Auth::id();
        
        $reservations = Reservation::where('user_id', $userId)->with('restaurant')->get();

        $favorites = Favorite::where('user_id', $userId)->with('restaurant')->get();

        return view('mypage', compact('reservations', 'favorites'));
    }
}
