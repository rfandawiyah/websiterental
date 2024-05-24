<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rent_detail extends Model
{
    use HasFactory;

    public function car()
    {
        return $this->belongsTo(Cars::class, 'nopol');
    }

    public function rent()
    {
        return $this->belongsTo(Rent::class, 'id_sewa');
    }

}
