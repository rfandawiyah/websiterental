<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class logincustomer extends Model
{
    use HasApiTokens, HasFactory;

    // Nama tabel
    protected $table = 'logincustomers';
    public $timestamps = false;
    // Kolom yang dapat diisi
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
