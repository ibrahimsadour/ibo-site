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
        // استدعاء Seeders
        $seeders = [
            UserSeeder::class,
            CarSeeder::class,
            CitySeeder::class,
            SettingSeeder::class,
        ];

        // تشغيل Seeders
        $this->call($seeders);
    }
}
