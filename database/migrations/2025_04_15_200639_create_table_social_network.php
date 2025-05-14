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
        Schema::create('tb_redes_sociales', function (Blueprint $table) {
            $table->uuid("pk_red_social_id")->primary();
            $table ->string("str_facebook")->nullable();
            $table ->string("str_facebook_empresarial")->nullable();
            $table ->string("str_facebook_marketplace")->nullable();
            $table ->string("str_pagina_web")->nullable();
            $table ->string("str_whatsapp_bussines")->nullable();
            $table ->string("str_mercado_libre")->nullable();
            $table ->string("str_mercado_pago")->nullable();

            //union con la tabla tb_datos_fiscales
            $table ->uuid("fk_inscripcion_id");
            $table->foreign("fk_inscripcion_id")->references("pk_inscripcion_id")->on("tb_inscripciones")->onDelete("cascade");

            $table->timestamps();
        });

        Schema::create("tb_redes_adicionales", function (Blueprint $table) {
            $table->uuid("fk_redes_sociales_id");
            $table->foreign("fk_redes_sociales_id")->references("pk_red_social_id")->on("tb_redes_sociales")->onDelete("cascade");
            
            $table->string("str_nombre_red_social");
            $table->string("str_nombre_perfil");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_redes_sociales');
        Schema::dropIfExists('tb_redes_adicionales');
    }
};
