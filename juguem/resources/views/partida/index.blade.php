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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
   
</head>

<body>
@extends('layouts.app')

@section('content')
    
    <div class="container">
  
        <div class="d-flex justify-content-center">
            <p class="font-weight-bold"><h1 class="display-4 ">Apuntarse a una partida</h1></p>
        </div>
    
    <br><br>
        
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

                                <!--<th>ID</th>-->
                                <th>Deporte</th>
                                <th>Pista</th>
                                <th>Jugadores Apuntados</th>
                                <th>FECHA DE LA PARTIDA</th>
                                <th text-ali>Min<br>Jugadores</th>
                                <th>Max<br>Jugadores</th>

                                <th>Apuntate</th>
                                
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
                                
                                <!--<a href="{{route('partida.edit',$partida->id_partida)}}" class="btn btn-warning btn-sm">Editar </a>
                                 Button trigger modal 
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$partida->id_partida}}">
                                Eliminar
                                </button>
                                -->
                                
                
                                <td>Baloncesto</td>
                                <td>{{$direccionesDeLasPistas[$i]}}</td>
                                <td><button  class="btn btn-warning btn-sm" id="mostrar">Mostrar</button></td>
                                <td>{{$partida->fecha_partida}}</td>
                                <td>{{$partida->min_jugadores}}</td>
                                <td>{{$partida->max_jugadores}}</td>
                                
                                <td><a  class="btn btn-warning btn-sm">Apuntarse</a></td>
                                
                            </tr>
                            @include('partida.delete')
                            
                            @endforeach
                            @endif
                            
                        </tbody>
                    </table>
                    <br>
                    <a href="{{route('partida.create')}}" class="btn btn-success">Nuevo</a>
                    <input onclick="window.location.href='javascript:history.back()'" type="submit" class="btn btn-primary" value="Volver">
                </div>
            </div>
        </div>
    </div>
    @php
  $miVariable = $direccionesDeLasPistas[0];
@endphp
    <script>
    document.getElementById("mostrar").addEventListener("click", function() {
    alert(JSON.stringify("<?php echo $miVariable ?>"));
    });
    </script>
</body>
@endsection
</html>