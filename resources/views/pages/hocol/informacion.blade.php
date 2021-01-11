@extends('layouts.app', ['activePage' => 'hocol', 'titlePage' => __('Informacion de ingreso para Hocol')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col">
            <div class="container">
                @if (session('exito'))
                <div class="alert alert-success" role="alert">
                    {{ session('exito') }}
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-success" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header card-header-text card-header-warning">
                        <div class="card-text">
                            <h4 class="card-title">{{ __('Informacion completa registro') }}</h4>
                        </div>
                    </div>
                    <div class="card-body">


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection