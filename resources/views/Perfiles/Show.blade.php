@extends('layouts.app')
@section('botones')
    <div class="col-md-10 mx-auto p-3">
        @include('ui.menuvolver')
    </div>
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" >
            <div class="card card-profile" >
              <div class="card-avatar">
                <a>
                  <img class="img" src="/storage/{{$perfil->imagen}}">
                </a>
              </div>
              <div class="card-body1">
                    <h6 class="card-category text-gray">VideoGames Store</h6>
    
                    <h4 class="card-title1">{{$perfil->perfilUser->name}}</h4>
                    <p class="card-text1">{{$perfil->Fecha_nacimiento}}</p>
                    <p class="card-text1">{{$perfil->perfilUser->address}}</p>
                    <p class="card-text1">{{$perfil->telefono}}</p>
                    <p class="card-description">
                       {!! $perfil->Description !!}<br>
                       
                    </p>
                    
                </div>
             </div>
        </div>    
    </div>   
</div>

<h2 class="text-center my-5">Juegos creados por : {{$perfil->perfilUser->name}}</h2>
<div class="container"  >
    <div class="row mx-auto bg-white p-4" style="background: linear-gradient(90deg,rgb(215, 240, 175),rgb(218, 166, 218));">
        @if(count($userJuegos)>0)
         @foreach ($userJuegos as $userJuego)
             <div class="col-md-4 mb-4">
                <div class="card" >
                    <img src="/storage/{{$userJuego->photo}}" class="card1-img-top"  alt="imagen receta">
                    <div class="card-body">
                        <h3>{{$userJuego->name}}</h3>
                        <a href="{{route('VideoGames.Show',['videogames'=>$userJuego->id])}}" class="btn btn-primary d-block mt-4 text-uppercase font-weight-bold">Ver Juego</a>
                    </div>
                </div>
             </div>
         @endforeach
        @else
        <p class="text-center w-100">No existen juegos aún...</p>
        @endif  
    </div>
</div>
{{$userJuegos}}
@endsection