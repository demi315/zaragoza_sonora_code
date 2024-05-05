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
        Schema::create('guarda', function (Blueprint $table) {
            $table->foreignId('id_us')->references('id')->on('users')->onUpdate(
            'cascade')->onDelete('cascade');
            $table->foreignId('id_pub')->references('id')->on('publicaciones')->onUpdate(
            'cascade')->onDelete('cascade');
            $table->primary(['id_us', 'id_pub']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guarda');
    }
};
