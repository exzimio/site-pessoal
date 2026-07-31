<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceTranslation extends Model
{
    protected $fillable = [
        'service_id',
        'locale',
        'title',
        'description',
        'bullets',
        'duration_label',
    ];

    protected function casts(): array
    {
        return [
            'bullets' => 'array',
        ];
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
