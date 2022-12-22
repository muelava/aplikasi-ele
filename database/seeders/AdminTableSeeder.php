<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin;
        $admin->nama = 'Admin';
        $admin->username = '123';
        $admin->role = 'admin';
        $admin->email = 'admin@binaikhwani.sch.id';
        $admin->no_handphone = '6285710756838';
        $admin->password = '$2y$10$9ZNSBjnz0Wyx5fSRxBs1COmc4OeV.BGWlID5L0YKw1iJ7tEkvtsuO';
        $admin->save();
    }
}
