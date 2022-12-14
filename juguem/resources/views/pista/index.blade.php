<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pistas - Gestion pistas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   
</head>

<body>
@extends('layouts.app')

@section('content')
    <div class="container">
        
        <div class="d-flex justify-content-center">
            <p class="font-weight-bold"><h1 class="display-4 ">Gestión de Pistas</h1></p>
        </div>
        <br><br><br>
            <div class="col-xl12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>ID</th>
                                <th>LOCALIDAD</th>
                                <th>DEPORTE</th>
                                <th>DIRRECIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($pistas)<=0)
                            <tr>
                                <td colspan="4">No hay resultados</td>
                            </tr>
                        @else
                            @foreach($pistas as $pista)
                            <tr>
                                <td>
                                <a href="{{route('pista.edit',$pista->id_pista)}}" class="btn btn-warning btn-sm">Editar </a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$pista->id_pista}}">
                                Eliminar
                                </button>
                            </td>
                                <td>{{$pista->id_pista}}</td>
                                <td>{{$pista->id_localidad}}</td>
                                <td>{{$pista->id_deporte}}</td>
                                <td>{{$pista->direccion}}</td>
                            </tr>
                            @include('pista.delete')
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$pistas->links()}}
                    <a href="{{route('user.admin')}}" class="btn btn-success">Volver</a>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>