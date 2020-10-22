<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Ingreso;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $ingresoTotal = Ingreso::count();
        $empresaTotal = Empresa::count();
        $ingresoPendiente = Ingreso::where('estado', '=', 'Proceso')->count();
        $empleadosTotal = User::count();
        return view('dashboard',compact('ingresoTotal', 'empresaTotal', 'ingresoPendiente', 'empleadosTotal'));
    }
}
