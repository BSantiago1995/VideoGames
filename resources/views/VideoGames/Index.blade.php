@extends('layouts.app')
<!-- Estilos-->

@section('botones')
    <div class="col-md-10 mx-auto p-3">
        <a class="btn btn-primary" href="{{route('VideoGames.CreatePlay')}}">Administrar Juego</a>
    </div>
@endsection

@section('content')

<h2 class="text-center mb-3">Administra Tu video Juegos</h2>
<div class="col-md-10 mx-auto p-3">
    <table class="table">
       <thead class="bg-dark text-white">
           <tr>
               <th scole="col">Nombre</th>
               <th scole="col">Categoria</th>
               <th scole="col">Precio</th>
               <th scole="col">Cantidad</th>
               <th scole="col">Acciones</th>
           </tr>
        </thead> 
        <tbody class="text-dark bg-light">
            @foreach ($videogames as $games)
           <tr>
            <td>{{$games-> name}}</td>
            <td>{{$games-> CategoriaJuego->nombre}}</td>
            <td>{{$games-> price}}</td>
            <td>{{$games-> quantity}}</td>
            <td>
            <div class="form-row" align="center">
                
                        <div class="col-3">
                            
                        <a href="{{route('VideoGames.Show',['videogames'=>$games ->id])}}" class="btn btn-success">
                            <i class="fas fa-eye"></i>&nbsp&nbspVer
                        </a>
                        </div>
                        <div class="col-3">
                            <a href="{{route('VideoGames.Edit',['videogames'=>$games ->id])}}" class="btn btn-warning">
                            <i class="far fa-edit"></i>&nbsp&nbspEditar</a>
                        </div>
                        <div class="col-3">
                          <div class="input-container">
                              <i class="fas fa-trash-alt icon"></i>
                            <eliminar-videogame videogames-Id={{$games->id}}></eliminar-videogame>
                            </div>  
                         </div>
            
            </div>
            </td>              
            </tr> 
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<!-- script-->
@section('script')
<script
      src="https://use.fontawesome.com/releases/v5.15.3/js/all.js"
      data-auto-a11y="true"
    ></script>
@endsection