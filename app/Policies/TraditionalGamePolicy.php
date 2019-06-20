<?php

namespace App\Policies;

use App\User;
use App\TraditionalGame;
use Illuminate\Auth\Access\HandlesAuthorization;

class TraditionalGamePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the traditional_game.
     *
     * @param  \App\User  $user
     * @param  \App\TraditionalGame  $traditionalGame
     * @return mixed
     */
    public function view(User $user, TraditionalGame $traditionalGame)
    {
        // Update $user authorization to view $traditionalGame here.
        return true;
    }

    /**
     * Determine whether the user can create traditional_game.
     *
     * @param  \App\User  $user
     * @param  \App\TraditionalGame  $traditionalGame
     * @return mixed
     */
    public function create(User $user, TraditionalGame $traditionalGame)
    {
        // Update $user authorization to create $traditionalGame here.
        return true;
    }

    /**
     * Determine whether the user can update the traditional_game.
     *
     * @param  \App\User  $user
     * @param  \App\TraditionalGame  $traditionalGame
     * @return mixed
     */
    public function update(User $user, TraditionalGame $traditionalGame)
    {
        // Update $user authorization to update $traditionalGame here.
        return true;
    }

    /**
     * Determine whether the user can delete the traditional_game.
     *
     * @param  \App\User  $user
     * @param  \App\TraditionalGame  $traditionalGame
     * @return mixed
     */
    public function delete(User $user, TraditionalGame $traditionalGame)
    {
        // Update $user authorization to delete $traditionalGame here.
        return true;
    }
}
