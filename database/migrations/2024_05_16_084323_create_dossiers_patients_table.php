<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dossiers_patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_infirmier')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('id_patient')->nullable()->constrained('patients')->nullOnDelete();
            $table->foreignId('id_medecin')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossiers_patients');
    }
};
