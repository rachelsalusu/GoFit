<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        Paginator::useBootstrapFive();

        // Authorize product posts for authenticated users
        Gate::define('update-product', function (User $user, Product $product) {
            return $user->id === $product->user_id;
        });
        Gate::define('update-merchant', function (User $user, Merchant $merchant) {
            return $user->id === $merchant->user_id;
        });
    }
}
