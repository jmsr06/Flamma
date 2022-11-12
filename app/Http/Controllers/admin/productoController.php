<?php

namespace App\Http\Controllers\admin;

use App\Models\Categoria;
use App\Models\Coleccion;
use App\Models\Producto;
use App\Models\Talla;
use App\Models\ImagenProducto;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use App\Models\TallaProducto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class productoController extends Controller
{
    function create(){
        $categorias = Categoria::all();
        $colecciones = Coleccion::all();
        $tallas = Talla::all();
        return view('admin/productos',compact(['categorias','colecciones','tallas']));
    }
    function store(Request $request){
        $rules = [
            'referencia' => 'required|max:5|unique:productos',
            'nombre' => 'required|max:30|unique:productos',
            'categoria' =>'required',
            'coleccion' =>'required',
            'precio' =>'required|numeric|min:0',
            'tallas' => 'required',
            'descripcion' => 'required|min:10',
            'guia' => 'required|image',
            'archivo' => 'required|image'
        ];
        $message = [];
        $patron  = '/^archivo[0-9]*$/';
        foreach (preg_grep($patron, array_keys($request->toArray())) as $img) {
            if($img != 'archivo'){
                $rules = $rules + array($img => 'required|image');
            }
        }
        foreach ($request->tallas as $talla) {
            $rules = $rules + array('c'.$talla => 'required|numeric|min:0');
            $message = $message + array('c'.$talla.'.required' => 'La cantidad de la talla es requerida');
            $message = $message + array('c'.$talla.'.numeric' => 'La cantidad de la talla debe ser numérica');
            $message = $message + array('c'.$talla.'.min' => 'La cantidad mínima de la talla es cero');
        }

        $request->validate($rules,$message);
        // dd($request);
        $producto = new Producto();
        $producto->referencia = $request->input('referencia');
        $producto->nombre = $request->input('nombre');
        $producto->id_categoria = $request->input('categoria');
        $producto->id_coleccion = $request->input('coleccion');
        $producto->slug = Str::of($request->input('nombre'))->slug('-');
        $producto->precio = $request->input('precio');
        $producto->descripcion = $request->input('descripcion');
        if($request->file('guia')){
            $producto->guia_tallas_img = $request->file('guia')->store('images/guias','public');
        }
        $producto->save();
        /*imágen producto*/
        $cont = 1;
        foreach (preg_grep($patron, array_keys($request->toArray())) as $img) {
            $imgProduct = new ImagenProducto();
            $imgProduct->referencia = $request->input('referencia');
            if($request->file($img)){
                $imgProduct->nombre_imagen  = $request->file($img)->store('images/productos','public');
            }
            $imgProduct->descripcion = $request->input('nombre');
            $imgProduct->prioridad = $cont++;
            $imgProduct->save();
        }
        /*Tallas del producto*/
        foreach ($request->tallas as $talla) {
            $tallaProd = new TallaProducto();
            $tallaProd->referencia_producto = $request->input('referencia');
            $tallaProd->id_talla = $talla;
            $tallaProd->stock = $request->input('c'.$talla);
            $tallaProd->estado = 'disponible';
            $tallaProd->save();
        }

        return redirect()->route('agregarproducto.create')->with(['message'=>'Producto agregado exitosamente','typeAlert'=>'exito']);
    }

    public function index()
    {
        $categorias = Categoria::get();
        $colecciones = Coleccion::get();
        $productos = Producto::with(['categoria','coleccion'])->withTrashed()->orderBy('referencia')->get();
        return view('admin/mod_prod_inicio', compact(['productos','categorias', 'colecciones']));
    }

    public function buscador(Request $request){
        $request->validate([
            'busqueda' => 'required|min:2|max:30'
        ]);
        $buscar = $request->input('busqueda');
        if($buscar == 'todos'){
            $productos =  Producto::with(['categoria','coleccion'])->withTrashed()->orderBy('referencia')->get();
            return view("admin/mod_prod_inicio",compact("productos"));
        }
        $productos =  Producto::with(['categoria','coleccion'])->withTrashed()->orderBy('referencia','asc')->where("nombre",'like',"%".$buscar."%")->get();
        if($productos->isEmpty()){
            $productos = Producto::with(['categoria','coleccion'])->withTrashed()->where("referencia",'like',"%".$buscar."%")->orderBy('referencia','asc')->get();
            return view("admin/mod_prod_inicio",compact("productos"));
        }
        return view("admin/mod_prod_inicio",compact("productos"));
    }

    public function destroy($producto)
    {
        $producto = Producto::withTrashed()->where('slug',$producto)->first();
        if($producto->trashed()){
            $producto->restore();
            return redirect()->route('modificarProducto.index')->with(['message'=>'Producto restaurado exitosamente','typeAlert'=>'exito']);
        }
        else{
            $producto->delete();
            return redirect()->route('modificarProducto.index')->with(['message'=>'Producto ocultado exitosamente','typeAlert'=>'exito']);
        }
    }


    public function updateProd(Request $request, Producto $producto)
    {
        // $referencia = $request->input('nueva-referencia');
        $request->validate([
            'nuevo-nombre' => 'required|max:70|unique:productos,nombre,'.$producto->referencia.',referencia',
            'nuevo-costo' => 'numeric|required|min:0',
            'nueva-coleccion' => 'required',
            'nueva-categoria' => 'required',
            'nueva-descripcion' => 'required|max:500'
        ]);
        $producto->nombre = $request->input('nuevo-nombre');
        $producto->precio = $request->input('nuevo-costo');
        $producto->id_coleccion = intval($request->input('nueva-coleccion'));
        $producto->id_categoria = intval($request->input('nueva-categoria'));
        $producto->descripcion = $request->input('nueva-descripcion');
        $producto->save();
        return redirect()->route('modificarProducto.index')->with(['message'=>'Producto modificado exitosamente','typeAlert'=>'exito']);
    }

    public function update(Producto $producto){
        $categorias = Categoria::all();
        $colecciones = Coleccion::all();
        return view('admin/mod_prod',compact(['producto','categorias','colecciones']));
    }

//modificar talla
    public function indexGestionarTalla()
    {
        $productos = Producto::orderBy('referencia')->get();
        return view('admin/gestionar_talla_inicio', compact(['productos']));
    }

    public function gestionarTalla(Producto $producto){
        $sql = "SELECT DISTINCT t.* FROM tallas as t WHERE t.id NOT IN (SELECT id_talla FROM  talla_productos WHERE referencia_producto = '".$producto->referencia."')";
        $tallas = DB::select($sql);
        // dd($producto->tallas[0]->tallaProducto);
        return view('admin/gestionar_talla',compact(['producto','tallas']));
    }

    public function buscadorGestTalla(Request $request){
        $request->validate([
            'busqueda' => 'required|min:2|max:30'
        ]);
        $buscar = $request->input('busqueda');
        if($buscar == 'todos'){
            $productos =  Producto::with(['categoria','coleccion'])->withTrashed()->orderBy('referencia')->get();
            return view("admin/gestionar_talla_inicio",compact("productos"));
        }
        $productos =  Producto::with(['categoria','coleccion'])->withTrashed()->orderBy('referencia','asc')->where("nombre",'like',"%".$buscar."%")->get();
        if($productos->isEmpty()){
            $productos = Producto::with(['categoria','coleccion'])->withTrashed()->where("referencia",'like',"%".$buscar."%")->orderBy('referencia','asc')->get();
            return view("admin/gestionar_talla_inicio",compact("productos"));
        }
        return view("admin/gestionar_talla_inicio",compact("productos"));
    }

    public function destroyTalla(Producto $producto, Request $request)
    {
        $request->validate([
            'talla' => 'Required'
        ]);
        $tallaProd = TallaProducto::withTrashed()->where('referencia_producto',$producto->referencia)
        ->where('id_talla',$request->input('talla'))->first();
        if($tallaProd->trashed()){
            $tallaProd->estado = "disponible";
            $tallaProd->restore();
            $tallaProd->save();
            return back()->with(['message'=>'Talla restaurado exitosamente','typeAlert'=>'exito']);
        }
        else{
            $tallaProd->estado = "no disponible";
            $tallaProd->delete();
            $tallaProd->save();
            return back()->with(['message'=>'Talla ocultado exitosamente','typeAlert'=>'exito']);
        }
    }

    public function createTalla(Producto $producto, Request $request)
    {
        $request->validate([
            'talla' => 'Required'
        ]);
        $tallaProd = new TallaProducto();
        $tallaProd->referencia_producto = $producto->referencia;
        $tallaProd->id_talla = $request->input('talla');
        $tallaProd->stock = 0;
        $tallaProd->estado = 'disponible';
        if($tallaProd->save()){
            return back()->with(['message'=>'Talla agregada exitosamente','typeAlert'=>'exito']);
        }
        else{
            return back()->with(['message'=>'La talla no se ha podido agregar','typeAlert'=>'error']);
        }

    }


    public function updateGuia(Request $request)
    {
            $id = $request->input('referencia');
            $request->validate([
                'referencia' => 'required|unique:productos,referencia,'.$id.',referencia',
                'archivo' => 'image|required',
            ]);
            $producto = Producto::findOrFail($id);
            if($request->file('archivo')){
                $img =  $producto->guia_tallas_img;
                $producto->guia_tallas_img = $request->file('archivo')->store('images/guias','public');
                if($producto->save()){
                    if(Storage::disk('public')->exists($img)){
                        Storage::disk('public')->delete($img);
                        return redirect()->route('gestionarTalla.updateGuia')->with(['message'=>'Se ha modificado la guía de tallas exitosamente','typeAlert'=>'exito']);
                    }
                    else{
                        return redirect()->route('gestionarTalla.updateGuia')->with(['message'=>'La guia de tallas que se quiere reemplazar no se ha encontrado en el servidor, sin embargo se ha almacenado la nueva imágen','typeAlert'=>'alerta']);
                    }
                }
                else{
                    return redirect()->route('gestionarTalla.updateGuia')->with(['message'=>'No se ha podido modificar la guía de tallas','typeAlert'=>'error']);
                }
            }
    }
}
