<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\ManPower;
use App\Models\ManPowerAdd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ManPowerAddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'man_power_role_id' => 'required',
            'process' => 'required',
            'edu_inst_category' => 'required',
            'edu_inst_sub_category' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([$validator->errors()]);
        }

        $man_power_add = new ManPowerAdd();

        $man_power_add->name = $request->name;
        $man_power_add->man_power_role_id = $request->man_power_role_id;
        $man_power_add->process = $request->process;
        $man_power_add->edu_inst_category = $request->edu_inst_category;
        $man_power_add->edu_inst_sub_category = $request->edu_inst_sub_category;
        $man_power_add->class = $request->class;
        $man_power_add->month = $request->month;
        $man_power_add->year = $request->year;
        $man_power_add->unique_id = $request->month . '_' . $request->year . '_'
        //  .  Auth::user()->id
         ;

         $man_power_add->save();
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function man_power_save($request)
    {
        $unique_id = $request->month . '_' . $request->year;

        $man_p = ManPower::where('unique_id', $unique_id)
            ->where('man_power_role_id', $request->man_power_role_id)->first();
            
        if(isset($man_p)){
            $man_p->বর্তমান_সংখ্যা = $man_p->বর্তমান_সংখ্যা + 1;
            $man_p->বৃদ্ধি_সংখ্যা = $man_p->বৃদ্ধি_সংখ্যা + 1;
        }
        else {
            $man_power = new ManPower();
            $man_power->uniqid = $request->unique_id;
            $man_power->পুর্বের_সংখ্যা = $this->get_previous_number($request);

        }
    }

    public function get_previous_number($request)
    {
        if($request->month == '01'){
            $previous_man_power = ManPower::where('month', '12')->where('year', $request->year - 1)
            ->where('man_power_role_id', $request->man_power_role_id)->first();
        }else {
            $previous_man_power = ManPower::where('month', $request->month - 1)->where('year', $request->year)
            ->where('man_power_role_id', $request->man_power_role_id)->first();
        }

        if(isset($previous_man_power)){
            $previous_number = $previous_man_power->পুর্বের_সংখ্যা;
        }else {
            $previous_number = '0';
        }
        return $previous_number;
    }
}
