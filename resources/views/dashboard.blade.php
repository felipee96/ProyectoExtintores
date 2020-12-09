@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Panel principal')])

@section('content')
<div class="content">
  @can('recepcionista')
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">content_copy</i>
            </div>
            <p class="card-category">{{__('Ingreso totales')}}</p>
            <h3 class="card-title">{{$ingresoTotal}}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              {{__('Ingresos totales realizados hasta la fecha')}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">store</i>
            </div>
            <p class="card-category">{{__('Empresas registradas')}}</p>
            <h3 class="card-title">{{$empresaTotal}}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              {{__('empresas que se encuentran vinculadas')}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">info_outline</i>
            </div>
            <p class="card-category">{{__('Ingreso pendientes')}}</p>
            <h3 class="card-title">{{$ingresoPendiente}}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              {{__('Ingresos en falta de revisión del técnico')}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="material-icons">assignment_ind</i>
            </div>
            <p class="card-category">{{__('Total empleados')}}</p>
            <h3 class="card-title">{{$empleadosTotal}}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">{{__('Empleados registrados en diferentes sectores')}}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-header card-header-warning">
            <h4 class="card-title">{{__('Empresa registradas')}}</h4>
          </div>

          <div class="card-body table-responsive">
            <table class="table table-hover" id="example">
              <thead class="text-warning">
                <th>{{__('ID')}}</th>
                <th>{{__('Nombre empresa')}}</th>
                <th>{{__('Nit')}}</th>
                <th>{{__('Dirección')}}</th>
                <th>{{__('Fecha registro')}}</th>
              </thead>
              <tbody>
                @foreach (Empresa() as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->nombre_empresa}}</td>
                  <td>{{$item->nit}}</td>
                  <td>{{$item->direccion}}</td>
                  <td>{{date("d F Y", strtotime($item->created_at))}}</td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          @endcan

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
  $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
</script>
@endpush