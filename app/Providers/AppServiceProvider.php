<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

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
        //
        View()->composer('front.components.layout', function ($view) {
            $categories = Category::with('subcategories')->get();
            $recentProducts = Product::orderByDesc('created_at')->take(8)->get();
            $view->with('categories', $categories);
            $view->with('recentProducts', $recentProducts);
        });
    }
}
