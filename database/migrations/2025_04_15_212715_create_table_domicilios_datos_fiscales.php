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
        Schema::create('tb_domicilios_datosFiscales', function (Blueprint $table) {
            $table ->uuid('fk_domicilio_id');
            $table ->uuid('fk_datosFiscales_id');
            $table ->foreign('fk_domicilio_id')->references('pk_domicilio_id')->on('tb_domicilios')->onDelete('cascade');
            $table ->foreign('fk_datosFiscales_id')->references('pk_dato_fiscal_id')->on('tb_datos_fiscales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_domicilios_datos_fiscales');
    }
};
