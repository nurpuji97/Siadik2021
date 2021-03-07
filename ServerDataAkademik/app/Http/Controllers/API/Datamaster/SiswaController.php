<?php

namespace App\Http\Controllers\API\Datamaster;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


/**
 * kelas Api/SiswaController
 * 
 * kelas ini untuk CRUD(Cread Read Update Delete) siswa RestAPI laravel 8
 * 
 * @package LatihanProject2021
 * @subpackage Cummon
 * @version 1.0
 * @author Nur Pujiyanto <Nurpujiyanto1997@gmail.com>
 * 
 */
class SiswaController extends Controller
{

    /**
     * fungsi untuk menampilkan semua data siswa
     * 
     * @return json respon message : success, siswa : semua data siswa 
     */
    public function index()
    {
        // tampilkan data
        $datasiswa = Siswa::all();

        // kembalikan nilai datasiswa
        return response()->json([
            'message' => 'Success',
            'siswa' => $datasiswa
        ], 200);
    }

    /**
     * fungsi untuk simpan data siswa dan user
     * 
     * @param Request $request valid Request objek
     * @return json respon message : success, siswa : data siswa, user : data user
     */
    public function createSiswa(Request $request)
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

        // insert data Siswa
        $form_siswa = array(
            'user_id' => $user->id,
            'name' => $request->name,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            // 'avatar' => $new_name,
            'nohp' => $request->nohp
        );

        // simpan data siswa
        $siswa = Siswa::create($form_siswa);

        return response()->json([
            'messages' => 'success',
            'data_User' => $user,
            'data_siswa' => $siswa
        ], 200);
    }

    /**
     * fungsi untuk simpan data siswa
     * 
     * @param Request $request valid Request objek
     * @return json respon message : success, siswa : menampilkan hasil input data siswa
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

        // insert data Siswa
        $form_siswa = array(
            'name' => $request->name,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            // 'avatar' => $new_name,
            'nohp' => $request->nohp
        );

        // simpan data siswa
        $siswa = Siswa::create($form_siswa);

        return response()->json([
            'messages' => 'success',
            'data_siswa' => $siswa
        ], 200);
    }

    /**
     * fungsi untuk lihat data siswa dengan parameter id
     * 
     * @param id $id
     * @return json respon message : success, siswa : data siswa
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);

        return response()->json([
            'messages' => 'success',
            'data_siswa' => $siswa
        ], 200);
    }

    /**
     * fungsi untuk update user_id siswa dengan parameter id dan buat baru data user
     * 
     * @param id $id
     * @param Request $request valid Request objek
     * @return json respon message : success, user : data user ,siswa : data siswa
     */
    public function updateSiswaAddUser(Request $request, $id)
    {
        $siswa = Siswa::find($id);

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

        // update user_id siswa
        $siswa->update([
            'user_id' => $user->id
        ]);

        return response()->json([
            'message' => 'success',
            'user' => $user,
            'siswa' => $siswa
        ]);
    }

    /**
     * fungsi untuk update data siswa dengan parameter id
     * 
     * @param id $id
     * @param Request $request valid Request objek
     * @return json respon message : success, siswa : menampilkan hasil update data siswa
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);

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
        $siswa->update([
            'name' => $request->name,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            // 'avatar' => $new_name,
            'nohp' => $request->nohp
        ]);

        return response()->json([
            'message' => 'success',
            'data_siswa' => $siswa
        ]);
    }

    /**
     * fungsi untuk hapus data siswa dengan parameter id
     * 
     * @param id $id
     * @return json respon message : success
     */
    public function delete($id)
    {
        Siswa::find($id)->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
