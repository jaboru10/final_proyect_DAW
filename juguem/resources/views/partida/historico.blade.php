<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>partidas - Gestion partidas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

   
</head>

<body>
@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="d-flex justify-content-center">
            <p class="font-weight-bold"><h1 class="display-4 ">Historico de las partidas</h1></p>
        </div>
        
        <div class="row">
        <div class="d-flex justify-content-end">
                <form action="{{route('partida.index')}}" method="get">
                    <div class="form-row">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                            <input type="text" class="form-control-sm" name="texto" value="">
                    </div>
                </form>
            </div>    
            <br><br><br>
        <div class="col-xl12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Deporte</th>
                                <th>Pista</th>
                                <th>Jugadores Apuntados</th>
                                <th>FECHA DE LA PARTIDA</th>
                                <th>Asistentes</th>
                                <!--<th>Creada por</th>-->
                                
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($partidas)<=0)
                            <tr>
                                <td colspan="4">No hay resultados</td>
                            </tr>
                           
                        @else
                            @foreach($partidas as $i=> $partida)

                            <tr>
                              
                                <td>{{$deportes[$i]->nombre}}</td>
                                <td>{{$direccionesDeLasPistas[$i]}}</td>
                                <td><button  class="btn btn-warning btn-sm" id="mostrar">Mostrar</button></td>
                                <td>{{$partida->fecha_partida}}</td>
                                <td>{{$asistentes[$i]}}</td>
                                
                               
                                
                                
                                
                            </tr>
                            @include('partida.delete')
                            
                            @endforeach
                            @endif
                            
                        </tbody>
                    </table>
                    <table>
                        <tr>
                            <th>Nombre de usuario</th>
                            <th>Puntaje</th>
                        </tr>
                        @foreach ($arrayConUsuariosDePartidas[1] as $usuario)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                        
                        </tr>
                        @endforeach
                    </table>
                    <input onclick="window.location.href='javascript:history.back()'" type="submit" class="btn btn-primary" value="Volver">
                </div>
            </div>
        </div>
    </div>

    <script> 


    document.getElementById("mostrar").addEventListener("click", function() {
    

 
        
        
    

    

   


    });
    </script>
</body>
@endsection
</html>