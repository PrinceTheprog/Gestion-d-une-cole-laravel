<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('roll')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('religion')->nullable();
            $table->string('email')->nullable();
            $table->string('class')->nullable();
            $table->string('section')->nullable();
            $table->string('admission_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('nom_parent')->nullable();
            $table->string('prenom_parent')->nullable();
            $table->string('profession_parent')->nullable();
            $table->string('address_parent')->nullable();
            $table->string('contact_parent')->nullable();
            $table->string('country_parent')->nullable();
            $table->string('previous_school_name')->nullable();
            $table->string('previous_school_address')->nullable();
            $table->string('last_class_attended')->nullable();
            $table->string('birth_certificate')->nullable(); // For birth certificate image
            $table->string('school_report')->nullable(); // For school report image
            $table->string('registration_form')->nullable(); // For registration form image
            $table->string('upload')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};
