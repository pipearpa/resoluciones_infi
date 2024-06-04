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
        Schema::create('p_q_r_s', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->text('descripcion');    
            $table->timestamps();
            $table->text('nombre');   
            $table->text('tipoDocumento');   
            $table->text('numero_documento');   
            $table->text('email');   
            $table->string('numeroTel');   
            $table->text('direccion');   
            $table->text('respuesta');   
            $table->text('archivo');
            $table->string('estado')->default('Sin tramitar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_q_r_s');
    }
};
