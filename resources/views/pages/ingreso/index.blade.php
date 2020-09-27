@extends('layouts.app', ['activePage' => 'ingreso', 'titlePage' => __('Formulario de ingreso')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col">
            <div class="container">
                @if (session('exito'))
                <div class="alert alert-success" role="alert">
                    {{ session('exito') }}
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header card-header-text card-header-warning">
                        <div class="card-text">
                            <h4 class="card-title">{{ __('Formulario de ingreso') }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                       <form method="POST" action="/ingreso/{{$crearId->id}}" style="margin-top: 40px;"
                        enctype="/multipart/form-data">
                        {{ csrf_field()}}
                        {{ method_field('PUT')}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Fecha Ingreso">{{__('Fecha de ingreso')}}</label>
                                    <input disabled type="text" class="form-control" id="fecha_recepcion" name="fecha_recepcion" value="{{$crearId->fecha_recepcion}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Fecha Entrega">{{__('Fecha de entrega')}}</label>
                                    <input required type="date" class="form-control" id="fecha_entrega" name="fecha_entrega">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Numero Referencia">{{__('Numero de referencia')}}</label>
                                    <input disabled required type="text" class="form-control" id="numero_referencia" name="numero_referencia" value="{{$crearId->id}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Usuario">{{__('Usuario')}}</label>
                                    <input disabled required type="text" class="form-control" id="usuario_id" name="usuario_id" value="{{Auth::user()->nombre}} {{Auth::user()->apellido}}">
                                </div>
                            </div>
                        
                            <div class="form-row">
                                <div class="form-group col-md-6" style="margin-top: 44px">
                                    <label for="Numero">{{__('Numero exintores')}}</label>
                                    <input required type="number" class="form-control" id="numero_total_extintor" name="numero_total_extintor"
                                        placeholder="Ej: ###">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="encargado">{{__('Encargado')}}</label>
                                    <select required id="encargado_id" name="encargado_id"
                                        class="form-control">
                                        <option value="">Seleccionar</option>
                                        @foreach(Encargado() as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item ->nombre_encargado }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <div style="text-align:center; margin-top: 30px;">
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <a href="{{ url('/home') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection