<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Siswa;
        $admin->kelas_id = '1';
        $admin->nis = '321';
        $admin->nama = 'Siswa';
        $admin->email = 'siswa@binaikhwani.sch.id';
        $admin->role = 'siswa';
        $admin->no_handphone = '6285710756838';
        $admin->tempat_lahir = 'Bogor';
        $admin->jenis_kelamin = 'laki-laki';
        $admin->tanggal_lahir = '20050505';
        $admin->agama = 'islam';
        $admin->tahun_masuk = '2019';
        $admin->password = '$2y$10$9ZNSBjnz0Wyx5fSRxBs1COmc4OeV.BGWlID5L0YKw1iJ7tEkvtsuO';
        $admin->save();
    }
}
