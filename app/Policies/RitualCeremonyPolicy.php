<?php

namespace App\Policies;

use App\User;
use App\RitualCeremony;
use Illuminate\Auth\Access\HandlesAuthorization;

class RitualCeremonyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the ritual_ceremony.
     *
     * @param  \App\User  $user
     * @param  \App\RitualCeremony  $ritualCeremony
     * @return mixed
     */
    public function view(User $user, RitualCeremony $ritualCeremony)
    {
        // Update $user authorization to view $ritualCeremony here.
        return true;
    }

    /**
     * Determine whether the user can create ritual_ceremony.
     *
     * @param  \App\User  $user
     * @param  \App\RitualCeremony  $ritualCeremony
     * @return mixed
     */
    public function create(User $user, RitualCeremony $ritualCeremony)
    {
        // Update $user authorization to create $ritualCeremony here.
        return true;
    }

    /**
     * Determine whether the user can update the ritual_ceremony.
     *
     * @param  \App\User  $user
     * @param  \App\RitualCeremony  $ritualCeremony
     * @return mixed
     */
    public function update(User $user, RitualCeremony $ritualCeremony)
    {
        // Update $user authorization to update $ritualCeremony here.
        return true;
    }

    /**
     * Determine whether the user can delete the ritual_ceremony.
     *
     * @param  \App\User  $user
     * @param  \App\RitualCeremony  $ritualCeremony
     * @return mixed
     */
    public function delete(User $user, RitualCeremony $ritualCeremony)
    {
        // Update $user authorization to delete $ritualCeremony here.
        return true;
    }
}
