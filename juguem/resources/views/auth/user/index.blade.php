<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión del perfil</title>
    <!-- bootstap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />



</head>

<body>
    <div class="container">
        <h4>Gestión del perfil</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('partida.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" required maxlength="50" value="{{$user->name}}"></input>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" required maxlength="50" value="{{$user->email}}"></input>
                    </div>

                    <div class="form-group">
                        <label for="provincia">Provincia</label>
                        <input type="text" class="form-control" name="provincia" required maxlength="50" value="{{$localidad->provincia}}"></input>
                    </div>


                    <div class="form-group">
                        <label for="localidad">Localidad</label>
                        <input type="text" class="form-control" name="localidad" required maxlength="50" value="{{$localidad->nombre}}"></input>
                    </div>
           


                    <div class="form-group">
                        <label for="tipo_user">Tipo de Usuario </label>
                        <input type="text" class="form-control" name="created_at" required maxlength="50" value="{{$tipoUser}}"></input>
                    </div>
                    <div class="form-group">
                        <label for="created_at">Miembro desde </label>
                        <input type="text" class="form-control" name="created_at" required maxlength="50" value="{{$user->created_at}}"></input>
                    </div>
                   
                    

                  
                    </form>

                    <script>
     
                    </script>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <input onclick="window.location.href='javascript:history.back()'" type="submit" class="btn btn-primary" value="Volver">
                        <!--Otra manera de hacerlo
                        <a href="javascript:history.back()">Volver</a>
                        -->
                    </div>
                
            </div>
        </div>

    </div>
</body>

</html>