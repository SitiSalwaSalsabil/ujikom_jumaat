@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <a class="navbar-brand" href="#">Halaman Agenda</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('agenda.index') }}">Daftar Agenda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('agenda.create') }}">Tambah Agenda</a>
                </li>
                <!-- Tambahkan item menu lain di sini jika perlu -->
            </ul>
        </div>
    </nav>

    <div class="container mt-3">
        <h1 class="mb-4">Daftar Agenda</h1>

        <div class="mb-3">
            <a href="{{ route('agenda.create') }}" class="btn btn-primary">Tambah Agenda</a>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Kode Agenda</th>
                            <th>Judul Agenda</th>
                            <th>Isi Agenda</th>
                            <th>Tanggal Agenda</th>
                            <th>Tanggal Posting</th>
                            <th>Status</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agenda as $item)  <!-- Mengganti variabel dari $agenda menjadi $item -->
                            <tr>
                                <td>{{ $item->kd_agenda }}</td> <!-- Menggunakan $item untuk menampilkan data -->
                                <td>{{ $item->judul_agenda }}</td>
                                <td><img src="{{ $item->isi_agenda}}" alt="{{ $item->judul_agenda }}" style="width: 250px; height: auto;"></td> 
                                <td>{{ \Carbon\Carbon::parse($item->tgl_agenda)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tgl_post_agenda)->format('d-m-Y') }}</td>
                                <td class="{{ $item->status_agenda ? 'text-success' : 'text-danger' }}">
                                    {{ $item->status_agenda ? 'Aktif' : 'Tidak Aktif' }}
                                </td>       
                                <td>{{ $item->kategori ? $item->kategori->judul : 'Tidak ada Kategori' }}</td> <!-- Memperbaiki dari $info menjadi $item -->
                                <td>
                                    <a href="{{ route('agenda.edit', $item->kd_agenda) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('agenda.destroy', $item->kd_agenda) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tombol Kembali ke Dashboard -->
        <div class="mb-3 mt-4">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a> <!-- Sesuaikan dengan route dashboard Anda -->
        </div>
    </div>
@endsection
