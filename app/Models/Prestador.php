<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestador extends Model
{
    use HasFactory;

    protected $table = 'prestadores';

    protected $fillable = [
        'tipo_prestador_id',
        'nombre',
        'imagen',
        'redes_sociales',
        'link',
        'pagina_web',
        'estado',
    ];

    public function tipo_prestador(){
        return $this->belongsTo(TipoPrestador::class, 'tipo_prestador_id');
    }
}
