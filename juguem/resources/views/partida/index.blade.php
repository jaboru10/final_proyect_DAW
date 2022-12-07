<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>partidas - Gestion partidas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   
</head>

<body>
    <div class="container">
        <h4>Gestión de partidas</h4>
            <div class="col-xl12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>ID</th>
                                <th>PISTA</th>
                                <th>FECHA DE LA PARTIDA</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($partidas)<=0)
                            <tr>
                                <td colspan="4">No hay resultados</td>
                            </tr>
                        @else
                            @foreach($partidas as $partida)
                            <tr>
                                <td>
                                <a href="{{route('partida.edit',$partida->id_partida)}}" class="btn btn-warning btn-sm">Editar </a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$partida->id_partida}}">
                                Eliminar
                                </button>
                            </td>
                                <td>{{$partida->id_partida}}</td>
                                <td>{{$partida->id_pista}}</td>
                                <td>{{$partida->fecha_partida}}</td>
                                
                            </tr>
                            @include('partida.delete')
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$partidas->links()}}
                </div>
            </div>
        </div>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>