<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Guru;
        $admin->nip = '123';
        $admin->nama = 'Guru';
        $admin->email = 'guru@binaikhwani.sch.id';
        $admin->role = 'guru';
        $admin->no_handphone = '6285710756838';
        $admin->tanggal_lahir = '19980505';
        $admin->password = '$2y$10$9ZNSBjnz0Wyx5fSRxBs1COmc4OeV.BGWlID5L0YKw1iJ7tEkvtsuO';
        $admin->save();
    }
}
