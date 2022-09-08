<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManPowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('man_powers')->insert([
            'unique_id' => '01_2022_1',
            'man_power_role_id' => '1',
            'পুর্বের_সংখ্যা' => '0',
            'বর্তমান_সংখ্যা' => '1',
            'বৃদ্ধি_সংখ্যা' => '1',
            'ঘাটতি_সংখ্যা' => '0',
            'বাস্তবায়ন_হার' =>'0',
            'টার্গেট' => '0',
            'মুলতবি' => '0',
            'month' => '01',
            'year' => '2022',
            'creator' => '1',
            'slug' => 'sodosso-name',
            'status' => '1',
        ]);
        DB::table('man_powers')->insert([
            'unique_id' => '01_2022_1',
            'man_power_role_id' => '2',
            'পুর্বের_সংখ্যা' => '0',
            'বর্তমান_সংখ্যা' => '1',
            'বৃদ্ধি_সংখ্যা' => '1',
            'ঘাটতি_সংখ্যা' => '0',
            'বাস্তবায়ন_হার' =>'0',
            'টার্গেট' => '0',
            'মুলতবি' => '0',
            'month' => '01',
            'year' => '2022',
            'creator' => '1',
            'slug' => 'sodosso-name',
            'status' => '1',
        ]);
        DB::table('man_powers')->insert([
            'unique_id' => '01_2022_1',
            'man_power_role_id' => '3',
            'পুর্বের_সংখ্যা' => '0',
            'বর্তমান_সংখ্যা' => '1',
            'বৃদ্ধি_সংখ্যা' => '1',
            'ঘাটতি_সংখ্যা' => '0',
            'বাস্তবায়ন_হার' =>'0',
            'টার্গেট' => '0',
            'মুলতবি' => '0',
            'month' => '01',
            'year' => '2022',
            'creator' => '1',
            'slug' => 'sodosso-name',
            'status' => '1',
        ]);
        DB::table('man_powers')->insert([
            'unique_id' => '01_2022_1',
            'man_power_role_id' => '4',
            'পুর্বের_সংখ্যা' => '0',
            'বর্তমান_সংখ্যা' => '1',
            'বৃদ্ধি_সংখ্যা' => '1',
            'ঘাটতি_সংখ্যা' => '0',
            'বাস্তবায়ন_হার' =>'0',
            'টার্গেট' => '0',
            'মুলতবি' => '0',
            'month' => '01',
            'year' => '2022',
            'creator' => '1',
            'slug' => 'sodosso-name',
            'status' => '1',
        ]);
        DB::table('man_powers')->insert([
            'unique_id' => '01_2022_1',
            'man_power_role_id' => '5',
            'পুর্বের_সংখ্যা' => '0',
            'বর্তমান_সংখ্যা' => '2',
            'বৃদ্ধি_সংখ্যা' => '1',
            'ঘাটতি_সংখ্যা' => '0',
            'বাস্তবায়ন_হার' =>'0',
            'টার্গেট' => '0',
            'মুলতবি' => '0',
            'month' => '01',
            'year' => '2022',
            'creator' => '1',
            'slug' => 'sodosso-name',
            'status' => '1',
        ]);
    }
}
