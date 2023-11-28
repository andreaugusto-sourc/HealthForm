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
        Schema::create('perguntas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('questionario_id');
            $table->string('texto', 255);
            $table->string('placeholder',60)->nullable();
            $table->string('tipo',60)->default('text');
            $table->foreign('questionario_id')->references('id')->on('questionarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perguntas');
    }
};
