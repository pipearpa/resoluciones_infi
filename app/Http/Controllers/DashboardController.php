<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqr;
use App\Models\Resolucion;

class DashboardController extends Controller
{
    public function index()
    {
        $resolucions = Resolucion::orderBy('id','desc')->get(); // Obtener todas las PQRs

        return view('dashboard', ['resolucions' => $resolucions]);
    }
}
