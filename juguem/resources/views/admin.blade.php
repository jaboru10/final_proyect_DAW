@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Menu del administrador ') }}<br></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- {{ __('You are logged in!') }}-->
                    <div class="container text-center">
                        <div class="row g-2">
                            <div class="p-3 border bg-light col-4">
                                <a href="{{route('user.admin.deporte')}}">Gestion de deportes</a>
                            </div>

                            <div class="p-3 border bg-light col-4">
                                
                                <a href="{{route('user.admin.pista')}}">Gestion de pistas</a>
                            </div>

                            <div class="p-3 border bg-light col-4">
                            <a href="{{route('user.admin.localidad')}}">Gestion de Localidades</a>
                            </div>
                          
                        </div>
                    </div>
                </div>
                <a href="{{route('home')}}" class="btn btn-success">Volver</a>
                
            </div>
        </div>
    </div>
</div>
@endsection
<script>
             
       
</script>