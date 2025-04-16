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
        Schema::create('tb_personas', function (Blueprint $table) {
            $table->uuid("pk_persona_id")->primary();
            $table->string("str_curp");
            $table->string("str_nombre");
            $table->string("str_apellido_paterno");
            $table->string("str_apellido_materno");
            $table->date("dt_fecha_nacimiento");
            $table->string("str_estado_nacimiento");
            $table->string("str_municipio_nacimiento");
            $table ->enum("str_sexo", ["H", "M"]); 
            $table -> boolean("bl_mayahablante")->default(false);
            $table->string("str_ine");
            $table->string("str_correo_electronico");
            $table->string("str_tel_celular");
            $table ->enum("estado_perfil", ["Activo","En espera", "Desactivado"]);
            $table ->unsignedBigInteger("fk_candidato_id");
            $table ->foreign("fk_candidato_id")->references("pk_candidato_id")->on("cat_candidato")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_persona');
    }
};
