<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();

        $categories = Category::all();

        return view('admin.product', compact('products', 'categories'));
    }
    public function store(Request $request)
    {
        // 1. Validasi inputan
        $validated = $request->validate([
            'nama'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'is_active'   => 'required|boolean',
            'harga'       => 'required|numeric|min:0',
            'berat'       => 'required|numeric|min:1',
            'stok'        => 'required|numeric|min:0',
            'desc'        => 'nullable|string',
            'image.*'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048' // Maksimal 2MB per gambar
        ]);

        // 2. Proses Upload Banyak Gambar
        $imagePaths = []; // Siapkan wadah kosong

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                // Simpan gambar ke folder storage/app/public/products
                $path = $file->store('products', 'public');
                // Masukkan path-nya ke dalam array
                $imagePaths[] = $path;
            }
        }

        // 3. Simpan data ke Database
        Product::create([
            'nama'        => $request->nama,
            'slug'        => Str::slug($request->nama) . '-' . Str::random(5), // Slug otomatis dari nama produk + string acak agar unik
            'category_id' => $request->category_id,
            'is_active'   => $request->is_active,
            'harga'       => $request->harga,
            'berat'       => $request->berat,
            'stok'        => $request->stok,
            'desc'        => $request->desc,
            'image'       => empty($imagePaths) ? null : $imagePaths, // Simpan array gambar sebagai JSON
            'rating'      => 0,
            'terjual'     => 0,
        ]);

        // 4. Kembalikan ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // 1. Cek apakah produk memiliki file gambar di database
        if ($product->image && is_array($product->image)) {
            foreach ($product->image as $imgPath) {
                // Hapus file fisik dari folder storage/app/public/...
                if (Storage::disk('public')->exists($imgPath)) {
                    Storage::disk('public')->delete($imgPath);
                }
            }
        }

        // 2. Hapus data produk dari database
        $product->delete();

        // 3. Kembalikan ke halaman manajemen produk dengan pesan sukses
        return redirect('/admin/product')->with('success', 'Produk dan gambar berhasil dihapus!');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // 1. Validasi inputan
        $validated = $request->validate([
            'nama'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'is_active'   => 'required|boolean',
            'harga'       => 'required|numeric|min:0',
            'berat'       => 'required|numeric|min:1',
            'stok'        => 'required|numeric|min:0',
            'desc'        => 'nullable|string',
            'image.*'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $imagePaths = $product->image; // Pertahankan gambar lama jika tidak mengupload baru

        // 2. Jika ada upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama di storage (opsional, jika ingin bersih total)
            if ($product->image && is_array($product->image)) {
                foreach ($product->image as $oldImg) {
                    if (\Illuminate\Support\Facades\Storage::disk('public')->exists($oldImg)) {
                        \Illuminate\Support\Facades\Storage::disk('public')->delete($oldImg);
                    }
                }
            }

            // Upload gambar baru
            $imagePaths = [];
            foreach ($request->file('image') as $file) {
                $path = $file->store('products', 'public');
                $imagePaths[] = $path;
            }
        }

        // 3. Update data produk di database
        $product->update([
            'nama'        => $request->nama,
            'slug'        => \Illuminate\Support\Str::slug($request->nama) . '-' . \Illuminate\Support\Str::random(5),
            'category_id' => $request->category_id,
            'is_active'   => $request->is_active,
            'harga'       => $request->harga,
            'berat'       => $request->berat,
            'stok'        => $request->stok,
            'desc'        => $request->desc,
            'image'       => $imagePaths,
        ]);

        return redirect('/admin/product')->with('success', 'Produk berhasil diperbarui!');
    }
}
