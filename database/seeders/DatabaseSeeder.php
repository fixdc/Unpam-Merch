<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. SEEDER USERS
        // Membuat data admin dan beberapa mahasiswa
        $userId1 = DB::table('users')->insertGetId([
            'name' => 'Fikri Aidhil Admin',
            'alamat' => 'Jl. Viktor Raya No. 1, Serpong',
            'no_telp' => '081234567890',
            'role' => 'admin',
            'tgl_lahir' => '1995-05-15',
            'gender' => 'male',
            'email' => 'admin@unpam.ac.id',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $userId2 = DB::table('users')->insertGetId([
            'name' => 'Budi Santoso',
            'alamat' => 'Jl. Surya Kencana No. 45, Pamulang',
            'no_telp' => '089876543210',
            'tgl_lahir' => '2000-08-20',
            'gender' => 'male',
            'role' => 'pelanggan',
            'email' => 'budi@student.unpam.ac.id',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. SEEDER CATEGORIES
        $catPakaian = DB::table('categories')->insertGetId([
            'nama' => 'Pakaian',
            'slug' => 'pakaian',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $catAksesoris = DB::table('categories')->insertGetId([
            'nama' => 'Aksesoris',
            'slug' => 'aksesoris',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. SEEDER PRODUCTS (Kolom image dibiarkan null sesuai permintaan)
        $prod1 = DB::table('products')->insertGetId([
            'nama' => 'Varsity Jacket UNPAM',
            'slug' => 'varsity-jacket-unpam',
            'stok' => 12,
            'rating' => 4.8,
            'terjual' => 124,
            'berat' => 700,
            'harga' => 185000,
            'desc' => 'Jaket varsity resmi kampus Universitas Pamulang dengan bahan fleece tebal berkualitas tinggi.',
            'image' => null,
            'is_active' => true,
            'category_id' => $catPakaian,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $prod2 = DB::table('products')->insertGetId([
            'nama' => 'Hoodie Eksklusif UNPAM',
            'slug' => 'hoodie-eksklusif-unpam',
            'stok' => 45,
            'rating' => 4.6,
            'terjual' => 98,
            'berat' => 600,
            'harga' => 150000,
            'desc' => 'Hoodie nyaman untuk kegiatan kuliah sehari-hari.',
            'image' => null,
            'is_active' => true,
            'category_id' => $catPakaian,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $prod3 = DB::table('products')->insertGetId([
            'nama' => 'Lanyard ID Card UNPAM',
            'slug' => 'lanyard-id-card-unpam',
            'stok' => 200,
            'rating' => 4.9,
            'terjual' => 54,
            'berat' => 50,
            'harga' => 25000,
            'desc' => 'Tali gantungan ID card resmi berlogo almamater.',
            'image' => null,
            'is_active' => true,
            'category_id' => $catAksesoris,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 4. SEEDER CARTS
        DB::table('carts')->insert([
            [
                'user_id' => $userId2,
                'product_id' => $prod3,
                'qty' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // 5. SEEDER ORDERS
        $orderId1 = DB::table('orders')->insertGetId([
            'user_id' => $userId2,
            'order_number' => 'UNP-' . strtoupper(Str::random(6)),
            'total_harga' => 210000,
            'status' => 'diproses',
            'metode_pembayaran' => 'QRIS',
            'catatan' => 'Tolong dicek ya min ukurannya L',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 6. SEEDER ORDER ITEMS
        DB::table('order_items')->insert([
            [
                'order_id' => $orderId1,
                'product_id' => $prod1,
                'quantity' => 1,
                'harga_satuan' => 185000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => $orderId1,
                'product_id' => $prod3,
                'quantity' => 1,
                'harga_satuan' => 25000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // 7. SEEDER VOUCHERS
        DB::table('vouchers')->insert([
            [
                'kode_voucher' => 'MABACUY26',
                'type_voucher' => 'persen',
                'nilai_diskon' => 10,
                'kuota' => 50,
                'expired_at' => now()->addDays(30),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // 8. SEEDER REVIEWS
        DB::table('reviews')->insert([
            [
                'product_id' => $prod1,
                'order_id' => $orderId1,
                'rating' => 5,
                'coment' => 'Barangnya mantap banget, adem dipake pas ngampus!',
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}