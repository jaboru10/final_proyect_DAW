@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido a la app para disfrutar el deporte ') }}<br></div>

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
                                <a href="{{route('partida.create')}}">Crear una partida</a>
                            </div>

                            <div class="p-3 border bg-light col-6">
                                <a href="{{route('partida.index')}}">Apuntate a una Partida</a>
                            </div>

                            <div class="p-3 border bg-light col-6">
                                <a href="{{route('historico')}}">Historico de mis partidas</a>
                            </div>
                            <div class="p-3 border bg-light col-6">
                                <a href="{{route('user.index')}}">Mi perfil</a>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($showButton)
                <a href="{{route('user.admin')}}" class="btn btn-success">Administrar</a>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection