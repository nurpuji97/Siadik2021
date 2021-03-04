<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/**
 * kelas Api/PegawaiController
 * 
 * kelas ini untuk CRUD(Cread Read Update Delete) pegawai RestAPI laravel 8
 * 
 * @package LatihanProject2021
 * @subpackage Cummon
 * @version 1.0
 * @author Nur Pujiyanto <Nurpujiyanto1997@gmail.com>
 * 
 */
class PegawaiController extends Controller
{
    /**
     * Fungsi menampilkan data pegawai
     * @return json message = 'success' dan Array datapegawai 
     */
    public function index()
    {
        $datapegawai = Pegawai::all();

        return response()->json([
            'message' => 'Success',
            'pegawai' => $datapegawai
        ]);
    }

    /**
     * fungsi untuk simpan data pegawai dan user
     * 
     * @param Request $request valid Request objek
     * @return json respon message : success, pegawai : data pegawai, user : data user
     */
    public function createPegawai(Request $request)
    {
        // rules 
        $rules = array(
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',

            'agama' => 'required',
            'alamat' => 'required',
            // 'avatar' => 'required|image|min:500',
            'nohp' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // // convert menjadi gambar
        // $image = $request->file('avatar');

        // $new_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('images'), $new_name);

        // insert data User
        $user = new User;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        // insert data Pegawai
        $form_pegawai = array(
            'user_id' => $user->id,
            'name' => $request->name,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            // 'avatar' => $new_name,
            'nohp' => $request->nohp
        );


        // simpan data pegawai
        $pegawai = Pegawai::create($form_pegawai);

        return response()->json([
            'messages' => 'success',
            'data_User' => $user,
            'data_pegawai' => $pegawai
        ], 200);
    }

    /**
     * fungsi untuk simpan data pegawai
     * 
     * @param Request $request valid Request objek
     * @return json respon message : success, pegawai : menampilkan hasil input data pegawai
     */
    public function create(Request $request)
    {
        // rules 
        $rules = array(
            'name' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            // 'avatar' => 'required|image|min:500',
            'nohp' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // $image = $request->file('avatar');

        // $new_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('images'), $new_name);

        // insert data Pegawai
        $form_pegawai = array(
            'name' => $request->name,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            // 'avatar' => $new_name,
            'nohp' => $request->nohp
        );

        // simpan data pegawai
        $pegawai = Pegawai::create($form_pegawai);

        return response()->json([
            'messages' => 'success',
            'data_siswa' => $pegawai
        ], 200);
    }

    /**
     * fungsi untuk lihat data pegawai dengan parameter id
     * 
     * @param id $id
     * @return json respon message : success, data_pegawai : data pegawai
     */
    public function edit($id)
    {
        // cari data pegawai berdasarkan id
        $pegawai = Pegawai::find($id);

        return response()->json([
            'message' => 'Success',
            'data_pegawai' => $pegawai
        ]);
    }

    /**
     * fungsi untuk update user_id pegawai dengan parameter id dan buat baru data user
     * 
     * @param id $id
     * @param Request $request valid Request objek
     * @return json respon message : success, user : data user ,pegawai : data pegawai
     */
    public function UpdatePegawaiAddUser(Request $request, $id)
    {
        // cari data pegawai berdasarkan id
        $pegawai = Pegawai::find($id);

        // rules 
        $rules = array(
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // insert data User
        $user = new User;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        // update user_id pegawai
        $pegawai->update([
            'user_id' => $user->id
        ]);

        return response()->json([
            'message' => 'success',
            'user' => $user,
            'pegawai' => $pegawai
        ]);
    }

    /**
     * fungsi untuk update data pegawai dengan parameter id
     * 
     * @param id $id
     * @param Request $request valid Request objek
     * @return json respon message : success, data_pegawai : menampilkan hasil update data pegawai
     */

    public function update(Request $request, $id)
    {
        // cari data pegawai berdasarkan id
        $pegawai = Pegawai::find($id);


        // rules 
        $rules = array(
            'name' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            // 'avatar' => 'required|image|min:500',
            'nohp' => 'required'
        );

        // validation
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // // convert menjadi gambar
        // $image = $request->file('avatar');

        // $new_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('images'), $new_name);

        // update siswa
        $pegawai->update([
            'name' => $request->name,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            // 'avatar' => $new_name,
            'nohp' => $request->nohp
        ]);

        return response()->json([
            'message' => 'success',
            'data_siswa' => $pegawai
        ]);
    }

    /**
     * fungsi untuk hapus data pegawai dengan parameter id
     * 
     * @param id $id
     * @return json respon message : success
     */
    public function delete($id)
    {
        Pegawai::find($id)->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
