<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rent_detail extends Model
{
    use HasFactory;

    protected $table = 'rent_details';

    // Primary key tidak ditentukan karena tabel ini tidak memiliki primary key secara eksplisit
    public $incrementing = false;

    // Kolom yang dapat diisi
    protected $fillable = [
        'id_sewa',
        'nopol',
        'lama_sewa',
        'tgl_pengembalian',
    ];

    public function car()
    {
        return $this->belongsTo(Cars::class, 'nopol', 'nopol');
    }

    public function rent()
    {
        return $this->belongsTo(Rent::class, 'id_sewa', 'id_sewa');
    }

}
