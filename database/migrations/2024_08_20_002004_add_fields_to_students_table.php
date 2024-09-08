<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
           // For registration form image
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'profession_parent',
                'previous_school_name',
                'previous_school_address',
                'last_class_attended',
                'birth_certificate',
                'school_report',
                'registration_form',
            ]);
        });
    }
};
