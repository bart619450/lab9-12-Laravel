<?php

namespace App\Policies;

use App\Models\User;

class TypFilmuPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function manageTypFilmu(User $user, TypFilmu $typfilmu)
{
    return $user->id === $typfilmu->user_id || $user->hasRole('admin');
}
}
