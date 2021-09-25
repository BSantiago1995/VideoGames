@extends('layouts.app')
<!-- Estilos-->

@section('botones')
    <div class="col-md-10 mx-auto p-3">
        @include('Ui.Navegacion')
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
    <div class="col-12 mt-4 justify-content-center d-flex">
        {{$userGames->links()}}
    </div>  
</div>
<h2 class="text-center my-5">Recetas que te gustan</h2>
    
        <div class="col-md-8 mx-auto bg-white p-3" style="background: linear-gradient(90deg,rgb(5, 5, 5),rgb(24, 24, 24));">
          <ul class="list-group" >
            @if(count($likeusu)>0)
            @foreach ($likeusu as $likeusuario)
               <li class="list-group-item d-flex justify-content-between align-items-center" style="background: linear-gradient(90deg,rgb(44, 44, 44),rgb(46, 46, 46));">
                   <h3 class="text-white">{{$likeusuario->name}}</h3>
                   <a class="btn btn-outline-success text-uppercase font-weight-bold  align-items-left" href="{{route('VideoGames.Show',['videogames'=>$likeusuario->id])}}">Ver</a>
               </li>
            @endforeach
           @else
           <p class="text-center w-100">No existen recetas aún...</p>
           @endif  
          </ul>
        </div>

@endsection
<!-- script-->
@section('script')
<script
      src="https://use.fontawesome.com/releases/v5.15.3/js/all.js"
      data-auto-a11y="true"
    ></script>
@endsection