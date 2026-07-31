<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Technology extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'icon',
        'sort_order',
        'show_in_stack',
    ];

    protected function casts(): array
    {
        return [
            'show_in_stack' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class)
            ->withPivot('sort_order')
            ->orderByPivot('sort_order');
    }
}
