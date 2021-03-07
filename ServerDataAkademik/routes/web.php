<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WEB\Datamaster\KejuruanController as DatamasterKejuruanController;
use App\Http\Controllers\WEB\Datamaster\MapelController as DatamasterMapelController;
use App\Http\Controllers\WEB\Datamaster\PegawaiController as DatamasterPegawaiController;
use App\Http\Controllers\WEB\Datamaster\RuanganController as DatamasterRuanganController;
use App\Http\Controllers\WEB\Datamaster\SiswaController as DatamasterSiswaController;
use App\Http\Controllers\WEB\Datamaster\WaktuController as DatamasterWaktuController;
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

        Route::get('/index', [AuthController::class, 'master']);
    });

    Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {

        // siswa
        Route::resource('ajax-crud', DatamasterSiswaController::class);
        Route::post('ajax-crud/update', [DatamasterSiswaController::class, 'update'])->name('ajax-crud.update');
        Route::get('ajax-crud/destroy/{id}', [DatamasterSiswaController::class, 'destroy']);

        // pegawai
        Route::resource('ajax-pegawai', DatamasterPegawaiController::class);
        Route::post('ajax-pegawai/update', [DatamasterPegawaiController::class, 'update'])->name('ajax-pegawai.update');
        Route::get('ajax-pegawai/destroy/{id}', [DatamasterPegawaiController::class, 'destroy']);

        // ruangan
        Route::resource('ajax-ruangan', DatamasterRuanganController::class);
        Route::post('ajax-ruangan/update', [DatamasterRuanganController::class, 'update'])->name('ajax-ruangan.update');
        Route::get('/ajax-ruangan/destroy/{id}', [DatamasterRuanganController::class, 'destroy']);

        // Mata Pelajaran
        Route::resource('ajax-mapel', DatamasterMapelController::class);
        Route::post('ajax-mapel/update', [DatamasterMapelController::class, 'update'])->name('ajax-mapel.update');
        Route::get('/ajax-mapel/destroy/{id}', [DatamasterMapelController::class, 'destroy'])->name('ajax-mapel.delete');

        // Kejuruan
        Route::resource('ajax-kejuruan', DatamasterKejuruanController::class);
        route::post('ajax-kejuruan/update', [DatamasterKejuruanController::class, 'update'])->name('ajax-kejuruan.update');
        route::get('/ajax-kejuruan/destroy/{id}', [DatamasterKejuruanController::class, 'destroy'])->name('ajax-kejuruan.delete');

        // waktu
        Route::resource('ajax-waktu', DatamasterWaktuController::class);
        Route::post('ajax-waktu/update', [DatamasterWaktuController::class, 'update'])->name('ajax-waktu.update');
        route::get('/ajax-waktu/delete/{id}', [DatamasterWaktuController::class, 'destroy']);
    });
});
