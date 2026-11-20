<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Menampilkan seluruh data pelanggan.
     */
    public function index()
    {
        $data['dataPelanggan'] = Pelanggan::paginate(10);
        return view('admin.pelanggan.index', $data);
    }

    /**
     * Menampilkan halaman tambah pelanggan.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Menyimpan data pelanggan baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'birthday'   => 'required|date',
            'gender'     => 'required|in:Male,Female',
            'email'      => 'required|email|max:255',
            'phone'      => 'required|string|max:20',
        ]);

        Pelanggan::create($validated);

        return redirect()
            ->route('pelanggan.index')
            ->with('success', 'Penambahan data pelanggan berhasil!');
    }

    /**
     * Menampilkan detail pelanggan.
     */
    public function show(string $id)
    {
        $dataPelanggan = Pelanggan::findOrFail($id);

        return view('admin.pelanggan.show', compact('dataPelanggan'));
    }

    /**
     * Menampilkan halaman edit pelanggan.
     */
    public function edit(string $id)
    {
        $dataPelanggan = Pelanggan::findOrFail($id);

        return view('admin.pelanggan.edit', compact('dataPelanggan'));
    }

    /**
     * Memperbarui data pelanggan.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'birthday'   => 'required|date',
            'gender'     => 'required|in:Male,Female',
            'email'      => 'required|email|max:255',
            'phone'      => 'required|string|max:20',
        ]);

        $dataPelanggan = Pelanggan::findOrFail($id);
        $dataPelanggan->update($validated);

        return redirect()
            ->route('pelanggan.index')
            ->with('success', 'Perubahan data pelanggan berhasil!');
    }

    /**
     * Menghapus data pelanggan.
     */
    public function destroy(string $id)
    {
        $dataPelanggan = Pelanggan::findOrFail($id);
        $dataPelanggan->delete();

        return redirect()
            ->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil dihapus!');
    }
}
