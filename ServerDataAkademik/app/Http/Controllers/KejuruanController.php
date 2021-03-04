<?php

namespace App\Http\Controllers;

use App\Models\Kejuruan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * kelas kejuruanController
 * 
 * kelas ini untuk CRUD(Cread Read Update Delete) kejuruan laravel 8
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
     * fungsi untuk menampilkan semua data kejuruan menggunakan ajax
     * 
     * @return button $button mengembalikan nilai button
     * @return view datamaster.kejuruan 
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Kejuruan::latest()->get())->addColumn('action', function ($data) {
                $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">' . __('tabel.Edit') . '</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm" >' . __('tabel.Delete') . '</button>';
                return $button;
            })
                ->rawColumns(['action'])
                ->make(true);
        }

        $kejuruan = Kejuruan::latest();

        return view('datamaster.kejuruan', compact('kejuruan'));
    }


    /**
     * fungsi untuk masukkan data kejuruan menggunakan ajax
     * 
     * @param Request $request valid Request objek
     * @return json menampilkan pesan success
     */
    public function store(Request $request)
    {
        // rule validation
        $rules = array(
            'kode_kejuruan' => 'required',
            'nama_kejuruan' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json([
                'errors' => $error->errors()->all()
            ]);
        }

        Kejuruan::create($request->all());

        return response()->json([
            'success' => __('tabel.msg_berhasil')
        ]);
    }

    /**
     * fungsi untuk lihat data kejuruan dengan parameter id
     * 
     * @param id $id 
     * @return json menampilkan data kejuruan
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Kejuruan::findOrFail($id);
            return response()->json([
                'data' => $data
            ]);
        }
    }

    /**
     * fungsi untuk update data kejuruan parameter id 
     * 
     * @param Request $request valid Request objek 
     * @return json jika berhasil menampilkan pesan success kalau gagal menampilkan pesan error
     */
    public function update(Request $request)
    {
        // rule validation
        $rules = array(
            'kode_kejuruan' => 'required',
            'nama_kejuruan' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json([
                'errors' => $error->errors()->all()
            ]);
        }

        // insert data ruangan
        $form_kejuruan = array(
            'kode_kejuruan' => $request->kode_kejuruan,
            'nama_kejuruan' => $request->nama_kejuruan
        );

        Kejuruan::whereId($request->hidden_id)->update($form_kejuruan);

        // response json
        return response()->json([
            'success' => __('tabel.msg_berhasil')
        ]);
    }

    /**
     * fungsi untuk hapus data kejuruan dengan parameter id
     * 
     * @param id $id 
     */
    public function destroy($id)
    {
        $data = Kejuruan::findOrFail($id);
        $data->delete();
    }
}
