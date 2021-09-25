<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function likes(){
        //relaciond e n-n
        return $this->belongsToMany(User::class,'like_videogames');
    }
}
