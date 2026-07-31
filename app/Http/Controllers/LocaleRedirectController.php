<?php

namespace App\Http\Controllers;

use App\Http\Middleware\SetLocale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleRedirectController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $locale = $request->session()->get('locale')
            ?? $request->getPreferredLanguage(SetLocale::SUPPORTED)
            ?? config('app.locale', 'pt');

        if (! in_array($locale, SetLocale::SUPPORTED, true)) {
            $locale = 'pt';
        }

        return redirect()->route('home', ['locale' => $locale]);
    }
}
