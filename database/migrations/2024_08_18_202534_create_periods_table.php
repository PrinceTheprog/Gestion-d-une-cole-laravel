<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodsTable extends Migration
{
    public function up()
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom de la période
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('periods');
    }
}
