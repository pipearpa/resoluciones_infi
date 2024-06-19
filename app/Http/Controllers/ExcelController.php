<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resolucion;
use Rap2hpoutre\FastExcel\FastExcel;

class ExcelController extends Controller
{
    public function export()
    {
        try {
            // Traemos todas las resoluciones
            $resolucions = Resolucion::all();

            // Exportamos las resoluciones a un archivo Excel
            return (new FastExcel($resolucions))->download('Resoluciones.xlsx');
        } catch (\Exception $e) {
            // Manejo de errores: redirigir hacia atrás y mostrar un mensaje de error
            toastr()->error('Error al generar el Excel: ' . $e->getMessage(), 'Error');
            return back();
        }
    }
}
