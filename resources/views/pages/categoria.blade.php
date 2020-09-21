@extends('layouts.app', ['activePage' => 'categoria', 'titlePage' => __('Categoria')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="row">
            <div class="col">
              <div class="container">
                <div class="card">
                  <div class="card-header card-header-text card-header-primary">
                    <div class="card-text">
                      <h4 class="card-title">{{ __('Ver categoria') }}</h4>
                    </div>
                  </div>
                  <div class="card-body">
                    @if(session('editar'))
                    <div class="alert alert-success" role="alert">
                      {{ session('editar') }}
                    </div>
                    @endif
                    <table class="table">
                      <thead>
                          <tr>
                              <th class="text-center">{{ __('#') }}</th>
                              <th>{{ __('Nombre categoria') }}</th>
                              <th class="text-right">{{ __('Evento') }}</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach (Categoria() as $item)
                        <tr>
                          <td class="text-center">{{$item->id}}</td>
                          <td>{{$item->nombre_categoria}}</td>
                          <td>
                            <a href="/categoria/{{$item->id }}"><button type="submit" class="btn btn-success btn-fab btn-fab-mini btn-round"><i class="material-icons">edit</i></button></a>
                            <form action="/categoria/{{$item->id }}" method="post">
                                {{ csrf_field()}}
                                {{ method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger btn-fab btn-fab-mini btn-round mt-2" style=""><i class="material-icons">close</i></button>
                            </form>
                          </td>
                          
                      </tr>
                        @endforeach
                      </tbody>
                  </table>
                  <div class="text-center">
                     {{ Categoria()->links("pagination::bootstrap-4") }}
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
                      <h4 class="card-title">{{ __('Registrar categoria') }}</h4>
                    </div>
                  </div>
                  <div class="card-body">
                    @if(session('exito'))
                    <div class="alert alert-success" role="alert">
                      {{ session('exito') }}
                    </div>
                    @endif
                    @if($errors->any())
                      <ul>
                        @foreach($errors->all() as $error)
                          <div class="alert alert-danger" role="alert">
                            <li>{{ $error }}</li>
                          </div>
                          @endforeach
                      </ul>
                   @endif
                   <form method="POST" action="{{url('/categoria')}}">
                    {{ csrf_field()}}
                    <div class="form-group">
                    <label for="nombre_categoria">{{__('Nombre categoria')}}</label>
                    <input type="text" class="form-control" id="nombre_categoria" required name="nombre_categoria">
                  </div>
                  <button class="btn btn-rose">{{__('Enviar')}}</button>
                </form>
                  </div>
              </div>
              </div>
            </div>
            </div>
      </div>
    </div>
   </div>
@endsection