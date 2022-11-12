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
                    <div class="itm">
                        <div class="itm__datos label">
                            <label>Número de usos</label>
                        </div>
                        <div class="itm__datos">
                            <input type="number" min="0" id="usos" class="form-input"
                                name="usos" value="{{ old('usos') }}">
                        </div>
                    </div>
                    <div class="itm">
                        <div class="itm__datos label">
                            <label for="nombre">Fecha de vencimiento</label>
                        </div>
                        <div class="itm__datos">
                            <input type="date" id="fecha-vencimiento" class="form-input"
                                name="fecha-vencimiento" value="{{ old('fecha-vencimiento') }}">
                        </div>
                    </div>
                    <div class="itm">
                        <div class="itm__datos label">
                            <label for="nombre">Hora de vencimiento</label>
                        </div>
                        <div class="itm__datos">
                            <input type="time" id="hora-vencimiento" class="form-input"
                                name="hora-vencimiento" value="{{ old('hora-vencimiento') }}">
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
                            <th>Número de usos</th>
                            <th>Veces usado</th>
                            <th>Fecha Vencimiento</th>
                            <th>Hora Vencimiento</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    @forelse ($cupones as $cuponIndice)
                        <tr>
                            <td id="data-nombre"> {{ $cuponIndice->nombre }}</td>
                            <td id="data-descuento"> {{ $cuponIndice->descuento }}</td>
                            <td id="data-usos"> {{ $cuponIndice->usos }}</td>
                            <td></td>
                            <td id="data-fecha"> {{ $cuponIndice->fecha_vencimiento }}</td>
                            <td id="data-hora"> {{ $cuponIndice->hora_vencimiento }}</td>
                            <td><a class="btn-modificar" data-id="{{ $cuponIndice->id }}"
                                    data-nombre="{{ $cuponIndice->nombre }}" data-descuento="{{ $cuponIndice->descuento }}"
                                    data-usos="{{ $cuponIndice->usos }}" data-fecha="{{ $cuponIndice->fecha_vencimiento }}"
                                    data-hora="{{ $cuponIndice->hora_vencimiento }}"
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
                            <td colspan="8">No se encontraron resultados</td>
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
                <div class="itm">
                    <div class="itm__datos label">
                        <label>Número de usos</label>
                    </div>
                    <div class="itm__datos">
                        <input type="number" id="nuevo-usos" class="form-input" name="nuevo-usos">
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label>Fecha de vencimiento</label>
                    </div>
                    <div class="itm__datos">
                        <input type="date" id="nueva-fecha" class="form-input" name="nueva-fecha">
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label>Hora de vencimiento</label>
                    </div>
                    <div class="itm__datos">
                        <input type="time" id="nueva-hora" class="form-input" name="nueva-hora">
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
