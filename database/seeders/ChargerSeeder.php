<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\charger;
//use App\Models\chargelocation;

class ChargerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$time_steps = [15, 30, 60];
        $csv_path = storage_path('app/csv/hyakusen04.csv');
        $lines = new \SplFileObject($csv_path);

        foreach ($lines as $index => $line)
        {

            if($index > 0) 
            {

                //$line = mb_convert_encoding($line, 'UTF-8', 'SJIS-win'); // 文字コードを UTF-8 へ変換してます
                $values = str_getcsv($line);

                if(!is_null($values[0]))
                {

                    $charger = new charger();
                    $charger->name = $values[1];
                    $charger->location = [
                        'latitude' => $values[2],
                        'longitude' => $values[3]
                    ];
                    $charger->address = $values[4];
                    $charger->time_steps = '30';
                    $charger->save();
                }
            }
        }
    }
}


 //public function run()
  //  {
  //     $time_steps = [15, 30, 60];

   //     foreach ($time_steps as $index => $time_step) {

    //        $no = $index + 1;

   //         $charger = new Charger();
   //         $charger->name = 'Charger'. $no;
   //         $charger->time_steps = $time_steps[$index];
    //        $charger->save();
    //    }
  //  }
