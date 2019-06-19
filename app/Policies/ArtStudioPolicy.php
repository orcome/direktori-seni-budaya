<?php

namespace App\Policies;

use App\User;
use App\ArtStudio;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArtStudioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the art_studio.
     *
     * @param  \App\User  $user
     * @param  \App\ArtStudio  $artStudio
     * @return mixed
     */
    public function view(User $user, ArtStudio $artStudio)
    {
        // Update $user authorization to view $artStudio here.
        return true;
    }

    /**
     * Determine whether the user can create art_studio.
     *
     * @param  \App\User  $user
     * @param  \App\ArtStudio  $artStudio
     * @return mixed
     */
    public function create(User $user, ArtStudio $artStudio)
    {
        // Update $user authorization to create $artStudio here.
        return true;
    }

    /**
     * Determine whether the user can update the art_studio.
     *
     * @param  \App\User  $user
     * @param  \App\ArtStudio  $artStudio
     * @return mixed
     */
    public function update(User $user, ArtStudio $artStudio)
    {
        // Update $user authorization to update $artStudio here.
        return true;
    }

    /**
     * Determine whether the user can delete the art_studio.
     *
     * @param  \App\User  $user
     * @param  \App\ArtStudio  $artStudio
     * @return mixed
     */
    public function delete(User $user, ArtStudio $artStudio)
    {
        // Update $user authorization to delete $artStudio here.
        return true;
    }
}
