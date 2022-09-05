<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ManPowerAddProcess;
use App\Models\ManPowerRemoveProcess;
use App\Models\ManPowerRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        ManPowerAddProcess::truncate();
        ManPowerRole::truncate();
        ManPowerRemoveProcess::truncate();


        $this->call([
            ManPowerAddProcessSeeder::class,
            ManPowerRoleSeeder::class,
            ManPowerRemoveProcessSeeder::class
        ]);
    }
}
