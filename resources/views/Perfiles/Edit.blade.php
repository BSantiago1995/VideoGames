@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"
          integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection

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
        <div class="card-header" align="center">{{ __('Editar Perfil') }}</div>
                <div class="card-body">
    
        
            <form method="POST" action="{{route('perfiles.update',['perfil'=>$perfil->id])}}" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')
                <div class="form group w-100">
                <label for="nombre">Nombres</label>
                <input type="text"  name="nombre" class="form-control
                @error('nombre') is-invalid @enderror" 
                id="nombre"  value="{{$perfil->perfilUser->name}}">
                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
               <br>
              
              
                <label for="Fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date"  name="Fecha_nacimiento" class="form-control
                @error('Fecha_nacimiento') is-invalid @enderror" 
                id="Fecha_nacimiento" placeholder="Precio del Juego" value="{{$perfil->Fecha_nacimiento}}">
                @error('Fecha_nacimiento')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                <br>

                <label for="address">Dirección de Domicilio:</label>
                <input type="text"  name="address" class="form-control
                @error('price') is-invalid @enderror" 
                id="address"  value="{{$perfil->perfilUser->address}}">
                @error('address')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                <br>

                <label for="telefono">Número de Contacto:</label>
                <input type="text"  name="telefono" class="form-control
                @error('price') is-invalid @enderror" 
                id="telefono"  value="{{$perfil->telefono}}">
                @error('telefono')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                <br>
                <label for="Description">Descripción</label>
                    <input type="hidden"  name="Description" class="form-control " id="Description" value="{{$perfil->Description}}">
                    <trix-editor input="Description" class="form-control @error('Description') is-invalid @enderror"></trix-editor>
                    @error('Description')
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
                        <img src="/storage/{{$perfil->imagen}}" style='width:300px'>
                    </div>
                </div>
               
                <br>
                <div class="form-row" align="center">
                    <div class="col-12">
                    <input type="submit" class="btn btn-primary " value="Guardar Cambios">
                </div>
                </div>
            </form>
            
        </div>
    </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>   
@endsection