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
        Schema::create('cat_regimen', function (Blueprint $table) {
            $table->string("pk_regimen_id")->primary()->comment("Código del régimen (tipo str dado que los codigos ya estan establecidos)");
            $table->string("str_nombre");
            $table->string("str_descripcion");
            $table -> string("str_tipo_contribuyente");
            $table->string("str_caracterisiticas_regimen");
            $table->string("str_requisitos");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_regimen');
    }
};
