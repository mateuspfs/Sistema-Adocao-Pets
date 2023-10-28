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
        Schema::create('animais', function (Blueprint $table) {
            $table->bigIncrements('id_animal');
            $table->string('nome', 100);
            $table->integer('idade');
            $table->integer('peso');
            $table->string('sobre', 220);
            $table->string('endereco', 220);
            $table->unsignedBigInteger('id_status');
            $table->unsignedBigInteger('id_porte');
            $table->unsignedBigInteger('id_sexo');
            $table->unsignedBigInteger('id_especie');
            $table->unsignedBigInteger('id_raca');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animais');
    }
};
