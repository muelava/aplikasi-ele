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
use App\Models\SubTugas;
use App\Models\Nilai;

use File;
use Illuminate\Support\Facades\DB;
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

    public function jadwal()
    {
        $jadwal = Jadwal::first();

        return view('courses.pages.jadwal', [
            'active' => 'courses-jadwal',
            'jadwal' => $jadwal,
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
        $sub_tugas = SubTugas::where('siswa_id', auth()->id())->where('tugas_id', $tugas->id)->first();

        return view('courses.pages.materi-tugas',[
            'active' => 'materi',
            'tugas' => $tugas,
            'materi' => $materi,
            'sub_tugas' => $sub_tugas
        ]);
    }

    public function tambah_sub_tugas(Request $request, $id_tugas){
        $tugas = Tugas::where('id', $id_tugas)->first();

        $inputValidate =  $request->validate([
            'tugas' => 'required',
        ]);

        $dok_tugas = null;
        if ($request->hasFile('dok_tugas')) {
            $file = $request->file('dok_tugas');
            $filename = time().'_'.$file->getClientOriginalName();
            // File upload location
            $location = 'files/tugas';
            // Upload file
            $file->move($location,$filename);
            $dok_tugas = $filename;
        }
        $inputValidate['siswa_id'] = auth()->id();
        $inputValidate['dok_tugas'] = $dok_tugas;
        $inputValidate['tugas_id'] = $id_tugas;

        SubTugas::create($inputValidate);
        return redirect('/courses/materi/tugas/'.$tugas->materi_id)->with('success', 'Tugas berhasil terkirim');
    }

    public function ubah_sub_tugas(Request $request, $id_tugas){
        $sub_tugas = SubTugas::where('id', $id_tugas)->first();

        $inputValidate =  $request->validate([
            'tugas' => 'required',
        ]);

        if ($request->file('dok_tugas') !== null) {
            if($request->file('dok_tugas')->getSize()){
                $request->validate(['dok_tugas' => 'mimes:pdf|max:4000']);
                
                // deleted exist file
                $sub_tugas = SubTugas::where('id', $id_tugas)->first();
                if (File::exists(public_path('files/tugas/'.$sub_tugas->dok_tugas))) {
                    File::delete(public_path('files/tugas/'.$sub_tugas->dok_tugas));
                }
                
                $file = $request->file('dok_tugas');
                $filename = time().'_'.$file->getClientOriginalName();
                // File upload location
                $location = 'files/tugas';
                // Upload file
                $file->move($location,$filename);
                $dok_tugas = $filename;
                $inputValidate['dok_tugas'] = $dok_tugas;
            }
        }
        
        $affected = DB::table('sub_tugas')->where('id', $id_tugas)->update($inputValidate);
        return redirect('/courses/materi/tugas/'.$sub_tugas->tugas_id)->with('success', 'Tugas berhasil diubah');
    }

    // ================== BEGIN::nilai ================== 
    public function get_nilai()
    {

        $values = Nilai::join('sub_tugas', 'sub_tugas_id', 'sub_tugas.id')
        ->join('tugas', 'tugas_id', 'tugas.id')
        ->join('siswa', 'siswa_id', 'siswa.id')
        ->join('kelas', 'kelas_id', 'kelas.id')
        ->join('materi', 'materi_id', 'materi.id')
        ->join('mata_pelajaran', 'mata_pelajaran_id', 'mata_pelajaran.id')
        ->select('nilai.id', 'siswa.nama', 'kelas.kelas', 'mata_pelajaran.mapel', 'materi.materi', 'nilai.nilai')
        ->where('siswa_id', '=', auth()->id())
        ->get();
        
        $data = collect(
            [
            'data' => $values,
        ]
        )->toArray();

        return response()->json($data, 200);

    }

    public function nilai()
    {
        return view('courses.pages.nilai', [
            'active' => 'nilai'
        ]);
    }
    // ================== END::nilai ================== 

    public function pengaturan()
    {
        $siswa = SiswaModel::where('id',auth()->id())->first();

        return view('courses.pages.pengaturan', [
            'active' => 'pengaturan',
            'siswa' => $siswa,
        ]);
    }
}
