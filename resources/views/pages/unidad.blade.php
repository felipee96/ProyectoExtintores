@extends('layouts.app', ['activePage' => 'categoria', 'titlePage' => __('Unidad y cantidad de medida')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div class="card">
                            <div class="card-header card-header-text card-header-primary">
                                <div class="card-text">
                                    <h4 class="card-title">{{ __('Ver Unidad') }}</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (session('editar'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('editar') }}
                                    </div>
                                @endif
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Unidad de medida') }}</th>
                                            <th>{{ __('Cantidad') }}</th>
                                            <th>{{ __('SubCategoria') }}</th>
                                            <th class="text-right">{{ __('Evento') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Unidad() as $item)
                                            <tr>
                                                <td>{{ $item->unidad_medida }}</td>
                                                <td>{{ $item->cantidad_medida }}</td>
                                                <td>{{ $item->SubCategoria->nombre_subCategoria }}</td>
                                                <td>
                                                    <a href="/unidad/{{ $item->id }}"><button type="submit"
                                                            class="btn btn-success btn-fab btn-fab-mini btn-round"><i
                                                                class="material-icons">edit</i></button></a>
                                                    <form action="/unidad/{{ $item->id }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit"
                                                            class="btn btn-danger btn-fab btn-fab-mini btn-round mt-2"
                                                            style=""><i class="material-icons">close</i></button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    {{ Categoria()->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="container">
                        <div class="card">
                            <div class="card-header card-header-text card-header-rose">
                                <div class="card-text">
                                    <h4 class="card-title">{{ __('Registrar Unidad') }}</h4>
                                </div>
                            </div>
                            <div class="card-body">
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
                                @if ($errors->any())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger" role="alert">
                                                <li>{{ $error }}</li>
                                            </div>
                                        @endforeach
                                    </ul>
                                @endif
                                <form method="POST" action="{{ url('/unidad') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="unidad_medida">{{ __('Nombre Unidad de medida') }}</label>
                                        <input type="text" class="form-control" id="unidad_medida" required
                                            name="unidad_medida">
                                    </div>
                                    <div class="form-group">
                                        <label for="cantidad_medida">{{ __('Cantidad') }}</label>
                                        <input type="number" class="form-control" id="cantidad_medida" required
                                            name="cantidad_medida">
                                    </div>
                                    <div class="form-group">
                                        <label for="categoria_id">{{ __('Seleccionar SubCategoria') }}</label>
                                        <select class="form-control" name="subCategoria" id="subCategoria">
                                            <option value="">---SELECCIONAR---</option>
                                            @foreach (SubCategoria() as $item)
                                                <option value="{{ $item->id }}">{{ $item->nombre_subCategoria }}
                                                    <h2>{{ $item->abreviacion }}</h2>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button class="btn btn-rose">{{ __('Enviar') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
