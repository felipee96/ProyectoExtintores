<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Empresa\EmpresaRequest;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Exception;


class EmpresaController extends Controller
{
    public function index()
    {
        return view('pages.empresa.empresa');
    }
    public function store(EmpresaRequest $request)
    {
        try {

            $empresa = new Empresa();
            $empresa->nombre_empresa = $request->input('nombre_empresa');
            $empresa->nit = $request->input('nit');
            $empresa->direccion = $request->input('direccion');
            $empresa->numero_contacto = $request->input('numero_contacto');
            $empresa->save();
            return back()->with('exito', 'Se guardo el registro correctamente');
        } catch (\Throwable $th) {
            return back()->with('errors', 'No se pudo crear el registro');
        }
    }

    public function update(EmpresaRequest $request, $id)
    {
        try {
            $empresa = Empresa::find($id);
            $empresa->nombre_empresa = $request->input('nombre_empresa');
            $empresa->nit = $request->input('nit');
            $empresa->direccion = $request->input('direccion');
            $empresa->numero_contacto = $request->input('numero_contacto');
            $empresa->update();
            return back()->with('editar', 'Se actualizo el registro correctamente');
        } catch (\Throwable $th) {
            return back()->with('errors', 'No se puedo actualizar este registro');
        }
    }
    public function destroy($id)
    {
        try {
            $delectEmpresa = Empresa::findOrFail($id);
            $delectEmpresa->delete();
            return back()->with('error', 'Se elimino el registro correctamente');
        } catch (Exception $a) {
            return back()->with('errors', 'No se puedo eliminar este registro');
        }
    }
}
