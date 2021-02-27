<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * kelas MapelController
 * 
 * kelas ini untuk CRUD(Cread Read Update Delete) mapel laravel 8
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
     * fungsi untuk menampilkan semua data mapel menggunakan ajax
     * 
     * @return button $button mengembalikan nilai button
     * @return view datamaster.mataPelajaran 
     */

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Mapel::latest()->get())->addColumn('action', function ($data) {
                $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">' . __('tabel.Edit') . '</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm" >' . __('tabel.Delete') . '</button>';
                return $button;
            })
                ->rawColumns(['action'])
                ->make(true);
        }

        $mapel = Mapel::latest();

        return view('datamaster.mataPelajaran', compact('mapel'));
    }

    /**
     * fungsi untuk masukkan data mapel menggunakan ajax
     * 
     * @param Request $request valid Request objek
     * @return json menampilkan pesan success
     */
    public function store(Request $request)
    {
        // rule validation
        $rules = array(
            'kode_mapel' => 'required',
            'nama_mapel' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json([
                'errors' => $error->errors()->all()
            ]);
        }

        Mapel::create($request->all());

        return response()->json([
            'success' => __('tabel.msg_berhasil')
        ]);
    }

    /**
     * fungsi untuk lihat data mapel dengan parameter id
     * 
     * @param id $id 
     * @return json menampilkan data mapel
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Mapel::findOrFail($id);
            return response()->json([
                'data' => $data
            ]);
        }
    }

    /**
     * fungsi untuk update data mapel parameter id 
     * 
     * @param Request $request valid Request objek 
     * @return json jika berhasil menampilkan pesan success kalau gagal menampilkan pesan error
     */
    public function update(Request $request)
    {
        // rule validation
        $rules = array(
            'kode_mapel' => 'required',
            'nama_mapel' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json([
                'errors' => $error->errors()->all()
            ]);
        }

        // insert data ruangan
        $form_mapel = array(
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel
        );

        Mapel::whereId($request->hidden_id)->update($form_mapel);

        // response json
        return response()->json([
            'success' => __('tabel.msg_berhasil')
        ]);
    }

    /**
     * fungsi untuk hapus data mapel dengan parameter id
     * 
     * @param id $id 
     */
    public function destroy($id)
    {
        $data = Mapel::findOrFail($id);
        $data->delete();
    }
}
