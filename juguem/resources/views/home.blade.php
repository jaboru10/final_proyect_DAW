@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="container text-center">
  <div class="row g-2">
    <div class="col-6">
      <div class=" btn p-3 border bg-light">Crear partida</div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light">Buscar Partida</div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light">Mis Partidas</div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light">Mi Perfil</div>
    </div>
  </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
