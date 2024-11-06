<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'restaurant_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function toggleFavorite(int $userId, int $restaurantId)
    {
        $favorite = Favorite::where('user_id', $userId)
            ->where('restaurant_id', $restaurantId)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return false;
        } else {
            Favorite::create([
                'user_id' => $userId,
                'restaurant_id' => $restaurantId,
            ]);
            return true;
        }
    }
}
