<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Database\Eloquent\Model;

trait SyncsTranslations
{
    protected const LOCALES = ['pt', 'en', 'es'];

    protected function syncTranslations(Model $model, array $byLocale): void
    {
        foreach ($byLocale as $locale => $fields) {
            $model->translations()->updateOrCreate(
                ['locale' => $locale],
                $fields
            );
        }
    }

    protected function localeRules(array $fields): array
    {
        $rules = ['translations' => ['required', 'array']];

        foreach (self::LOCALES as $locale) {
            foreach ($fields as $name => $rule) {
                $rules["translations.{$locale}.{$name}"] = $rule;
            }
        }

        return $rules;
    }
}
