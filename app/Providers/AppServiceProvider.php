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
 

        // Authorize product posts for authenticated users
        // Gate::define('update-product', function (User $user, product $product) {
        //     return $user->id === $product->user_id;
        // });
    }
}
