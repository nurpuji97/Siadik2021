<?php

namespace App\Http\Controllers\WEB\Datamaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Validator;

/**
 * kelas RuanganController
 * 
 * kelas ini untuk CRUD(Cread Read Update Delete) ruangan laravel 8
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
     * fungsi untuk menampilkan semua data ruangan menggunakan ajax
     * 
     * @return button $button mengembalikan nilai button
     * @return view datamaster.ruangan 
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Ruangan::latest()->get())->addColumn('action', function ($data) {
                $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">' . __('tabel.Edit') . '</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm" >' . __('tabel.Delete') . '</button>';
                return $button;
            })
                ->rawColumns(['action'])
                ->make(true);
        }

        $ruangan = Ruangan::latest();

        return view('datamaster.ruangan', compact('ruangan'));
    }

    /**
     * fungsi untuk masukkan data ruangan menggunakan ajax
     * 
     * @param Request $request valid Request objek
     * @return json menampilkan pesan success
     */
    public function store(Request $request)
    {
        // rule validation
        $rules = array(
            'kode_ruangan' => 'required',
            'nama_ruangan' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json([
                'errors' => $error->errors()->all()
            ]);
        }

        // insert data ruangan
        $form_ruangan = array(
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan
        );

        Ruangan::create($form_ruangan);

        return response()->json([
            'success' => __('tabel.msg_berhasil')
        ]);
    }

    /**
     * fungsi untuk lihat data ruangan dengan parameter id
     * 
     * @param id $id 
     * @return json menampilkan data ruangan
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Ruangan::findOrFail($id);
            return response()->json([
                'data' => $data
            ]);
        }
    }

    /**
     * fungsi untuk update data ruangan parameter id 
     * 
     * @param Request $request valid Request objek 
     * @return json jika berhasil menampilkan pesan success kalau gagal menampilkan pesan error
     */
    public function update(Request $request)
    {
        // rule validation
        $rules = array(
            'kode_ruangan' => 'required',
            'nama_ruangan' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json([
                'errors' => $error->errors()->all()
            ]);
        }

        // insert data ruangan
        $form_ruangan = array(
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan
        );

        Ruangan::whereId($request->hidden_id)->update($form_ruangan);

        return response()->json([
            'success' => __('tabel.msg_berhasil')
        ]);
    }

    /**
     * fungsi untuk hapus data ruangan dengan parameter id
     * 
     * @param id $id 
     */
    public function destroy($id)
    {
        $data = Ruangan::findOrFail($id);
        $data->delete();
    }
}
