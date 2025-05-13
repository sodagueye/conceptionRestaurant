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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            // $table->string('nom');
            // $table->string('prenom');
            // $table->string('telephone')->unique();
            // $table->string('email')->unique();
            // $table->string('password');
             $table->string('adresse');
            $table->unsignedBigInteger('livreur_id');
            $table->timestamps();
            $table->foreign('livreur_id')->references('id')->on('livreurs')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
