<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\MenuService;
use App\Services\BreadcrumbsService;
use App\View\Composers\CreateArticleComposer;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

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
      });

      View::composer(['components.breadcrumbs'], function ($view) { //dd($view->name());
        $view->with('breadcrumbs', BreadcrumbsService::generate()); //dd($view);
      });

      View::composer(['admin/articles/create','categoryShow','categoryShowCommon'],CreateArticleComposer::class);

      VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
      return (new MailMessage)
          ->subject('Подтверждение регистрации в PERSONA')
          ->greeting('Добро пожаловать!')
          ->line('Спасибо за регистрацию в проекте PERSONA.')
          ->action('Подтвердить Email', $url)
          ->line('Если вы не регистрировались — просто проигнорируйте письмо.');

        // ->subject('Verify Email Address')
        // ->line('Click the button below to verify your email address.')
        // ->action('Verify Email Address', $url);

      });
    }
}
