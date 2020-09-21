<?php

namespace App\Http\Controllers\Encargado;

use App\Http\Controllers\Controller;
use App\Http\Requests\Encargado\EncargadoCreateRequest;
use App\Models\Encargado;
use Illuminate\Http\Request;

class EncargadoController extends Controller
{
    public function index(Request $request)
    {
        //trim sire para quitar espacios en blanco
        if ($request) {

            $filtro = trim($request->get('search'));
            //filtrar por nombre
            $data = Encargado::where('nombre_encargado', 'LIKE', '%' . $filtro . '%')
                ->orderBy('id', 'asc')
                ->paginate(5);
            return view('pages.encargado.encargado', ['data' => $data, 'search' => $filtro]);
            
        }
        //$data = Empresa::all();
        //return view('pages.empresa.empresa',['data' => $data]);
    }
    public function store(EncargadoCreateRequest $request)
    {
        try {
            $data = Encargado::create($request->all());
            return back()->with('exito', 'Se guardo el registro correctamente');
        } catch (\Throwable $th) {
        
            return back()->with('errors', 'No se pudo crear el registro');
        }
    }
    
    public function update(Request $request, $id)
    {
        try {
            $encargado = Encargado::find($id);
            $encargado->empresa_id = $request->input('empresa_id');
            $encargado->nombre_encargado = $request->input('nombre_encargado');
            $encargado->numero_celular = $request->input('numero_celular');
            $encargado->email = $request->input('email');
            $encargado->direccion = $request->input('direccion');
            $encargado->numero_serial = $request->input('numero_serial');
            $encargado->update();
            return back()->with('exito', 'Se actualizo el registro correctamente');
        } catch (\Throwable $th) {
            return back()->with('errors', 'No se puedo actualizar este registro');
        }
    }
    public function destroy($id)
    {
        
        try {
            $delectEncargado = Encargado::findOrFail($id);
            $delectEncargado->delete();
            return back()->with('exito', 'Se elimino el registro correctamente');
        } catch (Exception $a) {
            return back()->with('errors', 'No se puedo eliminar este registro');
        }
    }
}
