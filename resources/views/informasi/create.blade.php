@extends('layouts.app')

@section('content')
<br>
    <div class="container">
    <div class="mb-3">
            <a href="{{ route('informasi.create') }}" class="btn btn-primary">Tambah Informasi</a> <!-- Tombol Tambah Kategori -->
        </div>

        <form action="{{ route('informasi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="judul_info" class="form-label">Judul Informasi</label>
                <input type="text" name="judul_info" id="judul_info" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="isi_info" class="form-label">URL Gambar</label>
                <input type="url" name="isi_info" id="isi_info" class="form-control" required>
                <small class="form-text text-muted">Masukkan URL gambar yang valid.</small>
            </div>
            <div class="mb-3">
                <label for="tgl_post_info" class="form-label">Tanggal Posting</label>
                <input type="date" name="tgl_post_info" id="tgl_post_info" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="status_info" class="form-label">Status</label>
                <select name="status_info" id="status_info" class="form-select" required>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
                <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select class="form-select" id="kategori_id" name="kategori_id" required>
                <option value="" disabled selected>Pilih Kategori</option>
                @foreach ($kategori as $kat)
                    <option value="{{ $kat->id }}">{{ $kat->judul }}</option>
                @endforeach
            </select>
        </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('informasi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
