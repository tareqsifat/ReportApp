<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManPowerRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('man_power_roles')->insert([
            'grade' => 'সদস্য'
        ]);
        DB::table('man_power_roles')->insert([
            'grade' => 'সদস্য প্রার্থী'
        ]);
        DB::table('man_power_roles')->insert([
            'grade' => 'সাথী'
        ]);
        DB::table('man_power_roles')->insert([
            'grade' => 'সাথী প্রার্থী'
        ]);
        DB::table('man_power_roles')->insert([
            'grade' => 'কর্মী'
        ]);
    }
}
