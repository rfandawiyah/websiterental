<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    protected $primaryKey = 'nopol';
    public $incrementing = false;

    public function rentDetails()
    {
        return $this->hasMany(rent_detail::class, 'nopol');
    }
}
