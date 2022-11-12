@extends('layouts/layoutAdmin')
@section('title', 'Modificar producto')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/envios.css') }}">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/ckeditorProduct.js') }}"></script>
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
        <div class="contenedor-tabla-modificar-">
            <div class="tabla-modificar-">
                <div class="tabla-main-">
                    <div class="itm">
                        <form action="{{ route('modificarProducto.updateProd', $producto) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="itm">
                                <div class="itm__datos label">
                                    <label for="nombre">Referencia</label>
                                </div>
                                <div class="itm__datos">
                                    <input type="text" id="nueva-referencia" class="form-input" name="nueva-referencia"
                                        value="{{ old('nueva-referencia', $producto->referencia) }}" readonly>
                                </div>
                            </div>
                            <div class="itm">
                                <div class="itm__datos label">
                                    <label for="nombre">Nombre</label>
                                </div>
                                <div class="itm__datos">
                                    <input type="text" class="form-input" placeholder="" id="nuevo-nombre"
                                        name="nuevo-nombre" value="{{ old('nuevo-nombre', $producto->nombre) }}">
                                </div>
                            </div>
                            <div class="itm">
                                <div class="itm__datos label">
                                    <label for="nombre">Costo</label>
                                </div>
                                <div class="itm__datos">
                                    <input type="number" id="nuevo-precio" class="form-input" name="nuevo-costo"
                                        value="{{ old('nuevo-costo', $producto->precio) }}">
                                </div>
                            </div>
                            <div class="itm">
                                <div class="itm__datos label">
                                    <label for="nombre">Colección</label>
                                </div>
                                <div class="itm__datos">
                                    <select name="nueva-coleccion" id="nueva-coleccion"
                                        value="{{ old('nueva-coleccion', $producto->id_coleccion) }}">
                                        @forelse ($colecciones as $coleccion)
                                            @if ($coleccion->id == $producto->id_coleccion)
                                                <option selected value="{{ $coleccion->id }}">{{ $coleccion->nombre }}</option>
                                            @else
                                                <option value="{{ $coleccion->id }}">{{ $coleccion->nombre }}</option>
                                            @endif
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
                                    <select name="nueva-categoria" id="nueva-categoria"
                                        value="{{ old('nueva-categoria', $producto->id_categoria) }}">
                                        @forelse ($categorias as $categoria)
                                            @if ($categoria->id == $producto->id_categoria)
                                                <option selected value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                            @else
                                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                            @endif
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="itm">
                                <div class="itm__datos label">
                                    <label for="nombre">Guía de tallas</label>
                                </div>
                                <div class="itm__datos">
                                    <input type="file" name="nombre_img" class="subir" accept="image/*">
                                </div>
                            </div>
                            <br> --}}
                            <div class="itm">
                                <label id="datos" for="datos" class="datos titulo"><i class="fas fa-align-justify"></i>
                                    Descripción</label>
                            </div>
                            <div class="itm">
                                <textarea name="nueva-descripcion" id="editor"
                                >{{ old('nueva-descripcion', $producto->descripcion)}}</textarea>
                            </div>
                            <div class="contenedor-btn mod">
                                <button class="agg-btn" type="submit">Modificar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scriptFooter')
        <script src="{{ asset('js/algo.js') }}"></script>
        <script>
            if (CKEDITOR.env.ie && CKEDITOR.env.version < 9)
                CKEDITOR.tools.enableHtml5Elements(document);
            // The trick to keep the editor in the sample quite small
            // unless user specified own height.
            CKEDITOR.config.language = 'es';
            CKEDITOR.config.height = 150;
            CKEDITOR.config.resize_maxHeight = 300;
            CKEDITOR.config.width = 'auto';
            CKEDITOR.replace('editor', {
                toolbar: [{
                        name: 'clipboard',
                        items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                    },
                    {
                        name: 'basicStyles',
                        items: ['Bold', 'Italic', 'BulletedList', 'Stricke', '-', 'Link', 'Unlink', 'Format']
                    },
                    {
                        name: 'document',
                        items: ['CodeSnippet', 'EmojiPanel', 'Preview', 'Source']
                    }
                ]
            });
        </script>
    @endsection
