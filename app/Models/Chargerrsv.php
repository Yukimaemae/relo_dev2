<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chargerrsv extends Model
{

    use HasFactory;
    
    protected $appends = ['time_step_values'];
    protected $table = 'chargers';

    // Accessor
    // １時間の間に予約できる「分」を取得する
    public function getTimeStepValuesAttribute() { 

        $time_step_values = [];
        $count = 60 / $this->time_steps;

        for($i = 0 ; $i < $count ; $i++) {
            $time_step_values[] = $this->time_steps * $i;
        }
        return $time_step_values;
    }
}
