<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function reservations()
    {
        // レストランは複数の予約を持つ
        $this->hasMany(Reservation::class);
    }

    public function favorites()
    {
        // レストランは複数のユーザーのお気に入りに登録される
        $this->hasMany(Favorite::class);
    }

    public function region()
    {
        // レストランは１つの地域に属する
        $this->belongsTo(Region::class);
    }

    public function genre()
    {
        // レストランは１つのジャンルに属する
        $this->belongsTo(Genre::class);
    }
}
