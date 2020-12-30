<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('datamaster.siswa', compact('siswa'));
    }

    public function postSiswa(Request $request)
    {

        // $image = $request->file('avatar');
        // $imageName = time() . '.' . $image->extension();
        // $image->move(public_path('images'), $imageName);

        //insert data Siswa
        $siswa = new Siswa;
        $siswa->name = $request->name;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;
        $siswa->avatar = $request->avatar;
        $siswa->nohp = $request->nohp;
        $siswa->save();
        if ($request->hasFile('avatar')) {
            $imageName = rand(11111, 99999) . '.' . $request->file('avatar')->getClientOriginalExtension();
            $destinationPath = 'images';
            $upload_success = $request->file('avatar')->move($destinationPath, $imageName);
        }

        // insert data User
        $user = new User;
        $user->name = $request->name;
        $user->role = 'siswa';
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();
        $user->siswa()->save($siswa);


        return response()->json($siswa);
    }
}
