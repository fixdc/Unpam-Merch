<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel users
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); 
            
            // Label alamat, misal: "Rumah", "Kantor", "Kos"
            $table->string('label')->nullable(); 
            $table->string('recipient_name'); // Nama penerima
            $table->string('phone_number'); // Nomor telepon penerima
            $table->text('full_address'); // Alamat lengkap (Jalan, RT/RW, dsb)
            
            // Opsional: Pembagian wilayah jika nanti butuh integrasi ongkir (seperti RajaOngkir)
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable(); // Kecamatan
            $table->string('postal_code')->nullable();
            
            // Menandai apakah ini alamat utama/default
            $table->boolean('is_primary')->default(false); 
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};