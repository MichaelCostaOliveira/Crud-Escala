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
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('escala_trabalho_id');
            $table->string('name');
            $table->integer('matricula');
            $table->string('cpf');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('escala_trabalho_id')->references('id')->on('escala_trabalho');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_colaboradores');
    }
};
