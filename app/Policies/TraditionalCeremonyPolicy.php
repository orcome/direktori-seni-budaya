<?php

namespace App\Policies;

use App\User;
use App\TraditionalCeremony;
use Illuminate\Auth\Access\HandlesAuthorization;

class TraditionalCeremonyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the traditional_ceremony.
     *
     * @param  \App\User  $user
     * @param  \App\TraditionalCeremony  $traditionalCeremony
     * @return mixed
     */
    public function view(User $user, TraditionalCeremony $traditionalCeremony)
    {
        // Update $user authorization to view $traditionalCeremony here.
        return true;
    }

    /**
     * Determine whether the user can create traditional_ceremony.
     *
     * @param  \App\User  $user
     * @param  \App\TraditionalCeremony  $traditionalCeremony
     * @return mixed
     */
    public function create(User $user, TraditionalCeremony $traditionalCeremony)
    {
        // Update $user authorization to create $traditionalCeremony here.
        return true;
    }

    /**
     * Determine whether the user can update the traditional_ceremony.
     *
     * @param  \App\User  $user
     * @param  \App\TraditionalCeremony  $traditionalCeremony
     * @return mixed
     */
    public function update(User $user, TraditionalCeremony $traditionalCeremony)
    {
        // Update $user authorization to update $traditionalCeremony here.
        return true;
    }

    /**
     * Determine whether the user can delete the traditional_ceremony.
     *
     * @param  \App\User  $user
     * @param  \App\TraditionalCeremony  $traditionalCeremony
     * @return mixed
     */
    public function delete(User $user, TraditionalCeremony $traditionalCeremony)
    {
        // Update $user authorization to delete $traditionalCeremony here.
        return true;
    }
}
