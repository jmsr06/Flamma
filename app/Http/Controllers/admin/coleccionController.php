<?php

namespace App\Http\Controllers\admin;
use App\Models\Coleccion;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class coleccionController extends Controller
{
    public function index()
    {
        $colecciones = Coleccion::withTrashed()->orderBy('nombre')->get();
        return view('admin/coleccion',compact('colecciones'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|max:30|unique:colecciones',
            'nombre_img' => 'required|image',
            'fecha_lanzamiento' => 'required|before_or_equal:'.date('d-m-Y')
        ];
        $request->validate($rules);
        $coleccion = new coleccion();
        $coleccion->slug = Str::of($request->input('nombre'))->slug('-');
        $coleccion->nombre = $request->input('nombre');
        $coleccion->descripcion_img = $request->input('nombre');
        $coleccion->fecha_lanzamiento = $request->input('fecha_lanzamiento');
        if($request->file('nombre_img')){
            $coleccion->imagen  = $request->file('nombre_img')->store('images/colecciones','public');
        }
        $coleccion->save();
        return redirect()->route('colecciones.index')->with(['message'=>'Colección agregada exitosamente','typeAlert'=>'exito']);

    }

    public function update(Request $request)
    {
            $id = $request->input('id-col');
            $request->validate([
                'id-col' => 'required|unique:colecciones,id,'.$id.',id',
                'archivo' => 'image',
                'nuevo-nombre' => 'required|max:30|min:3|unique:colecciones,nombre,'.$id.',id',
                'nueva-fecha' => 'required|before_or_equal:'.date('d-m-Y'),
                'descripcion-img' => 'required|max:30|min:3'

            ]);
            $coleccion = Coleccion::findOrFail($id);
            $coleccion->nombre = $request->input('nuevo-nombre');
            $coleccion->fecha_lanzamiento = $request->input('nueva-fecha');
            $coleccion->descripcion_img = $request->input('nuevo-nombre');
            if($request->file('archivo')){
                $img =  $coleccion->imagen;
                $coleccion->imagen = $request->file('archivo')->store('images/colecciones','public');
                if($coleccion->save()){
                    if(Storage::disk('public')->exists($img)){
                        Storage::disk('public')->delete($img);
                        return redirect()->route('colecciones.update')->with(['message'=>'Se ha modificado el nombre,la fecha y la imágen de la colección exitosamente','typeAlert'=>'exito']);
                    }
                    else{
                        return redirect()->route('colecciones.update')->with(['message'=>'La imágen de la colección que se quiere reemplazar no se ha encontrado en el servidor, sin embargo se ha modificado su nombre y se ha almacenado la nueva imágen','typeAlert'=>'alerta']);
                    }
                }
                else{
                    return redirect()->route('colecciones.update')->with(['message'=>'No se ha podido modificar el nombre, la fecha y la imágen  de la colección','typeAlert'=>'error']);
                }
            }
            else{
                if($coleccion->save()){
                    return redirect()->route('colecciones.update')->with(['message'=>'Se ha modificado el nombre y la fecha de la colección exitosamente','typeAlert'=>'exito']);
                }
                else{
                    return redirect()->route('colecciones.update')->with(['message'=>'No se ha podido modificar el nombre y la fecha de la colección','typeAlert'=>'error']);
                }
            }
    }

    public function destroy($coleccion)
    {
        $coleccion = Coleccion::withTrashed()->where('slug',$coleccion)->first();
        if($coleccion->trashed()){
            $coleccion->restore();
            return redirect()->route('colecciones.index')->with(['message'=>'Colección restaurada exitosamente','typeAlert'=>'exito']);
        }
        else{
            $coleccion->delete();
            return redirect()->route('colecciones.index')->with(['message'=>'Colección ocultada exitosamente','typeAlert'=>'exito']);
        }

    }

}
