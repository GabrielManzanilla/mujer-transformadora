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
        Schema::create('tb_productos', function (Blueprint $table) {
            $table->uuid("pk_producto_id")->primary();
            $table->string("str_nombre_producto", 100); 
            $table->string("str_descripcion_producto", 255);
            $table->integer("int_produccion_mensual");
            $table->integer("int_venta_mensual" );
            $table->integer("int_venta_anual");

            $table -> uuid("fk_inscripcion_id");
            $table ->foreign("fk_inscripcion_id")->references("pk_inscripcion_id")->on("tb_inscripciones")->onDelete("cascade");

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_productos');
    }
};
