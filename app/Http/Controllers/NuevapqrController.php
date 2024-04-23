<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NuevapqrController extends Controller
{
    public function index()
    {
        return view('nuevapqr');
    }
}
