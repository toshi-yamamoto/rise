<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Genre;
use App\Models\Region;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $query = Restaurant::query();

        if ($request->filled('region')) {
            $query->where('region_id', $request->input('region'));
        }

        if ($request->filled('genre')) {
            $query->where('genre_id', $request->input('genre'));
        }

        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->input('keyword') . '%');
        }

        $restaurants = $query->get();

        $regions = Region::all();
        $genres = Genre::all();

        return view('restaurants.index', compact('restaurants', 'regions', 'genres'));
    }

    public function show($id)
    {
        $restaurants = Restaurant::getRestaurantById($id);

        $regions = Region::all();
        $genres = Genre::all();

        return view('restaurants.detail', compact('restaurants', 'regions', 'genres'));
    }

}
