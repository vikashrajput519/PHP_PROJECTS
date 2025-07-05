<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // Adding cart count
        View::composer('*', function ($view) {
        $cartCount = 0;
        if (Auth::check()) {
            $cartCount = Cart::where('userId', Auth::id())->count();
        }
        $view->with('cartCount', $cartCount);
        });
    }
}
