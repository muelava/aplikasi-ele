<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Mapel;

use Illuminate\Http\File;
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

        return view('guru.pages.materi', [
            'active' => 'materi',
            'mapels' => $mapels,
            'kelass' => $kelass,
            'materis' => $materis,
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
