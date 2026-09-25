<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')->orderBy("created_at", "desc")->paginate(10);
        $categories = ArticleCategory::all();
        return view("admin.article", compact("articles", "categories"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'category_id' => 'required|exists:article_categories,id',
            'desc'        => 'required|string',
            'image.*'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            // Karena kolom database string tunggal, ambil file pertama yang di-upload
            $imagePath = $request->file('image')[0]->store('articles', 'public');
        }

        Article::create([
            'judul'       => $request->judul,
            'slug'        => Str::slug($request->judul) . '-' . Str::random(5),
            'category_id' => $request->category_id,
            'desc'        => $request->desc,
            'image'       => $imagePath, // Disimpan sebagai string path tunggal
        ]);

        return redirect()->route('articles')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'judul'       => 'required|string|max:255',
            'category_id' => 'required|exists:article_categories,id',
            'desc'        => 'required|string',
            'image.*'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $imagePath = $article->image;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }

            // Upload gambar baru
            $imagePath = $request->file('image')[0]->store('articles', 'public');
        }

        $article->update([
            'judul'       => $request->judul,
            'slug'        => Str::slug($request->judul) . '-' . Str::random(5),
            'category_id' => $request->category_id,
            'desc'        => $request->desc,
            'image'       => $imagePath,
        ]);

        return redirect()->route('articles')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // Hapus file fisik gambar dari storage
        if ($article->image && is_array($article->image)) {
            foreach ($article->image as $imgPath) {
                if (Storage::disk('public')->exists($imgPath)) {
                    Storage::disk('public')->delete($imgPath);
                }
            }
        }

        $article->delete();

        return redirect()->route('articles')->with('success', 'Artikel berhasil dihapus!');
    }
}