<?php

namespace App\Http\Controllers\Actividad;

use App\Http\Controllers\Controller;
use App\Http\Requests\Actividad\ActividadCreateRequest;
use Illuminate\Http\Request;
use App\Models\Actividad;
use Exception;


class ActividadController extends Controller
{
    public function index(){

        return view('pages.actividad.actividad');
    }
    public function store(ActividadCreateRequest $request){
        try {

            $actividad = new Actividad();
            $actividad->nombre_actividad = $request->input('nombre_actividad');
            $actividad->abreviacion_actividad = $request->input('abreviacion_actividad');
            $actividad->save();
            return back()->with('exito', 'Se guardo el registro correctamente');
        } catch (\Throwable $th) {
            return back()->with('errors', 'No se pudo crear el registro');
        }
    }
    public function update(ActividadCreateRequest $request, $id)
    {
        try {
            $actividadUp = Actividad::find($id);
            $actividadUp->nombre_actividad = $request->input('nombre_actividad');
            $actividadUp->abreviacion_actividad = $request->input('abreviacion_actividad');
            $actividadUp->update();
            return back()->with('editar', 'Se actualizo el registro correctamente');
        } catch (\Throwable $th) {
            return back()->with('errors', 'No se puedo actualizar este registro');
        }
    }
    public function destroy($id)
    {
        try {
            $delectActividad = Actividad::findOrFail($id);
            $delectActividad->delete();
            return back()->with('error', 'Se elimino el registro correctamente');
        } catch (Exception $a) {
            return back()->with('errors', 'No se puedo eliminar este registro');
        }
    }
}
