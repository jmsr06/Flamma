@extends('layouts/layout')

@section('title','Productos')
@section('css')
{{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> --}}
<link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection
@section('scriptHeader')

@endsection
@section('contenido')
    <main class="content">
        <div class="content__header" id="content__header">
            <div class="content__title">
                @isset($title)
                <h2 class="">{{ $title }}</h2>
                @else
                <h2 class="">Productos</h2>
                @endisset
                {{-- {{ sortByActive('sort_by=title-descending') }}
                {{ dd(request()->sort_by) }} --}}
            </div>
            <div class="content__orderBy" id="content__orderBy">
                <p id="cont-orderBy"><span id="orderBy">Alfabéticamente: A-Z</span><i id="listaFiltro" class="fas fa-list"></i></p>
                <ul class="list-orderBy" id="list-orderBy">
                    <li class="list-orderBy__item {{ sortByActive('title-ascending') }}" data-filtro="Alfabéticamente: A-Z"><a href="{{ request()->url() }}?sort_by=title-ascending">Alfabéticamente: A-Z</a></li>
                    <li class="list-orderBy__item {{ sortByActive('title-descending') }}" data-filtro="Alfabéticamente: Z-A"><a href="{{ request()->url() }}?sort_by=title-descending">Alfabéticamente: Z-A</a></li>
                    <li class="list-orderBy__item {{ sortByActive('price-ascending') }}" data-filtro="Precio: Menor a mayor"><a href="{{ request()->url() }}?sort_by=price-ascending">Precio: Menor a mayor</a></li>
                    <li class="list-orderBy__item {{ sortByActive('price-descending') }}" data-filtro="Precio: Mayor a menor"><a href="{{ request()->url() }}?sort_by=price-descending">Precio: Mayor a menor</a></li>
                    <li class="list-orderBy__item {{ sortByActive('created-descending') }}" data-filtro="Fecha: Mas nuevo"><a href="{{ request()->url() }}?sort_by=created-descending">Fecha: Mas nuevo</a></li>
                    <li class="list-orderBy__item {{ sortByActive('created-ascending') }}" data-filtro="Fecha: Mas antiguo"><a href="{{ request()->url() }}?sort_by=created-ascending">Fecha: Mas antiguo</a></li>
                    <li class="list-orderBy__item {{ sortByActive('best-selling') }}" data-filtro="Más vendidos"><a href="{{ request()->url() }}?sort_by=best-selling">Más vendidos</a></li>
                </ul>
            </div>
        </div>
        <div id="content-products" class="collection-products">
            @include('productData')
        </div>
    </main>
@endsection
@section('scriptFooter')
<script src="{{ asset('js/filtrarProducto.js') }}"></script>

{{-- {{ session()->forget('categoria') }}
{{ session()->forget('coleccion') }} --}}
{{-- <script>
    const contenido = document.getElementById('content-products');
    const obtener_pixeles_inicio = () => document.documentElement.scrollTop || document.body.scrollTop;
    const ir_arriba = () => {
    if (obtener_pixeles_inicio() > 0) {
        requestAnimationFrame(ir_arriba);
        scrollTo(0, obtener_pixeles_inicio() - (obtener_pixeles_inicio() / 10));
    }
}
    function getLinks(){
        const nexts = document.querySelectorAll('#pagination a');
        nexts.forEach(next => {
            next.addEventListener('click',(e)=>{
                e.preventDefault();
                let page = next.getAttribute('href').split('page=')[1];
                getMoreProducts(page);
            })
        })
    }
    document.addEventListener('DOMContentLoaded',()=>{
        getLinks();
    })
    function getMoreProducts(page){
        let xhr;
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        }
        else {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        page = '{{ route('productos.getMoreProducts') }}' + '?page=' + page;
        xhr.open('GET', page);
        xhr.addEventListener('load', (data) => {
            const contenido = document.getElementById('content-products');
            contenido.innerHTML = data.target.response;
        })
        xhr.send();
        setTimeout(function(){ getLinks(); }, 500);
    }
</script> --}}
@endsection
