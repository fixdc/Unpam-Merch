<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1'
        ]);

        $userId = Auth::id();
        $productId = $request->product_id;
        $qty = $request->qty;

        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->increment('qty', $qty);
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'qty' => $qty,
            ]);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    private function getCartData()
    {
        $carts = Cart::with('product')->where('user_id', Auth::id())->get();
        $totalHarga = 0;
        foreach ($carts as $item) {
            if ($item->product) {
                $totalHarga += ($item->product->harga * $item->qty);
            }
        }
        return [
            'total_harga' => $totalHarga,
            'total_items' => $carts->count()
        ];
    }

    public function increment($id)
    {
        $cart = Cart::with('product')->where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $cart->increment('qty');

        $totals = $this->getCartData();
        return response()->json([
            'success' => true,
            'qty' => $cart->qty,
            'subtotal' => $cart->qty * $cart->product->harga,
            'total_harga' => $totals['total_harga'],
        ]);
    }

    public function decrement($id)
    {
        $cart = Cart::with('product')->where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if ($cart->qty > 1) {
            $cart->decrement('qty');
        }

        $totals = $this->getCartData();
        return response()->json([
            'success' => true,
            'qty' => $cart->qty,
            'subtotal' => $cart->qty * $cart->product->harga,
            'total_harga' => $totals['total_harga'],
        ]);
    }

    public function remove($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $cart->delete();

        $totals = $this->getCartData();
        return response()->json([
            'success' => true,
            'total_harga' => $totals['total_harga'],
            'total_items' => $totals['total_items']
        ]);
    }
}
