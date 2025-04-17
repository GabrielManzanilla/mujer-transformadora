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
            $table->timestamps();
        });

        Schema::create('tb_productos_registro', function (Blueprint $table) {
            $table-> uuid("fk_producto_id");
            $table -> uuid("fk_registro_fiscal_id");
            $table -> foreign("fk_producto_id")->references("pk_producto_id")->on("tb_productos")->onDelete("cascade");
            $table -> foreign("fk_registro_fiscal_id")->references("pk_dato_fiscal_id")->on("tb_datos_fiscales")->onDelete("cascade");
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
