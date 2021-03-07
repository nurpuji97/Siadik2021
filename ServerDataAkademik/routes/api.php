<?php

use App\Http\Controllers\API\AuthController as APIAuthController;
use App\Http\Controllers\API\Datamaster\KejuruanController as DatamasterKejuruanController;
use App\Http\Controllers\API\Datamaster\MapelController as DatamasterMapelController;
use App\Http\Controllers\API\Datamaster\PegawaiController as DatamasterPegawaiController;
use App\Http\Controllers\API\Datamaster\RuanganController as DatamasterRuanganController;
use App\Http\Controllers\API\Datamaster\SiswaController as DatamasterSiswaController;
use App\Http\Controllers\API\Datamaster\WaktuController as DatamasterWaktuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

route::post('/login', [APIAuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum', 'checkRole:admin,siswa,guru']], function () {

    // route logout
    Route::get('/logout', [APIAuthController::class, 'logout']);
});

Route::group(['middleware' => ['auth:sanctum', 'checkRole:admin']], function () {

    // route siswa
    Route::get('/siswa', [DatamasterSiswaController::class, 'index']);
    Route::post('/siswa', [DatamasterSiswaController::class, 'create']);
    Route::get('/siswa/{id}', [DatamasterSiswaController::class, 'edit']);
    Route::put('/siswa/{id}', [DatamasterSiswaController::class, 'update']);
    Route::delete('/siswa/{id}', [DatamasterSiswaController::class, 'delete']);

    // route pegawai
    Route::get('/pegawai', [DatamasterPegawaiController::class, 'index']);
    Route::post('/pegawai', [DatamasterPegawaiController::class, 'create']);
    Route::get('/pegawai/{id}', [DatamasterPegawaiController::class, 'edit']);
    Route::put('/pegawai/{id}', [DatamasterPegawaiController::class, 'update']);
    Route::delete('/pegawai/{id}', [DatamasterPegawaiController::class, 'delete']);

    // route ruangan
    Route::get('/ruangan', [DatamasterRuanganController::class, 'index']);
    Route::post('/ruangan', [DatamasterRuanganController::class, 'create']);
    Route::get('/ruangan/{id}', [DatamasterRuanganController::class, 'edit']);
    Route::put('/ruangan/{id}', [DatamasterRuanganController::class, 'update']);
    Route::delete('/ruangan/{id}', [DatamasterRuanganController::class, 'delete']);

    // route mapel
    Route::get('/mapel', [DatamasterMapelController::class, 'index']);
    Route::post('/mapel', [DatamasterMapelController::class, 'create']);
    Route::get('/mapel/{id}', [DatamasterMapelController::class, 'edit']);
    Route::put('/mapel/{id}', [DatamasterMapelController::class, 'update']);
    Route::delete('/mapel/{id}', [DatamasterMapelController::class, 'delete']);

    // route kejuruan
    route::get('/kejuruan', [DatamasterKejuruanController::class, 'index']);
    route::post('/kejuruan', [DatamasterKejuruanController::class, 'create']);
    route::get('/kejuruan/{id}', [DatamasterKejuruanController::class, 'edit']);
    route::put('/kejuruan/{id}', [DatamasterKejuruanController::class, 'update']);
    route::delete('/kejuruan/{id}', [DatamasterKejuruanController::class, 'delete']);

    // route waktu
    route::get('/waktu', [DatamasterWaktuController::class, 'index']);
    route::post('/waktu', [DatamasterWaktuController::class, 'create']);
    route::get('/waktu/{id}', [DatamasterWaktuController::class, 'edit']);
    route::put('/waktu/{id}', [DatamasterWaktuController::class, 'update']);
    route::delete('/waktu/{id}', [DatamasterWaktuController::class, 'delete']);

    // route siswa dan user
    Route::post('/postsiswa', [DatamasterSiswaController::class, 'createSiswa']);
    Route::post('/addUserUpdateid/{id}', [DatamasterSiswaController::class, 'updateSiswaAddUser']);

    // route pegawai dan user
    Route::post('/postpegawai', [DatamasterPegawaiController::class, 'createPegawai']);
    Route::post('/addUserUpdateIdPegawai/{id}', [DatamasterPegawaiController::class, 'UpdatePegawaiAddUser']);
});
