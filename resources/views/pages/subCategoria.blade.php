@extends('layouts.app', ['activePage' => 'categoria', 'titlePage' => __('SubCategoria')])

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
                      <h4 class="card-title">{{ __('Ver SubCategoria') }}</h4>
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
                              <th>{{ __('Nombre SubCategoria') }}</th>
                              <th>{{ __('Categoria') }}</th>
                              <th>{{ __('Abreviación') }}</th>
                              <th class="text-right">{{ __('Evento') }}</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach (SubCategoria() as $item)
                        <tr>
                          <td>{{$item->nombre_subCategoria}}</td>
                          <td>{{$item->Categoria->nombre_categoria}}</td>
                          <td>{{$item->abreviacion}}</td>
                          <td>
                            <a href="/subCategoria/{{$item->id }}"><button type="submit" class="btn btn-success btn-fab btn-fab-mini btn-round"><i class="material-icons">edit</i></button></a>
                            <form action="/subCategoria/{{$item->id }}" method="post">
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
                      <h4 class="card-title">{{ __('Registrar SubCategoria') }}</h4>
                    </div>
                  </div>
                  <div class="card-body">
                    @if(session('exito'))
                    <div class="alert alert-success" role="alert">
                      {{ session('exito') }}
                    </div>
                    @endif
                     @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                      {{ session('error') }}
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
                   <form method="POST" action="{{url('/subCategoria')}}">
                    {{ csrf_field()}}
                    <div class="form-group">
                    <label for="nombre_subCategoria">{{__('Nombre SubCategoria')}}</label>
                    <input type="text" class="form-control" id="nombre_subCategoria" required name="nombre_subCategoria">
                  </div>
                  <div class="form-group">
                    <label for="abreviacion">{{__('Abreviación')}}</label>
                    <input type="text" class="form-control" id="abreviacion" required name="abreviacion">
                  </div>
                  <div class="form-group">
                      <label for="categoria_id">{{__('Seleccionar Categoria')}}</label>
                      <select class="form-control" name="categoria_id" id="categoria_id">
                        <option value="">---SELECCIONAR---</option>
                        @foreach ($categoria as $item)
                          <option value="{{$item->id}}">{{$item->nombre_categoria}}</option>
                        @endforeach
                      </select>
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