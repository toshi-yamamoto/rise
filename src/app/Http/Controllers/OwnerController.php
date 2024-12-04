<?php

namespace App\Http\Controllers;

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

    public function createRestaurant(Request $request)
    {
        Restaurant::create([
            'name' => $request->name,
            'region_id' => $request->region_id,
            'genre_id' => $request->genre_id,
            'description' => $request->description,
            'owner_id' => Auth::id(),
        ]);

        return redirect()->route('owners.dashboard')->with('success', '店舗情報が作成されました');
    }

    public function store(Request $request)
    {
        // 画像アップロード処理
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('restaurants', 'public');
        }

        // データベースに保存
        Restaurant::create([
            'name' => $request->name,
            'region_id' => $request->region_id,
            'genre_id' => $request->genre_id,
            'description' => $request->description,
            'owner_id' => Auth::id(), // ログイン中の店舗代表者
            'image_url' => $imagePath,   // 画像パス
        ]);

        // リダイレクト
        return redirect()->route('owners.restaurants.create')->with('success', '新規レストランが登録されました');
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

    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::where('id', $id)
            ->where('owner_id', Auth::id())
            ->firstOrFail(); // 自分が所有する店舗のみ更新可能

        // 画像の更新
        $imagePath = $restaurant->image; // 既存の画像パス
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
