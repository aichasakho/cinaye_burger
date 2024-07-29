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
        Schema::create('payement', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->double('montant', 10, 2);
            $table->unsignedBigInteger('id_commande');
            $table->foreign('id_commande')->references('id')->on('commandes');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payement');
    }
};
