<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    protected $fillable = ['nombre_empresa','nit','direccion'];

    public function Encargado()
    {
        return $this->hasMany('App\Models\Encargado');
    }
}
