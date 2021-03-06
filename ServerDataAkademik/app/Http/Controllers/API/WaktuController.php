<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Waktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * kelas API WaktuController
 * 
 * kelas ini untuk CRUD(Cread Read Update Delete) Waktu laravel 8 Rest Api
 * 
 * @package LatihanProject2021
 * @subpackage Cummon
 * @version 1.0
 * @author Nur Pujiyanto <Nurpujiyanto1997@gmail.com>
 * 
 */

class WaktuController extends Controller
{
    /**
     * fungsi untuk menampilkan semua data kejuruan
     * 
     * @return json respon message : success, waktu : semua data waktu 
     */
    public function index()
    {
        // tampilkan data
        $waktu = Waktu::all();

        // kembalikan nilai datasiswa
        return response()->json([
            'message' => 'Success',
            'waktu' => $waktu
        ], 200);
    }

    /**
     * fungsi untuk membuat data waktu
     * 
     * @param Request $request valid Request objek
     * @return json respon message : success, waktu : menampilkan hasil input data waktu 
     */
    public function create(Request $request)
    {
        // rules 
        $rules = array(
            'jam' => 'required',
            'jp' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // create data
        $waktu = Waktu::create($request->all());

        // response json
        return response()->json([
            'messages' => 'success',
            'data_waktu' => $waktu
        ], 200);
    }

    /**
     * fungsi untuk lihat data waktu dengan parameter id
     * 
     * @param id $id
     * @return json respon message : success, data_waktu : data waktu
     */
    public function edit($id)
    {
        // cari data ruangan berdasarkan id
        $waktu = Waktu::find($id);

        // response json
        return response()->json([
            'messages' => 'success',
            'data_waktu' => $waktu
        ], 200);
    }

    /**
     * fungsi untuk update waktu dengan parameter id
     * 
     * @param id $id
     * @param Request $request valid Request objek
     * @return json respon message : success, data_waktu : menampilkan hasil update data waktu
     */
    public function update(Request $request, $id)
    {
        // cari data waktu berdasarkan id
        $waktu = Waktu::find($id);

        // rules 
        $rules = array(
            'jam' => 'required',
            'jp' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // update data
        $waktu->update($request->all());

        // response json
        return response()->json([
            'messages' => 'success',
            'data_waktu' => $waktu
        ], 200);
    }

    /**
     * fungsi untuk hapus data waktu dengan parameter id
     * 
     * @param id $id
     * @return json respon message : success
     */
    public function delete($id)
    {
        // hapus data ruangan berdasarkan id
        Waktu::find($id)->delete();

        // response json
        return response()->json([
            'messages' => 'success'
        ], 200);
    }
}
