<?php

namespace App\Http\Controllers\admin;
use App\Models\ImagenProducto;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class imagenProdController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['imagenProductos' => function ($query) {
            $query->orderBy('prioridad');
        }])->get();
        return view('admin/mod_img_inicio',compact('productos'));
    }

    public function buscador(Request $request){
        $request->validate([
            'busqueda' => 'required|min:1|max:20'
        ]);
        $buscar = $request->input('busqueda');
        if(strtolower($buscar) == 'todos'){
            $productos = Producto::orderBy('referencia')->get();
            return view('admin/mod_img_inicio',compact('productos'));
        }
        $productos = Producto::where("referencia",'like',"%".$buscar."%")->orderBy('referencia')->get();
        if($productos->isEmpty()){
            $productos = Producto::where("nombre",'like',"%".$buscar."%")->orderBy('referencia')->get();
            return view('admin/mod_img_inicio',compact('productos'));
        }
        return view('admin/mod_img_inicio',compact('productos'));   
    }

    public function update(Producto $producto){
        return view('admin/mod_img',compact('producto'));
    }

    public function updateImage(Request $request,Producto $producto){
        $request->validate([
            'path-image' => 'required',
            'archivo' => 'required|image'
        ]);
        $imgOld = ImagenProducto::where('nombre_imagen',$request->input('path-image'))->first();
        if($imgOld == null){
            return redirect()->route('imagenProducto.update',$producto)->with(['message'=>'La imágen que se quiere reemplazar no se ha encontrado en la base de datos','typeAlert'=>'error']);
        }
        if(Storage::disk('public')->exists($request->input('path-image'))){
            Storage::disk('public')->delete($request->input('path-image'));
            $imgOld->nombre_imagen = $request->file('archivo')->store('images/productos','public');
            $imgOld->save();
            return redirect()->route('imagenProducto.update',$producto)->with(['message'=>'Imágen reemplazada exitosamente','typeAlert'=>'exito']);
        }
        else{
            $imgOld->nombre_imagen = $request->file('archivo')->store('images/productos','public');
            $imgOld->save();
            return redirect()->route('imagenProducto.update',$producto)->with(['message'=>'La imágen que se quiere reemplazar no se ha encontrado en el servidor, sin embargo se ha almacenado la nueva imágen','typeAlert'=>'alerta']);
        }
    }

    public function storeImage(Request $request,Producto $producto){
        $request->validate([
            'archivo' => 'required|image'
        ],[
            'archivo.required' => 'Debe adjuntar la imágen que desea subir antes de envíar la solicitud',
            'archivo.image' => 'El archivo que desea subir debe ser un formato de imágen'
        ]);
        $imgNew =new ImagenProducto();
        $imgNew->referencia = $producto->referencia;
        $imgNew->descripcion = $producto->nombre;
        $imgNew->prioridad = count($producto->imagenProductos) + 1;
        if($request->file('archivo')){
            $imgNew->nombre_imagen = $request->file('archivo')->store('images/productos','public');
            $imgNew->save();
            return redirect()->route('imagenProducto.update',$producto)->with(['message'=>'Imágen agregada exitosamente','typeAlert'=>'exito']);
        }
        else{
            return redirect()->route('imagenProducto.update',$producto)->with(['message'=>'No se ha encontrado el archivo que desea subir','typeAlert'=>'alerta']);
        }
    }
    public function deleteImage(Request $request,Producto $producto){
        $request->validate([
            'path' => 'required|min:10'
        ],[
            'path.required' => 'Ha ocurrido un error al intentar localizar la imágen que se desea eliminar'
        ]);
        $imgOld = ImagenProducto::where('nombre_imagen',$request->input('path'))->first();
        if($imgOld == null){
            return redirect()->route('imagenProducto.update',$producto)->with(['message'=>'La imágen que se desea eliminar no se ha encontrado en la base de datos','typeAlert'=>'error']);
        }
        $cont = count($producto->imagenProductos);
        $prioridad = $imgOld->prioridad;
        $imgOld->delete();
        if($cont != $prioridad){
            $images = ImagenProducto::where('prioridad','>',$prioridad)->get();
            foreach($images as $img){
                $img->prioridad = $img->prioridad -1;
                $img->save();
            }
        }
        if(Storage::disk('public')->exists($request->input('path'))){
            Storage::disk('public')->delete($request->input('path'));
            return redirect()->route('imagenProducto.update',$producto)->with(['message'=>'Imágen eliminada exitosamente','typeAlert'=>'exito']);
        }
        else{
            return redirect()->route('imagenProducto.update',$producto)->with(['message'=>'La imágen que se quiere eliminar no se ha encontrado en el servidor, sin embargo se ha eliminado de la base de datos','typeAlert'=>'alerta']);
        }
        
    }

    public function updatePrioridad(Request $request,Producto $producto){
        $count = count($request->all());
        if(($count-2) == count($producto->imagenProductos)){
            $prod = $producto->imagenProductos;
            $cont = count($producto->imagenProductos);
            for ($i = 0; $i < $cont; ++$i){
                $prod[$i]->prioridad = $request->all()[$i+1];
                $prod[$i]->save(); 
            } 
            return redirect()->route('imagenProducto.update',$producto)->with(['message'=>'Prioridades cambiadas correctamente','typeAlert'=>'exito']);      
        }
        else{
            return redirect()->route('imagenProducto.update',$producto)->with(['message'=>'Se enviaron más parámetros de los que se esperaban','typeAlert'=>'error']);
        }
        
    }
}
