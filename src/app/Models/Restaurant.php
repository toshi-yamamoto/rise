<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;
use App\Models\Genre;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image_url', 'region_id', 'genre_id'];

    public function reservations()
    {
        // レストランは複数の予約を持つ
        return $this->hasMany(Reservation::class);
    }

    public function favorites()
    {
        // レストランは複数のユーザーのお気に入りに登録される
        return $this->hasMany(Favorite::class);
    }

    public function region()
    {
        // レストランは１つの地域に属する
        return $this->belongsTo(Region::class);
    }

    public function genre()
    {
        // レストランは１つのジャンルに属する
        return $this->belongsTo(Genre::class);
    }

    public function getAllRestaurants()
    {

        return Restaurant::with(['genre', 'region'])->get();

    }

    public function getRestaurantById($id)
    {
        return Restaurant::with(['genre', 'region'])->find($id);
    }
}
