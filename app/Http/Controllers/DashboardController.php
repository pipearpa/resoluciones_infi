<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqr;


class DashboardController extends Controller
{
    public function index()
    {
        $pqrs = Pqr::orderBy('id','desc')->get(); // Obtener todas las PQRs

        return view('dashboard', ['pqrs' => $pqrs]);
    }
}
