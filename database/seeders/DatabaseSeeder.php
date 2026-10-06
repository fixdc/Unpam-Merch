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
        // 1. SEEDER USERS (Minimal 5)
        $userId1 = DB::table('users')->insertGetId([
            'name' => 'Admin UNPAM',
            'no_telp' => '081234567890',
            'role' => 'admin',
            'tgl_lahir' => '1995-05-15',
            'gender' => 'male',
            'email' => 'admin@unpam.ac.id',
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $userId2 = DB::table('users')->insertGetId([
            'name' => 'Budi Santoso',
            'no_telp' => '089876543210',
            'role' => 'pelanggan',
            'email' => 'budi@student.unpam.ac.id',
            'password' => Hash::make('password123'),
            'created_at' => now(), 'updated_at' => now(),
        ]);

        $userId3 = DB::table('users')->insertGetId([
            'name' => 'Siti Aminah',
            'no_telp' => '081122334455',
            'role' => 'pelanggan',
            'email' => 'siti@student.unpam.ac.id',
            'password' => Hash::make('password123'),
            'created_at' => now(), 'updated_at' => now(),
        ]);

        $userId4 = DB::table('users')->insertGetId([
            'name' => 'Akhna K',
            'no_telp' => '085566778899',
            'role' => 'pelanggan',
            'email' => 'akhna@gmail.com',
            'password' => Hash::make('password123'),
            'created_at' => now(), 'updated_at' => now(),
        ]);

        $userId5 = DB::table('users')->insertGetId([
            'name' => 'Fikri Aidhil',
            'no_telp' => '081319449299',
            'role' => 'pelanggan',
            'email' => 'fikri@gmail.com',
            'password' => Hash::make('password123'),
            'created_at' => now(), 'updated_at' => now(),
        ]);

        // 2. SEEDER ADDRESSES (Minimal 5)
        $addrId1 = DB::table('addresses')->insertGetId([
            'user_id' => $userId2,
            'label' => 'Rumah',
            'recipient_name' => 'Budi Santoso',
            'phone_number' => '089876543210',
            'full_address' => 'Jl. Puspitek Raya No. 10, Serpong, Tangerang Selatan',
            'is_primary' => 1,
            'created_at' => now(), 'updated_at' => now(),
        ]);

        $addrId2 = DB::table('addresses')->insertGetId([
            'user_id' => $userId3,
            'label' => 'Kos',
            'recipient_name' => 'Siti Aminah',
            'phone_number' => '081122334455',
            'full_address' => 'Gg. Kancil, Pamulang Barat, Kec. Pamulang',
            'is_primary' => 1,
            'created_at' => now(), 'updated_at' => now(),
        ]);

        $addrId3 = DB::table('addresses')->insertGetId([
            'user_id' => $userId4,
            'label' => 'Rumah',
            'recipient_name' => 'Akhna K',
            'phone_number' => '085566778899',
            'full_address' => 'Komp. Reni Jaya Blok B No. 5, Pamulang',
            'is_primary' => 1,
            'created_at' => now(), 'updated_at' => now(),
        ]);

        $addrId4 = DB::table('addresses')->insertGetId([
            'user_id' => $userId5,
            'label' => 'Rumah',
            'recipient_name' => 'Fikri Aidhil',
            'phone_number' => '081319449299',
            'full_address' => 'Jl. Gotong Royong No. 12, Ciputat',
            'is_primary' => 1,
            'created_at' => now(), 'updated_at' => now(),
        ]);

        $addrId5 = DB::table('addresses')->insertGetId([
            'user_id' => $userId2,
            'label' => 'Kantor',
            'recipient_name' => 'Budi Santoso',
            'phone_number' => '089876543210',
            'full_address' => 'Gedung Viktor Lt. 2, Universitas Pamulang',
            'is_primary' => 0,
            'created_at' => now(), 'updated_at' => now(),
        ]);

        // 3. SEEDER CATEGORIES (Minimal 5)
        $catIds = [];
        $categories = ['Pakaian', 'Aksesoris', 'Alat Tulis', 'Tas & Dompet', 'Lain-lain'];
        foreach ($categories as $cat) {
            $catIds[] = DB::table('categories')->insertGetId([
                'nama' => $cat,
                'slug' => Str::slug($cat),
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // 4. SEEDER PRODUCTS (Minimal 5)
        $prodId1 = DB::table('products')->insertGetId([
            'nama' => 'Varsity Jacket UNPAM', 'slug' => 'varsity-jacket-unpam', 'stok' => 12, 'rating' => 4.8, 'terjual' => 124, 'berat' => 700, 'harga' => 185000,
            'desc' => 'Jaket varsity resmi kampus Universitas Pamulang.', 'image' => null, 'is_active' => 1, 'category_id' => $catIds[0], 'created_at' => now(), 'updated_at' => now(),
        ]);
        $prodId2 = DB::table('products')->insertGetId([
            'nama' => 'Hoodie Eksklusif UNPAM', 'slug' => 'hoodie-eksklusif-unpam', 'stok' => 45, 'rating' => 4.6, 'terjual' => 98, 'berat' => 600, 'harga' => 150000,
            'desc' => 'Hoodie nyaman untuk kegiatan kuliah sehari-hari.', 'image' => null, 'is_active' => 1, 'category_id' => $catIds[0], 'created_at' => now(), 'updated_at' => now(),
        ]);
        $prodId3 = DB::table('products')->insertGetId([
            'nama' => 'Lanyard ID Card UNPAM', 'slug' => 'lanyard-id-card-unpam', 'stok' => 200, 'rating' => 4.9, 'terjual' => 54, 'berat' => 50, 'harga' => 25000,
            'desc' => 'Tali gantungan ID card resmi berlogo almamater.', 'image' => null, 'is_active' => 1, 'category_id' => $catIds[1], 'created_at' => now(), 'updated_at' => now(),
        ]);
        $prodId4 = DB::table('products')->insertGetId([
            'nama' => 'Buku Catatan Kampus', 'slug' => 'buku-catatan-kampus', 'stok' => 100, 'rating' => 4.5, 'terjual' => 30, 'berat' => 200, 'harga' => 15000,
            'desc' => 'Notebook eksklusif dengan logo UNPAM.', 'image' => null, 'is_active' => 1, 'category_id' => $catIds[2], 'created_at' => now(), 'updated_at' => now(),
        ]);
        $prodId5 = DB::table('products')->insertGetId([
            'nama' => 'Tote Bag Kanvas', 'slug' => 'tote-bag-kanvas', 'stok' => 80, 'rating' => 4.7, 'terjual' => 60, 'berat' => 150, 'harga' => 35000,
            'desc' => 'Tas tote bag ramah lingkungan untuk bawa buku.', 'image' => null, 'is_active' => 1, 'category_id' => $catIds[3], 'created_at' => now(), 'updated_at' => now(),
        ]);

        // 5. SEEDER CARTS (Minimal 5)
        DB::table('carts')->insert([
            ['user_id' => $userId2, 'product_id' => $prodId1, 'qty' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => $userId3, 'product_id' => $prodId3, 'qty' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => $userId4, 'product_id' => $prodId2, 'qty' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => $userId5, 'product_id' => $prodId4, 'qty' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => $userId5, 'product_id' => $prodId5, 'qty' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 6. SEEDER ORDERS (Minimal 5 dengan variasi status)
        $orders = [
            ['user_id' => $userId2, 'address_id' => $addrId1, 'status' => 'dikirim', 'harga' => 185000 + 15000, 'resi' => 'JP88992233'],
            ['user_id' => $userId3, 'address_id' => $addrId2, 'status' => 'selesai', 'harga' => 150000 + 15000, 'resi' => 'TL99887766'],
            ['user_id' => $userId4, 'address_id' => null, 'status' => 'siap_ambil', 'harga' => 25000, 'resi' => null], // Null karena ambil di kampus
            ['user_id' => $userId5, 'address_id' => $addrId4, 'status' => 'diproses', 'harga' => 35000 + 10000, 'resi' => null],
            ['user_id' => $userId2, 'address_id' => null, 'status' => 'pending', 'harga' => 15000, 'resi' => null],
        ];

        $orderIds = [];
        foreach ($orders as $i => $o) {
            $orderIds[] = DB::table('orders')->insertGetId([
                'user_id' => $o['user_id'],
                'address_id' => $o['address_id'],
                'order_number' => 'UNP-' . strtoupper(Str::random(6)),
                'total_harga' => $o['harga'],
                'status' => $o['status'],
                'metode_pembayaran' => 'Xendit',
                'catatan' => 'Catatan pesanan ' . ($i + 1),
                'resi' => $o['resi'],
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // 7. SEEDER ORDER ITEMS (Minimal 5, menghubungkan ke Orders di atas)
        $orderItems = [
            ['order_id' => $orderIds[0], 'product_id' => $prodId1, 'quantity' => 1, 'harga_satuan' => 185000],
            ['order_id' => $orderIds[1], 'product_id' => $prodId2, 'quantity' => 1, 'harga_satuan' => 150000],
            ['order_id' => $orderIds[2], 'product_id' => $prodId3, 'quantity' => 1, 'harga_satuan' => 25000],
            ['order_id' => $orderIds[3], 'product_id' => $prodId5, 'quantity' => 1, 'harga_satuan' => 35000],
            ['order_id' => $orderIds[4], 'product_id' => $prodId4, 'quantity' => 1, 'harga_satuan' => 15000],
        ];
        
        foreach ($orderItems as $item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            DB::table('order_items')->insert($item);
        }

        // 8. SEEDER VOUCHERS (Minimal 5)
        $vouchers = [
            ['kode' => 'MABACUY26', 'tipe' => 'persen', 'nilai' => 10],
            ['kode' => 'UNPAMHEMAT', 'tipe' => 'nominal', 'nilai' => 15000],
            ['kode' => 'DISKON20', 'tipe' => 'persen', 'nilai' => 20],
            ['kode' => 'ONGKIRFREE', 'tipe' => 'nominal', 'nilai' => 10000],
            ['kode' => 'MERCH50', 'tipe' => 'nominal', 'nilai' => 50000],
        ];

        foreach ($vouchers as $v) {
            DB::table('vouchers')->insert([
                'kode_voucher' => $v['kode'],
                'type_voucher' => $v['tipe'],
                'nilai_diskon' => $v['nilai'],
                'kuota' => 50,
                'expired_at' => now()->addDays(30),
                'is_active' => 1,
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // 9. SEEDER REVIEWS (Minimal 5)
        $reviews = [
            ['product_id' => $prodId1, 'order_id' => $orderIds[0], 'rating' => 5, 'coment' => 'Barangnya mantap banget, adem dipake pas ngampus!'],
            ['product_id' => $prodId2, 'order_id' => $orderIds[1], 'rating' => 4, 'coment' => 'Ukurannya pas, tapi pengiriman agak lama.'],
            ['product_id' => $prodId3, 'order_id' => $orderIds[2], 'rating' => 5, 'coment' => 'Lanyard-nya bagus, kelihatan elegan.'],
            ['product_id' => $prodId5, 'order_id' => $orderIds[3], 'rating' => 5, 'coment' => 'Tote bag-nya kuat buat bawa buku tebal.'],
            ['product_id' => $prodId4, 'order_id' => $orderIds[4], 'rating' => 3, 'coment' => 'Kertasnya agak tipis, tapi oke lah buat catatan.'],
        ];

        foreach ($reviews as $r) {
            $r['img'] = null;
            $r['created_at'] = now();
            $r['updated_at'] = now();
            DB::table('reviews')->insert($r);
        }
    }
}