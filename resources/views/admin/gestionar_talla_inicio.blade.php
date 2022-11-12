@extends('layouts/layoutAdmin')
@section('title', 'Modificar producto')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/envios.css') }}">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
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
        <h1 id="iniciar">Gestionar Tallas</h1>
        <div class="contenedor-tabla">
            <form action="{{ route('gestionarTalla.index') }}" method="POST">
                @csrf
                <div class="itm">
                    <div class="itm__datos buscar">
                        <label for="nombre">Buscar</label>
                    </div>
                    <div class="itm__datos barra">
                        <input type="text" class="tabla-input" placeholder="Ingrese la referencia o nombre" id="buscar"
                            title="buscar" name="busqueda" value="{{ old('busqueda') }}">
                    </div>
                    <div class="contenedor-btn">
                        <button type="submit" class="buscar-btn">Buscar</button>
                    </div>
                </div>
            </form>
            <div class="contenedor-tabla-visualizar">
                <table class="tabla-visualizar">
                    <thead>
                        <tr>
                            <th>Referencia</th>
                            <th>Nombre</th>
                            <th>Imágen</th>
                            <th>Guía de Tallas</th>
                            <th>Modificar Tallas</th>

                        </tr>
                    </thead>
                    @forelse ($productos as $producto)
                        <tr>
                            <td id="data-referencia"> {{ $producto->referencia }}</td>
                            <td id="data-nombre"> {{ $producto->nombre }}</td>
                            <td id="data-imagen"> {!! isEmpty($producto->imagenProductos) !!}
                            </td>


                            <td><a class="btn-modificar" data-id="{{ $producto->referencia }}"
                                    data-nombre="{{ $producto->nombre }}" data-imagen="{{ $producto->guia_tallas_img }}"
                                    href=""><i class="fas fa-ruler"></i></a></td>


                            <td><a href="{{ route('gestionarTalla.update', $producto) }}" class="btn-modifi"><i
                                        class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" align="center">No se encontraron resultados</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection


@section('contenido-modal')
<div class="contenedor-tabla-modificar">
    <div class="tabla-modificar">
        <div class="cerrar">
            <i class="fas fa-times cerrar__item"></i>
        </div>
        <div class="tabla-main">
            <div class="itm">
                <div class="icon">
                    <i class="fas fa-edit"></i>
                </div>
                <label for="datos" class="datos titulo">Modificar Guía de tallas</label>

            </div>

            
            <form action="{{ route('gestionarTalla.updateGuia') }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <h3 id="referencia" align="center"></h3>
                <h3 id="nombre" align="center"></h3>
                <br>
                <img src=""
                alt="" id="guia" class="guia-tallas-img">
                <br>
                <input type="hidden" name="referencia" id="id-prod" required>
                <div class="itm">
                    <div class="itm__datos ">
                        <label class="label" >Imagen</label>
                        <input type="file" name="archivo" id="nueva-imagen" class="subir">

                    </div>
                </div>
                <div class="contenedor-btn-agg">
                    <button class="agg-btn-mod">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scriptFooter')
<script src="{{ asset('js/algo.js') }}"></script>
@endsection
