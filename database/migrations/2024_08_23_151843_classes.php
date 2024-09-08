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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_classe')->nullable();
            $table->timestamps();
        });

        DB::table('classe')->insert([
            ['nom_classe' => '6 ème'],
            ['nom_classe' => '5 ème'],
            ['nom_classe' => '4 ème'],
            ['nom_classe' => '3 ème'],
            ['nom_classe' => 'Seconde'],
            ['nom_classe' => 'Première'],
            ['nom_classe' => 'Terminale'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
};
