@extends('layouts.app', ['activePage' => 'categoria', 'titlePage' => __('Editar categoria')])

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
                   <form method="POST" action="/categoria/{{$data->id}}">
                    {{ csrf_field()}}
                    {{ method_field('PUT')}}
                    <div class="form-group">
                    <label for="nombre_categoria">{{__('Nombre categoria')}}</label>
                    <input type="text" class="form-control" id="nombre_categoria" required name="nombre_categoria" value="{{$data->nombre_categoria}}">
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