<?php

namespace App\Policies;

use App\User;
use App\SubDistrict;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubDistrictPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the sub_district.
     *
     * @param  \App\User  $user
     * @param  \App\SubDistrict  $subDistrict
     * @return mixed
     */
    public function view(User $user, SubDistrict $subDistrict)
    {
        // Update $user authorization to view $subDistrict here.
        return true;
    }

    /**
     * Determine whether the user can create sub_district.
     *
     * @param  \App\User  $user
     * @param  \App\SubDistrict  $subDistrict
     * @return mixed
     */
    public function create(User $user, SubDistrict $subDistrict)
    {
        // Update $user authorization to create $subDistrict here.
        return true;
    }

    /**
     * Determine whether the user can update the sub_district.
     *
     * @param  \App\User  $user
     * @param  \App\SubDistrict  $subDistrict
     * @return mixed
     */
    public function update(User $user, SubDistrict $subDistrict)
    {
        // Update $user authorization to update $subDistrict here.
        return true;
    }

    /**
     * Determine whether the user can delete the sub_district.
     *
     * @param  \App\User  $user
     * @param  \App\SubDistrict  $subDistrict
     * @return mixed
     */
    public function delete(User $user, SubDistrict $subDistrict)
    {
        // Update $user authorization to delete $subDistrict here.
        return true;
    }
}
