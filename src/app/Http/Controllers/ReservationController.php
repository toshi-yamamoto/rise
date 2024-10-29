<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        // $reservation = new Reservation();
        // $reservation->user_id = 1;
        // $reservation->restaurant_id = $request->restaurant_id;
        // $reservation->reservation_date = $request->reservation_date;
        // $reservation->reservation_time = $request->reservation_time;
        // $reservation->number_of_people = $request->number_of_people;
        // $reservation->reservation_status = '予約中';
        // $reservation->save();

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['reservation_status'] = '予約中';
        Reservation::createReservation($data);

        return redirect()->route('reservations.done');
    }
}
