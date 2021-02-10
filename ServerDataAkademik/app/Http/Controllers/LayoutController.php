<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * kelas LayoutController
 * 
 * kelas ini untuk test halaman layout laravel 8
 * 
 * @package LatihanProject2021
 * @subpackage Cummon
 * @version 1.0
 * @author Nur Pujiyanto <Nurpujiyanto1997@gmail.com>
 * 
 */
class LayoutController extends Controller
{
    /**
     * fungsi untuk ke halaman dashboard
     * 
     * @return ke halaman dashboard  
     */
    public function master()
    {
        return view('layout.dashboard');
    }
}
