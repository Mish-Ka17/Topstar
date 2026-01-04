<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\MenuService;
use App\Services\BreadcrumbsService;
use App\View\Composers\CreateArticleComposer;

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
         View::composer('*', function ($view) {
        $view->with('menu', MenuService::getMenu());
        $view->with('breadcrumbs', BreadcrumbsService::generate());

        });
        View::composer(['admin/articles/create','categoryShow','categoryShowCommon'],CreateArticleComposer::class);
    }
}
