@extends('layouts.app', ['activePage' => 'categoria', 'titlePage' => __('Editar Unidad medida')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="container">
                    <div class="card">
                        <div class="card-header card-header-text card-header-warning">
                            <div class="card-text">
                                <h4 class="card-title">{{ __('Editar Unidad de medida') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/subCategoria/{{ $data->id }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label for="unidad_medida">{{ __('Nombre Unidad de medida') }}</label>
                                    <input type="text" class="form-control" id="unidad_medida" required
                                        name="unidad_medida" value="{{$data->unidad_medida}}">
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
                                <button class="btn btn-warning">{{ __('Enviar') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
