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
        $this->call([
            AdminTableSeeder::class,
            GuruTableSeeder::class,
            SiswaTableSeeder::class,
            KelasTableSeeder::class,
            MatapelajaranTableSeeder::class,
            // MateriTableSeeder::class,
        ]);
    }
}
