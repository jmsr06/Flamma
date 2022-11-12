<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Departamento;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Ruta para listar todos los departamentos
Route::get('departamentos', function (){
    $departamentos = Departamento::get();
    return $departamentos;
});

//Ruta para listar un departamentos
Route::get('departamentos/{id}', function ($id){
    $departamento = Departamento::findOrFail($id);
    return $departamento;
})->name('getDepartamentos');

//Ruta para crear departamentos
Route::post('departamentos', function (Request $request){
    //return $request->input('nombre'); //capturar sólo un campo
    //return $request->all();  //todos
    $request->validate([
        'id' => 'required|unique:departamentos|numeric',
        'nombre' => 'required|max:30'
    ]);
    $departamento = new Departamento;
    $departamento->id = $request->input('id');
    $departamento->nombre = $request->input('nombre');
    $departamento->save();
    return "departamento creado";
});

//Ruta para modificar departamentos
Route::put('departamentos/{id}', function (Request $request,$id) {
    $request->validate([
        'id' => 'required|numeric|unique:departamentos,id,'.$id,
        'nombre' => 'required|max:30'
    ]);
    $departamento = Departamento::findOrFail($id);
    $departamento->id = $request->input('id');
    $departamento->nombre = $request->input('nombre');
    $departamento->save();
    return 'Departamento modificado';
});

//Ruta para eliminar departamentos
Route::delete('departamentos/{id}', function ($id) {
    $departamento = Departamento::findOrFail($id);
    $departamento->delete();
    return 'Departamento eliminado exitosamente';
});
