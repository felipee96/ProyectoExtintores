<?php

namespace App\Http\Controllers\CambioPartes;

use App\Http\Controllers\Controller;
use App\Http\Requests\CambioPartes\CambioPartesCreateRequest;
use Illuminate\Http\Request;
use App\Models\CambioParte;
use Exception;


class CambioPartesController extends Controller
{
    public function index(){

        return view('pages.cambioParte.cambioParte');
    }
    public function store(CambioPartesCreateRequest $request){
        try {

            $cambioPartes = new CambioParte();
            $cambioPartes->nombre_parte_cambio = $request->input('nombre_parte_cambio');
            $cambioPartes->save();
            return back()->with('exito', 'Se guardo el registro correctamente');
        } catch (\Throwable $th) {
            return back()->with('errors', 'No se pudo crear el registro');
        }
    }
    public function update(CambioPartesCreateRequest $request, $id)
    {
        try {
            $cambioPartesUp = CambioParte::find($id);
            $cambioPartesUp->nombre_parte_cambio = $request->input('nombre_parte_cambio');
            $cambioPartesUp->update();
            return back()->with('editar', 'Se actualizo el registro correctamente');
        } catch (\Throwable $th) {
            return back()->with('errors', 'No se puedo actualizar este registro');
        }
    }
    public function destroy($id)
    {
        try {
            $delectCambioPartes = CambioParte::findOrFail($id);
            $delectCambioPartes->delete();
            return back()->with('error', 'Se elimino el registro correctamente');
        } catch (Exception $a) {
            return back()->with('errors', 'No se puedo eliminar este registro');
        }
    }
}
