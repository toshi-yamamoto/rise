<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Reservation;
use App\Models\Region;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function dashboard()
    {
        $restaurants = Restaurant::where('owner_id', Auth::id())->get();
        return view('owners.dashboard', compact('restaurants'));
    }

    public function reservations()
    {
        $reservations = Reservation::whereHas('restaurant', function ($query) {
            $query->where('owner_id', Auth::id());
        })->get();

        return view('owners.reservations.index', compact('reservations'));
    }

    public function store(StoreRestaurantRequest $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('restaurants', 'public');
        }

        Restaurant::create([
            'name' => $request->name,
            'region_id' => $request->region_id,
            'genre_id' => $request->genre_id,
            'description' => $request->description,
            'owner_id' => Auth::id(),
            'image_url' => $imagePath,
        ]);

        return redirect()->route('owners.dashboard')->with('success', '新規レストランが登録されました');
    }

    public function edit($id)
    {
        $restaurant = Restaurant::where('id', $id)
            ->where('owner_id', Auth::id())
            ->firstOrFail();

        $regions = Region::all();
        $genres = Genre::all();

        return view('owners.restaurants.edit', compact('restaurant', 'regions', 'genres'));
    }

    public function update(UpdateRestaurantRequest $request, $id)
    {
        $restaurant = Restaurant::where('id', $id)
            ->where('owner_id', Auth::id())
            ->firstOrFail();

        // 画像の更新
        $imagePath = $restaurant->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('restaurants', 'public');
        }

        // データの更新
        $restaurant->update([
            'name' => $request->name,
            'region_id' => $request->region_id,
            'genre_id' => $request->genre_id,
            'description' => $request->description,
            'image_url' => $imagePath,
        ]);

        return redirect()->route('owners.dashboard')->with('success', '店舗情報が更新されました');
    }

    public function showCreateForm()
    {
        $regions = Region::all();
        $genres = Genre::all();

        return view('owners.restaurants.create', compact('regions', 'genres'));
    }
}
