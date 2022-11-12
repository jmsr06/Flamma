<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\enviosController;
use App\Http\Controllers\admin\cuponController;
use App\Http\Controllers\admin\tallaController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\pedidoController;
use App\Http\Controllers\admin\categoriaController;
use App\Http\Controllers\admin\coleccionController;
use App\Http\Controllers\admin\productoController;
use App\Http\Controllers\admin\tallaProdController;
use App\Http\Controllers\admin\imagenProdController;
use App\Http\Middleware\Admin;
use App\Models\SliderCliente;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// DB::listen(function($query){
//     echo "<pre>{$query->sql}</pre>";
// });


//ADMINISTRADOR
Route::middleware([Admin::class])->group(function () {
Route::view('/', 'admin/homeAdmin')->name('homeadmin');

Route::view('pedidos', 'admin/pedidos')->name('pedidos');
Route::view('noEnviados', 'admin/noenviados')->name('noenviados');
Route::view('masVendidos', 'admin/masvendidos')->name('masvendidos');




Route::get('modificarProducto', [productoController::class,'index'])->name('modificarProducto.index');
Route::post('modificarProducto', [productoController::class,'buscador'])->name('modificarProducto.buscador');
Route::delete('modificarProducto/{producto}', [productoController::class,'destroy'])->name('modificarProducto.destroy');
Route::get('modificarProducto/{producto}', [productoController::class,'update'])->name('modificarProducto.update');
Route::put('modificarProducto/{producto}', [productoController::class,'updateProd'])->name('modificarProducto.updateProd');
// Route::put('modificarDescripcion/{producto}', [productoController::class,'updateDescrip'])->name('modificarProducto.updateDesc');

Route::get('gestionarTalla', [productoController::class,'indexGestionarTalla'])->name('gestionarTalla.index');
Route::post('gestionarTalla', [productoController::class,'buscadorGestTalla'])->name('gestionarTalla.buscador');
Route::get('gestionarTalla/{producto}', [productoController::class,'gestionarTalla'])->name('gestionarTalla.update');
Route::delete('gestionarTalla/{producto}', [productoController::class,'destroyTalla'])->name('gestionarTalla.destroy');
Route::post('gestionarTalla/{producto}', [productoController::class,'createTalla'])->name('gestionarTalla.create');
Route::put('gestionarTalla', [productoController::class,'updateGuia'])->name('gestionarTalla.updateGuia');


/* Route::get('gestionar-Talla/{producto}', [productoController::class,'updateTalla'])->name('gestinarTalla.update');
Route::put('gestionar-Talla/{producto}', [productoController::class,'updateDescrip'])->name('gestinarTalla.update');
 */


Route::get('pedidos', [pedidoController::class,'index'])->name('pedidos.index');


//TERMINADO

Route::get('costoEnvio', [enviosController::class,'index'])->name('envios.index');
Route::post('costoEnvio', [enviosController::class,'buscador'])->name('envios.buscador');
Route::put('costoEnvio', [enviosController::class,'update'])->name('envios.update');


Route::get('slider', [sliderController::class,'index'])->name('slider.index');
Route::delete('slider', [sliderController::class,'destroy'])->name('slider.destroy');
Route::post('slider', [sliderController::class,'store'])->name('slider.store');
Route::put('slider', [sliderController::class,'update'])->name('slider.update');


Route::get('cupones', [cuponController::class,'index'])->name('cupones.index');
Route::post('cupones', [cuponController::class,'store'])->name('cupones.store');
Route::delete('cupones/{cupon}', [cuponController::class,'destroy'])->name('cupones.destroy');
Route::put('cupones', [cuponController::class,'update'])->name('cupones.update');


Route::get('categoria', [categoriaController::class,'index'])->name('categorias.index');
Route::delete('categoria/{categoria}', [categoriaController::class,'destroy'])->name('categorias.destroy');
Route::post('categoria', [categoriaController::class,'store'])->name('categorias.store');
Route::put('categoria', [categoriaController::class,'update'])->name('categorias.update');


Route::get('coleccion', [coleccionController::class,'index'])->name('colecciones.index');
Route::delete('coleccion/{coleccion}', [coleccionController::class,'destroy'])->name('colecciones.destroy');
Route::post('coleccion', [coleccionController::class,'store'])->name('colecciones.store');
Route::put('coleccion', [coleccionController::class,'update'])->name('colecciones.update');


Route::get('talla', [tallaController::class,'index'])->name('talla.index');
Route::post('talla', [tallaController::class,'store'])->name('talla.store');
Route::delete('talla/{talla}', [tallaController::class,'destroy'])->name('talla.destroy');
Route::put('talla', [tallaController::class,'update'])->name('talla.update');


Route::get('stock', [tallaProdController::class,'index'])->name('stock.index');
Route::post('stock', [tallaProdController::class,'buscador'])->name('stock.buscador');
Route::put('stock', [tallaProdController::class,'update'])->name('stock.update');


Route::get('imagenProducto', [imagenProdController::class,'index'])->name('imagenProducto.index');
Route::post('imagenProducto', [imagenProdController::class,'buscador'])->name('imagenProducto.buscador');
Route::get('imagenProducto/{producto}', [imagenProdController::class,'update'])->name('imagenProducto.update');
Route::put('imagenProducto/{producto}', [imagenProdController::class,'updateImage'])->name('imagenProducto.updateImage');
Route::post('imagenProducto/{producto}', [imagenProdController::class,'storeImage'])->name('imagenProducto.storeImage');
Route::delete('imagenProducto/{producto}', [imagenProdController::class,'deleteImage'])->name('imagenProducto.deleteImage');
Route::patch('imagenProducto/{producto}', [imagenProdController::class,'updatePrioridad'])->name('imagenProducto.updatePrioridad');



Route::get('agregarProducto', [productoController::class,'create'])->name('agregarproducto.create');
Route::post('agregarProducto', [productoController::class,'store'])->name('agregarproducto.store');

// Route::view('img', 'admin/iman');


// Route::post('imagen',function(Request $request){
//     $sliderCliente = new SliderCliente;
//     $sliderCliente->descripcion = $request->input('descripcion');
//     if($request->file('nombre_img')){
//         //$nombre = $request->file('nombre_img')->getClientOriginalName();
//         //$sliderCliente->nombre_img = $request->file('nombre_img')->storeAs('images/clientes',$nombre,'public');
//         $sliderCliente->nombre_img = $request->file('nombre_img')->store('images/clientes','public');
//         $sliderCliente->save();
//     }
//     return redirect()->route('slider.index')->with(['message'=>'Imagen agregada exitosamente','typeAlert'=>'exito']);
// })->name('iman');

});
