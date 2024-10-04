<?php


namespace App\Http\Controllers;

use App\Models\Photo; // Pastikan model Photo ada
use App\Models\Galery; // Menggunakan model Galery
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Untuk menggunakan Auth

class PhotoController extends Controller
{
    // Menampilkan semua foto
    public function index()
    {
        $photos = Photo::all(); // Ambil semua data dari model Photo
        return view('photo.index', compact('photos')); // Menggunakan 'photos' untuk mengirim data
    }

    // Menampilkan form untuk menambah foto
    public function create()
    {
        $galeries = Galery::all(); // Ambil semua galeri untuk dropdown
        return view('photo.create', compact('galeries')); // Mengarahkan ke view untuk membuat foto baru
    }

    // Menyimpan foto baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul_photo' => 'required|string|max:255',
            'isi_photo' => 'required|url', // Pastikan ini adalah URL yang valid
            'status_photo' => 'required|boolean', // Validasi untuk status_photo
            'galery_id' => 'required|exists:galery,id', // Validasi galeri yang ada
        ]);

        // Simpan data foto ke database
        Photo::create([
            'judul_photo' => $request->judul_photo,
            'isi_photo' => $request->isi_photo,
            'status_photo' => $request->status_photo,
            'user_id' => Auth::id(), // Simpan ID pengguna yang sedang login
            'galery_id' => $request->galery_id, // Mengambil dari request
        ]);

        return redirect()->route('photo.index')->with('success', 'Foto berhasil ditambahkan.'); // Redirect dengan pesan sukses
    }

    // Menampilkan detail foto
    public function show(Photo $photo)
    {
        return view('photo.show', compact('photo')); // Mengarahkan ke view untuk menampilkan detail foto
    }

    // Menampilkan form untuk mengedit foto
    public function edit($kd_photo)
    {
        $photo = Photo::findOrFail($kd_photo); // Pastikan foto ditemukan dengan kode
        $galeries = Galery::all(); // Ambil semua galeri
        return view('photo.edit', compact('photo', 'galeries')); // Kirim data foto dan galeri
    }

    // Memperbarui foto di database
    public function update(Request $request, $kd_photo)
    {
        $photo = Photo::findOrFail($kd_photo); // Temukan foto berdasarkan kd_photo

        // Validasi input
        $request->validate([
            'judul_photo' => 'required|string|max:255',
            'isi_photo' => 'required|url', // Validasi untuk memastikan ini adalah URL yang valid
            'status_photo' => 'required|boolean', // Validasi untuk status_photo
            'galery_id' => 'required|exists:galery,id', // Validasi galeri
        ]);

        // Update data foto
        $photo->update([
            'judul_photo' => $request->judul_photo,
            'isi_photo' => $request->isi_photo, // Simpan URL gambar
            'status_photo' => $request->status_photo,
            'user_id' => Auth::id(), // Simpan ID pengguna yang sedang login
            'galery_id' => $request->galery_id, // Update galeri ID
            'updated_at' => now(), // Menyimpan waktu update saat ini
        ]);

        return redirect()->route('photo.index')->with('success', 'Foto berhasil diperbarui.'); // Redirect dengan pesan sukses
    }

    // Menghapus foto dari database
    public function destroy($kd_photo)
    {
        $photo = Photo::findOrFail($kd_photo); // Temukan foto berdasarkan kd_photo
        $photo->delete(); // Menghapus foto dari database

        return redirect()->route('photo.index')->with('success', 'Foto berhasil dihapus.'); // Redirect dengan pesan sukses
    }
}
