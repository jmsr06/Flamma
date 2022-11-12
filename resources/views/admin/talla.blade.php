@extends('layouts/layoutAdmin')

@section('title', 'Talla')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuAdmin.css') }}">
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
        <h1 id="iniciar">Tallas</h1>
        <div class="contenedor-tabla">
            <form action="{{ route('talla.store') }}" class="agg-form" method="post">
                @csrf
                <div class="tabla-añadir">
                    <div class="itm">
                        <div class="icon">
                            <i class="fas fa-plus-square"></i>
                        </div>
                        <label id="datos" for="datos" class="datos titulo">Agregar Talla</label>
                    </div>
                    <div class="itm">
                        <div class="itm__datos label">
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="itm__datos">
                            <input type="text" id="nombre" class="form-input" placeholder="" name="nombre">
                        </div>
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
                            <th>Talla</th>
                            <th>Modificar</th>
                            <th>Visualizar</th>
                        </tr>
                    </thead>
                    @forelse ($tallas as $tallaIndice)
                        <tr>
                        <td> {{$tallaIndice->nombre}}</td>
                        <td><a class="btn-modificar" data-id="{{$tallaIndice->id}}" data-nombre="{{$tallaIndice->nombre}}" href=""><i class="fas fa-edit"></i></a></td>
                        <td>
                            <form action="{{route('talla.destroy', $tallaIndice)}}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn-eliminar"><i class="{{  isVisible($tallaIndice) }}"></i></button>
                                </form>
                        </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" align="center">No se encontraron resultados</td>
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
                    <label for="datos" class="datos titulo">Modificar talla</label>
                </div>
                <form action="{{route('talla.update')}}" method="POST">
                    @csrf @method('PUT')
                <input type="hidden" name="id_talla" id="id">
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="itm__datos">
                        <input type="text" id="nuevo-nombre" class="form-input" placeholder="" name="nuevo-nombre">
                    </div>
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
