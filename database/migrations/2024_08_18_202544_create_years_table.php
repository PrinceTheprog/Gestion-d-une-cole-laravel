<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYearsTable extends Migration
{
    public function up()
    {
        Schema::create('years', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom de l'année scolaire
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('years');
    }
}
