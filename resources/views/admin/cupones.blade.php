@extends('layouts/layoutAdmin')

@section('title', 'Costo de envío')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cupones.css') }}">
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
        <h1 id="iniciar">Cupones</h1>
        <div class="contenedor-tabla">
            <form action="{{ route('cupones.store') }}" class="agg-form" method="post">
                @csrf
                <div class="tabla-añadir">
                    <div class="itm">
                        <div class="icon">
                            <i class="fas fa-tag"></i>
                        </div>
                        <label id="datos" for="datos" class="datos titulo">Agregar cupón</label>
                    </div>
                    <div class="itm">
                        <div class="itm__datos label">
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="itm__datos">
                            <input type="text" id="nombre" class="form-input" placeholder="" name="nombre"
                                value="{{ old('nombre') }}">
                        </div>
                    </div>
                    <div class="itm">
                        <div class="itm__datos label">
                            <label for="nombre">Descuento</label>
                        </div>
                        <div class="itm__datos">
                            <input type="text" max="1" min="0" id="descuento" class="form-input" placeholder="Ej: 0.3"
                                name="descuento" value="{{ old('descuento') }}">
                        </div>
                    </div>
                    <div class="contenedor-btn">
                        <input type="submit" name="agregar" id="agregar" class="agg-btn" value="Agregar">
                    </div>
                </div>
            </form>
            <div class="contenedor-tabla-visualizar">
                <table class="tabla-visualizar">
                    <thead class="thead">
                        <tr>
                            <th>Nombre</th>
                            <th>Descuento</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    @forelse ($cupones as $cuponIndice)
                        <tr>
                            <td id="data-nombre"> {{ $cuponIndice->nombre }}</td>
                            <td id="data-descuento"> {{ $cuponIndice->descuento }}</td>
                            <td><a class="btn-modificar" data-id="{{ $cuponIndice->id }}"
                                    data-nombre="{{ $cuponIndice->nombre }}" data-descuento="{{ $cuponIndice->descuento }}"
                                    href=""><i class="fas fa-edit"></i></a></td>
                            <td>
                                <form action="{{ route('cupones.destroy', $cuponIndice) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="btn-eliminar"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
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
                <label for="datos" class="datos titulo">Modificar cupón</label>
            </div>
            <form action="{{ route('cupones.update') }}" method="POST">
                @csrf @method('PUT')
                <input type="hidden" name="id_cupon" id="id">
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="itm__datos">
                        <input type="text" id="nuevo-nombre" class="form-input" name="nuevo-nombre">
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Descuento</label>
                    </div>
                    <div class="itm__datos">
                        <input type="text" id="nuevo-descuento" class="form-input" name="nuevo-descuento">
                    </div>
                </div>
                <input type="hidden" name="nueva-descripcion" id="nueva-descripcion">
                <div class="contenedor-btn">
                    <button class="agg-btn">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scriptFooter')
<script src="{{ asset('js/algo.js') }}"></script>
@endsection
