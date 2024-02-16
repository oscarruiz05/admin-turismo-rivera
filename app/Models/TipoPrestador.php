<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPrestador extends Model
{
    use HasFactory;

    protected $table = 'tipo_prestadores';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
    ];
}
