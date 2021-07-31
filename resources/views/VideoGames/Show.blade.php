@extends('layouts.app')
@section('botones')
    <div class="col-md-10 mx-auto p-3">
        <a class="btn btn-primary" href="{{route('VideoGames.Index')}}">Regresar a menú</a>
    </div>
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
    <div class="card text-white" style="border-radius: 70px;">
    <img class="card-img-top" src="/storage/{{$videogames->photo}}" class="w-65">
    <div class="card-img-overlay">
       <h1 class="card-title" align="center">{{$videogames->name}}</h1>
       <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <h3><p class="card-text">Precio</p></h3>
                <h4><p class="card-text"> $ {{$videogames->price}}</p></h4>
                <h5><p class="card-text">{{date('d-m-Y', strtotime($videogames->created_at))}}</p></h5>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-2"></div>
       </div>
         
    </div>
  </div>

        </div>
    </div>
</div>
@endsection