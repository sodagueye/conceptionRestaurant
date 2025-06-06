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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->enum('status', ['en attente', 'payée', 'annulée']);
            $table->string('total');
            $table->unsignedBigInteger('client_id'); 
            $table->unsignedBigInteger('livreur_id'); 
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade'); 
            $table->foreign('livreur_id')->references('id')->on('livreurs')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
