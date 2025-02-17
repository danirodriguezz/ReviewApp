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
        Schema::create('lista_de_seguimiento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('tipo_contenido', ['pelicula', 'serie']);
            $table->unsignedBigInteger('contenido_id');
            $table->enum('estado', ['viendo', 'pendiente'])->nullable()->default(null);
            $table->timestamps();

            $table->index(['tipo_contenido', 'contenido_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lista_de_seguimiento');
    }
};
