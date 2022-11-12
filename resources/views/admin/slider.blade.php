@extends('layouts/layoutAdmin')

@section('title', 'Slider')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cupones.css') }}">
@endsection

@section('contenido')
    <div class="contenedor">
    @if(session('typeAlert') && session('message'))
        <div class="{{session('typeAlert')}}" id="message">
            <i class="fas fa-times" id="close-message"></i>
            <span>{{session('message')}}</span>
        </div>
    @endif
    @if ($errors->any())
        <div class="error" id="message">
            <i class="fas fa-times" id="close-message"></i>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </div>
    @endif
        <h1 id="iniciar">Slider</h1>
        <div class="carousel">
            <div class="carousel__contenedor">
                <div class="carousel__lista">
                    <div class="containerOverlay ">
                        <div class="imgcat ">
                            <button class="upload"><i class="fas fa-file-upload"></i></button>
                            <a href="">
                            </a>
                        </div>
                    </div>
                    @forelse ($sliderc as $slider)
                        <div class="containerOverlay">
                            <div class="imgcat">
                                <img src="{{ Storage::url($slider->nombre_img) }}" alt="{{ $slider->descripcion }}">
                                <a href="javascript:void(0)">
                                    <div class="overlay-modificar" data-path="{{ $slider->nombre_img }}">
                                        <div class="text">
                                            <p>Cambiar</p>
                                        </div>
                                    </div>
                                </a>
                                <form action="{{ route('slider.destroy') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="path" value="{{ $slider->nombre_img }}" required>
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
                </div>
                <button aria-label="Prvious" class="carousel__anterior">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button aria-label="Next" class="carousel__siguiente">
                    <i class="fas fa-chevron-right"></i>
                </button>
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
                    <label for="datos" class="datos titulo">Modificar imagen</label>
                </div>
                <div class="itm ">
                    <form action="{{ route('slider.update') }}" class="subir-img" method="post"
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
                    <form action="{{ route('slider.store') }}" class="subir-img" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="archivo" class="subir" required>
                        <div class="itm">
                            <div>
                                <label for="nombre">Descripción:</label>
                            </div>
                            <div>
                                <textarea name="descripcion" id="" cols="30" rows="10" required></textarea>
                            </div>
                        </div>
                        <div class="contenedor-btn">
                            <button class="agg-btn" type="submit">Subir</button>
                        </div>
                    </form>
                </div>

{{-- 

                <div class="itm ">
                    <form action="{{ route('iman') }}" class="subir-img" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="nombre_img" class="subir">
                        <div class="itm">
                            <div>
                                <label for="nombre">Descripción:</label>
                            </div>
                            <div>
                                <textarea name="descripcion" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="contenedor-btn">
                            <input type="submit" class="agg-btn" value="Subir">
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('scriptFooter')
    <script src="{{ asset('js/algo.js') }}"></script>
    <script src="{{ asset('js/sliderGlider.js') }}"></script>
    <script src="{{ asset('js/glider.min.js') }}"></script>
@endsection
