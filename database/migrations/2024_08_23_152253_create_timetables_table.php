<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classes_id');
            $table->unsignedBigInteger('year_id');
            $table->unsignedBigInteger('period_id');
            $table->string('day')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->unsignedBigInteger('cours_id');
            $table->unsignedBigInteger('teacher_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('classes_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('cascade');
            $table->foreign('cours_id')->references('id')->on('cours')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timetables');
    }
}
