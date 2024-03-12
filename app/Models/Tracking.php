<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tracking extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'company_field_id',
        'chief_executive_officer_field_id',
        'board_governance_field_id',
        'shareholding_field_id',
    ];
    public function companyField(): BelongsTo
    {
        return $this->belongsTo(CompanyField::class);
    }
    public function progressLog(): HasOne
    {
        return $this->hasOne(ProgressLog::class);
    }
    public function chiefExecutiveOfficerField(): BelongsTo
    {
        return $this->belongsTo(ChiefExecutiveOfficerField::class);
    }
    public function boardGovernanceField(): BelongsTo
    {
        return $this->belongsTo(BoardGovernanceField::class);
    }
    public function shareholdingField(): BelongsTo
    {
    return $this->belongsTo(ShareholdingField::class);
    }
}
