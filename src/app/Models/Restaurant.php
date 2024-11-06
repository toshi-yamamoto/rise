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
        return $this->hasMany(Reservation::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function genre()
    {
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
