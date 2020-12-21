<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index()
    {
        return view('layout.master');
    }

    public function master()
    {
        return view('layout.dashboard');
    }
}
