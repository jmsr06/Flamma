@extends('layouts/layout')

@section('title','Carrito de Compras')
@section('css')
{{-- <link rel="stylesheet" href="{{ asset('splide-2.4.12/dist/css/splide.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/detalle.css') }}"> --}}
@endsection
@section('scriptHeader')
{{-- <script src="{{ asset('splide-2.4.12/dist/js/splide.min.js') }}"></script>
<script src="{{ asset('js/sliderDetalle.js') }}"></script> --}}
@endsection
@section('contenido')
<main class="content">
    <h2>Tu carrito</h2>
    <hr>
    <h3>No hay ningún producto en tu carrito</h3>
</main>
@endsection
@section('scriptFooter')
{{-- <script src="{{ asset('js/detalleProducto.js') }}"></script> --}}
@endsection
