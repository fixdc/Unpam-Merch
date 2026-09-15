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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique(); // Slug wajib unik untuk URL (contoh: /produk/kaos-unpam)
            $table->integer('stok')->default(0);
            $table->decimal('rating', 3, 2)->default(0); // Format desimal, cth: 4.50 atau 5.00
            $table->integer('terjual')->default(0); // Mulai dari 0 saat produk baru diupload
            $table->integer('berat'); // Biasanya pakai satuan gram (gr) untuk API ongkir
            $table->bigInteger('harga'); // Pakai bigInteger karena Rupiah nominalnya bisa besar
            $table->longText('desc')->nullable(); // longText agar bisa menampung deskripsi panjang/HTML
            
            $table->json('image')->nullable(); 
            
            $table->boolean('is_active')->default(true); // Default true agar langsung tayang
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Relasi ke tabel categories, jika kategori dihapus maka produk ikut terhapus
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
