<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require_once app_path().'/Helpers/functions.php';

        \Validator::extend('current_password', function ($attribute, $value, $parameters, $validator) {
            $user = \Auth::user();
            return $user && \Hash::check($value, $user->password);
        });
        \Validator::extend('same_password', function ($attribute, $value, $parameters, $validator) {
            $user = \Auth::user();
            return $user && !\Hash::check($value, $user->password);
        });
    }
}
