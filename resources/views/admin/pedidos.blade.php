@extends('layouts/layoutAdmin')

@section('title', 'Pedidos')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pedidos.css') }}">
@endsection

@section('contenido')
    <div class="contenedor">
        <h1 id="iniciar">Listado de pedidos</h1>
        <div class="contenedor-tabla">
            <div class="tabla-fecha">
                <h3>Buscar Por:</h3>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Fecha inicio</label>
                    </div>
                    <div class="itm__datos fecha">
                        <input type="date" id="fechainicio" class="tabla-input" placeholder="" id="fechainicio"
                            title="fechainicio">
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Fecha fin</label>
                    </div>
                    <div class="itm__datos fecha">
                        <input type="date" id="fechafin" class="tabla-input" placeholder="" id="fechafin" title="fechafin">
                    </div>
                </div>
                <div class="contenedor-btn">
                    <button class="buscar-btn">Buscar</button>
                </div>
            </div>
            <div class="contenedor-tabla-visualizar">
                <table class="tabla-visualizar">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Más info</th>
                    </thead>
                    @forelse ($pedidos as $pedidoIndice)
                    <tr>
                        <td>{{$pedidoIndice->id_pedido}}</td>
                        <td>{{$pedidoIndice->created_at}}</td>
                        <td>{{$pedidoIndice->created_at}}</td>
                        <td><a class="btn-more" data-nombre="nombr2" data-descuento="0.2" href=""><i
                                    class="fas fa-info-circle"></i></a></td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4" align="center">No se encontraron resultados</td>
                        </tr>
                    @endforelse
                </table>
            </div>
            <div class="contenedor-tabla-more">
                <div class="tabla-more">
                    <div class="cerrar">
                        <i class="fas fa-times cerrar__item"></i>
                    </div>
                    <div class="tabla-main">
                        <div class="itm">
                            <label for="datos" class="datos titulo">Información del pedido</label>
                        </div>
                        <div class="itm">
                            <div class="itm__datos label">
                                <label for="nombre">Identificador:</label>
                            </div>
                            <div class="itm__datos span">
                                <span>00001</span>
                            </div>
                        </div>
                        <div class="itm">
                            <div class="itm__datos label">
                                <label for="nombre">Cliente:</label>
                            </div>
                            <div class="itm__datos span">
                                <span>Jenny Marcela Santamaría Rincón</span>
                            </div>
                        </div>
                        <div class="itm">
                            <div class="itm__datos label">
                                <label for="nombre">Fecha:</label>
                            </div>
                            <div class="itm__datos span">
                                <span>2020-09-17</span>
                            </div>
                        </div>
                        <div class="itm">
                            <div class="itm__datos label">
                                <label for="nombre">Envío:</label>
                            </div>
                            <div class="itm__datos span">
                                <span>10.000</span>
                            </div>
                        </div>
                        <div class="itm">
                            <div class="itm__datos label">
                                <label for="nombre">Descuento:</label>
                            </div>
                            <div class="itm__datos span">
                                <span>100.000</span>
                            </div>
                        </div>
                        <div class="itm">
                            <div class="itm__datos label">
                                <label for="nombre">Subtotal:</label>
                            </div>
                            <div class="itm__datos span">
                                <span>1.000.000</span>
                            </div>
                        </div>
                        <div class="itm">
                            <div class="itm__datos label">
                                <label for="nombre">Total:</label>
                            </div>
                            <div class="itm__datos span">
                                <span>1.000.000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scriptFooter')
    <script src="{{ asset('js/algo.js') }}"></script>
@endsection
