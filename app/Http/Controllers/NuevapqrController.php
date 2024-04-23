<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqr;

class NuevapqrController extends Controller
{
    public function index(){
        return view('nuevapqr');
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'tipo' => 'required',
            'descripcion' => 'required',
        ]);

        // Crear una nueva instancia del modelo PQR y guardarla en la base de datos
        $pqr = new Pqr();
        $pqr->tipo = $request->tipo;
        $pqr->descripcion = $request->descripcion;
        // Agregar aquí cualquier otro campo que necesites guardar
        $pqr->save();

        // Redireccionar al usuario a la página de inicio con un mensaje de éxito
        return redirect('/')->with('status', 'La PQR se ha creado exitosamente.');
    }
}

