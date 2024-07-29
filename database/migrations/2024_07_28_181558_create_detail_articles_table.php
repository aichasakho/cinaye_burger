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
        Schema::create('detail_articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_commande');
            $table->integer('quantité');
            $table->double('prix_unitaire', 10, 2);
            $table->foreign('id_commande')->references('id')->on('commandes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_articles');
    }
};
