<?php

use App\Enums\ActivityArea;
use App\Enums\ActivitySubject;
use App\Enums\CompanyType;
use App\Enums\LicenseType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies_informations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_in_english');
            $table->text('website');
            $table->text('email');
            $table->enum('activity_area', ActivityArea::getValues());
            $table->enum('activity_subject',ActivitySubject::getValues());
            $table->text('activity_specialty');
            $table->text('activity_summary');
            $table->string('national_code');
            $table->string('company_registration_number');
            $table->enum('company_type', CompanyType::getValues());
            $table->string('company_registration_place');
            $table->date('company_registration_date');
            $table->boolean('is_danesh_bonyan');
            $table->enum('danesh_bonyan_license_type', LicenseType::getValues())->nullable();
            $table->date('danesh_bonyan_license_issuance_date')->nullable();
            $table->date('danesh_bonyan_license_validity_date')->nullable();
            $table->string('license_title');
            $table->date('license_issuance_date');
            $table->date('license_validity_date');
            $table->date('license_issuance_reference');
            $table->date('registration_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_information');
    }
};
