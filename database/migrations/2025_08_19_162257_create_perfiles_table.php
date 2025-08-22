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
        Schema::create('perfiles', function (Blueprint $table) {
            $table->id();

            // Relación con el usuario
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Datos del perfil
            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni')->unique();
            $table->string('carrera');
            $table->string('comision');
            $table->text('descripcion')->nullable();
            $table->string('telefono'); // Para WhatsApp
            $table->string('linkedin')->nullable(); // URL a red profesional
            $table->string('foto')->nullable(); // Ruta a la foto de perfil

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfiles');
    }
};
