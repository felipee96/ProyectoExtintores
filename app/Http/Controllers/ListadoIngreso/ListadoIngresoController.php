<?php

namespace App\Http\Controllers\ListadoIngreso;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListadoIngreso\ListadoIngresoCreate;
use Illuminate\Http\Request;
use App\Models\ListadoIngreso;
use App\Models\Subcategoria;
use App\Models\UnidadMedida;
use Exception;

class ListadoIngresoController extends Controller
{
    public function index()
    {
        return view('pages.listadoIngreso.listadoIngreso');
    }

    public function byCategoria($id)
    {   
        //traer las subcategorias que pertenezcan a esa categoria 
        return Subcategoria::where('categoria_id', $id)->get();
    }

    public function bySubcategoria($id)
    {   
        //traer las unidades de medida que pertenezcan a esa subcategoria 
        return UnidadMedida::where('sub_categoria_id', $id)->get();
    }

    public function store(ListadoIngresoCreate $request)
    {
        try {

            $listadoIngreso = new ListadoIngreso();
            $listadoIngreso->ingreso_id = $request->input('ingreso_id');
            $listadoIngreso->unidad_medida_id = $request->input('unidad_medida_id');
            $listadoIngreso->numero_extintor = $request->input('numero_extintor');
            $listadoIngreso->save();
            return back()->with('exito', 'Se guardo el registro correctamente');
        } catch (\Throwable $th) {
            return back()->with('errors', 'No se pudo crear el registro');
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
