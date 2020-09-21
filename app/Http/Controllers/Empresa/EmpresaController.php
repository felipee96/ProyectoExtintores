<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Empresa\EmpresaRequest;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Exception;


class EmpresaController extends Controller
{
    public function index(Request $request)
    {
        //trim sire para quitar espacios en blanco
        if ($request) {

            $filtro = trim($request->get('search'));
            //filtrar por nombre
            $data = Empresa::where('nombre_empresa', 'LIKE', '%' . $filtro . '%')
                ->orderBy('id', 'asc')
                ->paginate(5);
            return view('pages.empresa.empresa', ['data' => $data, 'search' => $filtro]);
            
        }
        //$data = Empresa::all();
        //return view('pages.empresa.empresa',['data' => $data]);
    }
    public function store(EmpresaRequest $request)
    {
        try {
            $data = Empresa::create($request->all());
            return back()->with('exito', 'Se guardo el registro correctamente');
        } catch (\Throwable $th) {
            return back()->with('errors', 'No se pudo crear el registro');
        }
    }
    
    public function update(Request $request, $id)
    {
        try {
            $empresa = Empresa::find($id);
            $empresa->nombre_empresa = $request->input('nombre_empresa');
            $empresa->nit = $request->input('nit');
            $empresa->direccion = $request->input('direccion');
            $empresa->update();
            return back()->with('exito', 'Se actualizo el registro correctamente');
        } catch (\Throwable $th) {
            return back()->with('errors', 'No se puedo actualizar este registro');
        }
    }
    public function destroy($id)
    {
        
        try {
            $delectEmpresa = Empresa::findOrFail($id);
            $delectEmpresa->delete();
            return back()->with('exito', 'Se elimino el registro correctamente');
        } catch (Exception $a) {
            return back()->with('errors', 'No se puedo eliminar este registro');
        }
    }
}
