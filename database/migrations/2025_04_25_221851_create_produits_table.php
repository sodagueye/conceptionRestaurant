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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom_produit');
            $table->string('description');
            $table->decimal('prix');
            $table->unsignedBigInteger('stock_id');
            $table->unsignedBigInteger('categorie_id');
            $table->timestamps();

           
            // $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade'); 
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
