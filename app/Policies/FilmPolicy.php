<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Film;

class FilmPolicy
{
    /**
     * Create a new policy instance.
     */
    
    public function manageFilm(User $user, Film $film)
{
    //return $user->id === $film->user_id || $user->hasRole('admin');
}
}
