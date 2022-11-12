@extends('layouts/layoutAdmin')
@section('title', 'Modificar producto')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/envios.css') }}">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    {{-- <script src="{{ asset('js/ckeditorProduct.js') }}"></script>
    --}}
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
        <h1 id="iniciar">Modificar Talla</h1>
        <div class="contenedor-tabla">
            <h2>{{ $producto->referencia }} {{ $producto->nombre }}</h2>
            <br>
            {{-- <p>{{ dump($producto->tallas[0]->tallaProducto) }}</p><br>
            --}}
            <div class="contenedor-tabla-visualizar">
                <table class="tabla-visualizar">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Talla</th>
                            <th>Visibilidad</th>
                        </tr>
                    </thead>
                    @forelse ($producto->tallas as $talla)
                        <tr>
                            <td id="data-talla"> {{ $talla->id }}</td>
                            <td id="data-talla"> {{ $talla->nombre }}</td>
                            <td id="data-nombre">
                                <form action="{{route("gestionarTalla.destroy", $producto)}}" method="POST">
                                    <input type="hidden" name="talla" value="{{$talla->id}}">
                                    @csrf @method('DELETE')
                                    <button class="btn-eliminar"><i class="{{ visibleTallas($talla->tallaProducto) }}"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" align="center">No se encontraron resultados</td>
                        </tr>
                    @endforelse
                </table>

            </div>
            <h2>Agregar talla</h2>
            <br>
            <div class="contenedor-tabla-visualizar">
                <table class="tabla-visualizar">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Talla</th>
                            <th>Agregar</th>
                        </tr>
                    </thead>
                    @forelse ($tallas as $talla)
                        <tr>
                            <td id="data-talla"> {{ $talla->id }}</td>
                            <td id="data-talla"> {{ $talla->nombre }}</td>
                            <td id="data-nombre">
                                <form action="{{route("gestionarTalla.create", $producto)}}" method="POST">
                                    <input type="hidden" value="{{$talla->id}}" name="talla">
                                    @csrf 
                                    <button type="submit" class="btn-eliminar"><i class="fas fa-plus-circle"></i></button>
                                </form>
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
@section('scriptFooter')
    <script src="{{ asset('js/algo.js') }}"></script>

@endsection
