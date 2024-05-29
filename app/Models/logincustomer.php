<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logincustomer extends Model
{
    use HasFactory;

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