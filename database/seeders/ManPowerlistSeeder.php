<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManPowerlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('man_power_lists')->insert([
            'name' => 'Sodosso name',
            'man_power_role_id' => '1',
            'man_power_remove_process_id' => null,
            'process' => '1',
            'edu_inst_category' => '1',
            'edu_inst_sub_category' => '2',
            'class' => '12',
            'month' => '01',
            'year' => '2022',
            'class' => '12',
            'creator' => '1',
            'slug' => 'sodosso-name',
            'status' => '1',
        ]);
        DB::table('man_power_lists')->insert([
            'name' => 'Sodosso prarthi name',
            'man_power_role_id' => '2',
            'man_power_remove_process_id' => null,
            'process' => '1',
            'edu_inst_category' => '1',
            'edu_inst_sub_category' => '2',
            'class' => '12',
            'month' => '01',
            'year' => '2022',
            'class' => '12',
            'creator' => '1',
            'slug' => 'sodosso-name',
            'status' => '1',
        ]);
        DB::table('man_power_lists')->insert([
            'name' => 'Sathi name',
            'man_power_role_id' => '3',
            'man_power_remove_process_id' => null,
            'process' => '1',
            'edu_inst_category' => '1',
            'edu_inst_sub_category' => '2',
            'class' => '12',
            'month' => '01',
            'year' => '2022',
            'class' => '12',
            'creator' => '1',
            'slug' => 'sodosso-name',
            'status' => '1',
        ]);
        DB::table('man_power_lists')->insert([
            'name' => 'Sathi prarthi name',
            'man_power_role_id' => '4',
            'man_power_remove_process_id' => null,
            'process' => '1',
            'edu_inst_category' => '1',
            'edu_inst_sub_category' => '2',
            'class' => '12',
            'month' => '01',
            'year' => '2022',
            'class' => '12',
            'creator' => '1',
            'slug' => 'sodosso-name',
            'status' => '1',
        ]);
        DB::table('man_power_lists')->insert([
            'name' => 'kormi name',
            'man_power_role_id' => '5',
            'man_power_remove_process_id' => null,
            'process' => '1',
            'edu_inst_category' => '1',
            'edu_inst_sub_category' => '2',
            'class' => '12',
            'month' => '01',
            'year' => '2022',
            'class' => '12',
            'creator' => '1',
            'slug' => 'sodosso-name',
            'status' => '1',
        ]);
        DB::table('man_power_lists')->insert([
            'name' => 'kormi name 2',
            'man_power_role_id' => '5',
            'man_power_remove_process_id' => null,
            'process' => '2',
            'edu_inst_category' => '1',
            'edu_inst_sub_category' => '2',
            'class' => '12',
            'month' => '01',
            'year' => '2022',
            'class' => '12',
            'creator' => '1',
            'slug' => 'sodosso-name',
            'status' => '1',
        ]);
    }
}
