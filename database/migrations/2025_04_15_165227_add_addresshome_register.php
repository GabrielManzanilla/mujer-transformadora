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
        Schema::create("domicilio", function (Blueprint $table) {
            $table->foreignId("solicitante_id")->constrained("solicitantes")->onDelete("cascade");
            $table->string("direccion");
            $table->string("estado");
            $table->string("municipio");
            $table->string("localidad");
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
