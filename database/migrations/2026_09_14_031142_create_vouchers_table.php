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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            
            // Kode unik voucher (Contoh: MABACUY26)
            $table->string('kode_voucher')->unique();
            
            // Tipe diskon: 'persen' (%) atau 'nominal' (Rupiah)
            $table->string('type_voucher'); 
            
            // Besar nilai diskon (bisa nominal rupiah atau angka persentase)
            $table->bigInteger('nilai_diskon'); 
            
            // Batas kuota penggunaan voucher
            $table->integer('kuota')->default(0); 
            
            // Tanggal dan waktu masa berlaku voucher habis
            $table->dateTime('expired_at'); 
            
            // Status aktif voucher (true = bisa dipakai, false = nonaktif)
            $table->boolean('is_active')->default(true); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};