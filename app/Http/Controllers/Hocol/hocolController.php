<?php

namespace App\Http\Controllers\Hocol;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\RegistroHocol;
use App\Models\Hocol;
use App\Models\ListadoCarretilla;
use App\Models\ListadoPortatil;
use App\Models\listadoPrueba;
use Illuminate\Http\Request;

class hocolController extends Controller
{
    use RegistroHocol;
    public function index()
    {
        return view('pages.hocol.formularioIngreso');
    }
    public function store(Request $request)
    {
        return $request;
        // Creamos el objeto
        $data = $this->nuevoRegistro($request);
        $listadoPortatil = $this->listadoPortatil($data, $request->portatiles);
        $listadoCarretilla = $this->listadoCarretilla($data, $request->carretilla);

        return back()->with('exito', 'Se ha registrado con exito el ingreso');
    }
    public function verHocol()
    {
        $data = Hocol::select('*')->with('colaborador', 'capacidadExtintor')->get();
        return view('pages.hocol.index')->with('data', json_decode($data, true));
    }
    public function infoHocol($id)
    {
        $data = Hocol::select('*')->where('id', $id)->with('colaborador', 'capacidadExtintor')->get();
        $listadoCarretilla = ListadoCarretilla::where('id_registro_hocol', $id)->with('carretilla')->get();
        $listadoPortatil = ListadoPortatil::where('id_registro_hocol', $id)->with('portatil')->get();
        return view('pages.hocol.informacion')->with('data', json_decode($data, true), 'listadoCarretilla', json_decode($listadoCarretilla, true), 'listadoPortatil', json_decode($listadoPortatil, true));
    }
}
