<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partida;
use App\Models\Pista;
use App\Models\Localidad;
use App\Models\Deporte;
use App\Models\User;
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
        
        $partidas=Partida::all();
        $userId = auth()->user()->id;
        echo '+'.$userId;
        $usuario = User::find($userId);
        echo '*'.$usuario->nombre;
        foreach ($partidas as $partida) {
            $pista = Pista::find(1);
        }

       // $tamaño = count( User::find);


        echo '\--llega--';
        foreach ($partidas as $partida) {
            $usuarios=$partida->usuarios()->get();
            $tamaño = count($usuarios);
            echo '***el tamaño es'.$tamaño.'*****';
            foreach ($usuarios as $user) {
                //echo '---->'.$user->name."'<----'";
            }
        }
        return view('partida.index', compact('partidas')); //cuando se a llamado el partida index enviara la vista con todo s los partidas pasados a la vista de BD


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //consultando la base de datos
        $localidades = DB::table('localidad') //UTILIZAMOS query builder para hacer consultas a bd
            ->select('id_localidad', 'nombre', 'provincia')
            //->where('nombre','LIKE','%'.$texto.'%')
            //->orWhere('nombre','LIKE','%'.$texto.'%')
            ->orderBy('nombre', 'asc')
            ->paginate(5);
        
        //utilizando el orm
        $deportes=Deporte::all();
        $pistas=Pista::all();

        
        
        
        return view('partida.create', compact('localidades','deportes','pistas'));
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
        $partida = new Partida;

        
        //$partida->id_partida=3;//esto esta mal
        //$partida->id_partida=unsignedBigInteger('track_id')->nullable();
        $partida->id_pista = $request->input('5');
        $partida->fecha_partida = $request->input('datepicker');
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
        $partida = Partida::findOrFail($id);

        return view('partida.edit', compact('partida'));
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
        $partida = Partida::findOrFail($id);
        $partida->direccion = $request->input('direccion');
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
        $partida = Partida::findOrFail($id);
        // $partida->delete();
        return redirect()->route('partida.index');
    }

    static function returnPistas($id_localidad,$id_deporte)
    {
        //
        //$pistas = Pista::findOrFail($id_localidad);




        $pistas = DB::table('pista') //UTILIZAMOS query builder para hacer consultas a bd
        ->select('id_pista', 'id_localidad', 'id_deporte','direccion')
        ->where('id_localidad','LIKE','%'.$id_localidad.'%')
        ->where('id_deporte','LIKE','%'.$id_deporte.'%')
        //->orderBy('nombre', 'asc')
        ->paginate(5);

        return redirect()->route('partida.index');
    }
}
