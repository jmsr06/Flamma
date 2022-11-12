<?php

namespace App\Http\Controllers\admin;
use App\Models\Talla;
use Illuminate\Http\Request;

class tallaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tallas = Talla::withTrashed()->orderBy('nombre')->get();
        return view('admin/talla',compact('tallas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:15',
        ]);
        $talla = new Talla();
        $talla->nombre = $request->input('nombre');
        $talla->save();
        return redirect()->route('talla.index')->with(['message'=>'Talla agregada exitosamente','typeAlert'=>'exito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('id_talla');
        $request->validate([
            'id_talla' => 'required|numeric|unique:tallas,id,'.$id,
            'nuevo-nombre' => 'required|max:30|unique:tallas,nombre,'.$id,
        ]);
        $talla = Talla::findOrFail($id);
        $talla->id = $id;
        $talla->nombre = $request->input('nuevo-nombre');
        $talla->save();
        return redirect()->route('talla.index')->with(['message'=>'Talla modificada exitosamente','typeAlert'=>'exito']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($talla)
    {
        $talla = Talla::withTrashed()->where('id',$talla)->first();
        if($talla->trashed()){
            $talla->restore();
            return redirect()->route('talla.index')->with(['message'=>'Talla restaurada exitosamente','typeAlert'=>'exito']);
        }
        else{
            $talla->delete();
            return redirect()->route('talla.index')->with(['message'=>'Talla ocultada exitosamente','typeAlert'=>'exito']);
        }
    
    }
}
