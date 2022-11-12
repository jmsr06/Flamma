@extends('layouts/layoutAdmin')

@section('title', 'Agregar Producto')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cupones.css') }}">
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
        <h1 id="iniciar">Agregar Producto</h1>
        <div class="contenedor-tabla">
            <form action="{{ route('agregarproducto.store') }}" class="agg-form" method="post" enctype=multipart/form-data>
                @csrf
                <div class="tabla-añadir">
                    <div class="itm">
                        <label id="datos" for="datos" class="datos titulo"><i class="fas fa-tshirt"></i>Producto</label>
                    </div>
                    <div class="itm">
                        <div class="itm__datos label">
                            <label for="nombre">Referencia</label>
                        </div>
                        <div class="itm__datos">
                            <input type="text" class="form-input" placeholder="" id="referencia" name="referencia"
                                value="{{ old('referencia') }}">
                        </div>
                    </div>
                    <div class="itm">
                        <div class="itm__datos label">
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="itm__datos">
                            <input type="text" class="form-input" name="nombre" id="nombre" value="{{ old('nombre') }}">
                        </div>
                    </div>
                    <div class="itm">
                        <div class="itm__datos label">
                            <label for="nombre">Categoría</label>
                        </div>
                        <div class="itm__datos">
                            <select name="categoria" id="categoria" value="{{ old('categoria') }}">
                                <option>...</option>
                                @forelse ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="itm">
                        <div class="itm__datos label">
                            <label for="nombre">Colección</label>
                        </div>
                        <div class="itm__datos">
                            <select name="coleccion" id="coleccion" value="{{ old('coleccion') }}">
                                <option>...</option>
                                @forelse ($colecciones as $coleccion)
                                    <option value="{{ $coleccion->id }}">{{ $coleccion->nombre }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="itm">
                        <div class="itm__datos label">
                            <label for="nombre">Precio</label>
                        </div>
                        <div class="itm__datos">
                            <input type="number" class="form-input" name="precio" id="precio" value="{{ old('precio') }}">
                        </div>
                    </div>
                    <div class="itm">
                        <label id="datos" for="datos" class="datos titulo"><i class="fas fa-align-justify"></i>
                            Tallas</label>
                    </div>

                    @forelse ($tallas as $talla)
                        <div class="talla-contenedor itm">
                            <div class="talla itm__datos">
                                <input type="checkbox" class="check" name="tallas[]" value="{{ $talla->id }}">
                                <label>{{ $talla->nombre }}</label>
                            </div>
                            <div class="cantidad-talla itm__datos">
                                <input type="number" name="c{{ $talla->id }}" class="form-input" value="{{old('c'.$talla->id)}}">
                            </div>
                        </div>
                    @empty
                    @endforelse

                    <div class="itm">
                        <label id="datos" for="datos" class="datos titulo"><i class="fas fa-align-justify"></i>
                            Descripción</label>
                    </div>
                    <div class="itm">
                        <textarea name="descripcion" id="editor" value="{{ old('descripcion') }}"></textarea>
                    </div>
                    <div class="itm">
                        <label id="datos" for="datos" class="datos titulo"><i class="fas fa-images"></i>Imagen</label>
                        <div class="mas" id="mas">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                    </div>
                    <ul id="list">
                        <li id="el-img">
                            <div class="itm">
                                <div class="subir-imagen">
                                    <input type="file" name="archivo" class="subir" value="{{ old('archivo') }}">
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="itm">
                        <label id="datos" for="datos" class="datos titulo"><i class="fas fa-file-image"></i>Guia
                            de
                            tallas</label>
                    </div>
                    <div class="itm">
                        <div class="subir-imagen">
                            <input type="file" name="guia" class="subir" value="{{ old('guia') }}">
                        </div>
                    </div>
                    <div class="contenedor-btn">
                        <button class="agg-btn">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scriptFooter')
    <script src="{{ asset('js/algo.js') }}"></script>
@endsection
