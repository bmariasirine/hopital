<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('nomJeuneFille')->nullable();
            $table->string('lieuNaissance');
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->string('prenom');
            $table->date('dateNaissance');
            $table->string('adresse');
            $table->string('numeroAssurance');
            $table->enum('sexe', ['homme', 'femme']);
            $table->foreignId('id_medecin')->nullable()->constrained('users');
            $table->foreignId('id_infirmier')->nullable()->constrained('users');
            $table->foreignId('salle_id')->nullable()->default(2)->constrained('salles');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
