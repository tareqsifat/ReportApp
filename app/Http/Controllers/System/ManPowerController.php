<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\ManPowerList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManPowerController extends Controller
{
    public function get_man_power_data($id)
    {
        // dd(gettype($id));
        $man = ManPowerList::where('creator', Auth::user()->id);
        dd($man->get());
        if($id == 1 || $id == 2 || $id == 4){
            $man_power = $man->where('man_power_role_id', $id)->get();
        }elseif ($id == 3 || $id == 5) {
            $man_power = '';
            $man_p = $man->where('man_power_role_id' ,$id)->get();
            foreach ($man_p as $value) {
                $man_power = $man_power . $value;
            }
            // dd($man_power);
            $prev_id = (int) $id - 1;
            $prev_id = (string) $prev_id;
            $man_p1 = $man->where('man_power_role_id' ,2)->get();
            dd($man_p1);
            foreach ($man_p1 as $value) {
                $man_power = $man_power . $value;
            }
        }
        return $man_power;
    }
}
