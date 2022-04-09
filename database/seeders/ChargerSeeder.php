<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\charger;

class ChargerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $time_steps = [15, 30, 60];

        foreach ($time_steps as $index => $time_step) {

            $no = $index + 1;

            $charger = new Charger();
            $charger->name = 'Charger'. $no;
            $charger->time_steps = $time_steps[$index];
            $charger->save();
        }
    }
}
