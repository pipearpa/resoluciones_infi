<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resolucion;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class nuevaresolucionController extends Controller
{
    public function index()
    {
        return view('nuevaresolucion');
         // Load all PQRs with their associated users
         $pqrs = Resolucion::with('user')->get();

         return view('dashboard', compact('pqrs'));
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
         
            'descripcion' => 'required',
            'nombre' => 'nullable', // Hacer el campo nombre opcional
            'archivo' => 'nullable|file|max:10240', // Tamaño máximo de 10MB
            // Agregar más validaciones aquí según tus necesidades
        ]);

        // Crear una nueva instancia del modelo PQR
        $resolucion = new Resolucion();

        // Asignar los valores a los campos del modelo
       /*  $resolucion->tipo = $validatedData['tipo']; */
        $resolucion->descripcion = $validatedData['descripcion'];
        /* $resolucion->respuesta = $validatedData['respuesta']; */
        $resolucion->nombre = $request->has('anonimo') ? 'Anónimo' : $validatedData['nombre'];
        /* $resolucion->tipoDocumento = $request->has('anonimo') ? 'Sin especificar' : $request->input('tipoDocumento');
        $resolucion->numero_documento = $request->has('anonimo') ? 'Sin especificar' : $request->input('numero_documento');
        $resolucion->email = $request->has('anonimo') ? 'Sin especificar' : $request->input('email');
        $resolucion->numeroTel = $request->has('anonimo') ? 'Sin especificar' : $request->input('numeroTel');
        $resolucion->direccion = $request->has('anonimo') ? 'Sin especificar' : $request->input('direccion');
        $resolucion->estado = 'Sin tramitar'; */

        $resolucion->user_id = Auth::id();

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
            $resolucion->archivo = $nombreArchivo;
        }

        // Guardar la PQR en la base de datos
        $resolucion->save();
        // Obtener el correo electrónico del usuario
        /* $userEmail = $request->input('email');

        // Enviar el correo electrónico al usuario
        Mail::send('emails.pqr_sent', ['pqr' => $resolucion], function ($message) use ($userEmail) {
            $message->to($userEmail)
                ->subject('Nueva PQR Creada');
        });
 */


        // Redireccionar al usuario a la página de inicio con un mensaje de éxito
        toastr()->success('La PQR se ha creado exitosamente.', 'Congrats');
        return redirect('/dashboard')->with('status');
    }

/*     public function marcarEnTramite($id)
    {
        $resolucion = Pqr::findOrFail($id);
        $resolucion->estado = 'En trámite';
        $resolucion->save();


        toastr()->info('La PQR se ha puesto en tramite correctamente.', 'Muy bien');
        return Redirect::route('dashboard');

        // Redireccionar o mostrar un mensaje de éxito
    }

    public function marcarTramitada($id)
    {
        $resolucion = Pqr::findOrFail($id);
        $resolucion->estado = 'Tramitada';
        $resolucion->save();

        // Enviar el correo electrónico al usuario
        toastr()->info('La PQR ha sido tramitada correctamente.', 'Muy bien');
        return Redirect::route('dashboard');
        // Redireccionar o mostrar un mensaje de éxito
    } */


    public function exportToPDF($resolucion_id)
    {
        // Obtener la PQR específica por su ID
        $resolucion = Resolucion::findOrFail($resolucion_id);

        // Cargar la vista pdf.blade.php con los datos de la PQR
        $pdf = PDF::loadView('pdf', compact('pqr'));

        // Descargar el PDF
        return $pdf->download('pqr_' . $resolucion_id . '.pdf');
    }
}
