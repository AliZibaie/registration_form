<?php

namespace App\Models;

use App\Casts\IsDaneshBonyan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'english_name',
      'website',
      'email',
      'activity_area',
      'activity_subject',
      'activity_specialty',
      'national_code',
      'activity_summary',
      'company_registration_number',
      'company_type',
      'company_registration_place',
      'company_registration_date',
      'is_danesh_bonyan',
      'danesh_bonyan_license_type',
      'danesh_bonyan_license_issuance_date',
      'danesh_bonyan_license_validity_date',
      'license_issuance_date',
      'license_title',
      'license_validity_date',
      'license_issuance_reference',
      'registration_date',
    ];
    protected $casts = [
      'is_danesh_bonyan'=>IsDaneshBonyan::class
    ];

    public function faxes(): HasMany
    {
        return $this->hasMany(Fax::class);
    }
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
