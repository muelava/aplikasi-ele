<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

// login admin
Route::get('/admin/login', [LoginController::class, 'login_admin'])->name('login')->middleware('guest');
Route::post('/admin/login', [LoginController::class, 'authenticate']);

// route halaman administrator
Route::group(['middleware' => ['auth:admin','CekLevel:1']], function() {
    
    // dashboard
    Route::get('/administrator', [AdministratorController::class, 'index']);

    // crud data guru
    Route::get('/administrator/data-guru', [AdministratorController::class, 'data_guru'])->name('data-guru');
    Route::post('/administrator/data-guru/tambah', [AdministratorController::class, 'tambah_guru']);
    Route::get('/administrator/data-guru/hapus/{id_guru}', [AdministratorController::class, 'delete_guru']);
    Route::get('/administrator/data-guru/lihat/{id_guru}', [AdministratorController::class, 'lihat_guru']);
    Route::post('/administrator/data-guru/ubah/{id_guru}', [AdministratorController::class, 'ubah_guru']);

    // crud data siswa
    Route::get('/administrator/data-siswa', [AdministratorController::class, 'data_siswa'])->name('data-siswa');
    Route::post('/administrator/data-siswa/tambah', [AdministratorController::class, 'tambah_siswa']);
    Route::get('/administrator/data-siswa/hapus/{id_siswa}', [AdministratorController::class, 'delete_siswa']);
    Route::get('/administrator/data-siswa/lihat/{id_siswa}', [AdministratorController::class, 'lihat_siswa']);
    Route::post('/administrator/data-siswa/ubah/{id_siswa}', [AdministratorController::class, 'ubah_siswa']);

    // crud data kelas
    Route::get('/administrator/data-kelas', [AdministratorController::class, 'data_kelas'])->name('data-kelas');
    Route::post('/administrator/data-kelas/tambah', [AdministratorController::class, 'tambah_kelas']);
    Route::get('/administrator/data-kelas/hapus/{id_kelas}', [AdministratorController::class, 'delete_kelas']);
    Route::get('/administrator/data-kelas/ubah/{id_kelas}', [AdministratorController::class, 'lihat_kelas']);
    Route::post('/administrator/data-kelas/ubah/{id_kelas}', [AdministratorController::class, 'ubah_kelas']);

    // crud data mapel
    Route::get('/administrator/data-mata-pelajaran', [AdministratorController::class, 'data_mapel'])->name('data-mapel');
    Route::post('/administrator/data-mapel/tambah', [AdministratorController::class, 'tambah_mapel']);
    Route::get('/administrator/data-mata-pelajaran/hapus/{id_mapel}', [AdministratorController::class, 'delete_mapel']);
    Route::get('/administrator/data-mata-pelajaran/ubah/{id_mapel}', [AdministratorController::class, 'lihat_mapel']);
    Route::post('/administrator/data-mata-pelajaran/ubah/{id_mapel}', [AdministratorController::class, 'ubah_mapel']);

    // crud pengumuman
    Route::get('/administrator/pengumuman', [AdministratorController::class, 'pengumuman'])->name('pengumuman');
    Route::post('/administrator/pengumuman/tambah', [AdministratorController::class, 'tambah_pengumuman']);
    Route::get('/administrator/pengumuman/detail/{id_pengumuman}', [AdministratorController::class, 'lihat_pengumuman'])->name('lihat-pengumuman');
    Route::post('/administrator/pengumuman/ubah/{id_pengumuman}', [AdministratorController::class, 'ubah_pengumuman']);
    Route::get('/administrator/pengumuman/hapus/{id_pengumuman}', [AdministratorController::class, 'delete_pengumuman']);
    
    // crud kelas siswa
    Route::get('/administrator/kelas-siswa', [AdministratorController::class, 'kelas_siswa'])->name('kelas-siswa');
    Route::get('/administrator/class-data', [AdministratorController::class, 'class_data']);

    // crud pengumuman
    Route::get('/administrator/jadwal-pelajaran', [AdministratorController::class, 'jadwal_pelajaran'])->name('jadwal-pelajaran');
    Route::post('/administrator/jadwal-pelajaran/tambah', [AdministratorController::class, 'tambah_jadwal_pelajaran']);
    Route::post('/administrator/jadwal-pelajaran/ubah/{id_jadwal}', [AdministratorController::class, 'ubah_jadwal_pelajaran']);

});

// route halaman guru
Route::group(['middleware' => ['auth:guru']], function() {

    Route::get('/guru', [GuruController::class, 'index'])->name('guru-beranda');
    Route::get('/guru/jadwal', [GuruController::class, 'jadwal'])->name('guru-jadwal');

    // crud materi
    Route::get('/guru/materi', [GuruController::class, 'materi'])->name('guru-materi');
    Route::post('/guru/materi/tambah', [GuruController::class, 'tambah_materi']);
    Route::post('/guru/materi/ubah/{id_materi}', [GuruController::class, 'ubah_materi']);
    Route::get('/guru/materi/hapus/{id_materi}', [GuruController::class, 'delete_materi']);
    
    // crud tugas
    Route::get('/guru/materi/tugas/{materi_id}', [GuruController::class, 'tugas']);
    Route::post('/guru/materi/tugas/tambah/{id_materi}', [GuruController::class, 'tambah_tugas']);
    Route::post('/guru/materi/tugas/ubah/{id_tugas}', [GuruController::class, 'ubah_tugas']);

    //crud profile
    Route::get('/guru/pengaturan', [GuruController::class, 'pengaturan'])->name('guru-pengaturan');

    // crud diskusi
    Route::get('/guru/materi/diskusi/{materi_id}', [GuruController::class, 'diskusi']);
    Route::post('/guru/materi/diskusi/tambah/{id_materi}', [GuruController::class, 'tambah_diskusi']);
    Route::post('/guru/materi/sub-diskusi/tambah/{id_diskusi}', [GuruController::class, 'tambah_sub_diskusi']);

    // crud daftar tugas
    Route::get('/guru/task-list', [GuruController::class, 'get_data_daftar_tugas']);
    Route::get('/guru/daftar-tugas', [GuruController::class, 'daftar_tugas'])->name('guru-daftar-tugas');

    // crud nilai
    Route::get('/guru/value-data/{sub_tugas_id}', [GuruController::class, 'get_data_nilai']);
    Route::get('/guru/nilai', [GuruController::class, 'nilai'])->name('nilai');
    Route::post('/guru/nilai/tambah/{sub_tugas_id}', [GuruController::class, 'tambah_nilai']);
    Route::post('/guru/nilai/ubah/{sub_tugas_id}', [GuruController::class, 'ubah_nilai']);

});

// route halaman course
Route::group(['middleware' => ['auth:siswa']], function() {
    Route::get('/courses', [CoursesController::class, 'index'])->name('courses');
    Route::get('/courses/jadwal', [CoursesController::class, 'jadwal'])->name('courses-jadwal');

    // crud diskusi
    Route::get('/courses/materi/{materi_id}', [CoursesController::class, 'diskusi']);
    Route::post('/courses/materi/tambah-diskusi/{id_materi}', [CoursesController::class, 'tambah_diskusi']);
    Route::post('/courses/materi/tambah-sub-diskusi/{id_diskusi}', [CoursesController::class, 'tambah_sub_diskusi']);

    // crud tugas
    Route::get('/courses/materi/tugas/{materi_id}', [CoursesController::class, 'tugas']);
    Route::post('/courses/materi/tugas/tambah/{id_tugas}', [CoursesController::class, 'tambah_sub_tugas']);
    Route::post('/courses/materi/tugas/ubah/{id_tugas}', [CoursesController::class, 'ubah_sub_tugas']);

    //crud profile
    Route::get('/siswa/pengaturan', [CoursesController::class, 'pengaturan'])->name('siswa-pengaturan');

    // crud nilai
    Route::get('/courses/value-data', [CoursesController::class, 'get_nilai']);
    Route::get('/courses/nilai', [CoursesController::class, 'nilai'])->name('nilai');

});

// crud siswa
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// logout
Route::post('/logout', [LoginController::class, 'logout']);
