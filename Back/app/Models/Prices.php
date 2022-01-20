<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function beneficiario()
    {
        return $this->belongsTo(beneficiaries::class);
    }
}
