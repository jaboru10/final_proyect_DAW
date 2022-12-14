<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partida;
use App\Models\Pista;
use App\Models\Localidad;
use App\Models\Deporte;
use App\Models\User;
use App\Models\Partida_Usuario;
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
        $userId = auth()->user()->id;
        $usuarioDeSession = User::find($userId);
        $usuariosCreadores=array();
        
        $partidas=Partida::all();
        $direccionesDeLasPistas=array();
        $deportesdelasPistas=array();
        
        foreach ($partidas as $i => $partida) {
            $pista = Pista::find($partida->id_pista);
            $direccionesDeLasPistas[$i]=$pista->direccion;

            $deporte = Deporte::find($pista->id_deporte);
            $deportesdelasPistas[$i]=$deporte;
            
            $usuarios = $partida->usuarios();
            $usuariosCreadores[$i]=$usuarios;
        }
        return view('partida.index',compact('partidas','direccionesDeLasPistas','usuariosCreadores','usuarioDeSession','deportesdelasPistas'));

    }
    public function historico(Request $request)
    {
        $userId = auth()->user()->id;
        $usuarioDeSession = User::find($userId);
        $asistentes=array();
        $usuariosDePartida=array();
        $deportes=array();
        $partidas=Partida::all();
        $direccionesDeLasPistas=array();
        $arrayConUsuariosDePartidas=array();




        foreach ($partidas as $i => $partida) {
            //obtengo la pista y los deportes
            $pista = Pista::find($partida->id_pista);
            $deportes[$i]=Deporte::find($pista->id_deporte);

            $direccionesDeLasPistas[$i]=$pista->direccion;
            $usuariosDePartida = app(Partida_UsuarioController::class)->returnUsuarios($partida->id_partida);
            $arrayConUsuariosDePartidas[$i]= $usuariosDePartida;
            $asistentes[$i]=count($usuariosDePartida);
            

            }

    
        // Convertir el array en una cadena JSON
       
        var_dump($arrayConUsuariosDePartidas);
        return view('partida.historico',compact('partidas','direccionesDeLasPistas',
        'usuariosDePartida','usuarioDeSession','deportes','asistentes','arrayConUsuariosDePartidas'));

    }

    /**
     
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apuntarse(Request $request)
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
        //recojo los ids necessarios

        $idpista=$request->input('direccion');
        $iddeporte=$request->input('nombre_deporte');
        $idlocalidad=$request->input('nombre_localidad');
        $fecha=$request->input('datapicker');
        $min=$request->input('min_jugadores');
        $max=$request->input('max_jugadores');
        
        echo 'fecha-->'.$idpista;


        $partida = new Partida;
        $partida->id_pista = $idpista;
        $partida->fecha_partida = DB::raw("STR_TO_DATE('$fecha', '%H:%i %d/%m/%Y')");
        $partida->min_jugadores = $min;
        $partida->max_jugadores = $max;
        $partida->save();
        return redirect()->route('home');
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
