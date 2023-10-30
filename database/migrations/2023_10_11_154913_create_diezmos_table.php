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
        Schema::create('diezmos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('miembro_id')->constrained('miembros');
            $table->date('Fecha_Contribucion');
            $table->decimal('Monto_Contribucion',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diezmos');
    }
};
