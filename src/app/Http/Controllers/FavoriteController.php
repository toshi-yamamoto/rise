<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Restaurant;

class FavoriteController extends Controller
{
    public function toggleFavorite(Restaurant $restaurant)
    {
        $userId = Auth::id();
        $wasAdded = Favorite::toggleFavorite($userId, $restaurant->id);

        return response()->json([
            'success' => true,
            'added' => $wasAdded,
        ]);
    }
}
