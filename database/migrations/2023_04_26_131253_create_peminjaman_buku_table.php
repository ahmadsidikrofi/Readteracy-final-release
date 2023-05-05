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
        Schema::create('peminjaman_buku', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('peminjaman_id')->nullable();
            $table->unsignedBigInteger('book_id')->nullable();
            $table->string('judul');
            $table->unsignedBigInteger('genre_id')->nullable();
            $table->string('image');
            $table->text('sinopsis')->nullable();
            $table->text('isi_buku');
            $table->string('status')->default("in stock");
            $table->date('rent_date');
            $table->date('return_date');
            $table->date('actual_return_date')->nullable();
            $table->enum('tipe', ["Fisik", "Non-fisik"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_buku');
    }
};
