<?php

namespace App\Providers;


use App\Models\Category;
use App\Models\Mem;
use App\Models\Tag;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrap();
        if (! app()->runningInConsole()) {
            View::share('featuredMemes', cache()->remember('featuredMemes', today()->endOfDay(), function () {
                return Mem::with(['photos', 'user.photos'])
                    ->where('is_published', 1)
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();
            }));

            View::share('categories', Category::all());
        }
    }
}
