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
        Schema::table('destinasi', function (Blueprint $table) {
            $table->string('lokasi')->after('slug');
            $table->string('kategori')->after('lokasi')->default('Alam');
            $table->json('tags')->nullable()->after('kategori');
            $table->string('maps')->nullable()->after('tags');
            $table->boolean('status')->default(true)->after('maps');
            $table->integer('views')->default(0)->after('status');
            $table->string('url_gambar')->nullable()->after('gambar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('destinasi', function (Blueprint $table) {
            $table->dropColumn(['lokasi', 'kategori', 'tags', 'maps', 'status', 'views', 'url_gambar']);
        });
    }
};
