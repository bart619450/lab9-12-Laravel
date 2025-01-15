<?php

namespace App\Policies;

use App\Models\User;

class AutorPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function manageAutor(User $user, Autor $autor)
{
    return $user->id === $autor->user_id || $user->hasRole('admin');
}
}
