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
        Schema::create('escrutinios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidata_id');
            $table->integer('numeroEscrutinio');
            $table->decimal('monto',8,2);
            $table->timestamps();
            $table->foreign('candidata_id')
                    ->references('id')
                    ->on('candidatas')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escrutinios');
    }
};
