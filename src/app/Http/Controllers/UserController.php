<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Region;
use App\Models\Genre;

class UserController extends Controller
{
    public function showMypage()
    {
        // $userId = Auth::id();
        // $reservations = Reservation::where('user_id', $userId)->with('restaurant')->get();
        // $favorites = Favorite::where('user_id', $userId)->with('restaurant')->get();
        // $regions = Region::all();
        // $genres = Genre::all();

        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'owner') {
            return redirect()->route('owners.dashboard');
        }

        $reservations = Reservation::where('user_id', $user->id)->with('restaurant')->get();
        $favorites = Favorite::where('user_id', $user->id)->with('restaurant')->get();
        $regions = Region::all();
        $genres = Genre::all();

        return view('mypage', compact('reservations', 'favorites', 'regions', 'genres'));
    }
}
