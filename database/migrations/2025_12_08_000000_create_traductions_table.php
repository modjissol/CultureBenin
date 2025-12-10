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
        Schema::create('traductions', function (Blueprint $table) {
            $table->increments('id_traduction');
            $table->unsignedInteger('id_contenu');
            $table->string('langue_cible', 10)->nullable();
            $table->text('texte_traduit');
            $table->unsignedInteger('id_utilisateur')->nullable();
            $table->timestamps();

            $table->foreign('id_contenu')->references('id_contenu')->on('contenus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traductions');
    }
};
