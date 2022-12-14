<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Partida_Usuario;
use Illuminate\Support\Facades\DB;
use Response;

class Partida_UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
    }
   
    public function returnUsuarios($id_partida) {
       
        $allUsers=array();

         // Primero, obtenemos todos los registros de la tabla intermedia
        $registros=DB::table('partida_usuario')//UTILIZAMOS query builder para hacer consultas a bd
        ->select('id_partida','id_usuario','creador')
        ->where('id_partida','=',$id_partida)
        ->get();

        // Recoremos,para devolver los usuarios de esos partda_usuario
        foreach ($registros as $i => $value) {

            $allUsers=DB::table('users')//UTILIZAMOS query builder para hacer consultas a bd
            ->select('id','name')
            ->where('id','=',$value->id_usuario)
            ->get();

        }
        


         //var_dump($allUsers);

        return ($allUsers);
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
    public function update(Request $request, $id)
    {
        //
        
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
