<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Step extends Model
{
    use HasFactory;
    protected $fillable = [
    ];

    public function step(): BelongsTo
    {
        return $this->belongsTo(Step::class);
    }
    public function steps(): HasMany
    {
        return $this->hasMany(Step::class);
    }
    public function progressLog(): HasMany
    {
        return $this->hasMany(ProgressLog::class);
    }
}
