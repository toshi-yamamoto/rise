<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;


class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $userId = Auth::id();
        $restaurantId = $request->restaurant_id;
        $reservationDate = $request->reservation_date;
        $reservationTime = $request->reservation_time;
        $numberOfPeople = $request->number_of_people;

        Reservation::createReservation($userId, $restaurantId, $reservationDate, $reservationTime, $numberOfPeople);

        return redirect()->route('reservations.done');
    }

    public function delete(Reservation $reservation)
    {
        if ($reservation->user_id === Auth::id()) {
            $reservation->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => '削除に失敗しました'], 403);
    }
}
