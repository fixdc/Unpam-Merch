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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke tabel users (siapa yang beli)
            // onDelete('cascade') memastikan jika user dihapus, riwayat pesanannya ikut terhapus
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Nomor resi/invoice pesanan (Contoh: UNP-20260914-001)
            $table->string('order_number')->unique();
            
            // Total belanja keseluruhan (pakai bigInteger agar seragam dengan harga produk)
            $table->bigInteger('total_harga');
            
            // Status pesanan menggunakan Enum agar lebih rapi
            $table->enum('status', [
                'pending',       // Belum dibayar
                'dibayar',       // Sudah bayar, nunggu konfirmasi admin
                'diproses',      // Sedang disiapkan/dipacking
                'siap_ambil',    // Khusus kalau pilih ambil di kampus
                'dikirim',       // Sedang dalam perjalanan kurir
                'selesai',       // Barang sudah diterima
                'dibatalkan'     // Pesanan dicancel
            ])->default('pending');
            
            // Metode pembayaran
            $table->string('metode_pembayaran'); 
            
            // Catatan dari pembeli (bisa kosong, jadi pakai nullable)
            $table->text('catatan')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};