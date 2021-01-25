<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SiswaController;
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

        // Route::get('/siswa', [SiswaController::class, 'index']);
        // Route::post('/siswaPost', [SiswaController::class, 'postSiswa'])->name('siswa.post');
        // route::get('/siswa/{id}', [SiswaController::class, 'SiswaId']);

        // siswa
        Route::resource('ajax-crud', SiswaController::class);
        Route::post('ajax-crud/update', [SiswaController::class, 'update'])->name('ajax-crud.update');
        Route::get('ajax-crud/destroy/{id}', [SiswaController::class, 'destroy']);

        // pegawai
        Route::resource('ajax-pegawai', PegawaiController::class);
        Route::post('ajax-pegawai/update', [PegawaiController::class, 'update'])->name('ajax-pegawai.update');
        Route::get('ajax-pegawai/destroy/{id}', [PegawaiController::class, 'destroy']);
    });
});
