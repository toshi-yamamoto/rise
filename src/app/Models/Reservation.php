<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'reservation_date',
        'reservation_time',
        'number_of_people',
        'reservation_status',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        $this->belongsTo(Restaurant::class);
    }

    public function createReservation(array $data)
    {
        return Reservation::create([
            'user_id' => $data['user_id'],
            'restaurant_id' => $data['restaurant_id'],
            'reservation_date' => $data['reservation_date'],
            'reservation_time' => $data['reservation_time'],
            'number_of_people' => $data['number_of_people'],
            'reservation_status' => '予約中',
        ]);
    }
}
