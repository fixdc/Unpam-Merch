<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // ... (kode $fillable atau $guarded milikmu) ...

    // 1. Tambahkan relasi ke tabel Orders
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // 2. Sekalian pastikan kamu sudah punya relasi ke tabel Products (jika belum)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}