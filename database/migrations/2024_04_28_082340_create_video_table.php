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
        Schema::create('video', function (Blueprint $table) {
            $table->id('id_vid');
            $table->binary('vid');
            $table->foreignId('id_pub')->references('id')->on('publicaciones')->onUpdate(
            'cascade')->onDelete('cascade');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE video MODIFY COLUMN vid LONGBLOB");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video');
    }
};
