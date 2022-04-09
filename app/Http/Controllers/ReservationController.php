<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\charger;

class ReservationController extends Controller
{
    public function index() {

        $chargers = charger::select('id', 'name', 'time_steps')->get();
        return view('reservation.index')->with([
            'chargers' => $chargers
        ]);
    }
    public function store(Request $request) {

        // TODO: バリデーションは省略しています

        $reservation = new Reservation();
        $reservation->user_id = auth()->id();
        $reservation->charger_id = $request->charger_id;
        $reservation->starts_at = $request->start_at;
        $result = $reservation->save();

        return ['result' => $result];

    }

    public function reservation_list(Request $request) {

        $reservations = Reservation::select('id', 'charger_id', 'starts_at')
            ->whereDate('starts_at', $request->date)
            ->get();

        return [
            'reservations' => $reservations
        ];

    }
}