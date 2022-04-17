<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charger;

class ChargerController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function list(Request $request)
    {
        // TODO: バリデーションは省略してます

        $latitude = $request->latitude;   // 緯度
        $longitude = $request->longitude; // 経度
        $chargers = [];

        try {

            $chargers = Charger::selectDistance($longitude, $latitude)
                ->orderBy('distance', 'asc')
                ->take(15)
                ->get();

        } catch(\Exception $e) {}

        return [
            'result' => true,
            'chargers' => $chargers
        ];
    }
}
