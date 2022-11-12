<?php

namespace App\Http\Controllers\admin;
use App\Models\Cupon;
use Illuminate\Http\Request;

class cuponController extends Controller
{
    public function index()
    {
        $cupones = Cupon::orderBy('nombre')->get();
        return view('admin/cupones',compact('cupones'));
    }
    public function store(Request $request)
    {
            $request->validate([
                'nombre' => 'required|max:30|unique:cupones',
                'descuento' => 'numeric|required|between:0,1',
                'usos' => 'numeric|required|min:0',
                'fecha-vencimiento' => 'required',
                'hora-vencimiento' => 'required'
            ]);
            $cupon = new Cupon;
            $cupon->nombre = $request->input('nombre');
            $cupon->descuento = $request->input('descuento');
            $cupon->usos = $request->input('usos');
            $cupon->fecha_vencimiento = $request->input('fecha-vencimiento');
            $cupon->hora_vencimiento = $request->input('hora_vencimiento');
            $cupon->save();
            return redirect()->route('cupones.index')->with(['message'=>'Cupón agregado exitosamente','typeAlert'=>'exito']);

    }
    public function update(Request $request)
    {
        $id = $request->input('id_cupon');
        $request->validate([
            'id_cupon' => 'required|numeric|unique:cupones,id,'.$id,
            'nuevo-nombre' => 'required|max:30|unique:cupones,nombre,'.$id,
            'nuevo-descuento' => 'numeric|required|between:0,1',
            'nuevo-usos' => 'numeric|required|min:0',
            'nueva-fecha' => 'required',
            'nueva-hora' => 'required'
        ]);
        $cupon = Cupon::findOrFail($id);
        $cupon->id = $id;
        $cupon->nombre = $request->input('nuevo-nombre');
        $cupon->descuento = $request->input('nuevo-descuento');
        $cupon->usos = $request->input('nuevo-usos');
        $cupon->fecha_vencimiento = $request->input('nueva-fecha');
        $cupon->hora_vencimiento = $request->input('nueva-hora');
        $cupon->save();
        return redirect()->route('cupones.index')->with(['message'=>'Cupón modificado exitosamente','typeAlert'=>'exito']);
    }

    public function destroy(Cupon $cupon)
    {
        $cupon->delete();
        return redirect()->route('cupones.index')->with(['message'=>'Cupón eliminado exitosamente','typeAlert'=>'exito']);

    }
}
