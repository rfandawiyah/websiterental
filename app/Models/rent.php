<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_sewa';

    public function rentDetails()
    {
        return $this->hasMany(rent_detail::class, 'id_sewa');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'NIK');
    }
}