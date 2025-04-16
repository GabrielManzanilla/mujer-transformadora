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
        Schema::create('tb_domicilios', function (Blueprint $table) {
            $table->uuid("pk_domicilio_id")->primary();
            $table->string("str_direccion", 100);
            $table -> integer("int_codigo_postal");


            $table ->unsignedBigInteger("fk_estado_id");
            $table ->unsignedBigInteger("fk_municipio_id");
            $table ->unsignedBigInteger("fk_localidad_id");
            $table -> foreign("fk_estado_id")->references("pk_id_estado")->on("cat_estados")->onDelete("cascade");
            $table -> foreign("fk_municipio_id")->references("pk_id_municipio")->on("cat_municipios")->onDelete("cascade");

            $table -> foreign("fk_localidad_id")->references("pk_id_localidad")->on("cat_localidades")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_domicilios');
    }
};
