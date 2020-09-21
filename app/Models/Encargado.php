<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    protected $table = 'encargados';
    protected $fillable = ['empresa_id', 'nombre_encargado', 'numero_celular', 'email', 'direccion', 'numero_serial'];

    public function empresa()
    {
         return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }
    public function IngresoEncargado()
    {
        return $this->hasMany(Ingreso::class,'encargado_id','id');
    }
}
