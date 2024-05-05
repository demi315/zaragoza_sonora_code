<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('imagen', function (Blueprint $table) {
            $table->id('id_img');
            $table->binary('img');
            $table->foreignId('id_pub')->references('id')->on('publicaciones')->onUpdate(
            'cascade')->onDelete('cascade');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE imagen MODIFY COLUMN img MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagen');
    }
};
