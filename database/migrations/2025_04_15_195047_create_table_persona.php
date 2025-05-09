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
            $table ->enum("str_sexo", ["Hombre", "Mujer"]); 
            $table -> boolean("bl_mayahablante")->default(false);
            $table->string("str_tel_celular");
            $table ->enum("estado_perfil", ["Activo","En espera","Datos Incompletos", "Desactivado"]) ->default("En espera");

            $table->string("path_acta_nacimiento")->nullable();
            $table->string("path_identificacion")->nullable();
            $table->string("path_comprobante_domicilio")->nullable();
            $table->string("path_curp")->nullable();
            $table->string("path_foto_perfil")->nullable();

            //falta añadir los documentos del usuario

            //conexion con la tabla de usuers
            $table->uuid("fk_user_id");
            $table->foreign("fk_user_id")->references("id")->on("users")->onDelete("cascade");

            //llamado al cat_candidato
            // $table ->unsignedBigInteger("fk_candidato_id") ->nullable();
            // $table ->foreign("fk_candidato_id")->references("pk_candidato_id")->on("cat_candidato")->onDelete("cascade");
            
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
