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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke pesanan (order)
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            
            // Relasi ke produk yang dibeli
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            
            // Jumlah barang yang dibeli
            $table->integer('quantity');
            
            // Harga satuan saat transaksi terjadi (pakai bigInteger agar seragam)
            $table->bigInteger('harga_satuan');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};