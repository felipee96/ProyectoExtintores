<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>  
</head>
<body>
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
                        <script src="js/combo/comboDinamico.js"></script>
                        <div class="card">
                            <div class="card-header card-header-text card-header-warning">
                                <div class="card-text">
                                    <h4 class="card-title">{{ __('Registrar Listado De Ingreso para') }}</h4>
                                    {{-- <h2>{{$referencia}}</h2> --}}
                                </div>
                            </div>
                            <div class="card-body">
    
                                <form method="POST" action="{{ url('/listadoIngreso') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="ingreso_id">{{ __('N° Referencia:') }}</label>
                                        <input type="text" class="form-control" id="ingreso_id" required
                                            name="ingreso_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="categoria">{{ __('Seleccionar Categoria:') }}</label>
                                        <select class="form-control" name="categoria" id="categoria">
                                            <option value="">---SELECCIONAR---</option>
                                            @foreach (Categoria() as $item)
                                            <option value="{{ $item->id}}">{{ $item->nombre_categoria}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="subCategoria">{{ __('Seleccionar Subcategoria:') }}</label>
                                        <select class="form-control" name="Subcategoria" id="Subcategoria">
                                            <option value="">---SELECCIONAR---</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="unidad_medida_id">{{ __('Seleccionar Unidad De Medida:') }}</label>
                                        <select class="form-control" name="unidad_medida_id" id="unidad_medida_id">
                                            <option value="">---SELECCIONAR---</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="numero_extintor">{{ __('Numero De Extintores:') }}</label>
                                        <input type="number" class="form-control" id="numero_extintor" required name="numero_extintor">
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
                                    <h4 class="card-title">{{ __('Ver Listados de ingreso') }}</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="example">
                                    <thead>
                                        <tr class="text-center">
                                            <th>{{ __('N° Referencia') }}</th>     
                                            <th>{{ __('Categoria') }}</th>
                                            <th>{{ __('Subcategoria') }}</th>
                                            <th>{{ __('Unidad de medida') }}</th>
                                            <th>{{ __('Numero de extintores') }}</th>
                                            <th>{{ __('Evento') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (ListadoIngreso() as $item)
                                        <tr>
                                            <td>{{ $item->ingreso_id }}</td>
                                            <td>{{ $item->nombre_categoria }}</td>
                                            <td>{{ $item->nombre_subCategoria }}</td>
                                            <td>{{$item->cantidad_medida}} {{ $item->unidad_medida}}</td>
                                            <td>{{$item->numero_extintor}}</td>
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
                                                                    <h5 class="modal-title">Editar listado de ingreso</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="/listadoIngreso/{{$item->id}}">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('PUT')}}
                                                                        <div class="form-group">
                                                                            <label for="ingreso_id">{{ __('N° Referencia:') }}</label>
                                                                            <input type="text" class="form-control" id="ingreso_id" required readonly
                                                                                name="ingreso_id" value="{{ $item->ingreso_id }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="categoria">{{ __('Categoria:') }}</label>
                                                                            <select class="form-control" name="categoria" id="categoria" disabled>
                                                                                <option value="">{{ $item->nombre_categoria }}</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="subCategoria">{{ __('Subcategoria:') }}</label>
                                                                            <select class="form-control" name="subCategoria" id="subCategoria" disabled>
                                                                                <option value="">{{ $item->nombre_subCategoria }}</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="unidad_medida_idN">{{ __('Unidad De Medida:') }}</label>
                                                                            <select class="form-control" name="unidad_medida_idN" id="unidad_medida_idN" disabled>
                                                                                <option value="">{{$item->cantidad_medida}} {{ $item->unidad_medida}}</option>
                                                                                <input type="hidden" name="unidad_medida_id"
                                                                                id="unidad_medida_id"
                                                                                value="{{ $item->unidad_medida_id }}" />
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="numero_extintor">{{ __('Numero De Extintores:') }}</label>
                                                                            <input type="number" class="form-control" id="numero_extintor" required name="numero_extintor" value="{{$item->numero_extintor}}">
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
                                                        <form action="/listadoIngreso/{{$item->id }}" method="post">
                                                            {{ csrf_field()}}
                                                            {{ method_field('DELETE')}}
                                                            <button type="submit"
                                                                class="btn btn-danger btn-fab btn-fab-mini btn-round mt-2"
                                                                style=""><i class="material-icons">Eliminar</i></button>
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
</body>
</html>