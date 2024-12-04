<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reservation extends Model
{
    use HasFactory;

    const STATUS_PENDING = '予約中';
    const STATUS_CONFIRMED = '確定';
    const STATUS_CANCELLED = 'キャンセル済み';

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
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public static function createReservation(int $userId, int $restaurantId, string $reservationDate, string $reservationTime, int $numberOfPeople)
    {
        return self::create([
            'user_id' => $userId,
            'restaurant_id' => $restaurantId,
            'reservation_date' => $reservationDate,
            'reservation_time' => $reservationTime,
            'number_of_people' => $numberOfPeople,
            'reservation_status' => '予約中',
        ]);
    }

    public function deleteReservation()
    {
        if ($this->user_id === Auth::id()) {
            return $this->delete();
        }
        return false;
    }
}
