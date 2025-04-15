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
        //
        Schema::create("solicitantes", function (Blueprint $table) {
            //Datos principales de registro
            $table->uuid('solicitante_id')->primary();
            $table->string("curp")->unique();
            $table->string("nombre");
            $table->string("apellido_paterno");
            $table->string("apellido_materno");
            $table->enum("genero", ["hombre","mujer"]);
            $table->boolean("isMayahablante") ->default(false);

            //Datos de nacimiento
            $table->string("estado_nacimiento");
            $table->string("municipio_nacimiento");
            $table->date("fecha_nacimiento");

            //medios de contacto
            $table->string("telefono");
            $table->string("email")->unique();  

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
