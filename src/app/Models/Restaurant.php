<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;
use App\Models\Genre;
use Illuminate\Http\UploadedFile;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_url',
        'region_id',
        'genre_id',
        'description',
    ];

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

    public function createWithImage(array $data, ?UploadedFile $image)
    {
        if ($image) {
            $data['image_url'] = $image->store('restaurants', 'public');
        }

        return Restaurant::create($data);
    }
}
