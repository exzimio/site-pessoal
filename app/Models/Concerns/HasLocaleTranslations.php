<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Relação de traduções por locale.
 * Espera que o modelo defina translationModel() e a foreign key padrão.
 */
trait HasLocaleTranslations
{
    abstract public function translations(): HasMany;

    public function translation(?string $locale = null): ?Model
    {
        $locale ??= app()->getLocale();
        $items = $this->relationLoaded('translations')
            ? $this->translations
            : $this->translations()->get();

        return $items->firstWhere('locale', $locale)
            ?? $items->firstWhere('locale', config('app.fallback_locale', 'pt'));
    }

    public function t(string $field, ?string $locale = null, mixed $default = null): mixed
    {
        $row = $this->translation($locale);

        return $row?->{$field} ?? $default;
    }
}
