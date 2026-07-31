<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Fallback para rotas com {locale} quando o pedido não passa
        // pelo middleware SetLocale (ex.: backoffice).
        URL::defaults([
            'locale' => session('locale', config('app.locale', 'pt')),
        ]);
    }
}
