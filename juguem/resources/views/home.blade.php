@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido a la app para disfrutar el deporte') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <!-- {{ __('You are logged in!') }}-->
                    <div class="container text-center">
  <div class="row g-2">
    <div class="p-3 border bg-light col-6">
      <a href="{{route('partida.create')}}">Crear partida</a>
     </div>

     <div class="p-3 border bg-light col-6">
      <a href="{{route('partida.index')}}" >Buscar Partida</a>
     </div>
   
    <div class="p-3 border bg-light col-6">
      <a href="{{route('partida.index')}}" >Mis Partidas</a>
     </div>
     <div class="p-3 border bg-light col-6">
      <a href="{{route('user.index')}}" >Mi perfil</a>
     </div>
  </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
