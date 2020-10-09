<?php

namespace App\Http\Controllers\Recarga;

use App\Http\Controllers\Controller;
use App\Http\Requests\Recarga\RecargaCreate;
use App\Models\Ingreso;
use App\Models\Recarga;

class RecargaController extends Controller
{
    public function index()
    {
        $data = Ingreso::select('id', 'fecha_recepcion', 'fecha_entrega', 'encargado_id', 'usuario_id', 'numero_referencia', 'numero_total_extintor', 'estado')->where('estado', '=', 'proceso')->get();
        return view('pages.recarga.verIngresoRecarga',compact('data'));
       //return view('pages.recarga.recarga');
    }
    public function setRecargaListado($id)
    {
      $data = Ingreso::select('id', 'fecha_recepcion', 'fecha_entrega', 'numero_referencia', 'numero_total_extintor')->where('id',$id)->first();
      return $data;
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
