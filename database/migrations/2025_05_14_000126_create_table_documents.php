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
        Schema::create('tb_documents', function (Blueprint $table) {
            $table->uuid('pk_document_id')->primary();
            
            $table->enum('status_impi', ['En espera','Rechazado','Aceptado'])->default('En espera');
            $table->string('path_impi')->nullable();

            $table->enum('status_imss', ['En espera','Rechazado','Aceptado'])->default('En espera');
            $table->string('path_imss')->nullable();
            
            $table->enum('status_cif', ['En espera','Rechazado','Aceptado'])->default('En espera');
            $table->string('path_cif')->nullable();
            
            $table->enum('status_affy', ['En espera','Rechazado','Aceptado'])->default('En espera');
            $table->string('path_affy')->nullable();
            
            $table->uuid('fk_inscripcion_id');
            $table->foreign('fk_inscripcion_id')->references('pk_inscripcion_id')->on('tb_inscripciones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_documents');
    }
};
