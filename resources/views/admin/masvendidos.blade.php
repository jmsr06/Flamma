@extends('layouts/layoutAdmin')

@section('title', 'Más vendidos')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/masvendidos.css') }}">
@endsection

@section('contenido')
    <div class="contenedor">
        <h1 id="iniciar">Más Vendidos</h1>
        <div class="contenedor-tabla">
            <div class="tabla-fecha">
                <h3>Buscar Por:</h3>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Fecha inicio</label>
                    </div>
                    <div class="itm__datos fecha">
                        <input type="date" id="fechainicio" class="tabla-input" placeholder="" title="fechainicio">
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Fecha fin</label>
                    </div>
                    <div class="itm__datos fecha">
                        <input type="date" id="fechafin" class="tabla-input" placeholder="" title="fechafin">
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
                            <th>Referencia</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Más info</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>referencia1</td>
                        <td>nombre1</td>
                        <td>cantidad1</td>
                        <td><a class="btn-more" data-nombre="nombr2" data-descuento="0.2" href=""><i
                                    class="fas fa-info-circle"></i></a></td>
                    </tr>
                    <tr>
                        <td>referencia2</td>
                        <td>nombre2</td>
                        <td>cantidad2</td>
                        <td><a class="btn-more" data-nombre="nombr2" data-descuento="0.2" href=""><i
                                    class="fas fa-info-circle"></i></a></td>
                    </tr>
                    <tr>
                        <td>referencia3</td>
                        <td>nombre3</td>
                        <td>cantidad3</td>
                        <td><a class="btn-more" data-nombre="nombr2" data-descuento="0.2" href=""><i
                                    class="fas fa-info-circle"></i></a></td>
                    </tr>
                    <tr>
                        <td>referencia4</td>
                        <td>nombre4</td>
                        <td>cantidad4</td>
                        <td><a class="btn-more" data-nombre="nombr2" data-descuento="0.2" href=""><i
                                    class="fas fa-info-circle"></i></a></td>
                    </tr>
                    <tr>
                        <td>referencia5</td>
                        <td>nombre5</td>
                        <td>cantidad5</td>
                        <td><a class="btn-more" data-nombre="nombr2" data-descuento="0.2" href=""><i
                                    class="fas fa-info-circle"></i></a></td>
                    </tr>
                    <tr>
                        <td>referencia6</td>
                        <td>nombre6</td>
                        <td>cantidad6</td>
                        <td><a class="btn-more" data-nombre="nombr2" data-descuento="0.2" href=""><i
                                    class="fas fa-info-circle"></i></a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('contenido-modal')
    <div class="contenedor-tabla-more">
        <div class="tabla-more">
            <div class="cerrar">
                <i class="fas fa-times cerrar__item"></i>
            </div>
            <div class="tabla-main">
                <div class="itm">
                    <label for="datos" class="datos titulo">Información del producto</label>
                </div>
                <div class="itm">
                    <div class="itm__datos imagen-prod">
                        <img src="{{ Storage::url('images/admin/slider1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Referencia:</label>
                    </div>
                    <div class="itm__datos span">
                        <span>38B1</span>
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Nombre:</label>
                    </div>
                    <div class="itm__datos span">
                        <span>Bucket hat amarillo</span>
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Talla:</label>
                    </div>
                    <div class="itm__datos span">
                        <label for="nombre">
                            <select name="" id="">
                                <option value="">S</option>
                                <option value="">M</option>
                                <option value="">L</option>
                                <option value="">XL</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="itm">
                    <div class="itm__datos label">
                        <label for="nombre">Ventas:</label>
                    </div>
                    <div class="itm__datos span">
                        <span>32</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scriptFooter')
    <script src="{{ asset('js/algo.js') }}"></script>
@endsection
