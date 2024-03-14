<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgressLog extends Model
{
    use HasFactory;
    protected $fillable = [
      'tracking_id',
      'step_id',
      'status',
    ];

    public function tracking(): BelongsTo
    {
        return $this->belongsTo(TrackingCode::class);
    }
    public function step(): BelongsTo
    {
        return $this->belongsTo(Step::class);
    }
}
