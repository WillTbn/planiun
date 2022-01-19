<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiarios extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['codigo_id', 'quantidade', 'plan_data'];
    public function plans()
    {
        return $this->hasMany(Plans::class);
    }
}
