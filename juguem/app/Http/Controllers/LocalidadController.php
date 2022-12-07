<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localidad;
use Illuminate\Support\Facades\DB;

class LocalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        //$localidades=Localidad::all(); ESTO SERIA UTILIZANDO ELOQUENT
        //return $localidades; retorna en formato json
        $localidades=DB::table('localidad')//UTILIZAMOS query builder para hacer consultas a bd
                    ->select('id_localidad','nombre','provincia')
                    ->where('nombre','LIKE','%'.$texto.'%')
                    //->orWhere('nombre','LIKE','%'.$texto.'%')
                    ->orderBy('nombre','asc')
                    ->paginate(5);
        return view('localidad.index',compact('localidades','texto'));//cuando se a llamado el localidad index enviara la vista con todo s los localidades pasados a la vista de BD
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('localidad.create');
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
        $localidad=new Localidad;
        //$localidad->id_localidad=3;//esto esta mal
        //$localidad->id_localidad=unsignedBigInteger('track_id')->nullable();
        $localidad->nombre=$request->input('nombre');
        $localidad->provincia=$request->input('provincia');
        $localidad->save();
        return redirect()->route('localidad.index');


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
        $localidad=Localidad::findOrFail($id);
        
        return view('localidad.edit',compact('localidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $localidad=Localidad::findOrFail($id);
        $localidad->nombre=$request->input('nombre');
        $localidad->provincia=$request->input('provincia');
        $localidad->save();
        return redirect()->route('localidad.index');
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
        $localidad=Localidad::findOrFail($id);
        $localidad->delete();
        return redirect()->route('localidad.index');


    }
}
