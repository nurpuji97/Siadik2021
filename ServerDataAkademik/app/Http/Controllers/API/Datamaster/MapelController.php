<?php

namespace App\Http\Controllers\API\Datamaster;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

/**
 * kelas API MapelController
 * 
 * kelas ini untuk CRUD(Cread Read Update Delete) mapel laravel 8 Rest Api
 * 
 * @package LatihanProject2021
 * @subpackage Cummon
 * @version 1.0
 * @author Nur Pujiyanto <Nurpujiyanto1997@gmail.com>
 * 
 */

class MapelController extends Controller
{

    /**
     * fungsi untuk menampilkan semua data mapel
     * 
     * @return json respon message : success, mapel : semua data mapel 
     */
    public function index()
    {
        // tampilkan data
        $mapel = Mapel::all();

        // kembalikan nilai datasiswa
        return response()->json([
            'message' => 'Success',
            'mapel' => $mapel
        ], 200);
    }

    /**
     * fungsi untuk membuat data mapel
     * 
     * @param Request $request valid Request objek
     * @return json respon message : success, mapel : menampilkan hasil input data mapel 
     */

    public function create(Request $request)
    {
        // rules 
        $rules = array(
            'kode_mapel' => 'required',
            'nama_mapel' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // create data
        $mapel = Mapel::create($request->all());

        // response json
        return response()->json([
            'messages' => 'success',
            'data_mapel' => $mapel
        ], 200);
    }

    /**
     * fungsi untuk lihat data mapel dengan parameter id
     * 
     * @param id $id
     * @return json respon message : success, data_mapel : data mapel
     */
    public function edit($id)
    {
        // cari data ruangan berdasarkan id
        $mapel = Mapel::find($id);

        // response json
        return response()->json([
            'messages' => 'success',
            'data_mapel' => $mapel
        ], 200);
    }

    /**
     * fungsi untuk update user_id mapel dengan parameter id
     * 
     * @param id $id
     * @param Request $request valid Request objek
     * @return json respon message : success, data_mapel : menampilkan hasil update data mapel
     */
    public function update(Request $request, $id)
    {
        // cari data ruangan berdasarkan id
        $mapel = Mapel::find($id);

        // rules 
        $rules = array(
            'kode_mapel' => 'required',
            'nama_mapel' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // update data
        $mapel->update($request->all());

        // response json
        return response()->json([
            'messages' => 'success',
            'data_mapel' => $mapel
        ], 200);
    }

    /**
     * fungsi untuk hapus data mapel dengan parameter id
     * 
     * @param id $id
     * @return json respon message : success
     */
    public function delete($id)
    {
        // hapus data ruangan berdasarkan id
        Mapel::find($id)->delete();

        // response json
        return response()->json([
            'messages' => 'success'
        ], 200);
    }
}
