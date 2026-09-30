<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    //tambahkan baris ini agar kolom pada tabel buku diizinkan untuk diisi massal
    protected $guarded = ['id'];

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
}