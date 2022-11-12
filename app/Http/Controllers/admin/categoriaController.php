<?php

namespace App\Http\Controllers\admin;
use App\Models\Categoria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class categoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::withTrashed()->orderBy('nombre')->get();
        return view('admin/categoria',compact('categorias'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|max:30|unique:categorias',
            'nombre_img' => 'required|image'
        ];
        $request->validate($rules);
        $categoria = new Categoria();
        $categoria->slug = Str::of($request->input('nombre'))->slug('-');
        $categoria->nombre = $request->input('nombre');
        $categoria->descripcion_img = $request->input('nombre');
        if($request->file('nombre_img')){
            $categoria->imagen  = $request->file('nombre_img')->store('images/categorias','public');
        }
        $categoria->save();
        return redirect()->route('categorias.index')->with(['message'=>'Categoria agregada exitosamente','typeAlert'=>'exito']);

    }

    public function update(Request $request)
    {
            $id = $request->input('id-cat');
            $request->validate([
                'id-cat' => 'required|unique:categorias,id,'.$id.',id',
                'archivo' => 'image',
                'nuevo-nombre' => 'required|max:30|min:3|unique:categorias,nombre,'.$id.',id',
                'descripcion-img' => 'required|max:30|min:3'

            ]);
            $categoria = Categoria::findOrFail($id);
            $categoria->nombre = $request->input('nuevo-nombre');
            $categoria->descripcion_img = $request->input('nuevo-nombre');
            if($request->file('archivo')){
                $img =  $categoria->imagen;
                $categoria->imagen = $request->file('archivo')->store('images/categorias','public');
                if($categoria->save()){
                    if(Storage::disk('public')->exists($img)){
                        Storage::disk('public')->delete($img);
                        return redirect()->route('categorias.update')->with(['message'=>'Se ha modificado el nombre y la imágen de la categoría exitosamente','typeAlert'=>'exito']);
                    }
                    else{
                        return redirect()->route('categorias.update')->with(['message'=>'La imágen de la categoría que se quiere reemplazar no se ha encontrado en el servidor, sin embargo se ha modificado su nombre y se ha almacenado la nueva imágen','typeAlert'=>'alerta']);
                    }
                }
                else{
                    return redirect()->route('categorias.update')->with(['message'=>'No se ha podido modificar el nombre y la imágen  de la categoría','typeAlert'=>'error']);
                }
            }
            else{
                if($categoria->save()){
                    return redirect()->route('categorias.update')->with(['message'=>'Se ha modificado el nombre de la categoría exitosamente','typeAlert'=>'exito']);
                }
                else{
                    return redirect()->route('categorias.update')->with(['message'=>'No se ha podido modificar el nombre de la categoría','typeAlert'=>'error']);
                }
            }
    }

    public function destroy($categoria)
    {
        $categoria = Categoria::withTrashed()->where('slug',$categoria)->first();
        if($categoria->trashed()){
            $categoria->restore();
            return redirect()->route('categorias.index')->with(['message'=>'Categoría restaurada exitosamente','typeAlert'=>'exito']);
        }
        else{
            $categoria->delete();
            return redirect()->route('categorias.index')->with(['message'=>'Categoría ocultada exitosamente','typeAlert'=>'exito']);
        }
    }
}
