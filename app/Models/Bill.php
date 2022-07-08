<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    public function items() {
        return $this->hasMany(Item::class);
    }

    protected $fillable = [
        'id',
        'subtotal',
        'total',
        'user_id'
    ];
}
