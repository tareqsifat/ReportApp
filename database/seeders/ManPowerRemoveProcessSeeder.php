<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManPowerRemoveProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('man_power_remove_processes')->insert([
            'process'=>'মানোন্নয়ন'
        ]);
        DB::table('man_power_remove_processes')->insert([
            'process'=>'ছাত্রত্ব শেষ'
        ]);
        DB::table('man_power_remove_processes')->insert([
            'process'=>'স্থানান্তর'
        ]);
        DB::table('man_power_remove_processes')->insert([
            'process'=>'বাতিল'
        ]);
        DB::table('man_power_remove_processes')->insert([
            'process'=>'বিদেশ(উচ্চশিক্ষা)'
        ]);
        DB::table('man_power_remove_processes')->insert([
            'process'=>'বিদেশ(চাকুরি)'
        ]);
        DB::table('man_power_remove_processes')->insert([
            'process'=>'ইন্তেকাল'
        ]);
        DB::table('man_power_remove_processes')->insert([
            'process'=>'শাহাদাত'
        ]);
        DB::table('man_power_remove_processes')->insert([
            'process'=>'কর্মী মান অবনতি'
        ]);
    }
}
