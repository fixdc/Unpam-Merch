<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // View Composer khusus untuk menyuntikkan data ke komponen navbar
        View::composer('components.navbar', function ($view) {
            $cartItems = collect();
            $totalHargaCart = 0;

            // Cek apakah user sudah login
            if (Auth::check()) {
                // Ambil data keranjang beserta relasi produknya
                $cartItems = Cart::with('product')
                    ->where('user_id', Auth::id())
                    ->latest()
                    ->get();
                
                // Hitung total harga
                foreach ($cartItems as $item) {
                    if ($item->product) {
                        $totalHargaCart += ($item->product->harga * $item->qty);
                    }
                }
            }

            // Kirim variabel ke komponen navbar.blade.php
            $view->with([
                'cartItems' => $cartItems,
                'totalHargaCart' => $totalHargaCart,
            ]);
        });
    }
}