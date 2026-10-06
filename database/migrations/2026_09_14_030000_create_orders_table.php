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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('address_id')->nullable()->constrained('addresses')->onDelete('set null');
            $table->string('order_number')->unique();
            $table->bigInteger('total_harga');
            $table->enum('status', [
                'pending',     // Belum dibayar
                'dibayar',     // Sudah bayar, nunggu konfirmasi admin
                'diproses',    // Sedang disiapkan/dipacking
                'siap_ambil',  // Khusus kalau pilih ambil di kampus
                'dikirim',     // Sedang dalam perjalanan kurir
                'terkirim',
                'selesai',     // Barang sudah diterima
                'dibatalkan'   // Pesanan dicancel
            ])->default('pending');
            $table->string('metode_pembayaran'); 
            $table->text('catatan')->nullable(); // Catatan dari pembeli saat checkout
            $table->string('resi')->nullable();  // Nomor resi pengiriman dari admin
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