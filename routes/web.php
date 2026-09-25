<?php

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $articles = Article::with('category')->latest()->take(3)->get();
    $product = Product::with('category')->latest()->take(4)->get();
    return view('index', compact('articles', 'product'));
});

Route::get('/home', function () {
    $articles = Article::with('category')->latest()->take(3)->get();
    $product = Product::with('category')->latest()->take(4)->get();
    return view('index', compact('articles', 'product'));
});

Route::get('/product', [ProductController::class, 'index_user']);

Route::get('/login', [UserLoginController::class, 'login_page'])->name('login');
Route::post('/login', [UserLoginController::class, 'login']);
Route::post('/logout', [UserLoginController::class, 'logout']);

Route::get('/register', [UserRegisterController::class, 'create'])->name('register');
Route::post('/register', [UserRegisterController::class, 'store']);

// Middleware untuk User biasa
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('dashboard');
    });
});

// Middleware khusus Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    // Produk
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::post('/product', [ProductController::class, 'store']);
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    
    // Kategori Produk
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::post('/category', [CategoryController::class, 'store']);
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    
    // Artikel
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
    Route::post('/articles', [ArticleController::class, 'store']);
    Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');

    // Kategori Artikel
    Route::get('/articlecategories', [ArticleCategoryController::class, 'index'])->name('articlecategory');
    Route::post('/articlecategories', [ArticleCategoryController::class, 'store']);
    Route::put('/articlecategories/{id}', [ArticleCategoryController::class, 'update'])->name('articlecategory.update');
    Route::delete('/articlecategories/{id}', [ArticleCategoryController::class, 'destroy'])->name('articlecategory.destroy');
});