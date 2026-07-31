<?php

namespace App\Models;

use App\Models\Concerns\HasLocaleTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasLocaleTranslations;
    use SoftDeletes;

    public const CATEGORIES = ['web', 'app', 'ecommerce', 'data'];

    public const MEDIA_KEYS = [
        'dashboard',
        'shop',
        'calendar',
        'landing',
        'api',
        'portal',
    ];

    protected $fillable = [
        'slug',
        'category',
        'media_key',
        'year',
        'sort_order',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'sort_order' => 'integer',
        ];
    }

    public function translations(): HasMany
    {
        return $this->hasMany(ProjectTranslation::class);
    }

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class)
            ->withPivot('sort_order')
            ->orderByPivot('sort_order');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
