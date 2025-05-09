<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_inscripciones', function (Blueprint $table) {
            $table->uuid("pk_inscripcion_id")->primary();
            $table->string("str_razon_social")->unique();
            $table->string("str_nombre_comercial")->unique();
            $table->date("dt_tiempo_ejerciendo");
            $table->string("str_rfc")->unique();

            //llamado al catalogo cat_regimen
            $table->uuid("fk_regimen_id")->nullable();
            $table->foreign("fk_regimen_id")->references("pk_regimen_id")->on("cat_regimen")->onDelete("cascade");


            $table->string("str_clave_impi");
            $table->string("str_clave_affy");
            $table->string("str_clave_imss");

            //llamado al catalogo cat_actividad_economica
            $table->unsignedBigInteger("fk_actividad_economica_id")->nullable();
            $table->foreign("fk_actividad_economica_id")->references("pk_actividad_economica_id")->on("cat_actividades_economicas")->onDelete("cascade");

            $table->integer("int_num_empleados");

            //llamado a la tabla tb_personas
            $table->uuid("fk_user_id");
            $table->foreign("fk_user_id")->references("id")->on("users")->onDelete("cascade");
            $table->timestamps();
        });

        Schema::create("tb_registros_adicionales", function (Blueprint $table) {
            $table->uuid("fk_fiscal_data_id");
            $table->foreign("fk_fiscal_data_id")->references("pk_inscripcion_id")->on("tb_inscripciones")->onDelete("cascade");
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
