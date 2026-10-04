<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Address;

class ProfileController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Mengambil data alamat milik user tersebut
        $addresses = $user->addresses()->latest()->get();

        return view('users.profile', compact('user', 'addresses'));
    }

    public function updateProfile(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20', // Validasi nomor telepon
            'current_password' => 'nullable|required_with:new_password',
            'new_password'     => 'nullable|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone; // Simpan nomor telepon

        // Update password jika diisi
        if ($request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini salah.']);
            }
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function storeAddress(Request $request)
    {
        $request->validate([
            'label' => 'required|string',
            'recipient_name' => 'required|string',
            'phone_number' => 'required|string',
            'full_address' => 'required|string',
        ]);

        $request->user()->addresses()->create($request->all());

        return back()->with('success', 'Alamat baru berhasil ditambahkan!');
    }

    public function updateAddress(Request $request, Address $address)
    {
        // Pastikan alamat ini milik user yang sedang login
        if ($address->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'label' => 'required|string',
            'recipient_name' => 'required|string',
            'phone_number' => 'required|string',
            'full_address' => 'required|string',
        ]);

        $address->update($request->all());

        return back()->with('success', 'Alamat berhasil diperbarui!');
    }

    public function destroyAddress(Address $address)
    {
        if ($address->user_id !== Auth::id()) {
            abort(403);
        }

        $address->delete();

        return back()->with('success', 'Alamat berhasil dihapus!');
    }
}
