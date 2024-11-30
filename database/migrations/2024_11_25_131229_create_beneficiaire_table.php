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
        Schema::create('beneficiaire', function (Blueprint $table) {
            $table->id(); 
            $table->string('nom'); 
            $table->string('prenom'); 
            $table->string('email')->unique(); 
            $table->string('telephone'); 
            $table->text('adresse'); 
            $table->enum('type_beneficiaire', ['personne physique', 'personne morale']); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaire');
    }
};