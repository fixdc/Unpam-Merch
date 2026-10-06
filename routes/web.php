<?php

use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\Admin\ReportController;
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

Route::get('/articles', [ArticleController::class, 'index_user'])->name('user_articles');

Route::get('/product', [ProductController::class, 'index_user'])->name('product.index');
Route::get('/product/{slug}', [ProductController::class, 'show_user'])->name('product.show');

Route::get('/login', [UserLoginController::class, 'login_page'])->name('login');
Route::post('/login', [UserLoginController::class, 'login']);
Route::post('/logout', [UserLoginController::class, 'logout']);

Route::get('/register', [UserRegisterController::class, 'create'])->name('register');
Route::post('/register', [UserRegisterController::class, 'store']);

// Middleware untuk User biasa
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add');
    Route::post('/cart/increment/{id}', [CartController::class, 'increment'])->name('cart.increment');
    Route::post('/cart/decrement/{id}', [CartController::class, 'decrement'])->name('cart.decrement');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    // Halaman & Update Profil
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

    // CRUD Alamat
    Route::post('/profile/address', [ProfileController::class, 'storeAddress'])->name('profile.address.store');
    Route::put('/profile/address/{address}', [ProfileController::class, 'updateAddress'])->name('profile.address.update');
    Route::delete('/profile/address/{address}', [ProfileController::class, 'destroyAddress'])->name('profile.address.destroy');

    Route::get('/carts', [CartController::class, 'index'])->name('cart.index');
    Route::put('/carts/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/address', [CheckoutController::class, 'storeAddress'])->name('checkout.address');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

    Route::get('/orders', [UserOrderController::class, 'index'])->name('user.orders');
    Route::get('/orders/{id}/struk', [UserOrderController::class, 'invoice'])->name('user.order.invoice');
    Route::put('/orders/{id}/selesai', [UserOrderController::class, 'completeOrder'])->name('user.order.complete');
    Route::get('/orders/{id}/review', [UserOrderController::class, 'reviewPage'])->name('user.order.review');
    Route::post('/orders/{id}/review', [UserOrderController::class, 'submitReview'])->name('user.order.submit_review');
});

// Middleware khusus Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    // Produk (Manajemen Admin)
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

    // Manajemen Pengguna (Kelola User)
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users');
    Route::post('/users', [AdminUserController::class, 'store']);
    Route::put('/users/{id}', [AdminUserController::class, 'update']);
    Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('user.destroy');

    // Manajemen Voucher
    Route::get('/vouchers', [VoucherController::class, 'index'])->name('admin.vouchers');
    Route::post('/vouchers', [VoucherController::class, 'store']);
    Route::put('/vouchers/{id}', [VoucherController::class, 'update']);
    Route::delete('/vouchers/{id}', [VoucherController::class, 'destroy'])->name('voucher.destroy');

    // Pengaturan Admin
    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings');
    Route::post('/settings', [SettingController::class, 'update'])->name('admin.settings.update');

    // Manajemen Pesanan
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::put('/orders/{id}', [AdminOrderController::class, 'update'])->name('admin.orders.update');

    // Laporan
    Route::get('/laporan', [ReportController::class, 'index'])->name('admin.report.index');
    Route::get('/laporan/pdf', [ReportController::class, 'exportPdf'])->name('admin.report.pdf');
    Route::get('/laporan/excel', [ReportController::class, 'exportExcel'])->name('admin.report.excel');
});