@extends('layouts.app')

@section('botones')
<div class="col-md-10 mx-auto p-3">
    <a class="btn btn-primary" href="{{route('VideoGames.Index')}}">Volver a Menú</a>
</div>
@endsection

@section('content')

<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
        <div class="card-header" align="center">{{ __('Editar Juego') }}</div>
                <div class="card-body">
    
        
            <form method="POST" action="{{route('VideoGames.update', ['videogames'=>$videogames->id])}}" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')
                <div class="form group">
                <label for="nombre">Nombre Juego</label>
                <input type="text"  name="nombre" class="form-control
                @error('nombre') is-invalid @enderror" 
                id="nombre" placeholder="Nombre de Juego" value="{{$videogames->name}}">
                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
               <br>
                <label for="category_name">Categoria</label>
                <select name="categorias" id= "categorias" class="custom-select mb-3">
                <option value="" disabled selected>Seleccione</option>
                        @foreach ($categorias as $id=>$categoria)
                            <option value={{$id}} {{$videogames->categoria_id==$id ? 'selected' : ''}}>{{$categoria}}</option>
                        @endforeach
                  </select>
                <br>
              
                <label for="price">Precio</label>
                <input type="number"  name="price" class="form-control
                @error('price') is-invalid @enderror" 
                id="price" placeholder="Precio del Juego" value="{{$videogames->price}}">
                @error('price')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                <br>
                <label for="quantity">Cantidad</label>
                <input type="number"  name="quantity" class="form-control
                @error('price') is-invalid @enderror" 
                id="quantity" placeholder="Cantidad de Juegos" value="{{$videogames->quantity}}">
                @error('quantity')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="imagen">Imagen</label>
                    <input id="imagen" type="file" class="form-control" name="imagen">
                    <div>
                        <p>Imagen Almacenada</p>
                        <img src="/storage/{{$videogames->photo}}" style='width:300px'>
                    </div>
                </div>
               
                <br>
                <div class="form-row" align="center">
                    <div class="col-12">
                    <input type="submit" class="btn btn-primary " value="Agregar Juego">
                </div>
                </div>
            </form>
            
        </div>
    </div>
        </div>
    </div>
</div>

@endsection