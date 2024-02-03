<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('edit-delete-product', function ($user, $product) {
            return $user->hasRole('admin') || ($user->hasRole('customer') && $user->id === $product->user_id);
        });

        Gate::define('edit-delete-book', function ($user, $book) {
            return $user->hasRole('admin') || ($user->hasRole('customer') && $user->id === $book->user_id);
        });
        Gate::define('product-status', function ($user, $product) {
            return $user->hasRole('admin') || ($user->hasRole('customer') && $user->id === $product->user_id);
        });
        Gate::define('Shopping-cart', function ($user, $product) {
            return $user->hasRole('customer') || ($user->hasRole('admin') && $user->id === $product->user_id);
        });
    }
}
