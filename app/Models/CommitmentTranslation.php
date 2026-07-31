<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommitmentTranslation extends Model
{
    protected $fillable = [
        'commitment_id',
        'locale',
        'label',
        'title',
        'subtitle',
        'body',
    ];

    public function commitment(): BelongsTo
    {
        return $this->belongsTo(Commitment::class);
    }
}
