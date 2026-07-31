<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    public const STATUSES = ['new', 'read', 'replied', 'spam'];

    protected $fillable = [
        'name',
        'email',
        'company',
        'project_type',
        'budget',
        'body',
        'status',
        'locale',
        'ip_address',
        'user_agent',
        'rgpd_consent_at',
    ];

    protected function casts(): array
    {
        return [
            'rgpd_consent_at' => 'datetime',
        ];
    }

    public function scopeStatus(Builder $query, ?string $status): Builder
    {
        if ($status && in_array($status, self::STATUSES, true)) {
            $query->where('status', $status);
        }

        return $query;
    }

    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        $term = trim((string) $term);

        if ($term === '') {
            return $query;
        }

        return $query->where(function (Builder $q) use ($term) {
            $q->where('name', 'like', "%{$term}%")
                ->orWhere('email', 'like', "%{$term}%")
                ->orWhere('company', 'like', "%{$term}%")
                ->orWhere('body', 'like', "%{$term}%");
        });
    }

    public function isNew(): bool
    {
        return $this->status === 'new';
    }
}
