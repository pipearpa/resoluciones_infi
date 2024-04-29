<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqr;
//use Illuminate\Support\Facades\Uuid;
use Illuminate\Support\Str;

class NuevapqrController extends Controller
{
    public function index(){
        return view('/nuevapqr');
    }

    public function store(Request $request)
    {
         // Validación de los datos del formulario
    $validatedData = $request->validate([
        'tipo' => 'required',
        'descripcion' => 'required',
        'respuesta' => 'required',
        //'terminosCondiciones' => 'accepted',
        'nombre' => 'nullable', // Hacer el campo nombre opcional
    ]);

    // Si el checkbox "Anónimo" está marcado
    if ($request->has('anonimo')) {
        // Si el checkbox "Anónimo" está marcado, asignar un valor predeterminado al campo "nombre"
        $nombreAnonimo = "Anónimo";
    
        // Crear una nueva instancia del modelo PQR y guardar solo los campos requeridos
        $pqr = new Pqr();
        $pqr->tipo = $request->tipo;
        $pqr->descripcion = $request->descripcion;
        $pqr->respuesta = $request->respuesta;
        $pqr->nombre = $nombreAnonimo;
        $pqr->tipoDocumento = "Sin especificar";
        $pqr->numero_documento = "Sin especificar";
        $pqr->direccion = "Sin especificar";
        $pqr->email = "Sin especificar";
        $pqr->numeroTel = "Sin especificar";
        //$pqr->numeroTel = "Sin especificar";
        // Otros campos se dejarán como nulos si no se proporciona un valor
        // Agregar aquí cualquier otro campo requerido que necesites guardar
        $pqr->save();
    } else {
        // Si el checkbox "Anónimo" no está marcado, guardar todos los campos como lo estabas haciendo anteriormente
        $pqr = new Pqr();
        $pqr->tipo = $request->tipo;
        $pqr->descripcion = $request->descripcion;
        $pqr->nombre = $request->nombre;
        $pqr->tipoDocumento = $request->tipoDocumento;
        $pqr->numero_documento = $request->numero_documento;
        $pqr->email = $request->email;
        $pqr->numeroTel = $request->numeroTel;
        $pqr->direccion = $request->direccion;
        $pqr->respuesta = $request->respuesta;
        // Agregar aquí cualquier otro campo que necesites guardar
        $pqr->save();
    }
    

        

        // Redireccionar al usuario a la página de inicio con un mensaje de éxito
        return redirect('/')->with('status', 'La PQR se ha creado exitosamente.');
    }
}

