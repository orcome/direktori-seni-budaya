<?php

namespace App\Policies;

use App\User;
use App\TraditionalDance;
use Illuminate\Auth\Access\HandlesAuthorization;

class TraditionalDancePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the traditional_dance.
     *
     * @param  \App\User  $user
     * @param  \App\TraditionalDance  $traditionalDance
     * @return mixed
     */
    public function view(User $user, TraditionalDance $traditionalDance)
    {
        // Update $user authorization to view $traditionalDance here.
        return true;
    }

    /**
     * Determine whether the user can create traditional_dance.
     *
     * @param  \App\User  $user
     * @param  \App\TraditionalDance  $traditionalDance
     * @return mixed
     */
    public function create(User $user, TraditionalDance $traditionalDance)
    {
        // Update $user authorization to create $traditionalDance here.
        return true;
    }

    /**
     * Determine whether the user can update the traditional_dance.
     *
     * @param  \App\User  $user
     * @param  \App\TraditionalDance  $traditionalDance
     * @return mixed
     */
    public function update(User $user, TraditionalDance $traditionalDance)
    {
        // Update $user authorization to update $traditionalDance here.
        return true;
    }

    /**
     * Determine whether the user can delete the traditional_dance.
     *
     * @param  \App\User  $user
     * @param  \App\TraditionalDance  $traditionalDance
     * @return mixed
     */
    public function delete(User $user, TraditionalDance $traditionalDance)
    {
        // Update $user authorization to delete $traditionalDance here.
        return true;
    }
}
