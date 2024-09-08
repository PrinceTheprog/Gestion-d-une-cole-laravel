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
        Schema::create('matiere', function (Blueprint $table) {
            $table->id();
            $table->string('nom_matiere')->nullable();
            $table->timestamps();
        });
        
        DB::table('matiere')->insert([
            ['nom_matiere' => 'Français'],
            ['nom_matiere' => 'Anglais'],
            ['nom_matiere' => 'Histoire-géographie'],
            ['nom_matiere' => 'Langue vivante'],
            ['nom_matiere' => 'Mathématiques'],
            ['nom_matiere' => 'Physique-chimie'],
            ['nom_matiere' => 'Education Civique et Morale'],
            ['nom_matiere' => 'Philosophie'],
            ['nom_matiere' => 'Sciences de la vie et de la Terre'],
            ['nom_matiere' => 'Éducation physique et sportive'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matiere');
    }
};

