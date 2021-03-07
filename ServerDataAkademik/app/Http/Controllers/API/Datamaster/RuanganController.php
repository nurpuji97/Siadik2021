<?php

namespace App\Http\Controllers\API\Datamaster;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

/**
 * kelas API RuanganController
 * 
 * kelas ini untuk CRUD(Cread Read Update Delete) ruangan laravel 8 Rest Api
 * 
 * @package LatihanProject2021
 * @subpackage Cummon
 * @version 1.0
 * @author Nur Pujiyanto <Nurpujiyanto1997@gmail.com>
 * 
 */
class RuanganController extends Controller
{
    /**
     * fungsi untuk menampilkan semua data ruangan
     * 
     * @return json respon message : success, ruangan : semua data ruangan 
     */
    public function index()
    {
        // tampilkan data
        $ruangan = Ruangan::all();

        // kembalikan nilai datasiswa
        return response()->json([
            'message' => 'Success',
            'siswa' => $ruangan
        ], 200);
    }

    /**
     * fungsi untuk membuat data ruangan
     * 
     * @param Request $request valid Request objek
     * @return json respon message : success, ruangan : menampilkan hasil input data ruangan 
     */
    public function create(Request $request)
    {
        // rules 
        $rules = array(
            'kode_ruangan' => 'required',
            'nama_ruangan' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // create data
        $ruangan = Ruangan::create($request->all());

        // response json
        return response()->json([
            'messages' => 'success',
            'data_ruangan' => $ruangan
        ], 200);
    }

    /**
     * fungsi untuk lihat data ruangan dengan parameter id
     * 
     * @param id $id
     * @return json respon message : success, data_ruangan : data ruangan
     */
    public function edit($id)
    {
        // cari data ruangan berdasarkan id
        $ruangan = Ruangan::find($id);

        // response json
        return response()->json([
            'messages' => 'success',
            'data_ruangan' => $ruangan
        ], 200);
    }

    /**
     * fungsi untuk update user_id ruangan dengan parameter id
     * 
     * @param id $id
     * @param Request $request valid Request objek
     * @return json respon message : success, data_ruangan : menampilkan hasil update data ruangan
     */
    public function update(Request $request, $id)
    {
        // cari data ruangan berdasarkan id
        $ruangan = Ruangan::find($id);

        // rules 
        $rules = array(
            'kode_ruangan' => 'required',
            'nama_ruangan' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // update data
        $ruangan->update($request->all());

        // response json
        return response()->json([
            'messages' => 'success',
            'data_ruangan' => $ruangan
        ], 200);
    }

    /**
     * fungsi untuk hapus data ruangan dengan parameter id
     * 
     * @param id $id
     * @return json respon message : success
     */
    public function delete($id)
    {
        // hapus data ruangan berdasarkan id
        Ruangan::find($id)->delete();

        // response json
        return response()->json([
            'messages' => 'success'
        ], 200);
    }
}
