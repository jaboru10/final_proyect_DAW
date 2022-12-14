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
@extends('layouts.app')

@section('content')
    <div class="container">


    <div class="d-flex justify-content-center">
            <p class="font-weight-bold">
            <h1 class="display-4 ">Gestión del perfil de Usuario</h1>
            </p>
        </div>


        
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
                                <label for="provincia">{{ __('Provincia') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select @error('provincia') is-invalid @enderror" aria-label="provincia" name="provincia" id="provincia">
                                        <option value="none" selected disabled hidden>Seleccione una provincia</option>                                        
                                        @foreach($provincias as $provincia)
                                        <option value='{{$provincia->provincia}}'>{{$provincia->provincia}}</option>
                                        @endforeach
                                    </select>
                                    @error('provincia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                    </div>     
                    <div class="form-group">
                                    <label for="localidad" >{{ __('Localidad') }}</label>
                                    
                                    <div class="col-md-6">
                                        <select disabled class="form-select" aria-label="localidad" name="localidad" id="localidad">
                                            <option value="none">Seleccione una localidad</option>
                                        </select>
                                    </div>
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
                         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //document.getElementById("localidad").disabled = true;
        var form_provincia = document.getElementById("provincia");
        var form_localidad = document.getElementById("localidad");

        form_provincia.addEventListener("input", function() {

            console.log("Form has changed!");
            document.getElementById("localidad").disabled = false;
            var provincia = $(this).val();
            console.log("llega hasta aqui->" + provincia);

            $.ajax({
                url: "{{ route('ajaxRequestUserContr') }}",
                method: 'GET',
                data: {
                    provincia: provincia
                },

                success: function(data) {
                    //vacio el select y lo cargo con la respuesta de ajax
                    form_localidad.innerHTML = '';
                    for (var property in data) {
                        var value = data[property];
                        console.log(value);
                        var option = document.createElement("option");
                        option.value = value.id_localidad;
                        option.text = value.nombre;
                        form_localidad.appendChild(option);



                    }


                }
            });
        });
     
                    </script>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <input onclick="window.location.href='javascript:history.back()'" type="submit" class="btn btn-primary" value="Volver">
                    </div>
                
            </div>
        </div>

    </div>
</body>
@endsection
</html>