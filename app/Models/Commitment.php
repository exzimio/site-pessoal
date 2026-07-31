<?php

namespace App\Models;

use App\Models\Concerns\HasLocaleTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commitment extends Model
{
    use HasLocaleTranslations;
    use SoftDeletes;

    protected $fillable = [
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function translations(): HasMany
    {
        return $this->hasMany(CommitmentTranslation::class);
    }
}
