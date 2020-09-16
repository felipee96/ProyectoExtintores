<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    protected $table = 'encargados';
    protected $fillable = ['empresa_id', 'nombre_encargado', 'numero_celular', 'email', 'numero_serial'];

    public function empresa()
    {
         return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }
}
