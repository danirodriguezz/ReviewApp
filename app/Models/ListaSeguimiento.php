<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaSeguimiento extends Model
{
    protected $table = 'lista_de_seguimiento';

    protected $fillable = [
        'user_id',
        'tipo_contenido',
        'contenido_id',
        'estado'
    ];
    
}
