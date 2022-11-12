@extends('layouts/layoutAdmin')

@section('title', 'Costo de envío')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/menuAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/envios.css') }}">
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
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <h1 id="iniciar">Costo de envío</h1>
        <div class="contenedor-tabla">
            <form action="{{ route('envios.index') }}" method="POST">
                @csrf
                <div class="itm">
                    <div class="itm__datos buscar">
                        <label for="nombre">Buscar</label>
                    </div>
                    <div class="itm__datos barra">
                        <input type="text" class="tabla-input" placeholder="Ingrese la ciudad o departamento" id="buscar"
                            title="buscar" name="busqueda" value="{{ old('busqueda') }}">
                    </div>
                    <div class="contenedor-btn">
                        <button type="submit" class="buscar-btn">Buscar</button>
                    </div>
                </div>
            </form>
            <form action="{{ route('envios.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="contenedor-tabla-visualizar">
                    <table class="tabla-visualizar">
                        <thead>
                            <tr>
                                <th class="selector"><input class="check" type="checkbox" id="selectall"> TODOS</th>
                                <th>Ciudad</th>
                                <th>Departamento</th>
                                <th>Costo</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyEnvios">
                            @include('admin/tbodyEnvios')
                        </tbody>
                    </table>
                </div>
                <div class="itm modificar-costo">
                    <div class="itm__datos input-modificar">
                        <input type="text" class="tabla-input" placeholder="Nuevo costo Ej: 6000" title="buscar"
                            name="precio" required>
                    </div>
                    <div class="contenedor-btn">
                        <button class="buscar-btn" type="submit">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('scriptFooter')
    <script src="{{ asset('js/envio.js') }}"></script>
    <script src="{{ asset('js/algo.js') }}"></script>
    {{-- <script>
        const tbodyEnvios = document.getElementById('tbodyEnvios');

        function getLinks() {
            const nexts = document.querySelectorAll('#pagination a');
            nexts.forEach(next => {
                next.addEventListener('click', (e) => {
                    e.preventDefault();
                    let page = next.getAttribute('href').split('page=')[1];
                    getMoreProducts(page);
                })
            })
        }
        document.addEventListener('DOMContentLoaded', () => {
            getLinks();
        })

        function getMoreProducts(page) {
            let xhr;
            if (window.XMLHttpRequest) {
                xhr = new XMLHttpRequest();
            } else {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
            page = '{{ route('
            productos.getMoreProducts ') }}' + '?page=' + page;
            xhr.open('GET', page);
            xhr.addEventListener('load', (data) => {
                const contenido = document.getElementById('content-products');
                contenido.innerHTML = data.target.response;
            })
            xhr.send();
            setTimeout(function() {
                getLinks();
            }, 500);
        }

    </script> --}}
@endsection
