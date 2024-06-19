<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pqr;
use App\Models\Resolucion;

class PdfController extends Controller
{
    public function pdf() {

        $resolucion = Resolucion::all();
       

        // Generamos el PDF con los registros filtrados
        $pdf = Pdf::loadView('pdf', compact('resolucion'));

        // Retornamos el PDF para su visualización en el navegador
        return $pdf->stream();
    }
}
