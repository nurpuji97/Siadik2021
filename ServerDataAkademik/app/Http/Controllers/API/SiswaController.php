<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


/**
 * kelas SiswaController
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
        ]);
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
        ]);
    }

    /**
     * fungsi untuk simpan data siswa dan user
     * 
     * @param Request $request valid Request objek
     * @return json respon message : success, siswa : data siswa
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
        ]);
    }
}