<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VideoGame;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideoGamePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, VideoGame $videogames){
        return $user->id==$videogames->user_id;
    }
    public function delete(User $user, VideoGame $videogames)
    {
        return $user->id==$videogames->user_id;
    }
    public function view(User $user, VideoGame $videogames)
    {
        return $user->id==$videogames->user_id;
    }
}
