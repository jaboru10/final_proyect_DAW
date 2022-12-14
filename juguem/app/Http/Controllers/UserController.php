<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Localidad;
use Illuminate\Support\Facades\DB;
use Response;

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
            $provincias = Localidad::select('provincia')->distinct()->get();
            $tipoUser=0;
            if($user->tipo_usuario=1){
                $tipoUser="Administrador";
            }else{
                $tipoUser="Básico";
            }
            
            //devolvemos el mobre de la localidad
            $localidad=Localidad::findOrFail($user->id_localidad);
            
        
            //return view('localidad.edit',compact('localidad'));
            return view('auth.user.index',compact('user','tipoUser','localidad','provincias'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        return view('admin');
       
    }
    public function gestionDeporte()
    {
        return view('deporte.index');
       
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
    protected function returnLocalidades(Request $request)
    {

    
        $provinciaRecibida = request()->input('provincia');
        $localidades=DB::table('localidad')
                    ->select('id_localidad','nombre','provincia')
                    ->where('provincia',$provinciaRecibida)
                    ->get();
        return response()->json($localidades);
                   
        

      
    }
}
