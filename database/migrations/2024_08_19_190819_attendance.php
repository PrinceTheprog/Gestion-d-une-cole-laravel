<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Ensure this type matches the 'id' type in the 'users' table
            $table->date('date');
            $table->boolean('is_present');
            $table->boolean('is_late')->nullable();
            $table->time('arrival_time')->nullable();
            $table->string('remarks')->nullable();

            // Foreign key constraint
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade'); // Ensure proper cascading

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendance');
    }
};
