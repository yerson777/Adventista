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
        Schema::create('asignacion_miembros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('miembro_id')->constrained('miembros');
            $table->foreignId('departamento_id')->constrained('departamentos');
            $table->date('fecha_Asignacion');
            $table->string('Rol');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignacion_miembros');
    }
};
