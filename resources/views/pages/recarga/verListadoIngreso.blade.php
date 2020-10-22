@extends('layouts.app', ['activePage' => 'recargas', 'titlePage' => __('Gestion De Orden De Producción')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="card">
                        <div class="card-header card-header-text card-header-warning">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('Ver Recargas') }}</h4>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th>{{ __('Nro referencia') }}</th>
                                        <th>{{ __('Nro Extintores') }}</th>
                                        <th>{{ __('Fecha ingreso') }}</th>
                                        <th>{{ __('Capacidad') }}</th>
                                        <th>{{ __('Unidad de medida') }}</th>
                                        <th>{{ __('SubCategoria') }}</th>
                                        <th>{{ __('Categoria') }}</th>
                                        <th>{{ __('Actividad') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datos as $item)
                                    <tr>
                                        <td>{{$item->ingreso_id}}</td>
                                        <td>{{$item->numero_extintor}}</td>
                                        <td>{{$item->fecha_recepcion}}</td>
                                        <td>{{$item->cantidad_medida}}</td>
                                        <td>{{$item->unidad_medida}}</td>
                                        <td>{{$item->abreviacion}}</td>
                                        <td>{{$item->nombre_categoria}}</td>
                                        <td>{{$item->abreviacion_actividad}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-warning">
                        <div class="card-text">
                            <h4 class="card-title">{{ __('Ingresar recarga') }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('/recarga') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nro_tiquete_anterior">{{ __('N° tiquete anterior:') }}</label>
                                            <input type="number" class="form-control" id="nro_tiquete_anterior" required
                                                name="nro_tiquete_anterior">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nro_tiquete_nuevo">{{ __('N° tiquete nuevo:') }}</label>
                                            <input type="number" class="form-control" id="nro_tiquete_nuevo" required
                                                name="nro_tiquete_nuevo">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nro_extintor">{{ __('N° interno cliente:') }}</label>
                                            <input type="number" disabled class="form-control" id="cliente" required
                                                name="nro_extintor" value="{{$clienteS}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nro_extintor">{{ __('N° de extintor:') }}</label>
                                            <input type="number" class="form-control" id="nro_extintor" required
                                                name="nro_extintor">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="agente">{{ __('Agente:') }}</label>
                                            <select class="form-control" required name="agente" id="agente">
                                                <option value="">---SELECCIONAR---</option>
                                                @foreach (SubCategoria() as $item)
                                                <option value="{{ $item->id}}">{{ $item->nombre_subCategoria}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="activida_recarga_id">{{ __('Seleccionar Actividad') }}</label>
                                            <select class="form-control" name="activida_recarga_id"
                                                id="activida_recarga_id">
                                                <option value="">---SELECCIONAR---</option>
                                                @foreach (Actividad() as $item)
                                                <option value="{{ $item->id }}">{{ $item->nombre_actividad }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="capacidad">{{ __('Capacidad del producto') }}</label>
                                            <input type="number" class="form-control" id="capacidad" required
                                                name="capacidad">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="capacidad">{{ __('Unidad de medida') }}</label>
                                            <input type="text" class="form-control" id="unidad" required name="unidad">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="usuario_recarga_id">{{ __('N° de usuario:') }}</label>
                                            <input type="text" class="form-control" id="usuario_recarga_id" required
                                                name="usuario_recarga_id" value="{{ Auth::user()->id }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="ingreso_recarga_id">{{ __('N° de referencia:') }}</label>
                                            <input type="text" class="form-control" id="ingreso_recarga_id" required
                                                disabled value="{{$id}}" name="ingreso_recarga_id">
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-center text-warning">{{__('Cambio de partes del extintor')}}</h3>
                                <div class="form-group">

                                    <div class="row">
                                        @foreach (cambioParte() as $item)
                                        <div class="col-3">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" id="cambio_parte_id" name="cambio_parte_id[]"
                                                    value="{{$item->id}}">{{$item->nombre_parte_cambio}} 
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                                <h3 class="text-center text-warning">{{__('Fugas')}}</h3>
                                <div class="form-group">
                                    @foreach (Fuga() as $item)
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="fuga_id[]"
                                                value="{{$item->id}}">{{$item->abreviacion_fuga}}
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <h3 class="text-center text-warning">{{('Prueba')}}</h3>
                                <div class="form-group">
                                    @foreach (Prueba() as $item)
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="prueba_id[]"
                                                value="{{$item->id}}">{{$item->abreviacion_prueba}}
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="observacion">{{ __('Observación:') }}</label>
                                    <input type="text" class="form-control" id="observacion" required
                                        name="observacion">
                                </div>
                                <button class="btn btn-warning">{{ __('Enviar') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection