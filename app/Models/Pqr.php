<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PQR extends Model
{
    protected $fillable = [
        'id','nombres', 'apellidos','tipo_documento', 'cedula', 'email','numero_contacto','direccion','tipo','mensaje','estado','respuesta','archivo',
    ];
}
