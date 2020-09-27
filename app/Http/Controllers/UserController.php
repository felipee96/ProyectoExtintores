<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;




class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function update(Request $request, $id)
    {
        try {
            $usuario = User::find($id);
            $usuario->nombre = $request->input('nombre');
            $usuario->apellido = $request->input('apellido');
            $usuario->cargo = $request->input('cargo');
            $usuario->email = $request->input('email');
            $usuario->update();
            return back()->with('editar', 'Se actualizo el registro correctamente');
        } catch (\Throwable $th) {
            return back()->with('errors', 'No se puedo actualizar este registro');
        }
    }
    public function destroy($id)
    {
        try {
            $delectUsuario = User::findOrFail($id);
            $delectUsuario->delete();
            return back()->with('error', 'Se elimino el registro correctamente');
        } catch (Exception $a) {
            return back()->with('errors', 'No se puedo eliminar este registro');
        }
    }
}
