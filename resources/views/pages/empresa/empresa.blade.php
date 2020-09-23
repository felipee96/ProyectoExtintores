@extends('layouts.app', ['activePage' => 'empresa_encargado', 'titlePage' => __('Gestión de Empresas')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    @if(session('editar'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('editar') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (session('exito'))
                    <div class="alert alert-success" role="alert">
                        {{ session('exito') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
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
            <div class="col-md-12">
                <div class="container">
                    <div class="card">
                        <div class="card-header card-header-text card-header-warning">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('Ver Empresas') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr class="text-center">
                                        <th>{{ __('Nombre empresa') }}</th>
                                        <th>{{ __('Nit') }}</th>
                                        <th>{{ __('Direccion') }}</th>
                                        <th>{{ __('Evento') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Empresa() as $item)
                                    <tr>
                                        <td>{{ $item->nombre_empresa }}</td>
                                        <td>{{ $item->nit }}</td>
                                        <td>{{ $item->direccion }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-2 mt-1">
                                                    <button type="submit"
                                                        class="btn btn-success btn-fab btn-fab-mini btn-round"
                                                        data-toggle="modal" data-target="#editar{{ $item->id }}">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </div>
                                                <div class="modal" tabindex="-1" role="dialog"
                                                    id="editar{{ $item->id }}">
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
                                                                        <label for="nit">{{ __('Nit:') }}</label>
                                                                        <input type="number" class="form-control"
                                                                            id="nit" required name="nit"
                                                                            value="{{$item->nit}}">
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
                                                <div class="col-2">
                                                    <form action="/empresa/{{$item->id }}" method="post">
                                                        {{ csrf_field()}}
                                                        {{ method_field('DELETE')}}
                                                        <button type="submit"
                                                            class="btn btn-danger btn-fab btn-fab-mini btn-round mt-2"
                                                            style=""><i class="material-icons">close</i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection