<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\SiswaModel;
use App\Models\Mapel;
use App\Models\Pengumuman;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gurus = Guru::get();
        $kelass = Kelas::withCount('siswa')->get();

        return view('admin.index',[
            'active' => 'beranda',
            'gurus' => $gurus,
            'kelass' => $kelass,
        ]);
    }

    // ================== data guru ================== 
    public function data_guru()
    {
        $gurus = DB::table('guru')->get();
        
        return view('admin.pages.data-guru',[
            'active' => 'data-guru',
            'gurus' => $gurus
        ]);
    }

    public function lihat_guru($id_guru)
    {
        $guru = DB::table('guru')->where('id', $id_guru)->first();
        
        return view('admin.pages.data-guru-lihat',[
            'active' => 'data-guru',
            'guru' => $guru
        ]);
    }

    public function tambah_guru(Request $request)
    {
        $inputValidate =  $request->validate([
            'nip' => 'required | unique:guru,nip',
            'nama' => 'required',
            'email' => 'required | required|unique:guru,email',
            'tanggal_lahir' => 'required',
            'no_handphone' => 'required'
        ]);
        $inputValidate['role'] = 'guru';

        $get_tgl_lahir = date("d-m-y", strtotime($request->tanggal_lahir));
        $set_default_pass = str_replace("-","",$get_tgl_lahir);
        $inputValidate['password'] = Hash::make('bi#'.$set_default_pass);

        Guru::create($inputValidate);
        return redirect('/administrator/data-guru')->with('success', 'Data guru berhasil ditambahkan');
    }

    public function ubah_guru(Request $request, $id_guru)
    {
        $inputValidate =  $request->validate([
            'nip' => 'required | unique:guru,nip,'.$id_guru,
            'nama' => 'required',
            'email' => 'required | unique:guru,email,'.$id_guru,
            'tanggal_lahir' => 'required',
            'no_handphone' => 'required'
        ]);

        $affected = DB::table('guru')->where('id', $id_guru)->update($inputValidate);

        return redirect('/administrator/data-guru/lihat/'.$id_guru)->with('success', 'Data guru berhasil diubah');
    }
    // ================== /data guru ================== 

    // ================== data siswa ================== 
    public function data_siswa()
    {
        // $siswas = DB::table('siswa')->get();
        $siswas = SiswaModel::get();
        $kelass = Kelas::get();

        return view('admin.pages.data-siswa',[
            'active' => 'data-siswa',
            'siswas' => $siswas,
            'kelass' => $kelass
        ]);
    }

    public function lihat_siswa($id_siswa)
    {
        // $siswa = DB::table('siswa')->where('id', $id_siswa)->first();
        $siswa = SiswaModel::where('id', $id_siswa)->first();
        $kelass = Kelas::get();
        
        return view('admin.pages.data-siswa-lihat',[
            'active' => 'data-siswa',
            'siswa' => $siswa,
            'kelass' => $kelass
        ]);
    }

    public function tambah_siswa(Request $request)
    {
        $inputValidate =  $request->validate([
            'nis' => 'required | numeric | unique:siswa,nis',
            'nama' => 'required',
            'kelas_id' => 'required',
            'email' => 'required | unique:siswa,email',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_handphone' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tahun_masuk' => 'required',
        ]);
        $inputValidate['role'] = 'siswa';

        $get_tgl_lahir = date("d-m-y", strtotime($request->tanggal_lahir));
        $set_default_pass = str_replace("-","",$get_tgl_lahir);
        $inputValidate['password'] = Hash::make($set_default_pass);

        Siswa::create($inputValidate);
        return redirect('/administrator/data-siswa')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function ubah_siswa(Request $request, $id_siswa)
    {
        $inputValidate =  $request->validate([
            'nis' => 'required | unique:siswa,nis,'.$id_siswa,
            'kelas_id' => 'required',
            'nama' => 'required',
            'email' => 'required | unique:siswa,email,'.$id_siswa,
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_handphone' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tahun_masuk' => 'required',
        ]);

        $affected = DB::table('siswa')->where('id', $id_siswa)->update($inputValidate);

        return redirect('/administrator/data-siswa/lihat/'.$id_siswa)->with('success', 'Data siswa berhasil diubah');
    }
    // ================== /data siswa ================== 

    // ================== data kelas ================== 
    public function data_kelas()
    {
        // $kelass = DB::table('kelas')->get();
        $kelass = Kelas::get();

        return view('admin.pages.data-kelas',[
            'active' => 'data-kelas',
            'kelass' => $kelass
        ]);
    }

    public function lihat_kelas($id_kelas)
    {
        $kelas = DB::table('kelas')->where('id', $id_kelas)->first();
        
        return view('admin.pages.data-kelas-lihat',[
            'active' => 'data-kelas',
            'kelas' => $kelas
        ]);
    }

    public function tambah_kelas(Request $request)
    {
        $inputValidate =  $request->validate([
            'jenjang' => 'required',
            'kelas' => 'required | unique:kelas,kelas',
        ]);

        Kelas::create($inputValidate);
        return redirect('/administrator/data-kelas')->with('success', 'Data kelas berhasil ditambahkan');
    }

    public function ubah_kelas(Request $request, $id_kelas)
    {
        $inputValidate =  $request->validate([
            'jenjang' => 'required',
            'kelas' => 'required | unique:kelas,kelas,'.$id_kelas,
        ]);

        $affected = DB::table('kelas')->where('id', $id_kelas)->update($inputValidate);

        return redirect('/administrator/data-kelas')->with('success', 'Data kelas berhasil diubah');
    }
    // ================== /data kelas ================== 

    // ================== data mapel ================== 
    public function data_mapel()
    {
        $mapels = DB::table('mata_pelajaran')->get();

        return view('admin.pages.data-mapel', [
            'active' => 'data-mapel',
            'mapels' => $mapels
        ]);
    }

    public function tambah_mapel(Request $request)
    {
        $inputValidate =  $request->validate([
            'mapel' => 'required | unique:mata_pelajaran,mapel',
        ]);

        Mapel::create($inputValidate);
        return redirect('/administrator/data-mata-pelajaran')->with('success', 'Data Mata Pelajaran berhasil ditambahkan');
    }

    public function lihat_mapel($id_mapel)
    {
        $mapel = DB::table('mata_pelajaran')->where('id', $id_mapel)->first();
        
        return view('admin.pages.data-mapel-lihat',[
            'active' => 'data-mapel',
            'mapel' => $mapel
        ]);
    }

    public function ubah_mapel(Request $request, $id_mapel)
    {
        $inputValidate =  $request->validate([
            'mapel' => 'required | unique:mata_pelajaran,mapel,'.$id_mapel,
        ]);

        $affected = DB::table('mata_pelajaran')->where('id', $id_mapel)->update($inputValidate);

        return redirect('/administrator/data-mata-pelajaran')->with('success', 'Data Mata Pelajaran berhasil diubah');
    }
    // ================== /data mapel ================== 

    // ================== pengumuman ================== 
    public function pengumuman()
    {
        $pengumumans = Pengumuman::get();

        // dd($pengumumans);
        return view('admin.pages.pengumuman',[
            'active' => 'pengumuman',
            'pengumumans' => $pengumumans
        ]);
    }

    public function tambah_pengumuman(Request $request)
    {
        $inputValidate =  $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);
        
        $file_pengumuman = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            // File upload location
            $location = 'files/pengumuman';
            // Upload file
            $file->move($location,$filename);
            $file_pengumuman = $filename;
        }
        $inputValidate['file'] = $file_pengumuman;

        Pengumuman::create($inputValidate);
        return redirect('/administrator/pengumuman')->with('success', 'Pengumuman baru berhasil di publish');
    }
    // ================== /pengumuman ================== 


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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete_guru($id_guru)
    {
        DB::table('guru')->where('id', $id_guru)->delete();
        return redirect('/administrator/data-guru')->with('success', 'Data berhasil dihapus!');
    }

    public function delete_siswa($id_siswa)
    {
        DB::table('siswa')->where('id', $id_siswa)->delete();
        return redirect('/administrator/data-siswa')->with('success', 'Data berhasil dihapus!');
    }

    public function delete_kelas($id_kelas)
    {
        DB::table('kelas')->where('id', $id_kelas)->delete();
        return redirect('/administrator/data-kelas')->with('success', 'Data berhasil dihapus!');
    }

    public function delete_mapel($id_mapel)
    {
        DB::table('mata_pelajaran')->where('id', $id_mapel)->delete();
        return redirect('/administrator/data-mata-pelajaran')->with('success', 'Data berhasil dihapus!');
    }

    public function delete_pengumuman($id_pengumuman)
    {
        DB::table('pengumuman')->where('id', $id_pengumuman)->delete();
        return redirect('/administrator/pengumuman')->with('success', 'Pengumuman berhasil dihapus!');
    }
}
