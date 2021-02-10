<?php

use App\Http\Controllers\API\AuthController as APIAuthController;
use App\Http\Controllers\API\SiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayoutController;
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


Route::group(['middleware' => ['auth:sanctum', 'checkRole:admin,siswa,guru']], function () {

    // route logout
    Route::get('/logout', [APIAuthController::class, 'logout']);
});

Route::group(['middleware' => ['auth:sanctum', 'checkRole:admin']], function () {

    // route siswa
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::post('/postsiswa', [SiswaController::class, 'createSiswa']);
});

route::post('/login', [APIAuthController::class, 'login']);
