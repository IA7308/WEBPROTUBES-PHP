<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('dashboards', function (Blueprint $table) {
        $table->integer('views')->default(0); // Menambahkan kolom views
    });
}

public function down()
{
    Schema::table('dashboards', function (Blueprint $table) {
        $table->dropColumn('views'); // Menghapus kolom views jika perlu
    });
}

};
