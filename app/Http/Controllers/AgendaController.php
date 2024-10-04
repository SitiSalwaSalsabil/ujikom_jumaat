<?php

namespace App\Http\Controllers;

use App\Models\Agenda; // Pastikan ini ada
use App\Models\Kategori; // Tambahkan ini
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    // Menampilkan semua agenda
    public function index()
    {
        $agenda = Agenda::all(); // Ambil semua data dari model Agenda
        return view('agenda.index', compact('agenda'));
    }

    // Menampilkan form untuk menambah agenda
    public function create()
    {
        $kategori = Kategori::all(); // Ambil semua kategori untuk dropdown
        return view('agenda.create', compact('kategori')); // Mengarahkan ke view untuk membuat informasi baru
    }

    // Menyimpan agenda baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul_agenda' => 'required|string|max:255',
            'isi_agenda' => 'required|string',
            'tgl_agenda' => 'required|date',
            'tgl_post_agenda' => 'required|date',
            'status_agenda' => 'required|boolean',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        Agenda::create($request->all()); // Menyimpan data agenda ke database
        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil ditambahkan.'); // Redirect dengan pesan sukses
    }

    // Menampilkan agenda berdasarkan ID
    public function show(Agenda $agenda)
    {
        return view('agenda.show', compact('agenda')); // Mengarahkan ke view untuk menampilkan detail agenda
    }

    // Menampilkan form untuk mengedit agenda
    public function edit(Agenda $agenda)
{
    $kategori = Kategori::all(); // Ambil semua kategori
    return view('agenda.edit', compact('agenda', 'kategori'));
}

    // Memperbarui agenda di database
    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'judul_agenda' => 'required|string|max:255',
            'isi_agenda' => 'required|string',
            'tgl_agenda' => 'required|date',
            'tgl_post_agenda' => 'required|date',
            'status_agenda' => 'required|boolean',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $agenda->update($request->all()); // Memperbarui data agenda di database
        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil diperbarui.'); // Redirect dengan pesan sukses
    }

    // Menghapus agenda dari database
    public function destroy(Agenda $agenda)
    {
        $agenda->delete(); // Menghapus agenda dari database
        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dihapus.'); // Redirect dengan pesan sukses
    }
}
