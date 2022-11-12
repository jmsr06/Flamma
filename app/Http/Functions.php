<?php

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

function setActive($route){
    return request()->routeIs($route) ? 'active' : '';
}

function splide($imagenProductos){
    if (sizeof($imagenProductos) == 1){
        return 'false';
    }
    else{
        return 'true';
    }
}

function sortByActive($sort_by){
    return (request()->sort_by == $sort_by) ? 'active' : '';
}

function tActive($loop){
    return ($loop <= 0) ? 'active' : '';
}

function sinStock($stock){
    return ($stock <= 0) ? 'agotado' : '';
}

function ocultarCantidad($cantidad){
    return ($cantidad<=0) ? 'hidden':'';
}

function stock($cantidad){
    return ($cantidad <= 0) ? 'sin-stock' : 'con-stock';
}

function agotado($referencia){
    $sql = "SELECT sum(stock) as cantidad FROM talla_productos WHERE referencia_producto = ? AND deleted_at  is null";
    $selec = DB::select($sql,array($referencia));
    return ($selec[0]->cantidad);
}

function getProducto($atributo,$orden){
    $productos = Producto::from('productos as productos')
        ->join('talla_productos as t',function($join){
            $join->on('productos.referencia','=','t.referencia_producto');
        })->select(DB::raw('productos.*, sum(t.stock) as cantidad'))
        ->groupBy('productos.referencia')
        ->orderBy('productos.'.$atributo, $orden)
        ->paginate(15);
    return $productos;
}

function getProductoC($atributo,$orden,$filtro,$valor){
    $productos = Producto::from('productos as productos')
        ->join('talla_productos as t',function($join){
            $join->on('productos.referencia','=','t.referencia_producto');
        })->select(DB::raw('productos.*, sum(t.stock) as cantidad'))
        ->where('productos.'.$filtro, $valor)
        ->groupBy('productos.referencia')
        ->orderBy('productos.'.$atributo, $orden)
        ->paginate(15);
    return $productos;
}
