<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //  messages untuk validator
    protected function getMessages()
    {
        return $messages = [
            'email.required' => __('messages.email'),
            'password.required' => __('messages.password'),
            'password.min' => __('messages.password.min')
        ];
    }

    // rules untuk validator
    protected function getRules()
    {
        return $rules = [
            'email' => 'required',
            'password' => 'required|min:4'
        ];
    }

    public function login()
    {
        return view('layout.login');
    }


    public function postLogin(Request $request)
    {

        //validator
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        // Manual Login
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
