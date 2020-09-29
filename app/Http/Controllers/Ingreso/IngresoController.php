<?php

namespace App\Http\Controllers\Ingreso;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ingreso\IngresosCreateRequest;
use App\Models\Ingreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Array_;

class IngresoController extends Controller
{
    private function getIngreso($id_vendedor)
    {
        /** Validamos si encuentra un ingreso con el id del usuario y en estado de recibido si exite que nos lo muestre
         * de lo contrario que nos cree un nuevo ingreso
         */
        $ingreso = DB::table('ingresos')->where('estado', 'recibido')->where('usuario_id', $id_vendedor)->first();

        if ($ingreso)
            return $ingreso;
        else
            $ingreso = new Ingreso();
        $ingreso->fecha_recepcion = now();
        $ingreso->usuario_id = $id_vendedor;
        $ingreso->estado = 'recibido';
        $ingreso->save();

        return $ingreso;
    }
    public function index($id)
    {
        /** Hacemos llamado del metodo anterior llevando el respectivo ingreso */
        $crearId = $this->getIngreso($id);
        return view('pages.ingreso.index', compact('crearId'));
    }
    public function getEstadoIngreso()
    {
        /** Buscamos todos los ingresos que se encuentre con los estados diferentes a recibido */
        
        $data =Ingreso::select('id', 'fecha_recepcion', 'fecha_entrega', 'encargado_id', 'usuario_id', 'numero_total_extintor', 'estado')->where('estado', '!=' ,'recibido')->get();
        return view('pages.ingreso.verIngreso',compact('data'));
    }

    public function update(Request $request, $id)
    {
        
        /** Creamos este metodo para hacer uso de el en varias situaciones */
        #try {
            $ingreso = Ingreso::where('id', $id)->first();
            if ($ingreso) {
                $ingreso->fecha_entrega = $request->input('fecha_entrega');
                $ingreso->encargado_id  = $request->input('encargado_id');
                $ingreso->numero_total_extintor = $request->input('numero_total_extintor');
                $ingreso->estado = 'Proceso';
                // Guardamos en base de datos
                $ingreso->save();
                return redirect('listadoIngreso');
            }
        #} catch (\Throwable $th) {
            return redirect('listIngreso')->with('error', 'No se actualizo  el ingreso');
        #}
    }
    public function destroy($id)
    {
        //
    }
}
