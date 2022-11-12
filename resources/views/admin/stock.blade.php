@extends('layouts/layoutAdmin')

@section('title', 'Stock')
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
        <h1 id="iniciar">Stock de productos</h1>
        <div class="contenedor-tabla">
            <form action="{{ route('stock.index') }}" method="POST">
                @csrf
                <div class="itm">
                    <div class="itm__datos buscar">
                        <label for="nombre">Buscar</label>
                    </div>
                    <div class="itm__datos barra">
                        <input type="text" class="tabla-input" placeholder="Ingrese la referencia" id="buscar"
                            title="buscar" name="busqueda" value="{{ old('busqueda') }}">
                    </div>
                    <div class="contenedor-btn">
                        <button type="submit" class="buscar-btn">Buscar</button>
                    </div>
                </div>
            </form>

            <div class="contenedor-tabla-visualizar">
                <table class="tabla-visualizar">
                    <thead class="thead">
                        <tr>
                            <th>Referencia</th>
                            <th>Nombre</th>
                            <th>Talla</th>
                            <th>Existencia</th>
                            <th>Agregar stock</th>
                        </tr>
                    </thead>
                    @forelse ($stock as $producto)
                        @foreach ($producto->tallas as $talla)
                            <tr>
                                <td>{{ $producto->referencia }}</td>
                                <td> {{ $producto->nombre }}</td>
                                <td> {{ $talla->nombre }}</td>
                                <td> {{ $talla->tallaProducto->stock }}</td>
                                <td><a class="btn-modificar" data-referencia="{{ $producto->referencia }}"
                                        data-producto="{{ $producto->nombre }}" data-nombre-talla="{{ $talla->nombre }}"
                                        data-id-talla="{{ $talla->id }}"
                                        data-cantidad-stock="{{ $talla->tallaProducto->stock }}">
                                        <i class="fas fa-plus-circle"></i>
                                    </a></td>
                            </tr>
                        @endforeach
                    @empty
                        <tr>
                            <td colspan="5" align="center">No se encontraron resultados</td>
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
                <label for="datos" class="datos titulo"><i class="fas fa-edit"></i>Modificar stock</label>
            </div>
            <form action="{{ route('stock.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="id-talla" name="id-talla" class="input-cantidad" required>
                <div class="itm">
                    <div class="itm__datos label">
                        <label>Referencia:</label>
                    </div>
                    <div class="itm__datos span">
                        <input type="hidden" id="referenciaP" name="referencia" class="input-cantidad" required>
                        <span id="referencia"></span>
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label>Nombre:</label>
                    </div>
                    <div class="itm__datos span">
                        <span id="producto"></span>
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label>Talla:</label>
                    </div>
                    <div class="itm__datos span">
                        <span id="nombre-talla"></span>
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label>Cantidad:</label>
                    </div>
                    <div class="itm__datos span">
                        <input type="number" id="cantidad-stock" name="cantidad" class="input-cantidad" required>
                    </div>
                </div>
                <div class="contenedor-btn mod">
                    <button class="agg-btn" type="submit">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scriptFooter')
<script src="{{ asset('js/algo.js') }}"></script>
@endsection
