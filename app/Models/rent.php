<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_sewa';

    // Primary key adalah auto-incrementing
    public $incrementing = true;

    // Kolom yang dapat diisi
    protected $fillable = [
        'tgl_sewa',
        'bayar',
        'status',
        'total',
        'NIK',
    ];

    // Timestamps tidak digunakan pada tabel ini
    public $timestamps = false;

    public function rentDetails()
    {
        return $this->hasMany(rent_detail::class, 'id_sewa', 'id_sewa');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'NIK', 'NIK');
    }
}
