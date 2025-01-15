<?php

namespace App\Policies;

use App\Models\User;

class AktorPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function manageAktor(User $user, Aktor $aktor)
    {
    \Log::info('Sprawdzam dostęp do aktora: ' . $aktor->id);
    return $user->id === $aktor->user_id || $user->hasRole('admin');
    }
}
