@extends('layouts.app')

@section('content')
<br>
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('photo.create') }}" class="btn btn-primary">Tambah Foto</a> <!-- Tombol Tambah Foto -->
        </div>

        <form action="{{ route('photo.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="judul_photo" class="form-label">Judul Foto</label>
                <input type="text" name="judul_photo" id="judul_photo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="isi_photo" class="form-label">URL Gambar</label>
                <input type="url" name="isi_photo" id="isi_photo" class="form-control" required>
                <small class="form-text text-muted">Masukkan URL gambar yang valid.</small>
            </div>
            <div class="mb-3">
                <label for="status_photo" class="form-label">Status</label>
                <select name="status_photo" id="status_photo" class="form-select" required>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="galery_id" class="form-label">Galeri</label>
                <select class="form-select" id="galery_id" name="galery_id" required>
                    <option value="" disabled selected>Pilih Galeri</option>
                    @foreach ($galeries as $galery)
                        <option value="{{ $galery->id }}">{{ $galery->judul }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('photo.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
