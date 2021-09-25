@extends('layouts.app')
@section('botones')
    <div class="col-md-10 mx-auto p-3">
        @include('ui.menuvolver')
    </div>
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9" >
    <div class="card text-black " style="border-radius: 70px;border: none;background:linear-gradient(90deg,rgb(215, 240, 175),rgb(218, 166, 218));">
    <img class="card-img-top" src="/storage/{{$videogames->photo}}" class="w-65">
    <div class="card-img-top" >
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
       
       <div class="justify-content-center row text-center">
        <like-button usergame="{{$videogames->id}}" likes="{{$like}}" num-like="{{$likes}}"></like-button>
    </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection