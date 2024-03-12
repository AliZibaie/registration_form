<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_information_id',
        'phone_number',
    ];

    public function companyField(): BelongsTo
    {
        return $this->belongsTo(CompanyField::class);
    }
}
