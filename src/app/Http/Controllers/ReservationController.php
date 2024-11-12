<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Region;
use App\Models\Genre;


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

        $regions = Region::all();
        $genres = Genre::all();

        return view('reservations.done', compact('regions', 'genres'));
    }

    public function delete(Reservation $reservation)
    {
        $regions = Region::all();
        $genres = Genre::all();

        if ($reservation->deleteReservation()) {
            return response()->json(['success' => true]);
        }
        return response()->json([
            'success' => false,
            'message' => '削除に失敗しました',
            'regions' => $regions,
            'genres' => $genres
        ], 403);
    }
}
