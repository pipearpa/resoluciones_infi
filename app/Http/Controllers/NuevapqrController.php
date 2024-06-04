<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqr;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class NuevapqrController extends Controller
{
    public function index()
    {
        return view('nuevapqr');
    }
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'tipo' => 'required',
            'descripcion' => 'required',
            'respuesta' => 'required',
            'nombre' => 'nullable', // Hacer el campo nombre opcional
            'archivo' => 'nullable|file|max:10240', // Tamaño máximo de 10MB
            // Agregar más validaciones aquí según tus necesidades
        ]);

        // Crear una nueva instancia del modelo PQR
        $pqr = new Pqr();

        // Asignar los valores a los campos del modelo
        $pqr->tipo = $validatedData['tipo'];
        $pqr->descripcion = $validatedData['descripcion'];
        $pqr->respuesta = $validatedData['respuesta'];
        $pqr->nombre = $request->has('anonimo') ? 'Anónimo' : $validatedData['nombre'];
        $pqr->tipoDocumento = $request->has('anonimo') ? 'Sin especificar' : $request->input('tipoDocumento');
        $pqr->numero_documento = $request->has('anonimo') ? 'Sin especificar' : $request->input('numero_documento');
        $pqr->email = $request->has('anonimo') ? 'Sin especificar' : $request->input('email');
        $pqr->numeroTel = $request->has('anonimo') ? 'Sin especificar' : $request->input('numeroTel');
        $pqr->direccion = $request->has('anonimo') ? 'Sin especificar' : $request->input('direccion');
        $pqr->estado = 'Sin tramitar';

        // Guardar el archivo en la ubicación deseada con nombre único generado por UUID y conservar su extensión original
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            // Genera un nombre único para el archivo utilizando un UUID y conserva su extensión original
            $nombreArchivo = Str::uuid() . '.' . $archivo->getClientOriginalExtension();
            // Especifica la ruta deseada para guardar el archivo
            $ruta = 'archivos_pqr';
            // Almacena el archivo en el almacenamiento con el nombre único generado
            $archivo->storeAs($ruta, $nombreArchivo);
            // Asigna el nombre del archivo al modelo
            $pqr->archivo = $nombreArchivo;
        }

        // Guardar la PQR en la base de datos
        $pqr->save();

        // Redireccionar al usuario a la página de inicio con un mensaje de éxito
        toastr()->success('La PQR se ha creado exitosamente.', 'Congrats');
        return redirect('/')->with('status');
    }

    public function marcarEnTramite($id)
    {
        $pqr = Pqr::findOrFail($id);
        $pqr->estado = 'En trámite';
        $pqr->save();

        toastr()->info('La PQR se ha puesto en tramite correctamente.', 'Muy bien');
        return Redirect::route('dashboard');

        // Redireccionar o mostrar un mensaje de éxito
    }

    public function marcarTramitada($id)
    {
        $pqr = Pqr::findOrFail($id);
        $pqr->estado = 'Tramitada';
        $pqr->save();

        toastr()->info('La PQR ha sido tramitada correctamente.', 'Muy bien');
        return Redirect::route('dashboard');


        // Redireccionar o mostrar un mensaje de éxito
    }

   public function pdf(){
        
        $pqr=Pqr::all();
        $pdf = Pdf::loadView('pdf', compact('pqr'));
        return $pdf->stream();
    }
 /*
    public function pdf($pqrId) {
        $pqr = Pqr::findOrFail($pqrId);
        $pdf = PDF::loadView('pdf', compact('pqr'));
        return $pdf->stream();
    }*/

    public function exportToPDF($pqr_id) {
        // Obtener la PQR específica por su ID
        $pqr = Pqr::findOrFail($pqr_id);
        
        // Cargar la vista pdf.blade.php con los datos de la PQR
        $pdf = PDF::loadView('pdf', compact('pqr'));
    
        // Descargar el PDF
        return $pdf->download('pqr_'.$pqr_id.'.pdf');
    }
}