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
        Schema::create('cat_actividades_economicas', function (Blueprint $table) {
            $table->id("pk_actividad_economica_id")->comment('Código de la actividad económica');
            $table->string('str_nombre', 255);
            $table->string('str_descripcion', 255)->nullable();
            $table->string('str_sector', 50)->nullable();
            $table->string('str_subsector', 50)->nullable();
            $table->string('str_tipo_actividad', 50)->nullable();
            $table->string('int_CIIU')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_actividad_economica');
    }
};
