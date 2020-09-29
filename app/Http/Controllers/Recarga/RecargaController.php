<?php

namespace App\Http\Controllers\Recarga;

use App\Http\Controllers\Controller;
use App\Http\Requests\Recarga\RecargaCreate;
use App\Models\Recarga;
use Illuminate\Http\Request;

class RecargaController extends Controller
{
    public function index()
    {
        return view('pages.recarga.recarga');
    }
    public function store(RecargaCreate $request)
    {
        #try {

            $recarga = new Recarga();
            $recarga->nro_tiquete_anterior = $request->input('nro_tiquete_anterior');
            $recarga->nro_tiquete_nuevo = $request->input('nro_tiquete_nuevo');
            $recarga->nro_extintor = $request->input('nro_extintor');
            $recarga->agente = $request->input('agente');
            $recarga->usuario_recarga_id = $request->input('usuario_recarga_id');
            $recarga->ingreso_recarga_id = $request->input('ingreso_recarga_id');
            $recarga->activida_recarga_id = $request->input('activida_recarga_id');
            $recarga->cambio_parte_id = $request->input('cambio_parte_id');
            $recarga->prueba_id = $request->input('prueba_id');
            $recarga->fuga_id = $request->input('fuga_id');
            $recarga->observacion = $request->input('observacion');
            $recarga->save();
            return back()->with('exito', 'Se guardo el registro correctamente');
        #} catch (\Throwable $th) {
            return back()->with('errors', 'No se pudo crear el registro');
        #}
    }
    
}
