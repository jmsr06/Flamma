@extends('layouts/layoutAdmin')

@section('title', 'Colección')
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
        <h1 id="iniciar">Colección</h1>
        <div class="contenedor-tabla">
            <form action="{{ route('colecciones.store') }}" class="agg-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="tabla-añadir">
                    <div class="itm">
                        <div class="icon">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <label id="datos" for="datos" class="datos titulo">Agregar colección</label>
                    </div>
                    <div class="itm">
                        <div class="itm__datos label">
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="itm__datos">
                            <input type="text" class="form-input" name="nombre">
                        </div>
                    </div>
                    <div class="itm">
                        <div class="itm__datos label">
                            <label for="nombre">Fecha lanzamiento</label>
                        </div>
                        <div class="itm__datos">
                            <input type="date" class="form-input" name="fecha_lanzamiento">
                        </div>
                    </div>
                    <div class="itm">
                        <div class="itm__datos label">
                            <label for="nombre">Imagen</label>
                        </div>
                        <input type="file" name="nombre_img" class="subir">
                    </div>


                    <div class="contenedor-btn">
                        <button class="agg-btn">Agregar</button>
                    </div>
                </div>
            </form>
            <div class="contenedor-tabla-visualizar">
                <table class="tabla-visualizar">
                    <thead class="thead">
                        <tr>
                            <th>Nombre</th>
                            <th>Imagén</th>
                            <th>Fecha creación</th>
                            <th>Modificar</th>
                            <th>Visualizar</th>
                        </tr>
                    </thead>
                    @forelse ($colecciones as $coleccionIndice)
                        <tr>
                            <td>{{ $coleccionIndice->nombre }}</td>
                            <td class="imagen-categoria"><img src="{{ Storage::url($coleccionIndice->imagen) }}"
                                    alt="{{ $coleccionIndice->descripcion_img }}"></td>
                            <td>{{ $coleccionIndice->fecha_lanzamiento }}</td>
                            <td><a class="btn-modificar" data-id="{{ $coleccionIndice->id }}"
                                    data-nombre="{{ $coleccionIndice->nombre }}"
                                    data-fecha="{{ $coleccionIndice->fecha_lanzamiento }}"
                                    data-imagen="{{ $coleccionIndice->imagen }}"
                                    data-descripcion="{{ $coleccionIndice->descripcion_img }}" href=""><i
                                        class="fas fa-edit"></i></a></td>
                            <td>
                                <form action="{{ route('colecciones.destroy', $coleccionIndice) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="btn-eliminar"><i class="{{ isVisible($coleccionIndice) }}"></i></button>
                                </form>
                            </td>
                        </tr>
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
    <div class="tabla-modificar modificar-coleccion">
        <div class="cerrar">
            <i class="fas fa-times cerrar__item"></i>
        </div>
        <div class="tabla-main">
            <div class="itm">
                <div class="icon">
                    <i class="fas fa-edit"></i>
                </div>
                <label for="datos" class="datos titulo">Modificar colección</label>
            </div>
            <form action="{{ route('colecciones.update') }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <input type="hidden" name="id-col" id="id-col" required>
                <input type="hidden" name="descripcion-img" id="descripcion-img" required>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="itm__datos">
                        <input type="text" id="nuevo-nombre" name="nuevo-nombre" class="form-input">
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Fecha Lanzamiento</label>
                    </div>
                    <div class="itm__datos">
                        <input type="date" id="nueva-fecha" name="nueva-fecha" class="form-input">
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Imagen</label>
                    </div>
                    <input type="file" name="archivo" id="nueva-imagen" class="subir">
                </div>
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
