<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('layout.login');
    }

    public function postLogin(Request $request)
    {
        // dd($request->only('email', 'password'));

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/index')->with('berhasil', 'anda Berhasil login');
        }

        return redirect('/login');
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('/login')->with('berhasil', 'anda Berhasil Logout');
    }
}
