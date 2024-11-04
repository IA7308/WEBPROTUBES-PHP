<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('dashboards', function (Blueprint $table) {
        $table->string('category')->nullable(); // Menambahkan kolom category
    });
}

public function down()
{
    Schema::table('dashboards', function (Blueprint $table) {
        $table->dropColumn('category'); // Menghapus kolom category jika perlu
    });
}

};