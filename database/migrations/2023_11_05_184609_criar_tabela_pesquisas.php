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
        Schema::create('pesquisas', function (Blueprint $table) {
            $table->id();
            $table->float('pergunta1');
            $table->float('pergunta2');
            $table->float('pergunta3');
            $table->float('pergunta4');
            $table->float('pergunta5');
            $table->float('pergunta6');
            $table->longText('pergunta7');
            $table->longText('pergunta8');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesquisas');
    }
};
