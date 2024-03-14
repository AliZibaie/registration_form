<?php

use App\Enums\ActivityArea;
use App\Enums\ActivitySubject;
use App\Enums\CompanyType;
use App\Enums\CooperationType;
use App\Enums\EducationalField;
use App\Enums\EducationalGroup;
use App\Enums\EducationalStage;
use App\Enums\Gender;
use App\Enums\LicenseType;
use Carbon\Carbon;
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
        Schema::create('registration_fields', function (Blueprint $table) {
            $table->id();

            // form step 1

            $table->string('name');
            $table->string('english_name');
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
            $table->enum('danesh_bonyan_license_type', LicenseType::getValues())
                ->nullable();
            $table->date('danesh_bonyan_license_issuance_date')
                ->nullable();
            $table->date('danesh_bonyan_license_validity_date')
                ->nullable();
            $table->string('license_title');
            $table->date('license_issuance_date');
            $table->date('license_validity_date');
            $table->date('license_issuance_reference');
            $table->date('registration_date')->default(Carbon::now());
            $table->json('phone_numbers');
            $table->json('fax_numbers');

            // form step 2

            $table->string('CEO_first_name')->nullable();
            $table->string('CEO_last_name')->nullable();
            $table->string('CEO_father_name')->nullable();
            $table->string('CEO_identify_number')->nullable();
            $table->string('CEO_national_code')->nullable();
            $table->enum('CEO_gender', Gender::getValues())->nullable();
            $table->string('CEO_birth_place')->nullable();
            $table->date('CEO_birth_date')->nullable();
            $table->string('CEO_phone_number')->nullable();
            $table->enum('CEO_last_educational_stage', EducationalStage::getValues())->nullable();
            $table->string('CEO_educational_group')->nullable();
            $table->string('CEO_educational_field')->nullable();
            $table->enum('CEO_cooperation_type', CooperationType::getValues())->nullable();
            $table->date('CEO_cooperation_started_at')->nullable();
            $table->text('CEO_records')->nullable();

            // form step 3

            $table->json('boards')->nullable();

//            $table->string('first_name')->nullable();
//            $table->string('last_name')->nullable();
//            $table->string('identify_number')->nullable();
//            $table->string('national_code')->nullable();
//            $table->string('birth_place')->nullable();
//            $table->date('birth_date')->nullable();
//            $table->enum('gender', Gender::getValues())->nullable();
//            $table->enum('cooperation_type', CooperationType::getValues())->nullable();
//            $table->date('cooperation_started_at')->nullable();
//            $table->date('position')->nullable();
//            $table->string('phone_number')->nullable();
//            $table->string('last_educational_stage')
//                ->nullable();
//            $table->enum('last_educational_stage', EducationalStage::getValues())->nullable();
//            $table->string('educational_group')->nullable();
//            $table->string('educational_field')->nullable();
//            $table->string('experience')->nullable();
//            $table->text('email');

            // form step 4

            $table->json('shareholders')->nullable();

//            $table->string('type')->nullable();
//            $table->string('name')->nullable();
//            $table->string('share_percent')->nullable();
//            $table->string('legal_shareholder_type')->nullable();
//            $table->string('full_name_legal_shareholder_representative')->nullable();

            $table->json('shareholdings')->nullable();

//            $table->string('company_name')->nullable();
//            $table->string('activity_area')->nullable();
//            $table->string('share_percent_in_company')->nullable();
//            $table->boolean('is_spin_off')->nullable();

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
