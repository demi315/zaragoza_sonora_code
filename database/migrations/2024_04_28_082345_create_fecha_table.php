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
        Schema::create('fecha', function (Blueprint $table) {
            $table->id('id_fch');
            $table->dateTime('fecha');
            $table->foreignId('id_pub')->references('id')->on('publicaciones')->onUpdate(
            'cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fecha');
    }
};
