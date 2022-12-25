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

    // crud guru
    Route::get('/administrator/data-guru', [AdministratorController::class, 'data_guru'])->name('data-guru');
    Route::post('/administrator/data-guru/tambah', [AdministratorController::class, 'tambah_guru']);
    Route::get('/administrator/data-guru/hapus/{id_guru}', [AdministratorController::class, 'delete_guru']);
    Route::get('/administrator/data-guru/lihat/{id_guru}', [AdministratorController::class, 'lihat_guru']);
    Route::post('/administrator/data-guru/ubah/{id_guru}', [AdministratorController::class, 'ubah_guru']);

    // crud siswa
    Route::get('/administrator/data-siswa', [AdministratorController::class, 'data_siswa'])->name('data-siswa');
    Route::post('/administrator/data-siswa/tambah', [AdministratorController::class, 'tambah_siswa']);
    Route::get('/administrator/data-siswa/hapus/{id_siswa}', [AdministratorController::class, 'delete_siswa']);
    Route::get('/administrator/data-siswa/lihat/{id_siswa}', [AdministratorController::class, 'lihat_siswa']);
    Route::post('/administrator/data-siswa/ubah/{id_siswa}', [AdministratorController::class, 'ubah_siswa']);

});

// route halaman guru
Route::group(['middleware' => ['auth:guru']], function() {
    Route::get('/guru', [GuruController::class, 'index']);
});

// route halaman course
Route::group(['middleware' => ['auth:siswa,guru']], function() {
    Route::get('/courses', [CoursesController::class, 'index']);
});

// crud siswa
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// logout
Route::post('/logout', [LoginController::class, 'logout']);
