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
        Schema::create('books_catalogue', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('judul');
            $table->text('sinopsis')->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('nama_penulis');
            $table->string('nama_penerbit')->nullable();
            $table->string('halaman')->nullable();
            $table->string('isbn')->nullable();
            $table->string('tahun_terbit');
            $table->text('isi_buku');
            $table->string('status')->default('in stock');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_catalogue');
    }
};
