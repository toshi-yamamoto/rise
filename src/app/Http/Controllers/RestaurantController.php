<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Genre;
use App\Models\Region;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::getAllRestaurants();

        return view('restaurants.index', compact('restaurants'));
    }

    public function show($id)
    {
        $restaurants = Restaurant::getRestaurantById($id);

        return view('restaurants.detail', compact('restaurants'));
    }

}
