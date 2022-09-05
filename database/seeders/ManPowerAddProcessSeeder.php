<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManPowerAddProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('man_power_add_processes')->insert([
            'process' => 'মানোন্নয়ন'
        ]);
        DB::table('man_power_add_processes')->insert([
            'process' => 'আগমন'
        ]);
    }
}
