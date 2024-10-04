<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photo'; // Pastikan ini adalah nama tabel Anda
    protected $primaryKey = 'kd_photo'; // Primary key

    // Daftar kolom yang dapat diisi
    protected $fillable = [
        'judul_photo',
        'isi_photo',
        'user_id',
        'status_photo', // Tambahkan ini
        'kategori_id', // Menambahkan galery_id
        'created_at',
        'updated_at',
    ];
    
    public $timestamps = true; // Mengaktifkan timestamp otomatis

    // Jika ada relasi dengan model Galery
    public function galery()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}
