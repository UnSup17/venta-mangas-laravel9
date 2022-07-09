<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    public function registers() {
        return $this->hasMany(Register::class);
    }

    protected $fillable = [
        'id',
        'subtotal',
        'total',
        'user_id'
    ];
}
