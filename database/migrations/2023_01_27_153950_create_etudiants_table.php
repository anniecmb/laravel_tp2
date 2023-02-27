<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id(); // ID d'un(e) étudiant(e)
            $table->string('nom', 50); // Nom d'un(e) étudiant(e)
            $table->string('adresse', 100); // Adresse d'un(e) étudiant(e)
            $table->string('telephone'); // Téléphone d'un(e) étudiant(e)
            $table->string('courriel', 50); // Courriel d'un(e) étudiant(e)
            $table->date('naissance'); // Date de naissance d'un(e) étudiant(e)
            $table->foreignId('ville_id')->constrained('villes'); // ID de la ville d'un(e) étudiant(e)
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
        Schema::dropIfExists('etudiants');
    }
}
