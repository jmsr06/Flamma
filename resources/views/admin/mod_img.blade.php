@extends('layouts/layoutAdmin')

@section('title', 'Modificar Imagen')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
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
        <h1 id="iniciar">Modificar imagen:</h1>
        <h2 id="iniciar">{{ $producto->nombre }}</h2>
        <div class="carousel">
            <div class="carousel__contenedor">
                <div class="carousel__lista">
                    @forelse ($producto->imagenProductos as $imagen)
                        <div class="containerOverlay">
                            <div class="imgcat">
                                <img src="{{ Storage::url($imagen->nombre_imagen) }}" alt="{{ $imagen->descripcion }}">
                                <div class="overlay-prioridad">
                                    <div class="prioridad">
                                        <select name="prioridad" class="select-prioridad" data-select="{{ $loop->index + 1 }}"
                                            data-value="{{ $imagen->prioridad }}">
                                            @for ($i = 1; $i <= count($producto->imagenProductos); $i++)
                                                <option value="{{ $i }}" {{ isPrioridad($imagen->prioridad, $i) }}>{{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <a href="javascript:void(0)">
                                    <div class="overlay-modificar" data-path="{{ $imagen->nombre_imagen }}">
                                        <div class="text">
                                            <p>Cambiar</p>
                                        </div>
                                    </div>
                                </a>
                                <form action="{{ route('imagenProducto.deleteImage', $producto) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="path" value="{{ $imagen->nombre_imagen }}" required>
                                    <button type="submit">
                                        <div class="overlay-quitar">
                                            <div class="equis">
                                                <i class="fas fa-times eliminar"></i>
                                            </div>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                    @endforelse
                    <div class="containerOverlay ">
                        <div class="imgcat ">
                            <button class="upload"><i class="fas fa-file-upload"></i></button>
                            <a href="">
                            </a>
                        </div>
                    </div>
                </div>
                <button aria-label="Prvious" class="carousel__anterior">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button aria-label="Next" class="carousel__siguiente">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
        

        @if (count($producto->imagenProductos) >= 2)
            <div class="contenedor-btn">
                <button class="agg-btn btn-2" type="button" id="modificar-prioridad">Modificar prioridad</button>
            </div>
            <form name="formPrioridad" action="{{ route('imagenProducto.updatePrioridad', $producto) }}" method="post"
                style="display:none;">
                @csrf
                @method('PATCH')
                @foreach ($producto->imagenProductos as $img)
                    <input type="text" name="{{ $loop->index +1}}" value="{{ $img->prioridad }}" id="P{{ $loop->index + 1}}"
                        class="inputs-prioridad" required>
                @endforeach
            </form>
        @endif
            <a href="{{ route('imagenProducto.index', $producto) }}" class="contenedor-btn "><input type="submit" name="agregar" id="agregar" class="atras-btn btn-2" value="Volver"></a>

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
                <label for="datos" class="datos titulo">Modificar imagen</label>
            </div>
            <div class="itm ">
                <form action="{{ route('imagenProducto.updateImage', $producto) }}" class="subir-img" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="path-image" id="path-image" required>
                    <input type="file" name="archivo" class="subir" required>
                    <div class="contenedor-btn">
                        <button class="agg-btn">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="contenedor-tabla-modificar contenedor-tabla-subir">
    <div class="tabla-modificar">
        <div class="cerrar">
            <i class="fas fa-times cerrar__item cerrar__subir"></i>
        </div>
        <div class="tabla-main">
            <div class="itm">
                <div class="icon">
                    <i class="fas fa-edit"></i>
                </div>
                <label for="datos" class="datos titulo">Subir nueva imagen</label>
            </div>
            <div class="itm ">
                <form action="{{ route('imagenProducto.storeImage', $producto) }}" class="subir-img" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="archivo" class="subir" required>
                    <div class="contenedor-btn">
                        <button class="agg-btn" type="submit">Subir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scriptFooter')
<script src="{{ asset('js/algo.js') }}"></script>
<script src="{{ asset('js/sliderGlider.js') }}"></script>
<script src="{{ asset('js/glider.min.js') }}"></script>
@endsection
