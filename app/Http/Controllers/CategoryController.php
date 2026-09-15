<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.category', compact('categories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'        => 'required|string|max:255',
        ]);

        Category::create([
            'nama'        => $request->nama,
            'slug'        => Str::slug($request->nama) . '-' . Str::random(5), 
        ]);

        return back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // 2. Hapus data produk dari database
        $category->delete();

        // 3. Kembalikan ke halaman manajemen produk dengan pesan sukses
        return redirect('/admin/category')->with('success', 'Kategori Berhasil Dihapus');
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        // 1. Validasi inputan
        $validated = $request->validate([
            'nama'        => 'required|string|max:255',
        ]);

        // 3. Update data produk di database
        $category->update([
            'nama'        => $request->nama,
            'slug'        => Str::slug($request->nama) . '-' . Str::random(5),
            
        ]);

        return redirect('/admin/category')->with('success', 'Produk berhasil diperbarui!');
    }
}
