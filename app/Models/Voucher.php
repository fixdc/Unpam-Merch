<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_voucher',
        'type_voucher',
        'nilai_diskon',
        'kuota',
        'expired_at',
        'is_active',
    ];
}
