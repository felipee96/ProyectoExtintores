<?php

namespace App\Http\Controllers\Categoria;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categoria\CategoriaCreateRequest;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Exception;

class CategoriaController extends Controller
{

    public function index()
    {
        return view('pages.categoria.categoria');
    }
    public function store(CategoriaCreateRequest $request)
    {
        try {
            $data = Categoria::create($request->all());
            return back()->with('exito', 'Se completo el registro');
        } catch (\Throwable $th) {
            return back()->with('errors', 'No se pudo completar el registro');
        }
    }
    public function update(CategoriaCreateRequest $request, $id)
    {
        try {
            $categoria = Categoria::find($id);
            $categoria->nombre_categoria = $request->input('nombre_categoria');
            $categoria->update();
            return redirect('categoria');
        } catch (\Throwable $th) {
            return back()->with('errors', 'No se puedo completar este evento');
        }
    }
    public function destroy($id)
    {
        #Eliminar un cliente segun su ID
        try {
            $error='Error no se puede eliminar este registro';
            $delectCategoria = Categoria::findOrFail($id);
            $delectCategoria->delete();
            return back();
        } catch (Exception $error) {
            return back()->with('error',$error);
        }
        
    }
}
