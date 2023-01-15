<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\SiswaModel;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Mapel;
use App\Models\Tugas;
use App\Models\Jadwal;
use App\Models\Diskusi;
use App\Models\SubDiskusi;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $siswa = SiswaModel::where('id', auth()->id())->first();
        $materis = Materi::where('kelas_id', $siswa->kelas_id)->get();
        
        return view('courses.index', [
            'active' => 'course',
            'materis' => $materis,
        ]);
    }
}
