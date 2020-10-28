<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Problem;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProblemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the problem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Problem  $problem
     * @return mixed
     */
    public function view(User $user, Problem $problem)
    {
        if($user->role > 60) {
            return true;
        }

        return $user->id === $problem->user_id;
    }

    /**
     * Determine whether the user can update the problem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Problem  $problem
     * @return mixed
     */
    public function update(User $user, Problem $problem)
    {
        if($user->role > 60) {
            return true;
        }

        return $user->id === $problem->user_id;
    }

    /**
     * Determine whether the user can delete the problem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Problem  $problem
     * @return mixed
     */
    public function delete(User $user, Problem $problem)
    {
        if($user->role > 60) {
            return true;
        }

        return $user->id === $problem->user_id;
    }
}
