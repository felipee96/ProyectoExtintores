@extends('layouts.app', ['activePage' => 'empresa_encargado', 'titlePage' => __('Gestión de Empresas')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
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
                                <h4 class="card-title">{{ __('Registrar Empresa') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">

                            <form method="POST" action="{{ url('/empresa') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="nombre_empresa">{{ __('Nombre de la empresa:') }}</label>
                                    <input type="text" class="form-control" id="nombre_empresa" required
                                        name="nombre_empresa">
                                </div>
                                <div class="form-group">
                                    <label for="nit">{{ __('Nit:') }}</label>
                                    <input type="number" class="form-control" id="nit" required name="nit">
                                </div>
                                <div class="form-group">
                                    <label for="direccion">{{ __('Direccion:') }}</label>
                                    <input type="text" class="form-control" id="direccion" required name="direccion">
                                </div>
                                <button class="btn btn-warning">{{ __('Enviar') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="container">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">Empresas registradas</h4>
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
                                    <a href="{{ route('empresa') }}">
                                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                            <i class="material-icons">refresh</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </a>
                                </div>

                            </div>

                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                    <tr>
                                        <th class="text-center">{{ __('#') }}</th>
                                        <th>{{ __('Nombre empresa') }}</th>
                                        <th>{{ __('Nit') }}</th>
                                        <th>{{ __('Direccion') }}</th>
                                        <th class="text-right">{{ __('Evento') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->id }}</td>
                                        <td>{{ $item->nombre_empresa }}</td>
                                        <td>{{ $item->nit }}</td>
                                        <td>{{ $item->direccion }}</td>
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
                                                            <h5 class="modal-title">Editar empresa</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="/empresa/{{$item->id}}">
                                                                {{ csrf_field() }}
                                                                {{ method_field('PUT')}}
                                                                <div class="form-group">
                                                                    <label
                                                                        for="nombre_empresa">{{ __('Nombre de la empresa:') }}</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nombre_empresa" required
                                                                        name="nombre_empresa"
                                                                        value="{{$item->nombre_empresa}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        for="nit">{{ __('Nit:') }}</label>
                                                                    <input type="number" class="form-control" id="nit"
                                                                        required name="nit" value="{{$item->nit}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        for="direccion">{{ __('Direccion:') }}</label>
                                                                    <input type="text" class="form-control"
                                                                        id="direccion" required name="direccion"
                                                                        value="{{$item->direccion}}">
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
                                            <form action="/empresa/{{$item->id }}" method="post">
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