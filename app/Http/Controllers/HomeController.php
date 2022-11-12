<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Coleccion;
use App\Models\SliderCliente;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        if(!request()->session()->has('categoria')){
            $categorias = Categoria::orderBy('nombre', 'asc')->get();
            session(['categoria' => $categorias]);
        }
        if(!request()->session()->has('coleccion')){
            $colecciones = Coleccion::orderBy('fecha_lanzamiento', 'desc')->get();
            session(['coleccion' => $colecciones]);
        }
        $slider = SliderCliente::orderBy('updated_at', 'desc')->get();
        return view('home',compact(['slider']));
    }
}
