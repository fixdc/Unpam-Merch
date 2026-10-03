<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        return view('admin.settings', compact('admin'));
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $admin */
        $admin = Auth::user();

        // 1. Aturan validasi default (Nama & Email wajib)
        $rules = [
            'name'  => 'required|string|max:255',
            // Email harus unik, tapi abaikan email milik admin yang sedang login
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
        ];

        // 2. Jika kolom password baru diisi, tambahkan aturan validasi password
        if ($request->filled('new_password')) {
            $rules['current_password'] = 'required';
            $rules['new_password']     = 'required|min:8|confirmed';
        }

        $request->validate($rules);

        // 3. Update Nama dan Email
        $admin->name = $request->name;
        $admin->email = $request->email;

        // 4. Update Password jika diisi
        if ($request->filled('new_password')) {
            // Cek apakah password lamanya benar
            if (!Hash::check($request->current_password, $admin->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini yang Anda masukkan salah.']);
            }
            $admin->password = Hash::make($request->new_password);
        }

        // 5. Simpan ke database
        $admin->save();

        return back()->with('success', 'Profil dan pengaturan akun berhasil diperbarui!');
    }
}