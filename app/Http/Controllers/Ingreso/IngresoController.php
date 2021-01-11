<?php

namespace App\Http\Controllers\Ingreso;

use App\Http\Controllers\Controller;
use App\Models\Ingreso;
use App\models\NumeroTiquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
    public function getIngreso($id_vendedor)
    {
        /** Validamos si encuentra un ingreso con el id del usuario y en estado de recibido si exite que nos lo muestre
         * de lo contrario que nos cree un nuevo ingreso
         */

        $ingreso = DB::table('ingresos')->where('estado', 'recibido')->where('usuario_id', $id_vendedor)->first();
        if ($ingreso)
            return $ingreso;
        else
            $ingreso = new Ingreso();
        $ingreso->fecha_recepcion = now();
        $ingreso->usuario_id = $id_vendedor;
        $ingreso->numero_referencia = $ingreso->id;
        $ingreso->estado = 'recibido';
        $ingreso->save();

        return $ingreso;
    }
    public function index($id)
    {
        /** Hacemos llamado del metodo anterior llevando el respectivo ingreso */
        $crearId = $this->getIngreso($id);
        return view('pages.ingreso.index', compact('crearId'));
    }
    public function listadoIngreso($id)
    {
        $actingreso = Ingreso::where('numero_referencia', $id)->first();
        $total = $actingreso->numero_total_extintor;
        // $cantidad = ListadoIngreso::where('ingreso_id',$id)->first();
        // $total = ($actingreso->numero_total_extintor)-($cantidad->numero_extintor);
        return view('pages.listadoIngreso.listadoIngreso', compact('id', 'total'));
    }
    public function getEstadoIngreso()
    {
        /** Buscamos todos los ingresos que se encuentre con los estados diferentes a recibido */

        $data = Ingreso::select('id', 'fecha_recepcion', 'fecha_entrega', 'encargado_id', 'usuario_id', 'numero_referencia', 'numero_total_extintor', 'estado')
            ->where('estado', '=', 'Produccion')->get();
        return view('pages.ingreso.verIngreso', compact('data'));
    }

    public function update(Request $request, $id)
    {

        /** Creamos este metodo para hacer uso de el en varias situaciones */

        $ingreso = Ingreso::where('id', $id)->first();
        $numeroExtintores = $request->numero_total_extintor;
        $id = $ingreso->id;
        if ($ingreso) {
            $ingreso->fecha_entrega = $request->input('fecha_entrega');
            $ingreso->encargado_id  = $request->input('encargado_id');
            $ingreso->numero_referencia = $ingreso->id;
            $ingreso->numero_total_extintor = $request->input('numero_total_extintor');
            $total = $request->input('numero_total_extintor');
            $ingreso->estado = 'Produccion';
            /**
             * Hacemos llamado al metodo donde nos indica la etiqueta anterior 
             * y hace la suma de los extintores que estamos ingresando para generar las etiquetas
             * pertinentes
             */
            $numeroEtiqueta = NumeroTiquete::select('id', 'numero_tiquete')->get()->last();
            // return [
            //     'etiquetaDisponible' => $numeroEtiqueta->numero_tiquete,
            //     'numeroExtintoresIngreso' => $numeroExtintores,
            //     'nuevaEtiqueta' => (($numeroEtiqueta->numero_tiquete) + $numeroExtintores)
            // ];

            // Guardamos en base de datos
            $ingreso->save();
            return redirect('ingresoL/' . $id);
        } else {
            return redirect('listIngreso')->with('error', 'No se actualizo  el ingreso');
        }
    }
    public function cambioEstado($id)
    {
        try {
            $numeroEtiqueta = NumeroTiquete::all()->last();

            $actingreso = Ingreso::where('id', $id)->first();
            for ($i = 1; $i <= $actingreso->numero_total_extintor; $i++) {
                $nuevaEtiqueta = new NumeroTiquete();
                $nuevaEtiqueta->numero_tiquete = $numeroEtiqueta->numero_tiquete + $i;
                $nuevaEtiqueta->ingreso_id = $actingreso->id;
                $nuevaEtiqueta->save();
            }
            if ($actingreso) {
                $actingreso->estado = 'Produccion';
                $actingreso->save();
                return redirect('listIngreso');
            } else {
                return back();
            }
        } catch (\Throwable $th) {
            return back();
        }
    }
    public function actualizarI(Request $request, $id)
    {
        try {
            $ingreso = Ingreso::where('id', $id)->first();
            $id = $ingreso->id;
            if ($ingreso) {
                $ingreso->fecha_entrega = $request->input('fecha_entrega');
                $ingreso->encargado_id  = $request->input('encargado_id');
                $ingreso->numero_referencia = $ingreso->id;
                $ingreso->numero_total_extintor = $ingreso->numero_total_extintor;
                $ingreso->estado = $ingreso->estado;
                // Guardamos en base de datos
                $ingreso->save();

                return redirect('listIngreso');
                //return view('pages.listadoIngreso.listadoIngreso',compact('id','total'));
                //return redirect('listadoIngreso');
            }
        } catch (\Throwable $th) {
            return redirect('listIngreso')->with('error', 'No se actualizo  el ingreso');
        }
    }
    public function updateTotalExtintor(Request $request, $id)
    {
        /** Creamos este metodo para hacer uso de el en varias situaciones */
        try {
            $ingreso = Ingreso::where('id', $id)->first();
            $id = $ingreso->id;
            if ($ingreso) {
                $ingreso->fecha_entrega = $ingreso->fecha_entrega;
                $ingreso->encargado_id  = $ingreso->encargado_id;
                $ingreso->numero_referencia = $ingreso->id;
                $ingreso->numero_total_extintor = $request->numero_total_extintor;
                $ingreso->estado = 'Produccion';
                // Guardamos en base de datos
                $ingreso->save();
                return back();
            }
        } catch (\Throwable $th) {
            return redirect('listIngreso')->with('error', 'No se actualizo  el ingreso');
        }
    }
    public function imprimirTiquete($id)
    {
        $generarCodigo = NumeroTiquete::select('*')->where('ingreso_id', $id)->get();
        // return $generarCodigo;
        return view('barCode', compact('generarCodigo'));
    }
}
