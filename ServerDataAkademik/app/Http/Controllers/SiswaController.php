<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class SiswaController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Siswa::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">' . __('tabel.Edit') . '</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">' . __('tabel.Delete') . '</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $user = User::latest();

        return view('datamaster.siswa', compact('user'));
    }

    public function store(Request $request)
    {

        $rules = array(
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',

            'agama' => 'required',
            'alamat' => 'required',
            'avatar' => 'required|image|min:500',
            'nohp' => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $image = $request->file('avatar');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

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
            'avatar' => $new_name,
            'nohp' => $request->nohp
        );

        Siswa::create($form_siswa);

        return response()->json(['success' => __('tabel.msg_berhasil')]);
    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Siswa::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update(Request $request)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('avatar');
        if ($image != '') {
            $rules = array(
                'name' => 'required',
                'agama' => 'required',
                'alamat' => 'required',
                'avatar' => 'required|image|min:500',
                'nohp' => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        } else {
            $rules = array(
                'name' => 'required',
                'agama' => 'required',
                'alamat' => 'required',
                'nohp' => 'required'
            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        $form_siswa = array(
            'name' => $request->name,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'avatar' => $image_name,
            'nohp' => $request->nohp
        );

        Siswa::whereId($request->hidden_id)->update($form_siswa);

        return response()->json(['success' => __('tabel.msg_berhasil')]);
    }

    public function destroy($id)
    {
        $data = Siswa::findOrFail($id);
        $data->delete();
    }
}
