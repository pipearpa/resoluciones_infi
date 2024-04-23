<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqr;

class ConsultaPqrCiudadanoController extends Controller
{
    public function index()
    {
        return view('consultapqrciudadano');

        
    }
    
}