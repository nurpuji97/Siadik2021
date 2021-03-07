<?php

namespace App\Http\Controllers\WEB\Datamaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Waktu;
use Illuminate\Support\Facades\Validator;

/**
 * kelas WaktuController
 * 
 * kelas ini untuk CRUD(Cread Read Update Delete) waktu laravel 8
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
     * fungsi untuk menampilkan semua data waktu menggunakan ajax
     * 
     * @return button $button mengembalikan nilai button
     * @return view datamaster.waktu 
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Waktu::latest()->get())->addColumn('action', function ($data) {
                $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">' . __('tabel.Edit') . '</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm" >' . __('tabel.Delete') . '</button>';
                return $button;
            })
                ->rawColumns(['action'])
                ->make(true);
        }

        $waktu = Waktu::latest();

        return view('datamaster.waktu', compact('waktu'));
    }

    /**
     * fungsi untuk masukkan data waktu menggunakan ajax
     * 
     * @param Request $request valid Request objek
     * @return json menampilkan pesan success
     */
    public function store(Request $request)
    {
        // rule validation
        $rules = array(
            'jam' => 'required',
            'jp' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json([
                'errors' => $error->errors()->all()
            ]);
        }

        Waktu::create($request->all());

        return response()->json([
            'success' => __('tabel.msg_berhasil')
        ]);
    }

    /**
     * fungsi untuk lihat data waktu dengan parameter id
     * 
     * @param id $id 
     * @return json menampilkan data waktu
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Waktu::findOrFail($id);
            return response()->json([
                'data' => $data
            ]);
        }
    }

    /**
     * fungsi untuk update data waktu parameter id 
     * 
     * @param Request $request valid Request objek 
     * @return json jika berhasil menampilkan pesan success kalau gagal menampilkan pesan error
     */
    public function update(Request $request)
    {
        // rule validation
        $rules = array(
            'jam' => 'required',
            'jp' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json([
                'errors' => $error->errors()->all()
            ]);
        }

        // insert data ruangan
        $form_waktu = array(
            'jam' => $request->jam,
            'jp' => $request->jp
        );

        Waktu::whereId($request->hidden_id)->update($form_waktu);

        // response json
        return response()->json([
            'success' => __('tabel.msg_berhasil')
        ]);
    }

    /**
     * fungsi untuk hapus data waktu dengan parameter id
     * 
     * @param id $id 
     */
    public function destroy($id)
    {
        $data = Waktu::findOrFail($id);
        $data->delete();
    }
}
