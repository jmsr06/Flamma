<?php

namespace App\Http\Controllers\admin;
use App\Models\TallaProducto;
use App\Models\Producto;
use App\Models\Talla;
use Illuminate\Http\Request;

class tallaProdController extends Controller
{
    public function index()
    {
        $stock = Producto::with('tallas')->orderBy('referencia')->get();
        return view('admin/stock',compact('stock'));
    }

    public function buscador(Request $request){
        $request->validate([
            'busqueda' => 'required|min:2|max:30'
        ]);
        $buscar = $request->input('busqueda');
        if($buscar == 'todos'){
            $stock =  Producto::with('tallas')->orderBy('referencia')->get();
            return view("admin/stock",compact("stock"));
        }
        $stock =  Producto::with('tallas')->orderBy('referencia','asc')->where("nombre",'like',"%".$buscar."%")->get();
        if($stock->isEmpty()){
            $stock = Producto::with('tallas')->where("referencia",'like',"%".$buscar."%")->orderBy('referencia','asc')->get();
            return view("admin/stock",compact("stock")); 
        }
        return view("admin/stock",compact("stock"));      
    }

    public function update(Request $request)
    {
        //dd($request);
        $id = $request->input('id-talla');
        $referencia = $request->input('referencia');
        $request->validate([
            'referencia' => 'required|unique:productos,referencia,'.$referencia.',referencia',
            'id-talla' => 'required|numeric|unique:tallas,id,'.$id,
            'cantidad' => 'required|numeric|min:0'
        ]);
        $stock = Producto::with(['tallas'])->findOrFail($referencia);
        //dd($stock);
        foreach($stock->tallas as $talla){
            if($talla->id == $id){
                $talla->tallaProducto->stock = $request->input('cantidad');
                if($request->input('cantidad') == 0 ){
                    $talla->tallaProducto->estado = 'no disponible';
                }
                else{
                    $talla->tallaProducto->estado = 'disponible';
                }
                $talla->tallaProducto->save();
                return redirect()->route('stock.index')->with(['message'=>'Stock modificado exitosamente','typeAlert'=>'exito']);
            }
        }
        return redirect()->route('stock.index')->with(['message'=>'Talla no encontrada','typeAlert'=>'error']);
        //$stock->id_talla = $id;
        //$stock->stock = $request->input('cantidad');
        //$stock->save();
        //return redirect()->route('stock.index')->with(['message'=>'Stock modificado exitosamente','typeAlert'=>'exito']);
    }
}
