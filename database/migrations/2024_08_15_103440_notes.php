<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
           
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade'); // Assuming users table for students
            $table->foreignId('course_id')->constrained('cours')->onDelete('cascade');
            $table->string('grade');
            $table->text('comments')->nullable();
            $table->float('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
