<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pista;
use App\Models\Localidad;
use App\Models\Deporte;
use Illuminate\Support\Facades\DB;

class PistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $pistas=DB::table('pista')//UTILIZAMOS query builder para hacer consultas a bd
                    ->select('id_pista','id_localidad','id_deporte','direccion')
                    ->where('direccion','LIKE','%'.$texto.'%')
                    //->orWhere('nombre','LIKE','%'.$texto.'%')
                    ->orderBy('direccion','asc')
                    ->paginate(5);
        
        

        foreach($pistas as $pista){
            

            
            $localidad = Localidad::find(1);
            $pista->id_localidad=$localidad->nombre;


            $deporte=Deporte::findOrFail($pista->id_deporte);
            $pista->id_deporte=$deporte->nombre;
            
         }
         



        
        return view('pista.index',compact('pistas','texto'));//cuando se a llamado el pista index enviara la vista con todo s los pistas pasados a la vista de BD
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pista.create');
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
        $pista=new Pista;
        //$pista->id_pista=3;//esto esta mal
        //$pista->id_pista=unsignedBigInteger('track_id')->nullable();
        $pista->direccion=$request->input('direccion');
        $pista->save();
        return redirect()->route('pista.index');


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
        $pista=Pista::findOrFail($id);
        
        return view('pista.edit',compact('pista'));
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
        $pista=Pista::findOrFail($id);
        $pista->direccion=$request->input('direccion');
        $pista->save();
        return redirect()->route('pista.index');
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
        $pista=Pista::findOrFail($id);
       // $pista->delete();
        return redirect()->route('pista.index');


    }
}
