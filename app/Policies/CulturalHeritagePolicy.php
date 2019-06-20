<?php

namespace App\Policies;

use App\User;
use App\CulturalHeritage;
use Illuminate\Auth\Access\HandlesAuthorization;

class CulturalHeritagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the cultural_heritage.
     *
     * @param  \App\User  $user
     * @param  \App\CulturalHeritage  $culturalHeritage
     * @return mixed
     */
    public function view(User $user, CulturalHeritage $culturalHeritage)
    {
        // Update $user authorization to view $culturalHeritage here.
        return true;
    }

    /**
     * Determine whether the user can create cultural_heritage.
     *
     * @param  \App\User  $user
     * @param  \App\CulturalHeritage  $culturalHeritage
     * @return mixed
     */
    public function create(User $user, CulturalHeritage $culturalHeritage)
    {
        // Update $user authorization to create $culturalHeritage here.
        return true;
    }

    /**
     * Determine whether the user can update the cultural_heritage.
     *
     * @param  \App\User  $user
     * @param  \App\CulturalHeritage  $culturalHeritage
     * @return mixed
     */
    public function update(User $user, CulturalHeritage $culturalHeritage)
    {
        // Update $user authorization to update $culturalHeritage here.
        return true;
    }

    /**
     * Determine whether the user can delete the cultural_heritage.
     *
     * @param  \App\User  $user
     * @param  \App\CulturalHeritage  $culturalHeritage
     * @return mixed
     */
    public function delete(User $user, CulturalHeritage $culturalHeritage)
    {
        // Update $user authorization to delete $culturalHeritage here.
        return true;
    }
}
