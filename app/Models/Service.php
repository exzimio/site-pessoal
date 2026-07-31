<?php

namespace App\Models;

use App\Models\Concerns\HasLocaleTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasLocaleTranslations;
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'icon',
        'price_cents',
        'is_monthly',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'price_cents' => 'integer',
            'is_monthly' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function translations(): HasMany
    {
        return $this->hasMany(ServiceTranslation::class);
    }

    public function priceFormatted(): string
    {
        $euros = $this->price_cents / 100;
        $formatted = number_format($euros, $euros == (int) $euros ? 0 : 2, ',', '.');

        return $formatted.' €';
    }
}
