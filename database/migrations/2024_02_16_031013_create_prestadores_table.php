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
        Schema::create('prestadores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_prestador_id')->constrained('tipo_prestadores')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nombre');
            $table->string('imagen')->nullable();
            $table->text('redes_sociales')->nullable();
            $table->string('link')->nullable();
            $table->string('pagina_web')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestadores');
    }
};
