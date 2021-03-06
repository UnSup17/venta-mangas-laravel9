<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function car() {
        return $this->belongsTo(Car::class, 'item_id');
    }

    public function tome() {
        return $this->belongsTo(Tome::class, 'tome_id');
    }

    protected $fillable = [
        'quantity',
        'tome_id',
        'car_id'
    ];
}
