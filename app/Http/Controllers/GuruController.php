<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Mapel;

use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Carbon\Carbon;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materis = Materi::where('guru_id',auth()->id())->get();

        return view('guru.index', [
            'active' => 'beranda',
            'materis' => $materis,
        ]);
    }

    public function materi()
    {
        $materis = Materi::where('guru_id',auth()->id())->get();
        $mapels = Mapel::get();
        $kelass = Kelas::get();
        $card_materis = Materi::join('kelas', 'kelas.id', '=', 'materi.kelas_id')
                ->join('mata_pelajaran', 'mata_pelajaran.id', '=', 'materi.mata_pelajaran_id')
                ->select()
                ->addSelect('materi.id as materi_id', 'materi.created_at as materi_created_at', 'materi.updated_at as materi_updated_at')
                ->where('guru_id',auth()->id());

        if (request('kelas')) {
            $card_materis->where('kelas', request('kelas'))
                         ->where('materi', 'LIKE', '%'.request('materi').'%')
                         ->orderBy('materi.id', 'desc')
                         ->get();
        }else{
            $card_materis->where('materi', 'LIKE', '%'.request('materi').'%')
                         ->orderBy('materi.id', 'desc')
                         ->get();
        }

        return view('guru.pages.materi', [
            'active' => 'materi',
            'mapels' => $mapels,
            'kelass' => $kelass,
            'materis' => $materis,
            'card_materis' => $card_materis->orderBy('materi.id', 'desc')->get(),
        ]);
    }

    public function tambah_materi(Request $request)
    {

        $inputValidate =  $request->validate([
            'mata_pelajaran_id' => 'required',
            'kelas_id' => 'required',
            'materi' => 'required',
            'deskripsi' => 'required',
            'dok_materi' => 'mimes:pdf|max:4000'
        ]);
        $inputValidate['guru_id'] = auth()->id();

        $dok_materi = null;
        if ($request->hasFile('dok_materi')) {
            $file = $request->file('dok_materi');
            $filename = time().'_'.$file->getClientOriginalName();
            // File upload location
            $location = 'files/materies';
            // Upload file
            $file->move($location,$filename);
            $dok_materi = $filename;
        }
        $inputValidate['dok_materi'] = $dok_materi;

        Materi::create($inputValidate);
        return redirect('/guru/materi')->with('success', 'Materi berhasil ditambahkan');
    }

    public function ubah_materi(Request $request, $id_materi)
    {
        $inputValidate =  $request->validate([
            'mata_pelajaran_id' => 'required',
            'kelas_id' => 'required',
            'materi' => 'required',
            'deskripsi' => 'required',
        ]);
        $inputValidate['guru_id'] = auth()->id();

        if($request->file('dok_materi')->getSize()){
            $request->validate(['dok_materi' => 'mimes:pdf|max:4000']);
            
            // deleted exist file
            $materi = Materi::where('id', $id_materi)->first();
            if (File::exists(public_path('files/materies/'.$materi->dok_materi))) {
                File::delete(public_path('files/materies/'.$materi->dok_materi));
            }
            
            $file = $request->file('dok_materi');
            $filename = time().'_'.$file->getClientOriginalName();
            // File upload location
            $location = 'files/materies';
            // Upload file
            $file->move($location,$filename);
            $dok_materi = $filename;
            $inputValidate['dok_materi'] = $dok_materi;
        }


        $affected = DB::table('materi')->where('id', $id_materi)->update($inputValidate);
        
        return redirect('/guru/materi')->with('success', 'Materi berhasil diubah');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        //
    }
}
