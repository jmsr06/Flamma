@extends('layouts/layoutAdmin')

@section('title', 'Modificar imagen')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/envios.css') }}">
@endsection

@section('contenido')
    <div class="contenedor">
        @if (session('typeAlert') && session('message'))
            <div class="{{ session('typeAlert') }}" id="message">
                <i class="fas fa-times" id="close-message"></i>
                <span>{{ session('message') }}</span>
            </div>
        @endif
        @if ($errors->any())
            <div class="error" id="message">
                <i class="fas fa-times" id="close-message"></i>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <h1 id="iniciar">Modificar imagen</h1>
        <div class="contenedor-tabla">
            <form action="{{ route('imagenProducto.buscador') }}" method="POST">
                @csrf
                <div class="itm">
                    <div class="itm__datos buscar">
                        <label for="nombre">Buscar</label>
                    </div>
                    <div class="itm__datos barra">
                        <input type="text" id="buscar" class="tabla-input" placeholder="Ingrese referencia o nombre"
                            title="buscar" name="busqueda" value="{{ old('busqueda') }}">
                    </div>
                    <div class="contenedor-btn">
                        <button class="buscar-btn">Buscar</button>
                    </div>
                </div>
            </form>
            <div class="contenedor-tabla-visualizar">
                <table class="tabla-visualizar">
                    <thead class="thead">
                        <tr>
                            <th>Referencia</th>
                            <th>Nombre</th>
                            <th>Modificar</th>
                        </tr>
                    </thead>
                    @forelse ($productos as $imgprodIndice)
                        <tr>
                            <td>{{ $imgprodIndice->referencia }}</td>
                            <td>{{ $imgprodIndice->nombre }}</td>
                            <td><a href="{{ route('imagenProducto.update', $imgprodIndice ) }}" class="btn-modificar"><i
                                        class="fas fa-edit"></i></a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No se encontraron resultados</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scriptFooter')
<script src="{{ asset('js/algo.js') }}"></script>
@endsection
