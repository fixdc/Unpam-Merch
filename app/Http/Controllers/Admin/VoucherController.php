<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::latest()->get();
        return view('admin.vouchers', compact('vouchers')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_voucher' => 'required|string|unique:vouchers,kode_voucher|max:50',
            'type_voucher' => 'required|in:percent,fixed',
            'nilai_diskon' => 'required|numeric|min:1',
            'kuota'        => 'required|integer|min:0', // Kuota pemakaian
            'expired_at'   => 'required|date',
            'is_active'    => 'required|boolean',
        ]);

        Voucher::create($request->all());

        return back()->with('success', 'Voucher baru berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $voucher = Voucher::findOrFail($id);

        $request->validate([
            'kode_voucher' => 'required|string|max:50|unique:vouchers,kode_voucher,' . $voucher->id,
            'type_voucher' => 'required|in:percent,fixed',
            'nilai_diskon' => 'required|numeric|min:1',
            'kuota'        => 'required|integer|min:0',
            'expired_at'   => 'required|date',
            'is_active'    => 'required|boolean',
        ]);

        $voucher->update($request->all());

        return back()->with('success', 'Data voucher berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->delete();

        return back()->with('success', 'Voucher berhasil dihapus!');
    }
}