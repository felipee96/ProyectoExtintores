<?php

namespace App\Http\Controllers\Unidad;

use App\Http\Controllers\Controller;
use App\Http\Requests\Unidad\UnidadCreateRequest;
use App\Models\SubCategoria;
use App\Models\unidad;
use Illuminate\Http\Request;
use App\Models\UnidadMedida;
use Exception;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.unidad');
    }
    public function store(UnidadCreateRequest $request)
    { 
        try {
            $error = 'No se puedo realizar el registro';
            $unidad = new UnidadMedida();
            $unidad->unidad_medida = $request->input('unidad_medida');
            $unidad->cantidad_medida = $request->input('cantidad_medida');
            $unidad->sub_categoria_id = $request->input('unidad');
            $unidad->save();
            return back();
        } catch (\Throwable $error) {
            return back()->with($error);
        }
    }
    public function edit($id)
    {
        $subCategoria = SubCategoria::select('id', 'nombre_subCategoria')->get();
        $data = UnidadMedida::findOrFail($id);
        return view('pages.categoria.editarUnidadMedida', compact('data', 'subCategoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $unidad = UnidadMedida::find($id);
            $unidad->unidad_medida = $request->input('unidad_medida');
            $unidad->cantidad_medida = $request->input('cantidad_medida');
            $unidad->sub_categoria_id = $request->input('unidad');
            $unidad->update();
            return redirect('unidad');
        } catch (\Throwable $th) {
            return back()->with('errors', 'No se puedo completar este evento');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        #Eliminar la Unidad segun su ID
        try {
            $delectUnidad = UnidadMedida::findOrFail($id);
            $delectUnidad->delete();
            return back();
        } catch (Exception $a) {
            return 'Error';
        }
    }
}
