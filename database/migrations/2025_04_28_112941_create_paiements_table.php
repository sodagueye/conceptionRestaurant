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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->decimal('montant');
            $table->date('date');
            $table->time('heure');
            $table->unsignedBigInteger('commande_id');
            $table->enum('mode_paiement',['espece','wave','orange_money' ]);

            $table->timestamps();
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
