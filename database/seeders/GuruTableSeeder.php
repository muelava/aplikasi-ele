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
        // $guru = new Guru;
        // $guru->nip = '123';
        // $guru->nama = 'Guru';
        // $guru->email = 'guru@binaikhwani.sch.id';
        // $guru->role = 'guru';
        // $guru->no_handphone = '6285710756838';
        // $guru->tanggal_lahir = '1998-05-05';
        // $guru->password = '$2y$10$9ZNSBjnz0Wyx5fSRxBs1COmc4OeV.BGWlID5L0YKw1iJ7tEkvtsuO';
        // $guru->save();

        $gurus = [
            [
                'nip' => '123456789',
                'nama' => 'Iwa Awaludin, S.Pd',
                'email' => 'iwa.awaludin@binaikhwani.sch.id',
                'role' => 'guru',
                'no_handphone' => '6285710756838',
                'tanggal_lahir' => '19980505',
                'password' => '$2y$10$9ZNSBjnz0Wyx5fSRxBs1COmc4OeV.BGWlID5L0YKw1iJ7tEkvtsuO',
            ],
            [
                'nip' => '987654321',
                'nama' => 'Yusri Supriatin, S.Pd.I',
                'email' => 'yusri.supriatin@binaikhwani.sch.id',
                'role' => 'guru',
                'no_handphone' => '6285710756845',
                'tanggal_lahir' => '19990101',
                'password' => '$2y$10$9ZNSBjnz0Wyx5fSRxBs1COmc4OeV.BGWlID5L0YKw1iJ7tEkvtsuO',
            ],
            [
                'nip' => '214231223',
                'nama' => 'Siti Nurjanah',
                'email' => 'siti.nurjanah@binaikhwani.sch.id',
                'role' => 'guru',
                'no_handphone' => '6285710756866',
                'tanggal_lahir' => '19900220',
                'password' => '$2y$10$9ZNSBjnz0Wyx5fSRxBs1COmc4OeV.BGWlID5L0YKw1iJ7tEkvtsuO',
            ],
            [
                'nip' => '738583223',
                'nama' => 'Faesal Ali',
                'email' => 'faesal.ali@binaikhwani.sch.id',
                'role' => 'guru',
                'no_handphone' => '6285710756877',
                'tanggal_lahir' => '19930303',
                'password' => '$2y$10$9ZNSBjnz0Wyx5fSRxBs1COmc4OeV.BGWlID5L0YKw1iJ7tEkvtsuO',
            ],
            [
                'nip' => '872848287',
                'nama' => 'Ardistia, S.Pd',
                'email' => 'ardistia.spd@binaikhwani.sch.id',
                'role' => 'guru',
                'no_handphone' => '6285710756888',
                'tanggal_lahir' => '19940404',
                'password' => '$2y$10$9ZNSBjnz0Wyx5fSRxBs1COmc4OeV.BGWlID5L0YKw1iJ7tEkvtsuO',
            ],
        ];

        foreach ($gurus as $guruData) {
            Guru::create($guruData);
        }
    }
}
