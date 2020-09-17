<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';
    protected $fillable = ['nombre_actividad', 'abreviacion_actividad'];
    #Llaves foraneas
    public function ActividadRecarga()
    {
        //RELACION CON ACTIVIDAD
        return $this->belongsTo(Actividad::class, 'activida_recarga_id', 'id');
    }
}
