<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'cars';

    protected $primaryKey = 'nopol';
    
    // Mengizinkan primary key bertipe non-incrementing atau string
    public $incrementing = false;
    protected $keyType = 'string';

    // Tentukan atribut yang dapat diisi (mass assignable)
    protected $fillable = [
        'nopol',
        'merkmobil',
        'harga',
        'type',
        'status',
        'gambar',
        'deskripsi',
    ];

    // Tentukan atribut yang harus dikonversi ke tipe data tertentu
    protected $casts = [
        'harga' => 'decimal:2', // Perbaikan format
    ];
    public function rentDetails()
    {
        return $this->hasMany(rent_detail::class, 'nopol');
    }
}
