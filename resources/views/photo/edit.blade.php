@extends('layouts.app')

@section('content')
<br>
    <div class="container">
        <h1>Edit Foto</h1>
        <br>

        <!-- Form Edit Foto -->
        <form action="{{ route('photo.update', $photo->kd_photo) }}" method="POST"> <!-- Pastikan menggunakan kd_photo sebagai identifier -->
            @csrf
            @method('PUT')

            <!-- Input Judul Foto -->
            <div class="mb-3">
                <label for="judul_photo" class="form-label">Judul Foto</label>
                <input type="text" name="judul_photo" id="judul_photo" class="form-control" value="{{ $photo->judul_photo }}" required>
            </div>

            <!-- Input URL Gambar -->
            <div class="mb-3">
                <label for="isi_photo" class="form-label">Isi Foto</label>
                <input type="url" name="isi_photo" id="isi_photo" class="form-control" value="{{ $photo->isi_photo }}" required>
                <small class="form-text text-muted">Masukkan URL Gambar yang valid.</small>
            </div>

            <!-- Select Status Foto -->
            <div class="mb-3">
                <label for="status_photo" class="form-label">Status</label>
                <select name="status_photo" id="status_photo" class="form-select" required>
                    <option value="1" {{ $photo->status_photo ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ !$photo->status_photo ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>

            <!-- Select Galeri -->
            <div class="mb-3">
                <label for="galery_id" class="form-label">Kategori Gambar</label>
                <select class="form-select" id="galery_id" name="galery_id" required>
                    <option value="" disabled>Pilih Kategori</option>
                    @foreach ($galeries as $galery)
                        <option value="{{ $galery->id }}" {{ $galery->id == $photo->galery_id ? 'selected' : '' }}>{{ $galery->judul }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol Update -->
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('photo.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
