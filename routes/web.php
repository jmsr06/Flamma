<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductoController;
use App\Mail\MessageReceived;
use App\Models\Categoria;
use App\Models\Coleccion;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// DB::listen(function($query){
//     echo "<pre>{$query->time}</pre>";
// });

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('about', [AboutController::class,'index'])->name('about');

Route::get('/productos/all', [ProductoController::class,'index'])->name('productos.index');
Route::get('/getMoreProducts', [ProductoController::class,'getMoreProducts'])->name('productos.getMoreProducts');
Route::get('/productos/{categoria}', [ProductoController::class,'indexCategoria'])->name('productos.indexCategoria');
Route::get('/colecciones/{coleccion}', [ProductoController::class,'indexColeccion'])->name('productos.indexColeccion');
Route::get('producto/{productos}', [ProductoController::class,'show'])->name('productos.show');
Route::view('colecciones', 'colecciones')->name('colecciones');

Route::get('/carrito-compras', [CarritoController::class,'index'])->name('carrito.index');
Route::post('/carrito-compras', [CarritoController::class,'store'])->name('carrito.store');

// Route::view('condiciones', 'condiciones')->name('condiciones');

// Route::view('politicas', 'politicas')->name('politicas');

Route::get('email', function(){
    $mensaje = [
        'name' => 'Alexis Cáceres',
        'content' => 'Te estoy enviando un email',
        'email' => 'nelsonalexis@gmail.com'

    ];
    Mail::to('a1098818855@gmail.com')->queue(new MessageReceived($mensaje));//send(new MessageReceived($mensaje));
    return "mensaje enviado";
})->name('email');

// Route::get('/pruebas',function(){
//     $producto = Producto::from('productos as productos')
//     ->join('talla_productos as t',function($join){
//         $join->on('productos.referencia','=','t.referencia_producto');
//     })->select(DB::raw('productos.*, sum(t.stock) as cantidad'))->groupBy('productos.referencia')->orderBy('productos.nombre', 'asc')->paginate(15);
//     dd($producto);
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
