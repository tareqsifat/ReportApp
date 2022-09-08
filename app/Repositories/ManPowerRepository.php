<?php

namespace App\Repositories;

use App\Interfaces\ManPowerInterface;
use App\Models\ManPower;
use Illuminate\Support\Facades\Auth;

class ManPowerRepository implements ManPowerInterface
{
    public function man_power_save($request, $add)
    {
        $unique_id = $request->month . '_' . $request->year . '_' .  Auth::user()->id;

        $man_p = ManPower::where('month', $request->month)->where('year', $request->year)
            ->where('man_power_role_id', $request->man_power_role_id)->where('creator', Auth::user()->id)->first();

        if(isset($man_p)){
            if($add == true){
                $man_p->বৃদ্ধি_সংখ্যা = $man_p->বৃদ্ধি_সংখ্যা + 1;
            }
            if($add == false){
                $man_p->ঘাটতি_সংখ্যা = $man_p->ঘাটতি_সংখ্যা + 1;
            }
            $man_p->save();
            $man_p->বর্তমান_সংখ্যা = $this->get_current_number($man_p->id);
            $man_p->save();
        }
        else {
            $man_power = new ManPower();
            $man_power->unique_id = $unique_id;   
            $man_power->man_power_role_id = $request->man_power_role_id;
            $man_power->পুর্বের_সংখ্যা = $this->get_previous_number($request);
            $man_power->বৃদ্ধি_সংখ্যা = 1;
            $man_power->month = $request->month;
            $man_power->year = $request->year;
            $man_power->creator = Auth::user()->id;
            $man_power->slug = $unique_id;
            $man_power->save();
            
            $man_power->বর্তমান_সংখ্যা = $this->get_current_number($man_power->id);
            $man_power->save();

        }
    }

    public function get_previous_number($request)
    {
        $prev_year = (int) $request->year - 1;
        $prev_month = (int) $request->month - 1;
        if($request->month == '01'){
            $previous_man_power = ManPower::where('month', '12')->where('year', $prev_year)
            ->where('man_power_role_id', $request->man_power_role_id)->first();
        }else {
            $previous_man_power = ManPower::where('month',$prev_month)->where('year', $request->year)
            ->where('man_power_role_id', $request->man_power_role_id)->first();
        }

        if(isset($previous_man_power)){
            $previous_number = $previous_man_power->বর্তমান_সংখ্যা;
        }else {
            $previous_number = '0';
        }
        return $previous_number;
    }

    public static function get_current_number($id)
    {
        $current_number = 0;
        $man_power = ManPower::find($id);
        if($man_power->man_power_role_id == 2 || $man_power->man_power_role_id == 4){
            $next = (int) $man_power->man_power_role_id + 1;
            $man = ManPower::where('month', $man_power->month)->where('year', $man_power->year)
            ->where('man_power_role_id', $next)->where('creator', Auth::user()->id)->first();

            $current_number_of_next_role = (int) $man->পুর্বের_সংখ্যা + (int) $man->বৃদ্ধি_সংখ্যা - (int) $man->ঘাটতি_সংখ্যা;

            $current_number = (int) $man_power->পুর্বের_সংখ্যা + (int) $man_power->বৃদ্ধি_সংখ্যা - (int) $man_power->ঘাটতি_সংখ্যা;

            $man->বর্তমান_সংখ্যা = $current_number_of_next_role + $current_number;
            $man->save();

        }else {
            $current_number = (int) $man_power->পুর্বের_সংখ্যা + (int) $man_power->বৃদ্ধি_সংখ্যা - (int) $man_power->ঘাটতি_সংখ্যা;
        }
        return $current_number;
    }

    public function improvement_deficit($request)
    {
        $man_p = ManPower::where('month', $request->month)->where('year', $request->year)
            ->where('man_power_role_id',(int) $request->man_power_role_id + 1)->where('creator', Auth::user()->id)->first();

        $man_p->ঘাটতি_সংখ্যা = $man_p->ঘাটতি_সংখ্যা + 1;

        $man_p->save();

        $man_p->বর্তমান_সংখ্যা = $this->get_current_number($man_p->id);
        $man_p->save();

    }
}
