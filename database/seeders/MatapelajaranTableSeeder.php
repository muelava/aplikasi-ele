<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Seeder;

class MatapelajaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapel = [
            [
                'mapel' => 'Bahasa Indonesia'
            ],
            [
                'mapel' => 'Matematika'
            ],
        ];
        Mapel::insert($mapel);
    }
}
