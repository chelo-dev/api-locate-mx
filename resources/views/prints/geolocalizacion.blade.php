@extends('templates.layoult-pdf-geolocalizacion')
@section('titulo', 'Informacion detallada')
@section('contenido')

<h5 class="mb-3 text-uppercase bg-dark text-white p-3">
    <img height="45" style="float: right; margin-top: -9.5px;" src="{{ public_path('logo-nav-white.png') }}" alt="{{ __('TITULO') }}">
    Información Detallada
</h5>

<div class="d-flex flex-column justify-content-center align-items-center">

    <p style="float: right">
        <b>Fecha y hora de creación:</b> {{ date('d-m-Y H:i:s', strtotime(now())) }}
    </p>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            
            <div class="row">
                {{-- Información del Municipio --}}
                @isset($data['municipio'])
                <div class="col-md-4">
                    <p><b>Municipio:</b> {{ $data['municipio']['nombre'] }}</p>
                </div>
                <div class="col-md-4">
                    <p><b>Estado/País:</b> {{ $data['municipio']['estado_pais']['nombre'] }}</p>
                </div>
                @endisset

                {{-- Información del Código Postal --}}
                @isset($data['codigo_postal'])
                <div class="col-md-12">
                    <p><b>Código Postal:</b> {{ $data['codigo_postal']['codigo'] }}</p>
                </div>
                @endisset

                @isset($data['pais'])
                <div class="col-md-4">
                    <p><b>País:</b> {{ $data['pais']['nombre'] }}</p>
                </div>
                <div class="col-md-4">
                    <p><b>Abreviatura:</b> {{ $data['pais']['abreviatura'] }}</p>
                </div>
                @endisset

                {{-- Información de la Colonia --}}
                @isset($data['colonia'])
                <div class="col-md-4">
                    <p><b>Colonia:</b> {{ $data['colonia']['nombre'] }}</p>
                </div>
                <div class="col-md-4">
                    <p><b>Tipo de Comunidad:</b> {{ $data['colonia']['tipo_comunidad']['nombre'] }}</p>
                </div>
                @endisset

            </div>

        </div>
    </div>

    <hr>
</div>

@endsection