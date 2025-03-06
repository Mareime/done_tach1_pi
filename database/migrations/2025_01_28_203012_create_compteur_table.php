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
        Schema::create('compteur', function (Blueprint $table) {
            $table->id(); // Ajoute la colonne id auto-incrémentée
            $table->integer('annee')->unique(); // Pour éviter les doublons d'année
            $table->integer('compteur')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compteur');
    }
};
