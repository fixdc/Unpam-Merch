<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleCategoryController extends Controller
{
    public function index()
    {
        $categories = ArticleCategory::latest()->get();
        return view("admin.article_category", compact("categories"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        ArticleCategory::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama) . '-' . Str::random(5),
        ]);

        return redirect()->back()->with('success', 'Kategori artikel berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $category = ArticleCategory::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $category->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama) . '-' . Str::random(5),
        ]);

        return redirect()->back()->with('success', 'Kategori artikel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $category = ArticleCategory::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Kategori artikel berhasil dihapus!');
    }
}