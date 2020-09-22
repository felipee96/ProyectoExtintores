@extends('layouts.app', ['activePage' => 'encargado', 'titlePage' => __('Gestión de Encargados')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    @if (session('exito'))
                    <div class="alert alert-success" role="alert">
                        {{ session('exito') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            <li>{{ $error }}</li>
                        </div>
                        @endforeach
                    </ul>
                    @endif
                    <div class="card">
                        <div class="card-header card-header-text card-header-warning">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('Registrar Encargado') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">

                            <form method="POST" action="{{ url('/encargado') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="empresa_id">{{ __('Seleccionar Empresa') }}</label>
                                    <select class="form-control" name="empresa_id" id="empresa_id">
                                        <option value="">---SELECCIONAR---</option>
                                        @foreach (Empresa() as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre_empresa }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nombre_encargado">{{ __('Nombre completo del encargado:') }}</label>
                                    <input type="text" class="form-control" id="nombre_encargado" required
                                        name="nombre_encargado">
                                </div>
                                <div class="form-group">
                                    <label for="numero_celular">{{ __('N° de contacto:') }}</label>
                                    <input type="number" class="form-control" id="numero_celular" required
                                        name="numero_celular">
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('Email:') }}</label>
                                    <input type="email" class="form-control" id="email" required name="email">
                                </div>
                                <div class="form-group">
                                    <label for="direccion">{{ __('Dirección:') }}</label>
                                    <input type="text" class="form-control" id="direccion" required name="direccion">
                                </div>
                                <div class="form-group">
                                    <label for="numero_serial">{{ __('N° Serial:') }}</label>
                                    <input type="text" class="form-control" id="numero_serial" required
                                        name="numero_serial">
                                </div>
                                <button class="btn btn-warning">{{ __('Enviar') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="container">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">Encargados registrados</h4>
                            <div class="col-md-6">
                                <form>
                                    <div class="input-group no-border">
                                        <input type="text" value="" class="form-control" name="search" placeholder=""
                                            type="search" style="color: white">
                                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                            <i class="material-icons">search</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </form>
                                <div>
                                    <a href="{{ route('encargado') }}">
                                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                            <i class="material-icons">refresh</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </a>
                                </div>

                            </div>

                        </div>
                        <div class="card-body table-responsive">
                            <table id="example" class="table table-hover">
                                <thead class="text-warning">
                                    <tr>
                                        <th class="text-center">{{ __('#') }}</th>
                                        <th>{{ __('Nombre empresa') }}</th>
                                        <th>{{ __('Nombre encargado') }}</th>
                                        <th>{{ __('N° Contacto') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Direccion') }}</th>
                                        <th>{{ __('N° Serial') }}</th>
                                        <th class="text-right">{{ __('Evento') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->id }}</td>
                                        <td>{{ $item->empresa->nombre_empresa }}</td>
                                        <td>{{ $item->nombre_encargado }}</td>
                                        <td>{{ $item->numero_celular }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->direccion }}</td>
                                        <td>{{ $item->numero_serial }}</td>
                                        <td class="">

                                            <button type="button" rel="tooltip" title="Editar"
                                                class="btn btn-primary btn-link btn-sm" data-toggle="modal"
                                                data-target="#editar{{ $item->id }}">
                                                <i class="material-icons">edit</i>
                                            </button>

                                            <div class="modal" tabindex="-1" role="dialog" id="editar{{ $item->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar encargado</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="/encargado/{{$item->id}}">
                                                                {{ csrf_field() }}
                                                                {{ method_field('PUT')}}
                                                                <div class="form-group">
                                                                    <label
                                                                        for="empresa_id">{{ __('Empresa donde pertenece') }}</label>
                                                                    <select class="form-control" name="empresa_idN"
                                                                        id="empresa_idN" disabled>
                                                                        <option value="{{ $item->empresa_id }}">{{ $item->empresa->nombre_empresa }} </option>
                                                                        <input type="hidden" name="empresa_id" id="empresa_id" value="{{ $item->empresa_id }}" />
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        for="nombre_encargado">{{ __('Nombre completo del encargado:') }}</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nombre_encargado" required
                                                                        name="nombre_encargado"
                                                                        value="{{$item->nombre_encargado}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        for="numero_celular">{{ __('N° de contacto:') }}</label>
                                                                    <input type="number" class="form-control"
                                                                        id="numero_celular" required
                                                                        name="numero_celular"
                                                                        value="{{$item->numero_celular}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email">{{ __('Email:') }}</label>
                                                                    <input type="email" class="form-control" id="email"
                                                                        required name="email" value="{{$item->email}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        for="direccion">{{ __('Dirección:') }}</label>
                                                                    <input type="text" class="form-control"
                                                                        id="direccion" required name="direccion"
                                                                        value="{{$item->direccion}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        for="numero_serial">{{ __('N° Serial:') }}</label>
                                                                    <input type="text" class="form-control"
                                                                        id="numero_serial" required name="numero_serial"
                                                                        value="{{$item->numero_serial}}">
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button
                                                                        class="btn btn-primary">{{ __('Enviar') }}</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">
                                            <form action="/encargado/{{$item->id }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" rel="tooltip" title="Eliminar"
                                                    class="btn btn-danger btn-link btn-sm">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="mx-auto">
                                    {{$data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection