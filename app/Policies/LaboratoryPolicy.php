<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LaboratoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any laboratories.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role > 60;
    }

    /**
     * Determine whether the user can create laboratories.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role > 60;
    }

    /**
     * Determine whether the user can update the laboratory.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Laboratory  $laboratory
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->role > 60;
    }

    /**
     * Determine whether the user can delete the laboratory.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Laboratory  $laboratory
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->role > 60;
    }
}
