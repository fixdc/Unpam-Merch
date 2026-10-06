<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function items()
    {
        // Sesuaikan nama model OrderItem-nya jika berbeda
        return $this->hasMany(OrderItem::class);
    }

    protected $fillable = [
        'user_id',
        'order_number',
        'total_harga',
        'status',
        'metode_pembayaran',
        'catatan',
        'address_id',
        'resi',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
