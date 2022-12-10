<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Localidad;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //compruebo si el usuario esta autenticado
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $user=User::findOrFail($userId);
            $tipoUser=0;
            if($user->tipo_usuario=1){
                $tipoUser="Administrador";
            }else{
                $tipoUser="Básico";
            }
            
            //devolvemos el mobre de la localidad
            $localidad=Localidad::findOrFail($userId);
        
            //return view('localidad.edit',compact('localidad'));
            return view('auth.user.index',compact('user','tipoUser','localidad'));

        }
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
