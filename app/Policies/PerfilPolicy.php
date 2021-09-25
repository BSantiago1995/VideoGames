<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Perfil;
use Illuminate\Auth\Access\HandlesAuthorization;

class PerfilPolicy
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
    public function update(User $user, Perfil $perfil)
    {
        return $user->id==$perfil->user_id;
    }
}
