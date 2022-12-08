<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>partidas - Gestion partidas</title>
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
        <h4>Nueva partida</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('partida.store')}}" method="post">
                    @csrf
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
                    <div class="form-group">
                        <label for="nombre">Deporte</label>
                        <select class="form-select" aria-label="deporte" name="nombre_deporte" id="nombre_deporte">
                            <option value="none" selected disabled hidden>Seleccione un deporte</option>
                            @foreach($deportes as $deporte)
                            <option value='1'>{{$deporte->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Pista</label>
                        <select class="form-select" aria-label="pista" name="direccion" id="direccion">
                            <option value="none" selected disabled hidden>Seleccione una pista</option>
                            @foreach($pistas as $pista)
                            <option value='5'>{{$pista->direccion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numero_jugadores">Numero de jugadores</label>
                        <input type="text" class="form-control" name="numero_jugadores" required maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha de la partida</label>
                        <input id="datepicker" name="datapicker"width="276" />
                    </div>
                    

                    <script>
                        //preparo el calendario
                        $('#datepicker').datetimepicker({
                            dateFormat: "yy-mm-dd",
                            timeFormat: "hh:mm:ss"
                        });

                        //INICIO PAGINA
                        document.getElementById("nombre_deporte").disabled = true;
                        document.getElementById("direccion").disabled = true;
                        
                    
                        //change LOCALIDAD
                        var form = document.getElementById("nombre_localidad");
                            form.addEventListener("input", function () {
                            document.getElementById("nombre_deporte").disabled = false;
                            document.getElementById("direccion").disabled = true;
                            document.getElementById('nombre_deporte').value = "none"
                            console.log("Form has changed!");
                        });
                   
                        //change DEPORTE
                        var form = document.getElementById("nombre_deporte");
                            form.addEventListener("input", function () {
                            document.getElementById("direccion").disabled = false;
                            console.log("Form has changed!");
                            select_pista.options.length = 0;

                            // Asignar una función como controlador de eventos para el evento 'focus'
                            const select = document.querySelector('select');
                            select.addEventListener('focus', (event) => {
                            // La función se ejecutará cuando se abra el 'select'
                                <?php 
                                        use App\Http\Controllers\PartidaController;    
                                        {{ $partidas=PartidaController::returnPistas("1","2"); }} 
                                        //echo "updateOptions(".$partidas.");";
                                ?>
                            });
                        
                                });

                        
                        
                        
                    
                    

                        // Función que actualiza las opciones del select
                        function updateOptions(options) {
                            // Eliminar las opciones existentes
                            select_pista.innerHTML = "";

                            // Crear una nueva option por cada opción en la lista
                            for (const option of options) {
                                const newOption = document.createElement('option');
                                newOption.value = option.value;
                                newOption.innerText = option.text;
                                select_pista.appendChild(newOption);
                            }
                        }

                    </script>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <input type="reset" class="btn btn-default" value="Cancelar">
                        <a href="javascript:history.back()">Ir al listado</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>