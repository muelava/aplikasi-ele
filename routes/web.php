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
    Route::get('/administrator', [AdministratorController::class, 'index']);
    Route::get('/administrator/data-guru', [AdministratorController::class, 'data_guru']);
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

// crud guru
Route::post('/administrator/data-guru/tambah', [RegisterController::class, 'storeGuru']);

// logout
Route::post('/logout', [LoginController::class, 'logout']);
