<?php

namespace App\Http\Controllers\admin;
use App\Models\SliderCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderc = SliderCliente::orderBy('updated_at', 'desc')->get();
        return view('admin/slider',compact('sliderc'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'archivo' => 'required|image',
            'descripcion' => 'required'
        ],[
            'archivo.required' => 'Debe adjuntar la imágen que desea subir antes de envíar la solicitud',
            'archivo.image' => 'El archivo que desea subir debe ser un formato de imágen'
        ]);
        $imgNew =new SliderCliente();
        $imgNew->descripcion = $request->input('descripcion');
        if($request->file('archivo')){
            $imgNew->nombre_img = $request->file('archivo')->store('images/clientes','public');
            $imgNew->save();
            return redirect()->route('slider.index')->with(['message'=>'Imágen agregada exitosamente','typeAlert'=>'exito']);
        }
        else{
            return redirect()->route('slider.index')->with(['message'=>'No se ha encontrado el archivo que desea subir','typeAlert'=>'alerta']);
        }
    }

    public function update(Request $request)
    {
            $request->validate([
                'path-image' => 'required',
                'archivo' => 'required|image'
            ]);
            $imgOld = SliderCliente::where('nombre_img',$request->input('path-image'))->first();
            if($imgOld == null){
                return redirect()->route('slider.update')->with(['message'=>'La imágen que se quiere reemplazar no se ha encontrado en la base de datos','typeAlert'=>'error']);
            }
            if(Storage::disk('public')->exists($request->input('path-image'))){
                Storage::disk('public')->delete($request->input('path-image'));
                $imgOld->nombre_img = $request->file('archivo')->store('images/clientes','public');
                $imgOld->save();
                return redirect()->route('slider.update')->with(['message'=>'Imágen reemplazada exitosamente','typeAlert'=>'exito']);
            }
            else{
                $imgOld->nombre_img = $request->file('archivo')->store('images/clientes','public');
                $imgOld->save();
                return redirect()->route('slider.update')->with(['message'=>'La imágen que se quiere reemplazar no se ha encontrado en el servidor, sin embargo se ha almacenado la nueva imágen','typeAlert'=>'alerta']);
            }
    }

    public function destroy( Request $request)
    {

        $request->validate([
            'path' => 'required|min:10'
        ],[
            'path.required' => 'Ha ocurrido un error al intentar localizar la imágen que se desea eliminar'
        ]);
        $imgOld = SliderCliente::where('nombre_img',$request->input('path'))->first();
        if($imgOld == null){
            return redirect()->route('slider.index')->with(['message'=>'La imágen que se desea eliminar no se ha encontrado en la base de datos','typeAlert'=>'error']);
        }
        $imgOld->delete();
        if(Storage::disk('public')->exists($request->input('path'))){
            Storage::disk('public')->delete($request->input('path'));
            return redirect()->route('slider.index')->with(['message'=>'Imágen eliminada exitosamente','typeAlert'=>'exito']);
        }
        else{
            return redirect()->route('slider.index')->with(['message'=>'La imágen que se quiere eliminar no se ha encontrado en el servidor, sin embargo se ha eliminado de la base de datos','typeAlert'=>'alerta']);
        }
    }
}
