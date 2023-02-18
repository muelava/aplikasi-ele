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
            'siswa' => $siswa,
        ]);
    }

    public function diskusi($materi_id)
    {
        $diskusis = Diskusi::where('materi_id', $materi_id)->orderBy('id', 'desc')->get();
        $materi = Materi::where('id', $materi_id)->first();

        return view('courses.pages.materi-diskusi',[
            'active' => 'course',
            'materi' => $materi,
            'diskusis' => $diskusis,
        ]);
    }

    public function tambah_diskusi(Request $request, $id_materi){
        $inputValidate =  $request->validate([
            'komentar' => 'required',
        ]);
        
        $inputValidate['materi_id'] = $id_materi;

        if (auth('guru')->check()) {
            $inputValidate['guru_id'] = auth()->id();
            $inputValidate['siswa_id'] = null;
        }elseif (auth('siswa')->check()) {
            $inputValidate['guru_id'] = null;
            $inputValidate['siswa_id'] = auth()->id();

        }

        Diskusi::create($inputValidate);
        return redirect('/courses/materi/'.$id_materi)->with('success', 'Diskusi baru telah ditambahkan');
    }

    public function tambah_sub_diskusi(Request $request, $id_diskusi){
        $inputValidate =  $request->validate([
            'komentar' => 'required',
        ]);
        
        $inputValidate['diskusi_id'] = $id_diskusi;

        if (auth('siswa')->check()) {
            $inputValidate['siswa_id'] = auth()->id();
            $inputValidate['guru_id'] = null;
        };

        SubDiskusi::create($inputValidate);
        return back()->with('success', 'Balasan telah ditambahkan');
    }

    public function tugas($materi_id)
    {
        $tugas = Tugas::where('materi_id', $materi_id)->first();
        $materi = Materi::where('id', $materi_id)->first();

        return view('courses.pages.materi-tugas',[
            'active' => 'materi',
            'tugas' => $tugas,
            'materi' => $materi,
        ]);
    }

    public function pengaturan()
    {
        $siswa = SiswaModel::where('id',auth()->id())->first();

        return view('courses.pages.pengaturan', [
            'active' => 'pengaturan',
            'siswa' => $siswa,
        ]);
    }
}
