<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <title>KHARMA SOLUTIONS | @yield('titulo')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content="{{ __('TITULO') }}">
        <meta name="copyright" content="{{ __('META_DESCRIPCION') }}">
        <meta name="description" content="{{ __('META_DESCRIPCION') }}" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ public_path('favicon.png') }}">
        <link href="{{ public_path('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <style>
            * {
                font-family: Arial, Helvetica, sans-serif !important;
            }
            .watermark {
                position: fixed;
                top: 50%;
                right: -40px;
                transform: translateY(-50%);
                opacity: 0.8;
                z-index: -1000;
            }
            .espacio-1 {
                height: 40% !important;
            }
            .espacio-2 {
                height: 25% !important;
            }
            .salto-pagina {
                page-break-after: always;
            }
            td {
                white-space: normal;
            }
            .bg-dark {
                background: #0D1F49 !important;
                color: #ffffff !important;
                font-weight: bold !important;
            }
            .bg-kharma {
                background: #0D1F49;
                color: #ffffff;
                font-weight: bold;
            }
        </style>
        @yield('css')
</head>
<body>
    @php
        use Carbon\Carbon;
        setlocale(LC_TIME, 'es_ES.UTF-8');
    @endphp

    <div class="watermark">
        <img src="{{ public_path('marca_agua.png') }}" width="40px" alt="{{ __('TITULO') }}" />
    </div>

    <div class="contenedor"></div>
        @yield('contenido')
    </div>

</body>
</html>