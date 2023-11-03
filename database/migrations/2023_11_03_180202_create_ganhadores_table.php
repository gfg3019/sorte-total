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
        Schema::create('ganhadores', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('sorteio_id');
            $table->foreign('sorteio_id')
                ->references('id')
                ->on('sorteio')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unique('sorteio_id');

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')
                ->references('id')
                ->on('cliente')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unique('cliente_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ganhadores');
    }
};
