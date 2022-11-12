@extends('layouts/layoutAdmin')
@section('title', 'Modificar producto')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/envios.css') }}">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    {{-- <script src="{{ asset('js/ckeditorProduct.js') }}"></script> --}}
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
        <h1 id="iniciar">Modificar producto</h1>
        <div class="contenedor-tabla">
            <form action="{{ route('modificarProducto.index') }}" method="POST">
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
                            <th>Costo</th>
                            <th>Colección</th>
                            <th>Categoría</th>
                            <th>Modificar</th>
                            <th>Visualizar</th>
                        </tr>
                    </thead>
                    @forelse ($productos as $producto)
                        @if ($producto->categoria != null && $producto->coleccion != null)
                            <tr>
                                <td id="data-referencia"> {{ $producto->referencia }}</td>
                                <td id="data-nombre"> {{ $producto->nombre }}</td>
                                <td id="data-imagen"> {!! isEmpty($producto->imagenProductos) !!}</td>
                                <td id="data-precio"> {{ $producto->precio }}</td>
                                <td id="data-coleccion"> {{ $producto->coleccion->nombre }}</td>
                                <td id="data-categoria"> {{ $producto->categoria->nombre }}</td>
                                <td><a href="{{ route('modificarProducto.update', $producto) }}" class="btn-modificar"><i
                                        class="fas fa-edit"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('modificarProducto.destroy', $producto) }} " method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn-eliminar"><i class="{{ isVisible($producto) }}"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endif
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
{{-- @section('contenido-modal')
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
                <label for="datos" class="datos titulo">Modificar producto</label>
            </div>
            <form action="{{ route('modificarProducto.update') }}" method="POST">
                @csrf @method('PUT')
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Referencia</label>
                    </div>
                    <div class="itm__datos">
                        <input type="text" id="nueva-referencia" class="form-input" placeholder=""
                            name="nueva-referencia">
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="itm__datos">
                        <input type="text" class="form-input" placeholder="" id="nuevo-nombre" name="nuevo-nombre">
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Costo</label>
                    </div>
                    <div class="itm__datos">
                        <input type="number" id="nuevo-precio" class="form-input" placeholder="Ej: 0.3"
                            name="nuevo-costo">
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Colección</label>
                    </div>
                    <div class="itm__datos">
                        <select name="nueva-coleccion" id="nueva-coleccion">
                            <option value="">...</option>
                            @forelse ($colecciones as $coleccion)
                                <option value="{{ $coleccion->id }}">{{ $coleccion->nombre }}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Categoría</label>
                    </div>
                    <div class="itm__datos">
                        <select name="nueva-categoria" id="nueva-categoria">
                            <option value="">...</option>
                            @forelse ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>
                </div>
                <br>
                <div class="itm">
                    <label id="datos" for="datos" class="datos titulo"><i class="fas fa-align-justify"></i>
                        Descripción</label>
                </div>
                <div class="itm">
                    <textarea name="nueva-descripcion" id="editor"></textarea>
                </div>
                <div class="contenedor-btn mod">
                    <button class="agg-btn" type="submit">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection --}}
@section('scriptFooter')
<script src="{{ asset('js/algo.js') }}"></script>
{{-- <script>
if (CKEDITOR.env.ie && CKEDITOR.env.version < 9)
    CKEDITOR.tools.enableHtml5Elements(document);
// The trick to keep the editor in the sample quite small
// unless user specified own height.
CKEDITOR.config.language = 'es';
CKEDITOR.config.height = 150;
CKEDITOR.config.resize_maxHeight = 300;
CKEDITOR.config.width = 'auto';
CKEDITOR.replace('editor', {
        toolbar: [
            { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
            { name: 'basicStyles', items: ['Bold', 'Italic', 'BulletedList', 'Stricke', '-', 'Link', 'Unlink', 'Format'] },
            { name: 'document', items: ['CodeSnippet', 'EmojiPanel', 'Preview', 'Source'] }
        ]
    });
</script> --}}
@endsection
