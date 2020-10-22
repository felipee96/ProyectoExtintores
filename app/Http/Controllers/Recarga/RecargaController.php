<?php

namespace App\Http\Controllers\Recarga;

use App\Http\Controllers\Controller;
use App\Models\Ingreso;
use Illuminate\Http\Request;
use App\Models\Recarga;
use Illuminate\Support\Facades\DB;

class RecargaController extends Controller
{
    public function index()
    {
        $data = Ingreso::select('ingresos.id', 'ingresos.fecha_recepcion', 'ingresos.fecha_entrega', 'encargados.nombre_encargado', 'ingresos.usuario_id', 'ingresos.numero_referencia', 'ingresos.numero_total_extintor', 'ingresos.estado')
        ->join('encargados', 'ingresos.encargado_id','=', 'encargados.id')
        ->where('estado', '=', 'Proceso')->get();
        return view('pages.recarga.verIngresoRecarga', compact('data'));
        //return view('pages.recarga.recarga');
    }
    public function setRecargaListado($id)
    {
        $clienteS =Ingreso::select('encargados.numero_serial')
        ->join('encargados', 'ingresos.encargado_id', '=', 'encargados.id')
        ->where('ingresos.id', '=', $id)->get();
        $clienteS = $clienteS[0]['numero_serial'];
        $datos = DB::table('listado_ingreso')
            ->join('ingresos', 'listado_ingreso.ingreso_id', '=', 'ingresos.id')
            ->join('unidades_medida', 'listado_ingreso.unidad_medida_id', '=', 'unidades_medida.id')
            ->join('subcategorias', 'unidades_medida.sub_categoria_id', '=', 'subcategorias.id')
            ->join('categorias', 'subcategorias.categoria_id', '=', 'categorias.id')
            ->join('actividades', 'listado_ingreso.actividad_id', '=', 'actividades.id')
            ->select(
                'listado_ingreso.id',
                'listado_ingreso.ingreso_id',
                'listado_ingreso.numero_extintor',
                'ingresos.fecha_recepcion',
                'unidades_medida.unidad_medida',
            'unidades_medida.cantidad_medida',
                'subcategorias.abreviacion',
                'categorias.nombre_categoria',
                'actividades.abreviacion_actividad'
            )
            ->where('ingreso_id', $id)->get();
        return view('pages.recarga.verListadoIngreso', compact('datos','id', 'clienteS'));
    }
    public function store(Request $request)
    {
       
        return $request;
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
