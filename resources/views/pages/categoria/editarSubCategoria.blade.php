@extends('layouts.app', ['activePage' => 'subCategoria', 'titlePage' => __('Editar SubCategoria')])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
              <div class="container">
                <div class="card">
                  <div class="card-header card-header-text card-header-warning">
                    <div class="card-text">
                      <h4 class="card-title">{{ __('Editar categoria') }}</h4>
                    </div>
                  </div>
                  <div class="card-body">
                   <form method="POST" action="/subCategoria/{{$data->id}}">
                    {{ csrf_field()}}
                    {{ method_field('PUT')}}
                    <div class="form-group">
                    <label for="nombre_subCategoria">{{__('Nombre SubCategoria')}}</label>
                    <input type="text" class="form-control" id="nombre_subCategoria" required name="nombre_subCategoria" value="{{$data->nombre_subCategoria}}">
                  </div>
                  <div class="form-group">
                    <label for="abreviacion">{{__('Abreviación')}}</label>
                    <input type="text" class="form-control" id="abreviacion" required name="abreviacion" value="{{$data->abreviacion}}">
                  </div>
                  <div class="form-group">
                      <label for="categoria_id">{{__('Seleccionar Categoria')}}</label>
                      <select class="form-control" name="categoria_id" id="categoria_id">
                        <option value="{{$data->categoria_id}}">--- {{$data->Categoria->nombre_categoria}} ---</option>
                        @foreach ($categoria as $item)
                            <option value="{{$item->id}}">{{$item->nombre_categoria}}</option>
                        @endforeach
                      </select>
                    </div>
                  <button class="btn btn-warning">{{__('Enviar')}}</button>
                </form>
                  </div>
              </div>
              </div>
            </div>
            </div>
      </div>
@endsection