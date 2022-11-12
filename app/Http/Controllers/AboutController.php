<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Coleccion;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        $colecciones = Coleccion::all();
        return view('about',compact(['categorias','colecciones']));
    }
}
