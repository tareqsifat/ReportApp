<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Interfaces\ManPowerInterface;
use App\Models\ManPower;
use App\Models\ManPowerList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ManPowerListController extends Controller
{

    private ManPowerInterface $man_power_interface;
    
    public function __construct(ManPowerInterface $man_power_interface)
    {
        $this->man_power_interface = $man_power_interface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $man_power = ManPower::where('status')->orderBy('created_at', 'DESC')->get();
        if(isset($man_power) && count($man_power) != 0){
            return response()->json($man_power);
        }else {
            return response()->json([
                "Message" => "কোন জনশক্তি ডাটা নেই"
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
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

        
        $man_power_add = new ManPowerList();
        
        $man_power_add->name = $request->name;
        $man_power_add->man_power_role_id = $request->man_power_role_id;
        $man_power_add->process = $request->process;
        $man_power_add->edu_inst_category = $request->edu_inst_category;
        $man_power_add->edu_inst_sub_category = $request->edu_inst_sub_category;
        $man_power_add->class = $request->class;
        $man_power_add->month = $request->month;
        $man_power_add->year = $request->year;
        $man_power_add->unique_id = $request->month . '_' . $request->year . '_' .  Auth::user()->id;
        $man_power_add->creator =  Auth::user()->id;
        $man_power_add->slug = Str::slug($request->name);
        
        $man_power_add->save();
        
        $this->man_power_interface->man_power_save($request, true);
        
        return response()->json([
            "Message" => "Man Power Data Saved Successfully"
        ]);
    }


    public function add_via_list($id)
    {
        $man_power = ManPowerList::find($id);
        if(isset($man_power)){
            if($man_power->man_power_role_id != 1){
                $man_power->man_power_role_id = (int) $man_power->man_power_role_id - 1;
                $man_power->save();

                $this->man_power_interface->man_power_save($man_power, true);
                $this->man_power_interface->improvement_deficit($man_power);

                return response()->json([
                    "message" => "জনশক্তি ডাটা সফল ভাবে সেভ হয়েছে"
                ]);
                
            }else {
                return response()->json([
                    "message" => "কিছু একটা ভুল হয়েছে"
                ]);
            }
        }else {
            return response()->json([
                "message" => "জনশক্তি ডাটা পাওয়া যায়নি"
            ]);
        }
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

        $man_power_add = ManPowerList::find($id);

        $man_power_add->name = $request->name;
        $man_power_add->edu_inst_category = $request->edu_inst_category;
        $man_power_add->edu_inst_sub_category = $request->edu_inst_sub_category;
        $man_power_add->class = $request->class;
        $man_power_add->unique_id = $request->month . '_' . $request->year . '_' .  Auth::user()->id;
        $man_power_add->creator =  Auth::user()->id;
        $man_power_add->slug = Str::slug($request->name);

        $man_power_add->save();

        return response()->json([
            "message" => "জনশক্তি ডাটা সফল ভাবে আপডেট হয়েছে"
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'man_power_remove_process_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([$validator->errors()]);
        }

        $man_power = ManPowerList::find($request->id);
        if(isset($man_power) && $man_power->status != 0){
            $man_power->status = 0;
            $man_power->man_power_remove_process_id = $request->man_power_remove_process_id;
            $man_power->save();

            $this->man_power_interface->man_power_save($man_power, false);
            
            return response()->json([
                "Message" => "জনশক্তি ডাটা ঘাটতি সফল হয়েছে"
            ]); 
        }else {
            return response()->json([
                "Message" => "Man Power data not found"
            ]); 
        }

    }

    public function check_store_ability(Request $request)
    {
        if($request->process == 2){

            $responce = $this->store($request);
            return $responce;

        }else if($request->process == 1 && $request->man_power_role_id == 5){

            $responce = $this->store($request);
            return $responce;

        }
        else {
            return response()->json([
                "Message" => "লিস্ট থেকে মানোন্নয়ন ডাটা আপডেট করুন"
            ]);
        }
    }
}
