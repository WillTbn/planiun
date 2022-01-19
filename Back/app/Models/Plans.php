<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function prices()
    {
        return $this->hasMany(Prices::class);
    }
    public function beneficiario()
    {
        return $this->belongsTo(Beneficiarios::class);
    }
}
