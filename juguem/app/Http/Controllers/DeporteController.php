<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deporte;
use Illuminate\Support\Facades\DB;

class DeporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        //$deportes=Deporte::all(); ESTO SERIA UTILIZANDO ELOQUENT
        //return $deportes; retorna en formato json
        $deportes=DB::table('deporte')//UTILIZAMOS query builder para hacer consultas a bd
                    ->select('id_deporte','nombre','numero_jugadores')
                    ->where('nombre','LIKE','%'.$texto.'%')
                    //->orWhere('nombre','LIKE','%'.$texto.'%')
                    ->orderBy('nombre','asc')
                    ->paginate(5);
        return view('deporte.index',compact('deportes','texto'));//cuando se a llamado el deporte index enviara la vista con todo s los deportes pasados a la vista de BD
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('deporte.create');
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
        $deporte=new Deporte;
        //$deporte->id_deporte=3;//esto esta mal
        //$deporte->id_deporte=unsignedBigInteger('track_id')->nullable();
        $deporte->nombre=$request->input('nombre');
        $deporte->numero_jugadores=$request->input('numero_jugadores');
        $deporte->save();
        return redirect()->route('deporte.index');


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
        $deporte=Deporte::findOrFail($id);
        
        return view('deporte.edit',compact('deporte'));
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
        $deporte=Deporte::findOrFail($id);
        $deporte->nombre=$request->input('nombre');
        $deporte->numero_jugadores=$request->input('numero_jugadores');
        $deporte->save();
        return redirect()->route('deporte.index');
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
        $deporte=Deporte::findOrFail($id);
        $deporte->delete();
        return redirect()->route('deporte.index');


    }
}
