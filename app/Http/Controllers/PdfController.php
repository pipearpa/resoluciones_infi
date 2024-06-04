<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class PdfController extends Controller
{
     public function generatePDF()
     {
         // Se crea una instancia de las opciones de Dompdf
         $options = new Options();
         $options->set('isHtml5ParserEnabled', true);
         $options->set('isPhpEnabled', true);
 
         // Se crea una instancia de Dompdf con las opciones
         $dompdf = new Dompdf($options);
 
         // Contenido HTML que quieres convertir a PDF
         $html = '<h1>Ejemplo de PDF generado con Dompdf en Laravel</h1>';
 
         // Se carga el contenido HTML en Dompdf
         $dompdf->loadHtml($html);
 
         // Se renderiza el PDF
         $dompdf->render();
 
         // Se devuelve el PDF como respuesta
         return $dompdf->stream('archivo.pdf');
     }
}
