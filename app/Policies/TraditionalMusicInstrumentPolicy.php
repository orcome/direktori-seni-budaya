<?php

namespace App\Policies;

use App\User;
use App\TraditionalMusicInstrument;
use Illuminate\Auth\Access\HandlesAuthorization;

class TraditionalMusicInstrumentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the traditional_music_instrument.
     *
     * @param  \App\User  $user
     * @param  \App\TraditionalMusicInstrument  $traditionalMusicInstrument
     * @return mixed
     */
    public function view(User $user, TraditionalMusicInstrument $traditionalMusicInstrument)
    {
        // Update $user authorization to view $traditionalMusicInstrument here.
        return true;
    }

    /**
     * Determine whether the user can create traditional_music_instrument.
     *
     * @param  \App\User  $user
     * @param  \App\TraditionalMusicInstrument  $traditionalMusicInstrument
     * @return mixed
     */
    public function create(User $user, TraditionalMusicInstrument $traditionalMusicInstrument)
    {
        // Update $user authorization to create $traditionalMusicInstrument here.
        return true;
    }

    /**
     * Determine whether the user can update the traditional_music_instrument.
     *
     * @param  \App\User  $user
     * @param  \App\TraditionalMusicInstrument  $traditionalMusicInstrument
     * @return mixed
     */
    public function update(User $user, TraditionalMusicInstrument $traditionalMusicInstrument)
    {
        // Update $user authorization to update $traditionalMusicInstrument here.
        return true;
    }

    /**
     * Determine whether the user can delete the traditional_music_instrument.
     *
     * @param  \App\User  $user
     * @param  \App\TraditionalMusicInstrument  $traditionalMusicInstrument
     * @return mixed
     */
    public function delete(User $user, TraditionalMusicInstrument $traditionalMusicInstrument)
    {
        // Update $user authorization to delete $traditionalMusicInstrument here.
        return true;
    }
}
