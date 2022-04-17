<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加
use App\Models\Chargerrsv;
use App\Models\Charger;

class ReservationController extends Controller
{
    public function index() {

        $chargers = charger::select('id', 'name', 'time_steps')->get();
        
        return view('reservation.index')->with([
            'chargers' => $chargers
        ]);
    
        echo $chargers;    

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
    
    public function show() {
        // 全ての投稿を取得
        $reservations = Reservation::get();
        
        return view('home',[
            'reservations'=> $reservations
            ]);
    }
    
}