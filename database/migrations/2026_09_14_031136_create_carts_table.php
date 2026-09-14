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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke tabel users (siapa pemilik keranjang)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Relasi ke tabel products (barang apa yang dimasukkan ke keranjang)
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            
            // Jumlah kuantitas produk yang dimasukkan ke keranjang
            $table->integer('qty')->default(1);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};