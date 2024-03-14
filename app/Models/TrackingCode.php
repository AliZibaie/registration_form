<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrackingCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'registration_field_id',
    ];
    public function companyField(): BelongsTo
    {
        return $this->belongsTo(RegistrationField::class);
    }
    public function progressLog(): HasMany
    {
        return $this->hasMany(ProgressLog::class);
    }

}
