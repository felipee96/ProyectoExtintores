<?php

namespace App\Http\Controllers\ListadoIngreso;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListadoIngreso\ListadoIngresoCreate;
use App\Models\Ingreso;
use App\Models\ListadoIngreso;
use App\Models\SubCategoria;
use App\Models\UnidadMedida;
use Exception;

class ListadoIngresoController extends Controller
{
    public function index($id)
    {
        return view('pages.listadoIngreso.listadoIngreso', compact('id'));
    }

    public function byCategoria($id)
    {
        $data = SubCategoria::select('id', 'nombre_subCategoria')->where('categoria_id', '=', $id)->get();
        //traer las subcategorias que pertenezcan a esa categoria 
        //return Subcategoria::where('categoria_id', $id)->get();
        return response()->json($data);
    }

    public function bySubcategoria($id)
    {
        //traer las unidades de medida que pertenezcan a esa subcategoria 
        return UnidadMedida::where('sub_categoria_id', $id)->get();
    }

    public function store(ListadoIngresoCreate $request)
    {
        $numExtRecibido = $request->numero_extintor;
        $totalExtIngreso = Ingreso::where('id', $request->ingreso_id)->select('id','numero_total_extintor')->first();
        $totalExtIngreso = $totalExtIngreso->numero_total_extintor;
        $saveExtTotal = ListadoIngreso::where('ingreso_id', $request->ingreso_id)->sum('numero_extintor');
        $total = (($saveExtTotal  + $numExtRecibido ) - $totalExtIngreso);
        $saveExtTotal = $numExtRecibido + $saveExtTotal;
        if ($saveExtTotal <= $totalExtIngreso) {
            $listadoIngreso = new ListadoIngreso();
            $listadoIngreso->ingreso_id = $request->input('ingreso_id');
            $listadoIngreso->unidad_medida_id = $request->input('unidad_medida_id');
            $listadoIngreso->numero_extintor = $request->input('numero_extintor');
            $listadoIngreso->actividad_id = $request->input('actividad');
            $listadoIngreso->save();
            return back()->with('exito','Se guardo correctamente : '.$total.' restantes');
        }else{
            return back()->with('error', 'Numero de extintores al maximo : ' . $total . ' restantes');
        }
        
    }
    public function update(ListadoIngresoCreate $request, $id)
    {
        try {
            $listadoIngreso = ListadoIngreso::find($id);
            $listadoIngreso->ingreso_id = $request->input('ingreso_id');
            $listadoIngreso->unidad_medida_id = $request->input('unidad_medida_id');
            $listadoIngreso->numero_extintor = $request->input('numero_extintor');
            $listadoIngreso->update();
            return back()->with('editar', 'Se actualizo el registro correctamente');
        } catch (\Throwable $th) {
            return back()->with('errors', 'No se puedo actualizar este registro');
        }
    }
    public function destroy($id)
    {
        try {
            $listadoIngreso = ListadoIngreso::findOrFail($id);
            $listadoIngreso->delete();
            return back()->with('error', 'Se elimino el registro correctamente');
        } catch (Exception $a) {
            return back()->with('errors', 'No se puedo eliminar este registro');
        }
    }
}
