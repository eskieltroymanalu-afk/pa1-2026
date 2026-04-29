<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->integer('views')->default(0);
        });

        Schema::table('berita', function (Blueprint $table) {
            $table->integer('views')->default(0);
        });

        Schema::table('informasi', function (Blueprint $table) {
            $table->integer('views')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->dropColumn('views');
        });

        Schema::table('berita', function (Blueprint $table) {
            $table->dropColumn('views');
        });

        Schema::table('informasi', function (Blueprint $table) {
            $table->dropColumn('views');
        });
    }
};
