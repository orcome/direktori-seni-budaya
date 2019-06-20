<?php

namespace App\Policies;

use App\User;
use App\NaturalArtificialTourism;
use Illuminate\Auth\Access\HandlesAuthorization;

class NaturalArtificialTourismPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the natural_artificial_tourism.
     *
     * @param  \App\User  $user
     * @param  \App\NaturalArtificialTourism  $naturalArtificialTourism
     * @return mixed
     */
    public function view(User $user, NaturalArtificialTourism $naturalArtificialTourism)
    {
        // Update $user authorization to view $naturalArtificialTourism here.
        return true;
    }

    /**
     * Determine whether the user can create natural_artificial_tourism.
     *
     * @param  \App\User  $user
     * @param  \App\NaturalArtificialTourism  $naturalArtificialTourism
     * @return mixed
     */
    public function create(User $user, NaturalArtificialTourism $naturalArtificialTourism)
    {
        // Update $user authorization to create $naturalArtificialTourism here.
        return true;
    }

    /**
     * Determine whether the user can update the natural_artificial_tourism.
     *
     * @param  \App\User  $user
     * @param  \App\NaturalArtificialTourism  $naturalArtificialTourism
     * @return mixed
     */
    public function update(User $user, NaturalArtificialTourism $naturalArtificialTourism)
    {
        // Update $user authorization to update $naturalArtificialTourism here.
        return true;
    }

    /**
     * Determine whether the user can delete the natural_artificial_tourism.
     *
     * @param  \App\User  $user
     * @param  \App\NaturalArtificialTourism  $naturalArtificialTourism
     * @return mixed
     */
    public function delete(User $user, NaturalArtificialTourism $naturalArtificialTourism)
    {
        // Update $user authorization to delete $naturalArtificialTourism here.
        return true;
    }
}
