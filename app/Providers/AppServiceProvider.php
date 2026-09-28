<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

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
        if (str_starts_with(config('app.url'), 'https://')) {
            URL::forceScheme('https');
        }

        View::composer('*', function ($view) {
            $cart = session()->get('cart', []);
            $cartCount = 0;
            if (is_array($cart)) {
                foreach ($cart as $item) {
                    $cartCount += isset($item['qty']) ? (int)$item['qty'] : 1;
                }
            }
            $view->with('cartCount', $cartCount);
        });
    }
}
