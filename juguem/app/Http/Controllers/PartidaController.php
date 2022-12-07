<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partida;
use App\Models\Pista;
use App\Models\Localidad;
use App\Models\Deporte;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class PartidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $partidas=DB::table('partida')//UTILIZAMOS query builder para hacer consultas a bd
                    ->select('id_partida','id_pista','fecha_partida')
                    //->where('fecha_partida','LIKE','%'.$texto.'%')
                    //->orWhere('nombre','LIKE','%'.$texto.'%')
                    ->orderBy('fecha_partida','asc')
                    ->paginate(5);
        
        
        $usuario=User::find(1);
        print $usuario->nombre;
        //array_push($partidas,$usuario->nombre);
        foreach($partidas as $partida){
            

            
            $pista = Pista::find(1);
            $partida->id_pista=$pista->direccion;


            //$deporte=Deporte::findOrFail($partida->id_deporte);
            //$partida->id_deporte=$deporte->nombre;
            
         }
         



        
        return view('partida.index',compact('partidas','texto'));//cuando se a llamado el partida index enviara la vista con todo s los partidas pasados a la vista de BD
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('partida.create');
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
        $partida=new Partida;
        //$partida->id_partida=3;//esto esta mal
        //$partida->id_partida=unsignedBigInteger('track_id')->nullable();
        $partida->direccion=$request->input('direccion');
        $partida->save();
        return redirect()->route('partida.index');


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
        $partida=Partida::findOrFail($id);
        
        return view('partida.edit',compact('partida'));
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
        $partida=Partida::findOrFail($id);
        $partida->direccion=$request->input('direccion');
        $partida->save();
        return redirect()->route('partida.index');
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
        $partida=Partida::findOrFail($id);
       // $partida->delete();
        return redirect()->route('partida.index');


    }
}
