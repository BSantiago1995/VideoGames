@extends('layouts.app')

@section('botones')
    <div class="col-md-10 mx-auto p-3">
        @include('ui.menuvolver')
    </div>
@endsection
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('Registrar Juego') }}</div>
                <div class="card-body">
    
        
            <form method="POST" action="{{route('VideoGames.store')}}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form group">
                <label for="nombre">Nombre Juego</label>
                <input type="text"  name="nombre" class="form-control
                @error('nombre') is-invalid @enderror" 
                id="nombre" placeholder="Nombre de Juego" value={{old('nombre')}}><!--old para mantener el nombre y el error para que marque la casilla -->
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
                            <option value={{$id}} {{old('categorias')==$id ? 'selected' : ''}}>{{$categoria}}</option>
                        @endforeach
                  </select>
                <br>
              
                <label for="price">Precio</label>
                <input type="number"  name="price" class="form-control
                @error('price') is-invalid @enderror" 
                id="price" placeholder="Precio del Juego" value={{old('price')}}><!--old para mantener el nombre y el error para que marque la casilla -->
                @error('price')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                <br>
                <label for="quantity">Cantidad</label>
                <input type="number"  name="quantity" class="form-control
                @error('price') is-invalid @enderror" 
                id="quantity" placeholder="Cantidad de Juegos" value={{old('quantity')}}><!--old para mantener el nombre y el error para que marque la casilla -->
                @error('quantity')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="imagen">Imagen</label>
                    <input id="imagen" type="file" class="form-control" name="imagen">
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