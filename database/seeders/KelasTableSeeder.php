<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = new Kelas;
        $kelas -> jenjang = 'smp';
        $kelas -> kelas = 'VII A';
        $kelas -> save();
    }
}
