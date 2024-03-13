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
//            $table->enum('CEO_last_educational_stage', EducationalStage::getValues())
//                ->nullable();
//            $table->enum('CEO_educational_group', EducationalGroup::getValues())->nullable();
//            $table->enum('CEO_educational_field', EducationalField::getValues())->nullable();
//            $table->enum('CEO_cooperation_type', CooperationType::getValues())->nullable();
            $table->date('CEO_cooperation_started_at')->nullable();
            $table->json('CEO_records')->nullable();

            // form step 3

            $table->string('board_first_name')->nullable();
            $table->string('board_last_name')->nullable();
            $table->string('board_father_name')->nullable();
            $table->string('board_identify_number')->nullable();
            $table->string('board_national_code')->nullable();
            $table->string('board_birth_place')->nullable();
            $table->enum('board_gender', Gender::getValues())->nullable();
            $table->date('board_birth_date')->nullable();
            $table->string('board_phone_number')->nullable();
//            $table->enum('board_last_educational_stage', EducationalStage::getValues())->nullable();
//            $table->enum('board_educational_group', EducationalGroup::getValues())->nullable();
//            $table->enum('board_educational_field', EducationalField::getValues())->nullable();
//            $table->enum('board_cooperation_type', CooperationType::getValues())->nullable();
            $table->date('board_cooperation_started_at')->nullable();

            // form step 3

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
