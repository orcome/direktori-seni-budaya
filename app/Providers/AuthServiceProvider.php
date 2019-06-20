<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\TraditionalGame' => 'App\Policies\TraditionalGamePolicy',
        'App\RitualCeremony' => 'App\Policies\RitualCeremonyPolicy',
        'App\TraditionalCeremony' => 'App\Policies\TraditionalCeremonyPolicy',
        'App\TraditionalDance' => 'App\Policies\TraditionalDancePolicy',
        'App\TraditionalMusicInstrument' => 'App\Policies\TraditionalMusicInstrumentPolicy',
        'App\ArtStudio' => 'App\Policies\ArtStudioPolicy',
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
