<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('konten');
            $table->string('gambar');
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
            $table->string('penulis');
            $table->date('tanggal_terbit');
            $table->boolean('status')->default(true);
            $table->integer('views')->default(0);
            $table->integer('komentar')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('berita');
    }
};