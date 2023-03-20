<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\CategoryComposer;
use App\Http\ViewComposers\RoleComposer;
use App\Http\ViewComposers\CommentComposer;

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
        view::composer(['partials.sidebar', 'lists.categories'], CategoryComposer::class);
        view::composer('lists.roles', RoleComposer::class);
         view::composer('partials.sidebar', CommentComposer::class);
    }
}
