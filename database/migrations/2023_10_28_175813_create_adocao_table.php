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
        Schema::create('adocao', function (Blueprint $table) {
            $table->bigIncrements('id_solicitante');
            $table->string('nome', 100);
            $table->char('cpf', 11);
            $table->char('telefone', 13);
            $table->string('email', 220);
            $table->unsignedBigInteger('id_animal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adocao');
    }
};
