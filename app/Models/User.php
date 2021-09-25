<?php

namespace App\Models;

use App\Models\VideoGame;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userVideo(){
        return $this-> hasMany(VideoGame::class);
    }
    protected static function booted(){
        parent::booted();
        static::created(function($user){
            $user->userPerfil()->create();
        });
    }
    //relacion 1-1 perfil-usuario
    public function userPerfil(){
        return $this-> hasOne(Perfil::class);
    }

    public function iLike(){
        //relacion e n-n
        return $this->belongsToMany(VideoGame::class,'like_videogames');
    }
}
