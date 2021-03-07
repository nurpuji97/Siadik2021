<?php

namespace App\Http\Controllers\API\Datamaster;

use App\Http\Controllers\Controller;
use App\Models\Kejuruan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * kelas API KejuruanController
 * 
 * kelas ini untuk CRUD(Cread Read Update Delete) Kejuruan laravel 8 Rest Api
 * 
 * @package LatihanProject2021
 * @subpackage Cummon
 * @version 1.0
 * @author Nur Pujiyanto <Nurpujiyanto1997@gmail.com>
 * 
 */

class KejuruanController extends Controller
{
    /**
     * fungsi untuk menampilkan semua data kejuruan
     * 
     * @return json respon message : success, kejuruan : semua data kejuruan 
     */
    public function index()
    {
        // tampilkan data
        $kejuruan = Kejuruan::all();

        // kembalikan nilai datasiswa
        return response()->json([
            'message' => 'Success',
            'Kejuruan' => $kejuruan
        ], 200);
    }

    /**
     * fungsi untuk membuat data kejuruan
     * 
     * @param Request $request valid Request objek
     * @return json respon message : success, kejuruan : menampilkan hasil input data kejuruan 
     */
    public function create(Request $request)
    {
        // rules 
        $rules = array(
            'kode_kejuruan' => 'required',
            'nama_kejuruan' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // create data
        $kejuruan = Kejuruan::create($request->all());

        // response json
        return response()->json([
            'messages' => 'success',
            'data_kejuruan' => $kejuruan
        ], 200);
    }

    /**
     * fungsi untuk lihat data kejuruan dengan parameter id
     * 
     * @param id $id
     * @return json respon message : success, data_kejuruan : data kejuruan
     */
    public function edit($id)
    {
        // cari data ruangan berdasarkan id
        $kejuruan = Kejuruan::find($id);

        // response json
        return response()->json([
            'messages' => 'success',
            'data_kejuruan' => $kejuruan
        ], 200);
    }

    /**
     * fungsi untuk update kejuruan dengan parameter id
     * 
     * @param id $id
     * @param Request $request valid Request objek
     * @return json respon message : success, data_kejuruan : menampilkan hasil update data kejuruan
     */
    public function update(Request $request, $id)
    {
        // cari data kejuruan berdasarkan id
        $kejuruan = Kejuruan::find($id);

        // rules 
        $rules = array(
            'kode_kejuruan' => 'required',
            'nama_kejuruan' => 'required'
        );


        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // update data
        $kejuruan->update($request->all());

        // response json
        return response()->json([
            'messages' => 'success',
            'data_kejuruan' => $kejuruan
        ], 200);
    }

    /**
     * fungsi untuk hapus data kejuruan dengan parameter id
     * 
     * @param id $id
     * @return json respon message : success
     */
    public function delete($id)
    {
        // hapus data ruangan berdasarkan id
        Kejuruan::find($id)->delete();

        // response json
        return response()->json([
            'messages' => 'success'
        ], 200);
    }
}
