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
        Schema::create('imagens_animal', function (Blueprint $table) {
            $table->bigIncrements('id_animal_img');
            $table->unsignedBigInteger('id_animal');
            $table->unsignedBigInteger('id_img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagens_animal');
    }
};
