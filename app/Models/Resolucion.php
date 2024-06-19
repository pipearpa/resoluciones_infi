<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Resolucion extends Model
{
    // Si la tabla no sigue la convención de nombres pluralizados, especifica el nombre de la tabla
    protected $table = 'resoluciones';
    protected $fillable = [
        'id','nombre', 'descripcion','archivo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
