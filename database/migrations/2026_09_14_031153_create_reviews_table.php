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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke tabel products (produk yang diulas)
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            
            // Relasi ke tabel orders (untuk memastikan pembeli benar-benar sudah memesan barang tersebut)
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            
            // Nilai rating (misalnya skala 1 sampai 5)
            $table->integer('rating');
            
            // Komentar ulasan dari pembeli
            $table->text('coment')->nullable();
            
            // Foto bukti ulasan (disimpan dalam format JSON jika bisa upload banyak gambar)
            $table->json('img')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};