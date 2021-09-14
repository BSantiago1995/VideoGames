<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGame extends Model
{
    protected $fillable=[
        'name',
        'price',
        'quantity',
        'photo',
        'user:id',
        'categoria_id'
    ];
     //obtener la categoria mediante la clave foranea
     public function categoriaJuego(){
        //relacion de uno a uno
        return $this->belongsTo(CategoriaJuego::class,'categoria_id');
    }
    public function UserVideogames(){
        //relacion de uno a uno
        return $this->belongsTo(User::class,'user_id');
    }

}
