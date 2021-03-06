<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KejuruanController;
use App\Http\Controllers\WaktuController;
use App\Models\Pegawai;
use Illuminate\Support\Facades\App;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');

Route::get('/logout', [AuthController::class, 'Logout']);



Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::group(['middleware' => ['auth', 'checkRole:admin,siswa,guru']], function () {

        Route::get('/index', [LayoutController::class, 'master']);
    });

    Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {

        // siswa
        Route::resource('ajax-crud', SiswaController::class);
        Route::post('ajax-crud/update', [SiswaController::class, 'update'])->name('ajax-crud.update');
        Route::get('ajax-crud/destroy/{id}', [SiswaController::class, 'destroy']);

        // pegawai
        Route::resource('ajax-pegawai', PegawaiController::class);
        Route::post('ajax-pegawai/update', [PegawaiController::class, 'update'])->name('ajax-pegawai.update');
        Route::get('ajax-pegawai/destroy/{id}', [PegawaiController::class, 'destroy']);

        // ruangan
        Route::resource('ajax-ruangan', RuanganController::class);
        Route::post('ajax-ruangan/update', [RuanganController::class, 'update'])->name('ajax-ruangan.update');
        Route::get('/ajax-ruangan/destroy/{id}', [RuanganController::class, 'destroy']);

        // Mata Pelajaran
        Route::resource('ajax-mapel', MapelController::class);
        Route::post('ajax-mapel/update', [MapelController::class, 'update'])->name('ajax-mapel.update');
        Route::get('/ajax-mapel/destroy/{id}', [MapelController::class, 'destroy'])->name('ajax-mapel.delete');

        // Kejuruan
        Route::resource('ajax-kejuruan', KejuruanController::class);
        route::post('ajax-kejuruan/update', [KejuruanController::class, 'update'])->name('ajax-kejuruan.update');
        route::get('/ajax-kejuruan/destroy/{id}', [KejuruanController::class, 'destroy'])->name('ajax-kejuruan.delete');

        // waktu
        Route::resource('ajax-waktu', WaktuController::class);
        Route::post('ajax-waktu/update', [WaktuController::class, 'update'])->name('ajax-waktu.update');
        route::get('/ajax-waktu/delete/{id}', [WaktuController::class, 'destroy']);
    });
});
