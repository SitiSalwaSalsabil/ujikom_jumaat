<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Kategori; // Tambahkan use Kategori
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    // Menampilkan semua informasi
    public function index()
    {
        $informasi = Informasi::with('kategori')->get(); // Ambil semua data dari model Informasi beserta kategori
        return view('informasi.index', compact('informasi'));
    }

    // Menampilkan form untuk menambah informasi
    public function create()
    {
        $kategori = Kategori::all(); // Ambil semua kategori untuk dropdown
        return view('informasi.create', compact('kategori')); // Mengarahkan ke view untuk membuat informasi baru
    }

    // Menyimpan informasi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul_info' => 'required|string|max:255',
            'isi_info' => 'required|string',
            'tgl_post_info' => 'required|date',
            'status_info' => 'required|boolean',
            'kategori_id' => 'required|exists:kategori,id', // Validasi kategori_id
        ]);

        Informasi::create($request->all()); // Menyimpan data informasi ke database
        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil ditambahkan.'); // Redirect dengan pesan sukses
    }

    // Menampilkan informasi berdasarkan ID
    public function show(Informasi $informasi)
    {
        return view('informasi.show', compact('informasi'));
    }

    // Menampilkan form untuk mengedit informasi
    public function edit(Informasi $informasi)
    {
        $kategori = Kategori::all(); // Ambil semua kategori untuk dropdown
        return view('informasi.edit', compact('informasi', 'kategori')); // Mengarahkan ke view untuk mengedit informasi
    }

    // Memperbarui informasi di database
    public function update(Request $request, Informasi $informasi)
    {
        $request->validate([
            'judul_info' => 'required|string|max:255',
            'isi_info' => 'required|string',
            'tgl_post_info' => 'required|date',
            'status_info' => 'required|boolean',
            'kategori_id' => 'required|exists:kategori,id', // Validasi kategori_id
        ]);

        $informasi->update($request->all());
        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil diperbarui.');
    }

    // Menghapus informasi dari database
    public function destroy(Informasi $informasi)
    {
        $informasi->delete();
        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil dihapus.');
    }
}
