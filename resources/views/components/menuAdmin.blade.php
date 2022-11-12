<nav>
    <ul class="menuAdmin">
         <li class="block">
            <input type="checkbox" name="item" id="item1" />
        <a href="{{ route('homeadmin') }}" class="principal"><i class="fas fa-home"></i>HOME</a>

        </li> 
        <li class="block">
            <input type="checkbox" name="item" id="item2" />
            <label for="item2" class="principal"><i class="fas fa-tshirt"></i> Productos</label>
            <ul class="options">
                <li><a href="{{ route('agregarproducto.create') }}" class="secundario"> <i class="fas fa-plus"></i> Agregar</a></li>
                <li><a href="{{ route('modificarProducto.index') }}" class="secundario"> <i class="fas fa-plus"></i>Modificar producto</a></li>
                <li><a href="{{ route('gestionarTalla.index') }}" class="secundario"><i class="fas fa-plus"></i>Gestión de tallas</a></li>
                <li><a href="{{ route('imagenProducto.index') }}" class="secundario"><i class="fas fa-plus"></i>Modificar imagen</a></li>
                <li><a href="{{ route('stock.index') }}" class="secundario"><i class="fas fa-plus"></i>Modificar stock</a></li>
                <li><a href="{{ route('talla.index') }}" class="secundario"><i class="fas fa-plus"></i>Tallas</a></li>

            </ul>
        </li>
        <li class="block">
            <input type="checkbox" name="item" id="item3" />
            <label for="item3" class="principal"><i class="fas fa-th-large"></i>Clasificación</label>
            <ul class="options">
                <li><a href="{{ route('categorias.index') }}" class="secundario"><i class="fas fa-plus"></i>Categoría</a></li>
                <li><a href="{{ route('colecciones.index') }}" class="secundario"><i class="fas fa-plus"></i>Colección</a></li>
            </ul>
        </li>
        <li class="block">
            <input type="checkbox" name="item" id="item4" />
            <a href="{{ route('cupones.index') }}" class="principal"><i class="fas fa-tag"></i>Cupones</a>
        </li> 
        <li class="block">
            <input type="checkbox" name="item" id="item5" />
            <a href="{{ route('slider.index') }}" class="principal"><i class="fas fa-images"></i>Slider</a>
        </li>
        <li class="block">
            <input type="checkbox" name="item" id="item6" />
            <a href="{{ route('masvendidos') }}" class="principal"><i class="fas fa-fire"></i>Más vendidos</a>
        </li>
        <li class="block">
            <input type="checkbox" name="item" id="item7" />
            <label for="item7" class="principal"><i class="fas fa-clipboard-list"></i>Pedidos</label>
            <ul class="options">
                <li><a href="{{ route('noenviados') }}" class="secundario"><i class="fas fa-plus"></i>No enviados</a></li>
                <li><a href="{{ route('pedidos.index') }}" class="secundario"><i class="fas fa-plus"></i>Todos</a></li>
            </ul>
        </li>
        <li class="block">
            <input type="checkbox" name="item" id="item8" />
            <a href="{{ route('envios.index') }}" class="principal"><i class="fas fa-truck"></i>Costo envíos</a>
        </li> 


    </ul>
</nav>
