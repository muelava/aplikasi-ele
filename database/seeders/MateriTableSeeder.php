<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MateriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materi = [
            [
                'mata_pelajaran_id' => '1',
                'guru_id' => '1',
                'kelas_id' => '1',
                'materi' => 'Phytagoras',
                'deskripsi' => 'Belajar phytagoras',
                'dok_materi' => null,
            ]
        ];
        DB::table('materi')->insert($materi);
    }
}
