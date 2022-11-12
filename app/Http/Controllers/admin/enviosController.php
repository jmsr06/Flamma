<?php

namespace App\Http\Controllers\admin;
use App\Models\Departamento;
use App\Models\Ciudad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class enviosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::with(['ciudad' => function ($query) {
            $query->orderBy('nombre');
        }])->get();
        //$departamentos = Departamento::with('ciudad')->orderBy('nombre')->get();
        // $departamentos = Departamento::all();
        //dd($departamentos);
        return view('admin/envios',['departamentos'=>$departamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function buscador(Request $request){
        $request->validate([
            'busqueda' => 'required|min:4|max:20'
        ]);
        $buscar = $request->input('busqueda');
        if($buscar == 'todos'){
            $departamentos =  Departamento::with(['ciudad' => function ($query) {
                $query->orderBy('nombre','asc');
            }])->get();
            return view("admin/envios",compact("departamentos"));
        }
        $departamentos =  Departamento::with(['ciudad' => function ($query) {
            $query->orderBy('nombre','asc');
        }])->where("nombre",'like',$buscar."%")->get();
        if($departamentos->isEmpty()){
            $ciudades = Ciudad::with(['departamento'])->where("nombre",'like',$buscar."%")->orderBy('nombre','asc')->get();
            return view("admin/envios",compact("ciudades"));
        }
        return view("admin/envios",compact("departamentos"));
    }
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
        //
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
        $request->validate([
            'precio' => 'required|numeric|min:0',
            'ciudad' => 'required'
        ],[
            'ciudad.required' => 'Señale al menos una ciudad'
        ]);
        // dump(array_values($request->input('ciudad')));
        foreach($request->input('ciudad') as $ciudad){
            DB::update('update ciudades set costo ='.$request->input('precio').' where id = ?', [$ciudad]);
        }
        return redirect()->route('envios.index')->with(['message'=>'Los costos han sido modificados satisfactoriamente','typeAlert'=>'exito']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
