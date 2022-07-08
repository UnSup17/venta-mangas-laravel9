<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function bill() {
        return $this->belongsTo(Bill::class);
    }

    public function tomes() {
        return $this->belongsToMany(Tome::class, 'item_tome');
    }

    protected $fillable = [
        'quantity',
        'bill_id'
    ];
}
