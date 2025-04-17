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
        Schema::create('tb_datos_fiscales', function (Blueprint $table) {
            $table->uuid("pk_dato_fiscal_id")->primary();
            $table->string("str_razon_social")->unique();
            $table->string("str_nombre_comercial")->unique();
            $table->date("str_fecha_inicio");
            $table->string("str_rfc")->unique();
            $table->uuid("fk_regimen_id");
            $table ->foreign("fk_regimen_id")->references("pk_regimen_id")->on("cat_regimen")->onDelete("cascade");
            $table->string("str_clave_impi");
            $table->string("str_clave_imss");
            $table->unsignedBigInteger("fk_actividad_economica_id");
            $table ->foreign("fk_actividad_economica_id")->references("pk_actividad_economica_id")->on("cat_actividades_economicas")->onDelete("cascade");
            $table ->integer("int_num_empleados");
            // datos de union
            $table->uuid("fk_persona_id");
            $table ->foreign("fk_persona_id")->references("pk_persona_id")->on("tb_personas")->onDelete("cascade");
            $table->uuid("fk_red_social_id");
            $table ->foreign("fk_red_social_id")->references("pk_red_social_id")->on("tb_redes_sociales")->onDelete("cascade");
        });

        Schema::create("tb_registros_adicionales", function (Blueprint $table) {
            $table->uuid("fk_fiscal_data_id");
            $table->foreign("fk_fiscal_data_id")->references("pk_dato_fiscal_id")->on("tb_datos_fiscales")->onDelete("cascade");
            $table->string("str_nombre_registro_adicional");
            $table->string("str_clave_registro_adicional");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_datos_fiscales');
        Schema::dropIfExists('table_registros_adicionales');
    }
};
