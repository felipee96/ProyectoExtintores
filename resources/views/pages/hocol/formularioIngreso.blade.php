@extends('layouts.app', ['activePage' => 'hocol', 'titlePage' => __('Formulario HOCOL')])
@section('content')
<div class="content">
    <div class="container-fluid">
        @if(session('exito'))
        <div class="alert alert-success" role="alert">
            {{ session('exito') }}
        </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="container">
                    @if(session('exito'))
                    <div class="alert alert-success" role="alert">
                        {{ session('exito') }}
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="col-sm-12">
            <div class="container">
                <div class="card">
                    <div class="card-header card-header-text card-header-warning">
                        <div class="card-text">
                            <h4 class="card-title">{{ __('Registro de formulario Hocol') }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{url('/hocol')}}">
                            {{ csrf_field()}}
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="area">{{__('Area')}}</label>
                                        <input type="text" class="form-control" id="area" name="area">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <input hidden type="text" class="form-control" value="{{Auth::user()->id}}"
                                        id="id_inspeccionado" name="id_inspeccionado">
                                    <div class="form-group">
                                        <label for="inspeccionado">{{__('Inspeccionado por ')}}</label>
                                        <input type="text" class="form-control"
                                            value="{{Auth::user()->nombre}} {{Auth::user()->apellido}}"
                                            id="inspeccionado" name="inspeccionado">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="cargo">{{__('Cargo')}}</label>
                                        <input type="text" class="form-control" value="{{Auth::user()->cargo}}"
                                            id="cargo" name="cargo">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fecha">{{__('Fecha')}}</label>
                                        <input type="month" class="form-control" id="fecha" name="fecha">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="NoExtintor">{{__('# Extintor')}}</label>
                                        <input type="text" class="form-control" id="NoExtintor" name="NoExtintor">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="tipo">{{__('Tipo')}}</label>
                                        <select id="tipo" name="tipo" class=" form-control">
                                            <option value="Portatil">{{__('Portatil')}}</option>
                                            <option value="Carretilla">{{__('Carretilla')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="clase">{{__('Clase')}}</label>
                                        <select name="agente" id="agente" class="form-control">
                                            <option value="">---SELECCIONAR---</option>
                                            @foreach (SubCategoriaActiva() as $item)
                                            <option value="{{ $item->id}}">{{ $item->nombre_subCategoria}}
                                                --->{{$item->nombre_categoria}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="tipo">{{__('Capacidad en libras')}}</label>
                                        <select name="capacidadProducto" id="capacidadProducto" class="form-control">
                                            <option value="">{{__('Seleccione unidad de medida')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="ubicacion">{{__('Ubicacion')}}</label>
                                        <input type="text" class="form-control" id="ubicacion" name="ubicacion">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="URecarga">{{__('Ultima recarga')}}</label>
                                        <input type="month" class="form-control" id="URecarga" name="URecarga">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="PRecarga">{{__('Proxima recarga')}}</label>
                                        <input type="month" class="form-control" id="PRecarga" name="PRecarga">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="hidrostatica">{{__('Fecha prueba hidrostatica')}}</label>
                                        <input type="month" class="form-control" id="hidrostatica" name="hidrostatica">
                                    </div>
                                </div>

                            </div>
                            <div class="dropdown-divider mt-5"></div>
                            <h3 class="text-center">{{__('INFORMACIÓN GENERAL EXTINTORES PORTATILES')}}</h3>
                            <p class="text-center">{{__('ASPECTOS A INSPECCIONAR')}}</p>
                            <div class="form-group">
                                <div class="row">
                                    @foreach (ExtintoresPortatiles() as $item)
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="clase">{{$item->nombreParteExtintor}}</label>
                                            <select name="{{$item->nombreParteExtintor}}"
                                                id="{{$item->nombreParteExtintor}}" class="form-control">
                                                <option value="">{{__('---Seleccionar---')}}</option>
                                                <option value="Bueno">{{__('Bueno')}}</option>
                                                <option value="Regular">{{__('Regular')}}</option>
                                                <option value="Malo">{{__('Malo')}}</option>
                                                <option value="No aplica">{{__('No aplica')}}</option>
                                                <option value="No tiene">{{__('No tiene')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="dropdown-divider mt-3"></div>
                            <h3 class="text-center">{{__('IINFORMACIÓN ADICIONAL EXTINTOR CARRETILLA')}}</h3>
                            <p class="text-center">{{__('ASPECTOS A INSPECCIONAR')}}</p>
                            <div class="form-group">
                                <div class="row">
                                    @foreach (ExtintoresCarretilla() as $item)
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="clase">{{$item->nombreParteExtintorCarretilla}}</label>
                                            <select name="{{$item->nombreParteExtintorCarretilla}}"
                                                id="{{$item->nombreParteExtintorCarretilla}}" class="form-control">
                                                <option value="">{{__('---Seleccionar---')}}</option>
                                                <option value="Bueno">{{__('Bueno')}}</option>
                                                <option value="Regular">{{__('Regular')}}</option>
                                                <option value="Malo">{{__('Malo')}}</option>
                                                <option value="No aplica">{{__('No aplica')}}</option>
                                                <option value="No tiene">{{__('No tiene')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="observacion">{{__('Observacion')}}</label>
                                        <input type="text" class="form-control" id="observacion" name="observacion">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="inspeccion">{{__('Fecha inspeccion')}}</label>
                                        <input type="date" class="form-control" id="inspeccion" name="inspeccion">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-warning">{{__('Enviar')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("#agente").change(function(){
      var categoria = $(this).val();
      $.get('recarga/getUnidad/'+categoria, function(data){
//esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
          var producto_select = '<option value="">Seleccione Porducto</option>'
            for (var i=0; i<data.length;i++)
              producto_select+='<option value="'+data[i].id+'">'+data[i].cantidad_medida+'</option>';

            $("#capacidadProducto").html(producto_select);

      });
    });
  });
</script>
@endsection