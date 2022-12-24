<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(settingSeeder::class);
        $this->call(createAdminSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
