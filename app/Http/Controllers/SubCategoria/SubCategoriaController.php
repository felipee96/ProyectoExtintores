<?php

namespace App\Http\Controllers\SubCategoria;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoria\SubCategoriaCreateRequest;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\SubCategoria;
use Exception;

class SubCategoriaController extends Controller
{
    public function index()
    {
        $categoria = Categoria::select('id', 'nombre_categoria')->get();
        return view('pages.subCategoria',compact('categoria'));
    }
    public function store(SubCategoriaCreateRequest $request)
    {
        try {
            $error='No se puedo realizar el registro';
            $subCategoria = new SubCategoria();
            $subCategoria->nombre_subCategoria = $request->input('nombre_subCategoria');
            $subCategoria->abreviacion = $request->input('abreviacion');
            $subCategoria->categoria_id = $request->input('categoria_id');
            $subCategoria->save();
            return back();
        } catch (\Throwable $error) {
            return back()->with($error);
        }
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::select('id', 'nombre_categoria')->get();
        $data = SubCategoria::findOrFail($id);
        return view('pages.categoria.editarSubCategoria',compact('data', 'categoria'));
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
            $subCategoria = SubCategoria::find($id);
            $subCategoria->nombre_subCategoria = $request->input('nombre_subCategoria');
            $subCategoria->abreviacion = $request->input('abreviacion');
            $subCategoria->categoria_id = $request->input('categoria_id');
            $subCategoria->update();
            return redirect('subCategoria');
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
        #Eliminar un cliente segun su ID
        try {
            $delectsubCategoria = SubCategoria::findOrFail($id);
            $delectsubCategoria->delete();
            return back();
        } catch (Exception $a) {
            return 'Error';
        }
    }
}
