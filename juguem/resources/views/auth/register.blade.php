<!DOCTYPE html>
 <html>
    <head>
         <title>this is my mater page</title>
         
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         
    
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- bootstap CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--  

                         
                        <div class="form-group">
                            <label for="nombre">Localidad</label>
                            <select class="form-select" aria-label="localidad" name="nombre_localidad" id="nombre_localidad">
                                <option value="none" selected disabled hidden>Seleccione una localidad</option>
                                <option selected></option>
                                @foreach($localidades as $localidad)
                                <option value='1'>{{$localidad->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                          <div class="row mb-3">
                            <label for="provincia" class="col-md-4 col-form-label text-md-end">{{ __('Provincia') }}</label>

                            <div class="col-md-6">
                                <input id="provincia" type="provincia" class="form-control @error('provincia') is-invalid @enderror" name="provincia" value="{{ old('provincia') }}" required autocomplete="provincia">

                                @error('provincia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        -->
                      


                        <div class="row mb-3">
                        <label for="provincia" class="col-md-4 col-form-label text-md-end">{{ __('Provincia') }}</label>
                        <div class="col-md-6">
                        <select class="form-select" aria-label="provincia" name="provincia" id="provincia">
                            <option value="none" selected disabled hidden>Seleccione una provincia</option>
                            <option selected></option>
                            @foreach($localidades as $localidad)
                            <option value='{{$localidad->provincia}}'>{{$localidad->provincia}}</option>
                            @endforeach
                        </select>
                        </div>


                        <div class="row mb-3">
                        <label for="localidad" class="col-md-4 col-form-label text-md-end">{{ __('Localidad') }}</label>
                        <div class="col-md-6">
                        <select class="form-select" aria-label="localidad" name="localidad" id="localidad">
                            <option value="none" selected disabled hidden>Seleccione una localidad</option>
                            <option selected></option>
                            <option value=''></option> 
                        </select>
                        </div>
                        </div>

                       <!-- 
                        <div class="row mb-3">
                            <label for="localidad" class="col-md-4 col-form-label text-md-end">{{ __('Localidad') }}</label>

                            <div class="col-md-6">
                                <input id="localidad" type="localidad" class="form-control @error('localidad') is-invalid @enderror" name="localidad" value="{{ old('localidad') }}" required autocomplete="localidad">

                                @error('localidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       -->

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirma Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //change LOCALIDAD
    var form_provincia = document.getElementById("provincia");
    var form_localidad= document.getElementById("localidad");
                            
                            form_provincia.addEventListener("input", function () {
       
                            console.log("Form has changed!");
                            var provincia = $(this).val();
                            console.log("llega hasta aqui->"+provincia);
                           
                            $.ajax({
                                url: "{{ route('ajaxRequest') }}",
                                method: 'GET',
                               
                                success: function(data) {
                                    console.log("success->"+provincia);
                                    for (var property in data) {
                                        // access the current property in the JSON object
                                        var value = data[property];

                                        // do something with the property
                                        console.log(value);



                                        var option = document.createElement("option");

                                            // set the value and text of the option
                                            option.value = value.id_localidad;
                                            option.text = value.nombre;

                                            // add the option to the select element
                                            form_localidad.appendChild(option);



                                        }


                                }
                            });
                            });





  /*
//change LOCALIDAD
                        var form = document.getElementById("provincia");
                            
                            form.addEventListener("input", function () {
       
                            console.log("Form has changed!");
                            var provincia = $(this).val();
                            console.log(provincia);

                                axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');               
                                axios.post('/controlaRegi', {
                                    data: {
                                        provincia: provincia
                                    }})
                                .then(function (response) {
                                    // Acción a realizar si la solicitud tiene éxito
                                    console.log( "La solicitud se ha completado correctamente." );

                                })
                                .catch(function (error) {
                                    // Acción a realizar si la solicitud falla
                                    console.log( "La solicitud a fallado: ");
                                });
                                });
  */
                          
</script>
@endsection
</body>
</html>
