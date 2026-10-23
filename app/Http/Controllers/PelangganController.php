<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPelanggan = Pelanggan::all();

        return view(
            'admin.pelanggan.index',
            compact('dataPelanggan')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil data pelanggan berdasarkan primary key pelanggan_id
        $dataPelanggan = Pelanggan::findOrFail($id);

        // Kirim variabel dataPelanggan ke halaman edit
        return view('admin.pelanggan.edit', [
            'dataPelanggan' => $dataPelanggan
        ]);
    }

    /**
     * Update the specified resource in storage.
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
            ->with('success', 'Perubahan data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
