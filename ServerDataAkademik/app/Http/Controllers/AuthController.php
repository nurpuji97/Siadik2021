<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * kelas AuthController
 * 
 * kelas ini untuk Autentikasi laravel 8
 * 
 * @package LatihanProject2021
 * @subpackage Cummon
 * @version 1.0
 * @author Nur Pujiyanto <Nurpujiyanto1997@gmail.com>
 * 
 */
class AuthController extends Controller
{

    /**
     * fungsi untuk menampilkan pesan login
     * 
     * @return object $messages fungsi menampilkan pesan error   
     */
    protected function getMessages()
    {
        return $messages = [
            'email.required' => __('messages.email'),
            'password.required' => __('messages.password'),
            'password.min' => __('messages.password.min')
        ];
    }

    /**
     * fungsi untuk kebutuhan valid pada login
     * 
     * @return object $rules fungsi menampilkan kebutuhan validator   
     */
    protected function getRules()
    {
        return $rules = [
            'email' => 'required',
            'password' => 'required|min:4'
        ];
    }

    /**
     * fungsi untuk ke halaman login
     * 
     * @return ke halaman login   
     */
    public function login()
    {
        return view('layout.login');
    }

    /**
     * fungsi untuk login Auth sistem
     * 
     * @param Request $request valid Request objek
     * @see $rules variabel untuk memanggil fungsi getRules()
     * @see $messages variabel untuk memanggil fungsi getMessages()
     * @return validator error, jika berhasil login ke halaman index kalau gagal kembali ke halaman login  
     */
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

        return redirect('/login')->with('gagal', 'anda gagal login');
    }

    /**
     * fungsi untuk login Auth sistem
     * 
     * @return  jika berhasil logout maka ke halaman login  
     */
    public function Logout()
    {
        Auth::logout();
        return redirect('/login')->with('berhasil', 'anda Berhasil Logout');
    }
}
