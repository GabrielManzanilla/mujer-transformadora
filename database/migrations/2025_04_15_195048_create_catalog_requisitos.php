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
        Schema::create('cat_requisitos', function (Blueprint $table) {
            $table->uuid("pk_requisito_id")->primary();
            $table->string('str_descripcion', 100)->unique();
        });

        Schema::create('tb_requisitos_persona', function (Blueprint $table) {
            $table -> uuid("fk_requisito_id");
            $table -> uuid("fk_persona_id");
            $table-> foreign('fk_requisito_id')->references('pk_requisito_id')->on('cat_requisitos')->onDelete('cascade');
            $table-> foreign('fk_persona_id')->references('pk_persona_id')->on('tb_personas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_requisitos');
    }
};
