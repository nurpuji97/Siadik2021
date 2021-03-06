<?php

use App\Http\Controllers\API\AuthController as APIAuthController;
use App\Http\Controllers\API\KejuruanController;
use App\Http\Controllers\API\MapelController;
use App\Http\Controllers\API\PegawaiController;
use App\Http\Controllers\API\RuanganController;
use App\Http\Controllers\API\SiswaController;
use App\Http\Controllers\API\WaktuController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayoutController;
use App\Models\Ruangan;
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
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::post('/siswa', [SiswaController::class, 'create']);
    Route::get('/siswa/{id}', [SiswaController::class, 'edit']);
    Route::put('/siswa/{id}', [SiswaController::class, 'update']);
    Route::delete('/siswa/{id}', [SiswaController::class, 'delete']);

    // route pegawai
    Route::get('/pegawai', [PegawaiController::class, 'index']);
    Route::post('/pegawai', [PegawaiController::class, 'create']);
    Route::get('/pegawai/{id}', [PegawaiController::class, 'edit']);
    Route::put('/pegawai/{id}', [PegawaiController::class, 'update']);
    Route::delete('/pegawai/{id}', [PegawaiController::class, 'delete']);

    // route ruangan
    Route::get('/ruangan', [RuanganController::class, 'index']);
    Route::post('/ruangan', [RuanganController::class, 'create']);
    Route::get('/ruangan/{id}', [RuanganController::class, 'edit']);
    Route::put('/ruangan/{id}', [RuanganController::class, 'update']);
    Route::delete('/ruangan/{id}', [RuanganController::class, 'delete']);

    // route mapel
    Route::get('/mapel', [MapelController::class, 'index']);
    Route::post('/mapel', [MapelController::class, 'create']);
    Route::get('/mapel/{id}', [MapelController::class, 'edit']);
    Route::put('/mapel/{id}', [MapelController::class, 'update']);
    Route::delete('/mapel/{id}', [MapelController::class, 'delete']);

    // route kejuruan
    route::get('/kejuruan', [KejuruanController::class, 'index']);
    route::post('/kejuruan', [KejuruanController::class, 'create']);
    route::get('/kejuruan/{id}', [KejuruanController::class, 'edit']);
    route::put('/kejuruan/{id}', [KejuruanController::class, 'update']);
    route::delete('/kejuruan/{id}', [KejuruanController::class, 'delete']);

    // route waktu
    route::get('/waktu', [WaktuController::class, 'index']);
    route::post('/waktu', [WaktuController::class, 'create']);
    route::get('/waktu/{id}', [WaktuController::class, 'edit']);
    route::put('/waktu/{id}', [WaktuController::class, 'update']);
    route::delete('/waktu/{id}', [WaktuController::class, 'delete']);

    // route siswa dan user
    Route::post('/postsiswa', [SiswaController::class, 'createSiswa']);
    Route::post('/addUserUpdateid/{id}', [SiswaController::class, 'updateSiswaAddUser']);

    // route pegawai dan user
    Route::post('/postpegawai', [PegawaiController::class, 'createPegawai']);
    Route::post('/addUserUpdateIdPegawai/{id}', [PegawaiController::class, 'UpdatePegawaiAddUser']);
});
