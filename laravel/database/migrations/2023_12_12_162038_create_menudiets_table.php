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
        Schema::create('menudiets', function (Blueprint $table) {
            $table->id();
            $table->string('Judul');
            $table->integer('Subjudul');
            $table->string('Image');
            $table->string('Chef')->nullable();
            $table->string('Deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menudiets');
    }
};
