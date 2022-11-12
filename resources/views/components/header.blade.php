<header class="header">
    <div class="banner">
        <div class="menu-movil">
            <a href="javascript:void(0);" class="fas-link">
                <i class="fas fa-bars"></i>
            </a>
            <!--<div class="">
                <a class="fas-link" href="#login_side">
                    <i class="fas fa-user"></i>
                </a>
            </div>-->
        </div>
        <div class="banner__logo">
            <a href="{{ route('home') }}" class="logo__link">
                <h1>flamma</h1>
            </a>
        </div>
        <div class="banner__iconos">
            <div class="icono__search">
                <a id="link-buscar" class="fas-link" href="#"><i class="fas fa-search"></i></a>
            </div>
            {{-- <div class="icono__user iniciar-sesion">
                <a class="fas-link" href="#login_side"><i class="fas fa-user"></i></a>
            </div>
            <div class="icono__car">
                <a id="link-carrito" class="fas-link" href="{{ route('carrito.index') }}" title="Ver su carrito de compras">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="">0</span>
                </a>
            </div> --}}
        </div>
    </div>

    <nav class="menu-desktop">
        <ul class="menu-desktop__list menu-desktop__firstlevel">
            <li class="list-item {{ setActive('home') }}"><a class="list-item__link home" href="{{ route('home') }}"><i class="fas fa-home"></i><span>HOME</span></a></li>
            @if(session()->has('categoria'))
            <li class="list-item {{ setActive('productos.*') }}"><a class="list-item__link" href="{{ route('productos.index') }}"><span>Productos</span></a>
                <ul class="menu-desktop__list categorias menu-desktop__secondlevel">
            @forelse(session('categoria') as $categoria)
                <li class="list-item list-item-sub cateoria"><a class="list-item__link" href="{{ route('productos.indexCategoria',$categoria) }}"><span>{{ $categoria->nombre }}</span></a></li>
            @empty
                <li class="list-item list-item-sub cateoria"><a class="list-item__link" href="#"><span>No hay categorias</span></a></li>
            @endforelse
                </ul>
            </li>
            @endif
            @if(session()->has('coleccion'))
            <li class="list-item {{ setActive('productos.indexColeccion') }}"><a class="list-item__link" href="{{ route('productos.index') }}"><span>Colecciones</span></a>
                <ul class="menu-desktop__list colecciones  menu-desktop__secondlevel">
            @forelse(session('coleccion') as $coleccion)
            <li class="list-item list-item-sub coleccion"><a class="list-item__link" href="{{ route('productos.indexColeccion',$coleccion) }}"><span>{{ $coleccion->nombre }}</span></a></li>
            @empty
                <li class="list-item list-item-sub cateoria"><a class="list-item__link" href="#"><span>No hay colecciones</span></a></li>
            @endforelse
                </ul>
            </li>
            @endif
            <li class="list-item last {{ setActive('about') }}"><a class="list-item__link" href="{{ route('about') }}"><span>About us</span></a></li>
        </ul>
    </nav>
</header>
