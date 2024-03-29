<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deportes - Gestion deportes</title>
    <!-- bootstap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    al final del documento
    -->


</head>

<body>
    <div class="container">
        <h4>Gestión de Deportes</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('deporte.index')}}" method="get">
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                            <input type="text" class="form-control" name="texto" value="{{$texto}}">
                        </div>
                        <div class="col-auto my-1">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>
                        <div class="col-auto my-1">
                            <a href="{{route('deporte.create')}}" class="btn btn-success">Nuevo</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Numero de jugadores</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($deportes)<=0)
                            <tr>
                                <td colspan="4">No hay resultados</td>
                            </tr>
                        @else
                            @foreach($deportes as $deporte)
                            <tr>
                                <td>
                                <a href="{{route('deporte.edit',$deporte->id_deporte)}}" class="btn btn-warning btn-sm">Editar </a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$deporte->id_deporte}}">
                                Eliminar
                                </button>
                            </td>
                                <td>{{$deporte->id_deporte}}</td>
                                <td>{{$deporte->nombre}}</td>
                                <td>{{$deporte->numero_jugadores}}</td>
                            </tr>
                                @include('deporte.delete')
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$deportes->links()}}
                </div>
            </div>
        </div>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>