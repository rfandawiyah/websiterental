<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'customers';

    // Primary key
    protected $primaryKey = 'NIK';

    // Primary key bukan incrementing
    public $incrementing = false;

    // Primary key bukan integer
    protected $keyType = 'string';

    // Kolom yang dapat diisi
    protected $fillable = [
        'NIK',
        'nama',
        'no_telephon',
        'alamat',
    ];

    // Timestamps
    public $timestamps = true;
}
