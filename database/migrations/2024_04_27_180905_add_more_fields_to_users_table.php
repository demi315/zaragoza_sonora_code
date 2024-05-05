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
        Schema::table('users', function (Blueprint $table) {
            $table->string('info',350);
            $table->binary('pfp');
            $table->integer('admin',false,true);
        });

        //necesario para cambiar el tipo de BLOB a MEDIUMBLOB para poder almacenar imágenes más grandes
        DB::statement("ALTER TABLE users MODIFY COLUMN pfp MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
